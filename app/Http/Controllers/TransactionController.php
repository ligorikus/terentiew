<?php

namespace App\Http\Controllers;

use App\Http\Requests\TransactionRequest;
use App\Model\Transaction;
use App\Model\Wallet;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    /*public function index()
    {
        $units = Transaction::orderBy('id')->get();
        return view('units.index', compact('units'));
    }*/

    public function create(Wallet $wallet)
    {
        return view('transactions.form', compact('wallet'));
    }

    public function store(Wallet $wallet, TransactionRequest $request)
    {
        $transaction = $wallet->transactions()->create([
           'value' => $request->value,
           'type' => $request->type
        ]);

        if ($transaction->type === 'income') {
            $wallet->value += $transaction->value;
        } else {
            $wallet->value -= $transaction->value;
        }
        $wallet->save();

        return redirect()->route('wallets.show', compact('wallet'));
    }
/*
    public function edit(Unit $unit)
    {
        return view('units.form', compact('unit'));
    }

    public function update(UnitRequest $request, Unit $unit)
    {
        $unit->name = $request->name;
        $unit->short_name = $request->short_name;
        $unit->save();

        return redirect()->route('units.index');
    }

    public function delete(Unit $unit)
    {
        return view('units.delete', compact('unit'));
    }

    public function destroy(Unit $unit)
    {
        $unit->delete();

        return redirect()->route('units.index');
    }*/
}
