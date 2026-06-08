@extends('layouts.app')

@section('title', $product->name)

@section('content')
<div class="row">
    <div class="col-md-8">
        <div class="card mb-4">
            <div class="card-body">
                <h1 class="card-title">{{ $product->name }}</h1>
                <p class="card-text">{{ $product->description }}</p>
                <p class="mb-2"><strong>Price:</strong> ${{ number_format($product->price, 2) }}</p>
                <p class="mb-3"><strong>Stock:</strong> {{ $product->stock }}</p>

                <form method="POST" action="{{ route('cart.add', $product) }}">
                    @csrf
                    <button type="submit" class="btn btn-success" @if($product->stock === 0) disabled @endif>
                        Add to Cart
                    </button>
                    <a href="{{ route('cart') }}" class="btn btn-outline-primary ms-2">View Cart</a>
                </form>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Product Details</h5>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                        <strong>Category:</strong>
                        @if($product->category)
                            <span class="badge bg-info ms-2">{{ $product->category->name }}</span>
                        @else
                            <span class="badge bg-secondary ms-2">No Category</span>
                        @endif
                    </li>
                    <li class="list-group-item"><strong>ID:</strong> {{ $product->id }}</li>
                    <li class="list-group-item"><strong>Created:</strong> {{ $product->created_at->format('F j, Y') }}</li>
                    <li class="list-group-item"><strong>Updated:</strong> {{ $product->updated_at->format('F j, Y') }}</li>
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection
