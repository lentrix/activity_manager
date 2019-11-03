<?php

namespace App\Http\Middleware;

use Closure;
use App\Activity;

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
        $activity = $request->route('activity');

        if($activity->starts->gte(\Carbon\Carbon::now()))
            return $next($request);
        else
            return redirect()->back()->with('Error',"The activity $activity->title has already past.");
    }
}
