<?php

namespace App\Http\Middleware;

use Closure;

class GenerateMenus
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
        \Menu::make('AdminNavBar', function ($menu) {
            $menu->add(__('units.title'), ['route' => 'units.index']);
        });

        return $next($request);
    }
}
