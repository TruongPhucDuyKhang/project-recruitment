<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $role)
    {
        $permission = Auth::user()->permission;
        $id         = Auth::user()->id;
        // dd($role);
        if($permission != $role){
            return redirect()->route('job.index.index');
        }
        return $next($request);
    }
}
