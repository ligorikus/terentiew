<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Model\Product;
use App\Model\ProductPrice;
use App\Model\Unit;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::orderBy('id')->get();
        return view('products.index', compact('products'));
    }

    public function create()
    {
        $units = Unit::all();
        return view('products.form', compact('units'));
    }

    public function store(ProductRequest $request)
    {
        $unit = Unit::find($request->unit)->firstOrFail();
        $product = $unit->products()->create([
            'name' => $request->name
        ]);
        $product->price()->create(['price' => $request->price]);
        //TODO components

        return redirect()->route('products.index');
    }

    public function edit(Product $product)
    {
        $units = Unit::all();
        return view('products.form', compact('product', 'units'));
    }

    public function update(ProductRequest $request, Product $product)
    {
        $product->name = $request->name;
        $product->unit_id = $request->unit;
        $product->price->price = $request->price;
        $product->price->save();
        //TODO units
        //TODO components
        $product->save();

        return redirect()->route('products.index');
    }

    public function delete(Product $product)
    {
        return view('products.delete', compact('product'));
    }

    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('products.index');
    }
}
