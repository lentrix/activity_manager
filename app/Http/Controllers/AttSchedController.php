<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AttSched;

class AttSchedController extends Controller
{
    public function show(AttSched $attSched) {
        $attChecks = \App\AttCheck::where('att_sched_id', $attSched->id)
            ->whereHas('studSem', function($q1){
                return $q1->whereHas('student', function($q2){
                    return $q2->orderBy('lname');
                })->with('student');
            })->with('studSem')
            ->get();

        $checks = [];
        foreach($attChecks as $attCheck) {
            $checks[$attCheck->studSem->student->fullName] = [
                'checkTime' => $attCheck->check_time,
                'checkBy' => $attCheck->user->username
            ];
        }

        ksort($checks);

        return view('att-scheds.view', [
            'attSched'=>$attSched,
            'checks'=>$checks
        ]);
    }

    public function edit(AttSched $attSched) {
        return view('att-scheds.edit', ['attSched'=>$attSched]);
    }

    public function update(Request $request, AttSched $attSched) {

        $attSched->update([
            'label' => $request['label'],
            'open' => $request['open'],
            'open' => date('Y-m-d', $attSched->open->timestamp). " " . $request['open'] . ":00",
            'close' => date('Y-m-d', $attSched->close->timestamp). " " . $request['close'] . ":00"
        ]);

        \App\Log::add("Updated checking schedule $attSched->label on {$attSched->activity->title}");

        return redirect("/activities/{$attSched->activity->id}")->with('Info','Updated checking schedule successfully!');
    }

}
