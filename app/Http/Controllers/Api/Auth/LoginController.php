<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Api\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function login(Request $request) {

        if(!$token = auth()->attempt($request->only(['username', 'password']))){
            return response()->json(['error'=>'Invalid username and/or password.'], 401);
        }

        return response()->json(['token'=>$token]);
    }

    public function profile(Request $request) {
        try {
            $user = auth()->userOrFail();
        }catch(\Tymon\JWTAuth\Exceptions\UserNotDefinedException $ex) {
            return request()->json(['error'=>$ex->getMessage()]);
        }

        return response()->json(['user'=>$user]);
    }
}
