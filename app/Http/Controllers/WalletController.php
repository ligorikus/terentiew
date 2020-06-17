<?php

namespace App\Http\Controllers;

use App\Http\Requests\WalletRequest;
use App\Model\Wallet;

class WalletController extends Controller
{
    public function index()
    {
        $wallets = Wallet::orderBy('id')->get();
        return view('wallets.index', compact('wallets'));
    }

    public function create()
    {
        return view('wallets.form');
    }

    public function store(WalletRequest $request)
    {
        $wallet = new Wallet();
        $wallet->type = $request->type;
        $wallet->value = 0;
        $wallet->save();

        return redirect()->route('wallets.show', compact('wallet'));
    }

    public function show(Wallet $wallet)
    {
        return view('wallets.show', compact('wallet'));
    }

    public function edit(Wallet $wallet)
    {
        return view('wallets.form', compact('wallet'));
    }

    public function update(WalletRequest $request, Wallet $wallet)
    {
        $wallet->type = $request->type;
        $wallet->save();

        return redirect()->route('wallets.index');
    }

    public function delete(Wallet $wallet)
    {
        return view('wallets.delete', compact('wallet'));
    }

    public function destroy(Wallet $wallet)
    {
        $wallet->delete();

        return redirect()->route('wallets.index');
    }
}
