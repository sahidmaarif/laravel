@extends('layouts.app')

@section('title', 'Products')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1>Products</h1>
    <a class="btn btn-success" href="{{ route('products.create') }}">Add Product</a>
</div>
@if($products->isEmpty())
    <div class="alert alert-secondary">No products are available at the moment.</div>
@else
    <div class="row row-cols-1 row-cols-md-2 g-4">
        @foreach($products as $product)
            <div class="col">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title">{{ $product->name }}</h5>
                        <p class="card-text">{{ Str::limit($product->description, 120) }}</p>
                    </div>
                    <div class="card-footer d-flex justify-content-between align-items-center">
                        <span class="text-primary fw-semibold">
                            ${{ number_format($product->price, 2) }}
                        </span>
                        <div class="d-flex gap-2">
                            <a href="{{ route('products.show', $product) }}" class="btn btn-outline-primary btn-sm">View</a>
                            <form method="POST" action="{{ route('cart.add', $product) }}">
                                @csrf
                                <button type="submit" class="btn btn-success btn-sm" @if($product->stock === 0) disabled @endif>Add</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endif
@endsection
