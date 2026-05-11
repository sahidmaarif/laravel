@extends('layouts.app')

@section('title', 'Orders')

@section('content')
<div class="mb-4">
    <h1>Orders</h1>
</div>
@if($orders->isEmpty())
    <div class="alert alert-secondary">There are no orders yet.</div>
@else
    <ul class="list-group">
        @foreach($orders as $order)
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <div>
                    <strong>{{ $order->customer_name }}</strong>
                    <div class="text-muted">Total: ${{ number_format($order->total_price, 2) }}</div>
                </div>
                <a href="{{ route('orders.show', $order) }}" class="btn btn-outline-primary btn-sm">View</a>
            </li>
        @endforeach
    </ul>
@endif
@endsection
