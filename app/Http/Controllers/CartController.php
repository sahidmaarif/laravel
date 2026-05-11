<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    protected const CART_KEY = 'cart';

    public function index()
    {
        $cart = session(self::CART_KEY, []);

        $items = collect($cart)->map(function ($item, $productId) {
            $product = Product::find($productId);

            if (! $product) {
                return null;
            }

            return [
                'product' => $product,
                'quantity' => $item['quantity'],
                'line_total' => $product->price * $item['quantity'],
            ];
        })->filter();

        $total = $items->sum('line_total');

        return view('cart', [
            'cartItems' => $items,
            'cartTotal' => $total,
        ]);
    }

    public function add(Product $product)
    {
        $cart = session(self::CART_KEY, []);
        $cart[$product->id] = [
            'quantity' => ($cart[$product->id]['quantity'] ?? 0) + 1,
        ];

        session([self::CART_KEY => $cart]);

        return redirect()->back()->with('success', "{$product->name} added to cart.");
    }

    public function update(Request $request, Product $product)
    {
        $quantity = max(1, (int) $request->input('quantity', 1));
        $cart = session(self::CART_KEY, []);
        $cart[$product->id] = ['quantity' => $quantity];

        session([self::CART_KEY => $cart]);

        return redirect()->route('cart')->with('success', 'Cart updated.');
    }

    public function remove(Product $product)
    {
        $cart = session(self::CART_KEY, []);

        if (isset($cart[$product->id])) {
            unset($cart[$product->id]);
            session([self::CART_KEY => $cart]);
        }

        return redirect()->route('cart')->with('success', "{$product->name} removed from cart.");
    }

    public function clear()
    {
        session()->forget(self::CART_KEY);

        return redirect()->route('cart')->with('success', 'Cart cleared.');
    }
}
