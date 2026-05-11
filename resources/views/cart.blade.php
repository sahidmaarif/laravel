@extends('layouts.app')

@section('title', 'Cart')

@section('content')
<div class="row">
    <div class="col-md-8">
        <h1 class="mb-4">Shopping Cart</h1>

        @if($cartItems->isEmpty())
            <div class="alert alert-secondary">
                Your cart is empty. <a href="{{ route('products.index') }}" class="fw-semibold">Browse products</a> to get started.
            </div>
        @else
            <div class="table-responsive mb-4">
                <table class="table table-bordered align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>Product</th>
                            <th>Quantity</th>
                            <th>Price</th>
                            <th>Total</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($cartItems as $item)
                            <tr>
                                <td>{{ $item['product']->name }}</td>
                                <td>
                                    <form method="POST" action="{{ route('cart.update', $item['product']) }}" class="d-flex gap-2 align-items-center">
                                        @csrf
                                        <input type="number" name="quantity" value="{{ $item['quantity'] }}" min="1" class="form-control form-control-sm" style="width: 80px;">
                                        <button type="submit" class="btn btn-sm btn-outline-secondary">Update</button>
                                    </form>
                                </td>
                                <td>${{ number_format($item['product']->price, 2) }}</td>
                                <td>${{ number_format($item['line_total'], 2) }}</td>
                                <td>
                                    <form method="POST" action="{{ route('cart.remove', $item['product']) }}">
                                        @csrf
                                        <button type="submit" class="btn btn-sm btn-danger">Remove</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="d-flex justify-content-between align-items-center mb-4">
                <a href="{{ route('products.index') }}" class="btn btn-outline-primary">Continue Shopping</a>
                <div class="d-flex gap-2">
                    <form method="POST" action="{{ route('cart.clear') }}">
                        @csrf
                        <button type="submit" class="btn btn-outline-danger">Clear Cart</button>
                    </form>
                    <a href="{{ route('checkout.create') }}" class="btn btn-primary">Proceed to Checkout</a>
                </div>
            </div>
        @endif
    </div>
    <div class="col-md-4">
        <div class="card bg-light">
            <div class="card-body">
                <h5 class="card-title">Cart Summary</h5>
                <p class="mb-1">Subtotal: <strong>${{ number_format($cartTotal, 2) }}</strong></p>
                <p class="mb-1">Shipping: <strong>$5.00</strong></p>
                <p class="mb-3">Total: <strong>${{ number_format($cartTotal + 5, 2) }}</strong></p>
                <a href="{{ route('checkout.create') }}" class="btn btn-success w-100" @if($cartItems->isEmpty()) disabled @endif>Checkout Now</a>
            </div>
        </div>
    </div>
</div>
@endsection
