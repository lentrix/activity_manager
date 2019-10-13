<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Activity;
use App\Semester;
use App\AttSched;

class ActivityController extends Controller
{
    public function index() {
        $activities = Activity::orderBy('id','desc')->get();
        return view('activities.index',compact('activities'));
    }

    public function create() {
        if(Semester::getActive())
            return view('activities.create');
        else
            return redirect()->back()->with('Error','An active semester is required before creating an activity.');
    }

    public function store(Request $request) {
        $this->validate($request, [
            'title'=>'required',
            'description'=>'required',
            'starts'=>'required',
            'ends'=>'required',
        ]);

        $act = Activity::create([
            'title' => $request['title'],
            'description' => $request['description'],
            'starts' => $request['starts'],
            'ends' => $request['ends'],
            'semester_id' => Semester::getActive()->id
        ]);

        \App\Log::add("Created Activity with #ID $act->id ($act->title).");

        return redirect('/activities')->with('Info',"Activity $act->title has been created.");
    }

    public function edit(Activity $activity) {
        return view('activities.edit', compact('activity'));
    }

    public function update(Request $request, Activity $activity) {
        $this->validate($request, [
            'title'=>'required',
            'description'=>'required',
            'starts'=>'required',
            'ends'=>'required',
        ]);

        $activity->update([
            'title' => $request['title'],
            'description' => $request['description'],
            'starts' => $request['starts'],
            'ends' => $request['ends'],
        ]);

        \App\Log::add("Updated Activity with #ID $activity->id ($activity->title).");

        return redirect('/activities')->with('Info',"Activity $activity->title has been updated.");
    }

    public function addChecking(Activity $activity, Request $request) {
        AttSched::create([
            'activity_id' => $activity->id,
            'label' => $request['label'],
            'open' => $request['open'],
            'close' => $request['close']
        ]);

        return redirect()->back();
    }

    public function removeChecking(AttSched $attSched) {
        $activity_id = $attSched->activity_id;
        $attSched->delete();
        return redirect()->back()->with('Error', 'Removed a checking Schedule');
    }
}
