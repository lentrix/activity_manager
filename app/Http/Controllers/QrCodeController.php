<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;

class QrCodeController extends Controller
{
    public function index(Request $request) {
        $list = [];

        if(!empty($request['criteria'])) {
            if($request['criteria']=='student_id') {
                $list[] = Student::find($request['key']);
            }else {
                $list = Student::where($request['criteria'], $request['key'])
                        ->orderBy('lname')
                        ->orderBy('fname')
                        ->get();
            }
        }

        return view('qrcodes.index', ['list'=>$list]);
    }
}
