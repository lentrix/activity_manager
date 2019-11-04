<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\Controller;
use Illuminate\Http\Request;
use App\Activity;
use App\Semester;
use App\AttSched;



class ActivitiesController extends Controller
{
    public function activities() {
        try {
            $user = auth()->user();
            if($user) {
                $activities = Activity::where('semester_id', Semester::getActive()->id)
                    ->orderBy('starts','DESC')
                    ->get();
                return response()->json($activities);
            }else {
                return response()->json(['error'=>'Unauthorized Access'], 401);
            }

        }catch(\Tymon\JWTAuth\Exceptions\UserNotDefinedException $ex) {
            return response()->json(['error'=>$ex->getMessage()]);
        }
    }

    public function attScheds($activity_id) {
        try {
            $user = auth()->user();
            if($user) {
                $attScheds = AttSched::where('activity_id', $activity_id)->get();
                return response()->json($attScheds);
            }else {
                return response()->json(['error'=>'Unauthorized Access'], 401);
            }
        }catch(\Tymon\JWTAuth\Exceptions\UserNotDefinedException $ex) {
            return response()->json(['error'=>$ex->getMessage()]);
        }
    }
}
