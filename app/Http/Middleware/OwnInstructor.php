<?php

namespace App\Http\Middleware;

use App\School;
use Closure;
use Illuminate\Support\Facades\Auth;

class OwnInstructor
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @param $instructorId
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $instructors = School::find(Auth::user()->school_id)->instructors;
        $instructorIds = $instructors->pluck('id')->all();
        if (!in_array($request->route('instructor'), $instructorIds)) {
            return redirect()->back();
        }
        return $next($request);
    }
}
