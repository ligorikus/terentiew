<?php

namespace App\Http\Controllers;

use App\Http\Requests\SellRequest;
use App\Model\Product;
use App\Model\ProductExpress;
use App\Model\Transaction;
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

    public function sell(SellRequest $request)
    {
        if (!$request->to_employee) {
            $transaction = new Transaction();
            $transaction->wallet_id = $request->wallet;
            $transaction->value = $request->cost - $request->cost * ($request->discount / 100);
            $transaction->type = 'income';
            $transaction->save();

            $wallet = Wallet::find($transaction->wallet_id);
            $wallet->value += $transaction->value;
            $wallet->save();
        }
        foreach ($request->products as $product) {
            $express = new ProductExpress();
            $express->product_id = $product['id'];
            $express->value = $product['count'];
            $express->type = 'expense';
            if (isset($transaction)) {
                $express->transaction_id = $transaction->id;
            }
            $express->save();
        }
        return response()->json(['status' => 'success', 'route' => route('trade.index')], 200);
    }
}
