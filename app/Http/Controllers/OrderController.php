<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::orderByDesc('created_at')->get();

        return view('orders.index', compact('orders'));
    }

    public function show(Order $order)
    {
        return view('orders.show', compact('order'));
    }

    public function create()
    {
        $cart = session('cart', []);

        $cartItems = collect($cart)->map(function ($item, $productId) {
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

        if ($cartItems->isEmpty()) {
            return redirect()->route('products.index')->with('success', 'Add products to cart before checkout.');
        }

        return view('checkout', [
            'cartItems' => $cartItems,
            'cartTotal' => $cartItems->sum('line_total'),
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'customer_name' => 'required|string|max:255',
            'status' => 'required|string|max:50',
        ]);

        $cart = session('cart', []);

        $cartItems = collect($cart)->map(function ($item, $productId) {
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

        if ($cartItems->isEmpty()) {
            return redirect()->route('products.index')->with('success', 'Your cart is empty.');
        }

        $order = Order::create([
            'customer_name' => $data['customer_name'],
            'status' => $data['status'],
            'total_price' => $cartItems->sum('line_total'),
        ]);

        session()->forget('cart');

        return redirect()->route('orders.show', $order)->with('success', 'Order placed successfully.');
    }
}
