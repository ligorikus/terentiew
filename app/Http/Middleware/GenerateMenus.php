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
            $menu->add(__('products.title'), ['route' => 'products.index']);
            $menu->add(__('units.title'), ['route' => 'units.index']);
            $menu->add(__('wallets.title'), ['route' => 'wallets.index']);
            $menu->add(__('transactions.title'), ['route' => 'transactions.index']);
        });

        return $next($request);
    }
}
