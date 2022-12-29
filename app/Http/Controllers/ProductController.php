<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('products.index', compact('products'));
    }

    public function buy(Product $product)
    {
        return view('products.buy', compact('product'));
    }

    public function charge(Request $request, Product $product)
{
    $request->validate([
        'stripeToken' => 'required',
    ]);

    try {
        $charge = Charge::create([
            'amount' => $product->price * 100, // Amount in cents
            'currency' => 'usd',
            'source' => $request->stripeToken,
            'description' => $product->name,
        ]);
    } catch (\Exception $e) {
        return back()->withError('Error: ' . $e->getMessage());
    }

    return back()->withSuccess('Charge successful');
}
}
