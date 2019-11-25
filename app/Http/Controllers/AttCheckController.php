<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AttCheck;
use App\Log;

class AttCheckController extends Controller
{
    public function show(AttCheck $attCheck) {
        return view('att-checks.view', compact('attCheck'));
    }

    public function validateAttCheck(Request $request, AttCheck $attCheck) {
        $attCheck->valid = 1;
        $attCheck->save();

        Log::add("Validated a discarded attendance check ref# $attCheck->id.");

        return redirect("/students/{$attCheck->studSem->student_id}")
                ->with('Info','The discarded attendance check has been validated.');
    }
}
