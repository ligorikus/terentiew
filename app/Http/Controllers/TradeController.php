<?php

namespace App\Http\Controllers;

use App\Model\Product;
use App\Model\Wallet;
use Illuminate\Http\Request;

class TradeController extends Controller
{
    public function form()
    {
        $products = Product::all();
        $wallets = Wallet::all();
        return view('trade.form', compact('products', 'wallets'));
    }
}
