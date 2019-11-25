<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Semester;
class SemesterController extends Controller
{
    public function index() {
        $semesters = Semester::orderBy('id','desc')->get();
        return view('semesters.index', compact('semesters'));
    }

    public function create() {
        return view('semesters.create');
    }

    public function store(Request $request) {
        $this->validate($request, [
            'prefix' => 'required',
            'accronym' => 'required',
            'semester' => 'required',
        ]);

        $sem = Semester::create([
            'prefix' => $request['prefix'],
            'accronym' => $request['accronym'],
            'semester' => $request['semester']
        ]);

        \App\Log::add("Created Semester with #ID $sem->id ($sem->accronym).");


        return redirect('/semesters')->with('Info',"Semester $sem->accronym has been created.");
    }

    public function edit(Semester $semester) {
        return view('semesters.edit', compact('semester'));
    }

    public function update(Request $request, Semester $semester) {
        $this->validate($request, [
            'prefix' => 'required',
            'accronym' => 'required',
            'semester' => 'required',
        ]);

        $semester->update($request->all());

        \App\Log::add("Updated Semester with #ID $semester->id ($semester->accronym).");

        return redirect('/semesters')->with('Info',"Semester $semester->accronym has been updated.");
    }

    public function activate(Semester $semester) {
        Semester::where('active',1)->update(['active'=>0]);
        $semester->active = 1;
        $semester->save();
        return redirect('/semesters')->with('Info',"Semester $semester->accronym has been activated.");
    }
}
