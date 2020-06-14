<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Model\Product;
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
        return view('products.form');
    }

    public function store(ProductRequest $request)
    {
        $product = new Product();
        $product->name = $request->name;
        //TODO units
        //TODO components
        $product->save();

        return redirect()->route('products.index');
    }

    public function edit(Product $product)
    {
        return view('products.form', compact('product'));
    }

    public function update(ProductRequest $request, Product $product)
    {
        $product->name = $request->name;
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
