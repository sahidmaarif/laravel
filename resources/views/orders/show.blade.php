@extends('layouts.app')

@section('title', 'Order #' . $order->id)

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-body">
                <h1 class="mb-4">Order #{{ $order->id }}</h1>
                <p><strong>Customer:</strong> {{ $order->customer_name }}</p>
                <p><strong>Total Price:</strong> ${{ number_format($order->total_price, 2) }}</p>
                <p><strong>Status:</strong> {{ ucfirst($order->status) }}</p>
                <p><strong>Created:</strong> {{ $order->created_at->format('F j, Y') }}</p>
                <a href="{{ route('checkout.create') }}" class="btn btn-primary">Place Another Order</a>
            </div>
        </div>
    </div>
</div>
@endsection
