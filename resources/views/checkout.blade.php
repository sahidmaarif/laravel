@extends('layouts.app')

@section('title', 'Checkout')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card mb-4">
            <div class="card-body">
                <h1 class="mb-4">Checkout</h1>

                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="mb-4">
                    <h5 class="mb-3">Order Summary</h5>
                    <ul class="list-group">
                        @foreach($cartItems as $item)
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <div>
                                    <strong>{{ $item['product']->name }}</strong>
                                    <div class="text-muted">Quantity: {{ $item['quantity'] }}</div>
                                </div>
                                <span>${{ number_format($item['line_total'], 2) }}</span>
                            </li>
                        @endforeach
                        <li class="list-group-item d-flex justify-content-between">
                            <span>Subtotal</span>
                            <strong>${{ number_format($cartTotal, 2) }}</strong>
                        </li>
                        <li class="list-group-item d-flex justify-content-between">
                            <span>Shipping</span>
                            <strong>$5.00</strong>
                        </li>
                        <li class="list-group-item d-flex justify-content-between">
                            <span>Total</span>
                            <strong>${{ number_format($cartTotal + 5, 2) }}</strong>
                        </li>
                    </ul>
                </div>

                <form method="POST" action="{{ route('checkout.store') }}">
                    @csrf
                    <div class="mb-3">
                        <label for="customer_name" class="form-label">Customer Name</label>
                        <input type="text" name="customer_name" id="customer_name" class="form-control" value="{{ old('customer_name') }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="status" class="form-label">Order Status</label>
                        <select name="status" id="status" class="form-select" required>
                            <option value="pending">Pending</option>
                            <option value="processing">Processing</option>
                            <option value="completed">Completed</option>
                        </select>
                    </div>
                    <input type="hidden" name="total_price" value="{{ $cartTotal + 5 }}">
                    <button type="submit" class="btn btn-primary">Place Order</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
