<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Activity;
use App\Semester;
use App\AttSched;

class ActivityController extends Controller
{
    public function index() {
        $semester = Semester::getActive();

        if($semester==null) {
            return redirect('/semesters')->with('Error','Activities cannot be opened because there is no active semester.');
        }

        $activities = Activity::where('semester_id', $semester->id)->orderBy('id','desc')->get();
        return view('activities.index',[
            'activities' => $activities,
            'semester' => $semester
        ]);
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
            'date' => 'required',
            'starts'=>'required',
            'ends'=>'required',
        ]);

        $start = $request['date'] . " " . $request['starts'] . ":00";
        $end = $request['date'] . " " . $request['ends'] . ":00";

        $act = Activity::create([
            'title' => $request['title'],
            'description' => $request['description'],
            'starts' => $start,
            'ends' => $end,
            'semester_id' => Semester::getActive()->id
        ]);

        \App\Log::add("Created Activity with #ID $act->id ($act->title).");

        return redirect("/activities/$act->id")->with('Info',"Activity $act->title has been created.");
    }

    public function edit(Activity $activity) {
        return view('activities.edit', compact('activity'));
    }

    public function update(Request $request, Activity $activity) {
        $this->validate($request, [
            'title'=>'required',
            'description'=>'required',
            'date' => 'required',
            'starts'=>'required',
            'ends'=>'required',
        ]);

        $start = $request['date'] . " " . $request['starts'] . ":00";
        $end = $request['date'] . " " . $request['ends'] . ":00";

        $activity->update([
            'title' => $request['title'],
            'description' => $request['description'],
            'starts' => $start,
            'ends' => $end,
        ]);

        \App\Log::add("Updated Activity with #ID $activity->id ($activity->title).");

        return redirect('/activities')->with('Info',"Activity $activity->title has been updated.");
    }

    public function addChecking(Activity $activity, Request $request) {
        AttSched::create([
            'activity_id' => $activity->id,
            'label' => $request['label'],
            'fine' => $request['fine'],
            'open' => date('Y-m-d', $activity->starts->timestamp). " " . $request['open'] . ":00",
            'close' => date('Y-m-d', $activity->starts->timestamp). " " . $request['close'] . ":00"
        ]);

        \App\Log::add("Added checking schedule {$request['label']} on $activity->title");

        return redirect()->back();
    }

    public function removeChecking(Request $request) {
        $attSched = AttSched::find($request['sched_id']);
        $title = $attSched->label;
        $attSched->delete();

        \App\Log::add("Removed checking schedule $title on {$attSched->activity->title}");

        return redirect()->back()->with('Error', 'Removed a checking Schedule');
    }
}
