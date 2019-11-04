<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;
use App\StudSem;

class StudentController extends Controller
{
    public function index() {

        $students = [];

        return view('students.index', compact('students'));
    }

    public function search(Request $request) {
        if($request['criteria']=="id") {
            $students[] = Student::find($request['key']);
        }else {
            $students = Student::where($request['criteria'], 'LIKE', '%' . $request['key'] . '%')
                    ->orderBy('lname')->orderBy('fname')
                    ->get();
        }

        return view('students.index', ['students'=>$students, 'request'=>$request]);
    }

    public function import(Request $request) {

        $str = file_get_contents($request->file('file')->path());

        $json = json_decode($str, true);

        if($json==null || count( $list = $json['data'] ) == 0) {
            return redirect()->back()->with('Error','The file you imported is invalid.');
        }

        foreach($list as $data) {
            Student::add($data);
            StudSem::add($data);
        }

        return redirect('/students')->with('Info','Import completed!');
    }

    public function view(Student $student) {
        return view('students.view', compact('student'));
    }
}
