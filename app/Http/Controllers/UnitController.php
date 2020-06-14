<?php

namespace App\Http\Controllers;

use App\Http\Requests\UnitRequest;
use App\Model\Unit;
use Illuminate\Http\Request;

class UnitController extends Controller
{
    public function index()
    {
        $units = Unit::orderBy('id')->get();
        return view('units.index', compact('units'));
    }

    public function create()
    {
        return view('units.form');
    }

    public function store(UnitRequest $request)
    {
        $unit = new Unit();
        $unit->name = $request->name;
        $unit->short_name = $request->short_name;
        $unit->save();

        return redirect()->route('units.index');
    }

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
    }
}
