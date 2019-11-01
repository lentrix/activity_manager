<?php

namespace App\Http\Middleware;

use Closure;

class ActivityNotDueMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $actId = $request->route('activity');
        $activity = \App\Activity::find($actId)->first();

        if($activity && $activity->starts->lt(\Carbon\Carbon::now()))
            return $next($request);
        else
            return redirect()->back()->with('Error',"The activity $activity->title has already past.");
    }
}
