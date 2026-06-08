@extends('layouts.app')

@section('title', 'Products - Online Shop')

@section('content')
    {{-- Page Header --}}
    <div class="mb-5">
        <div class="d-flex justify-content-between align-items-center">
            <div>
                <h1 class="display-5 fw-bold mb-2">Our Products</h1>
                <p class="text-muted">
                    Browse our collection of quality products. Add items to your cart and proceed to checkout.
                </p>
            </div>
            {{-- Create New Product Button --}}
            <a href="{{ route('products.create') }}" class="btn btn-primary">
                <i class="bi bi-plus-circle"></i> Add New Product
            </a>
        </div>
    </div>

    {{-- Products Table --}}
    <div class="table-responsive">
        <table class="table table-hover">
            {{-- Table Header --}}
            <thead class="table-light">
                <tr>
                    <th scope="col">Product Name</th>
                    <th scope="col">Category</th>
                    <th scope="col">Price</th>
                    <th scope="col">Stock</th>
                    <th scope="col">Description</th>
                    <th scope="col" class="text-center">Actions</th>
                </tr>
            </thead>

            {{-- Table Body --}}
            <tbody>
                @forelse($products as $product)
                    <tr>
                        {{-- Product Name --}}
                        <td class="fw-bold">{{ $product->name }}</td>

                        {{-- Category Name (from eager loaded relationship) --}}
                        <td>
                            @if($product->category)
                                <span class="badge bg-info">{{ $product->category->name }}</span>
                            @else
                                <span class="badge bg-secondary">No Category</span>
                            @endif
                        </td>

                        {{-- Price formatted as currency --}}
                        <td class="text-success fw-bold">${{ number_format($product->price, 2) }}</td>

                        {{-- Stock with color indicator --}}
                        <td>
                            @if($product->stock > 0)
                                <span class="badge bg-success">{{ $product->stock }} in stock</span>
                            @else
                                <span class="badge bg-danger">Out of stock</span>
                            @endif
                        </td>

                        {{-- Description (truncated) --}}
                        <td class="text-muted small">
                            @if($product->description)
                                {{ Str::limit($product->description, 50, '...') }}
                            @else
                                <em>No description</em>
                            @endif
                        </td>

                        {{-- Action Buttons --}}
                        <td class="text-center">
                            <div class="btn-group btn-group-sm" role="group">
                                {{-- View Details Button --}}
                                <a href="{{ route('products.show', $product) }}" 
                                   class="btn btn-outline-primary" 
                                   title="View Details">
                                    <i class="bi bi-eye"></i>
                                </a>

                                {{-- Edit Button --}}
                                <a href="{{ route('products.edit', $product) }}" 
                                   class="btn btn-outline-secondary" 
                                   title="Edit Product">
                                    <i class="bi bi-pencil"></i>
                                </a>

                                {{-- Add to Cart Button --}}
                                <form action="{{ route('cart.add', $product) }}" 
                                      method="POST" 
                                      style="display: inline;">
                                    @csrf
                                    <button type="submit" 
                                            class="btn btn-outline-success" 
                                            title="Add to Cart"
                                            @disabled($product->stock <= 0)>
                                        <i class="bi bi-cart-plus"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    {{-- Empty State Message --}}
                    <tr>
                        <td colspan="6" class="text-center text-muted py-4">
                            <i class="bi bi-inbox"></i>
                            <p class="mt-2">No products available. <a href="{{ route('products.create') }}">Create one now!</a></p>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{-- Pagination Links --}}
    <div class="d-flex justify-content-center mt-4">
        {{ $products->links() }}
    </div>
@endsection
