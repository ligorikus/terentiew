<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Admin
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
        $enable = DB::table('auth_enable')->select()->first();
        $enable = $enable ? $enable->enable : false;
        if (!$enable || Auth::user()->roles->contains('name', 'admin')) {
            return $next($request);
        }
        return redirect()->route('/');
    }
}
