<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function loginForm() {
        if(auth()->guest())
            return view('login');
        else
            return redirect('/home');
    }

    public function login(Request $request) {
        $this->validate($request,[
            'username'=>'required',
            'password'=>'required'
        ]);

        $login = auth()->attempt([
            'username'=>$request['username'],
            'password'=>$request['password']
        ]);

        if($login) {
            return redirect('/home');
        }else {
            return redirect()->back()->with('Error','Invalid username and/or password.');
        }
    }

    public function logout() {
        auth()->logout();
        return redirect('/');
    }

    public function home() {
        if(!auth()->guest())
            return view('home');
        else
            return redirect('/');

    }

    public function changePasswordForm() {
        return view('change-password');
    }

    public function changePassword(Request $request) {
        $this->validate($request, [
            'current_password'=>'required',
            'new_password'=>'required|confirmed',
        ]);
        $user = auth()->user();
        if(\Hash::check($request['current_password'], $user->password) ){
            $user->password = bcrypt($request['new_password']);
            $user->save();
            return redirect('/home')->with('Info','Your password has been changed.');
        }else {
            return redirect()->back()->with('Error','Invalid current password.');
        }
    }
}
