@extends('layouts.app')

@section('title', 'Products - Online Shop')

@section('content')
    {{-- Page Header --}}
    <div class="mb-5">
        <h1 class="display-5 fw-bold mb-2">Our Products</h1>
        <p class="text-muted">
            Browse our collection of quality products. Add items to your cart and proceed to checkout.
        </p>
    </div>
    
    {{-- Products Grid --}}
    <div class="row row-cols-1 row-cols-sm-2 row-cols-lg-3 g-4">
        
        {{-- Product 1: Wireless Headphones --}}
        <div class="col">
            <div class="card product-card">
                {{-- Product Image --}}
                <div class="product-image">
                    <i class="bi bi-headphones"></i>
                </div>
                
                {{-- Product Body --}}
                <div class="card-body">
                    <h5 class="card-title fw-bold">Wireless Headphones</h5>
                    <p class="card-text text-muted small">
                        Premium sound quality with active noise cancellation. Perfect for music and calls.
                    </p>
                    <div class="d-flex justify-content-between align-items-center">
                        <span class="product-price">$79.99</span>
                        <span class="badge bg-success">In Stock</span>
                    </div>
                </div>
                
                {{-- Product Footer --}}
                <div class="card-footer bg-light border-top">
                    <button class="btn btn-add-cart btn-sm w-100">
                        <i class="bi bi-cart-plus"></i> Add to Cart
                    </button>
                </div>
            </div>
        </div>
        
        {{-- Product 2: Portable Speaker --}}
        <div class="col">
            <div class="card product-card">
                <div class="product-image">
                    <i class="bi bi-speaker"></i>
                </div>
                <div class="card-body">
                    <h5 class="card-title fw-bold">Portable Speaker</h5>
                    <p class="card-text text-muted small">
                        Compact and powerful speaker with 12-hour battery life. Great for outdoor adventures.
                    </p>
                    <div class="d-flex justify-content-between align-items-center">
                        <span class="product-price">$49.99</span>
                        <span class="badge bg-success">In Stock</span>
                    </div>
                </div>
                <div class="card-footer bg-light border-top">
                    <button class="btn btn-add-cart btn-sm w-100">
                        <i class="bi bi-cart-plus"></i> Add to Cart
                    </button>
                </div>
            </div>
        </div>
        
        {{-- Product 3: Smartphone Stand --}}
        <div class="col">
            <div class="card product-card">
                <div class="product-image">
                    <i class="bi bi-phone"></i>
                </div>
                <div class="card-body">
                    <h5 class="card-title fw-bold">Smartphone Stand</h5>
                    <p class="card-text text-muted small">
                        Adjustable stand for all smartphones. Ideal for streaming and video calls.
                    </p>
                    <div class="d-flex justify-content-between align-items-center">
                        <span class="product-price">$19.99</span>
                        <span class="badge bg-success">In Stock</span>
                    </div>
                </div>
                <div class="card-footer bg-light border-top">
                    <button class="btn btn-add-cart btn-sm w-100">
                        <i class="bi bi-cart-plus"></i> Add to Cart
                    </button>
                </div>
            </div>
        </div>
        
        {{-- Product 4: USB Cable --}}
        <div class="col">
            <div class="card product-card">
                <div class="product-image">
                    <i class="bi bi-lightning-charge"></i>
                </div>
                <div class="card-body">
                    <h5 class="card-title fw-bold">Premium USB Cable</h5>
                    <p class="card-text text-muted small">
                        Durable USB-C cable with fast charging capability. 2-meter length for convenience.
                    </p>
                    <div class="d-flex justify-content-between align-items-center">
                        <span class="product-price">$12.99</span>
                        <span class="badge bg-success">In Stock</span>
                    </div>
                </div>
                <div class="card-footer bg-light border-top">
                    <button class="btn btn-add-cart btn-sm w-100">
                        <i class="bi bi-cart-plus"></i> Add to Cart
                    </button>
                </div>
            </div>
        </div>
        
        {{-- Product 5: Wireless Charger --}}
        <div class="col">
            <div class="card product-card">
                <div class="product-image">
                    <i class="bi bi-battery-charging"></i>
                </div>
                <div class="card-body">
                    <h5 class="card-title fw-bold">Wireless Charger</h5>
                    <p class="card-text text-muted small">
                        Fast wireless charging pad compatible with all Qi-enabled devices.
                    </p>
                    <div class="d-flex justify-content-between align-items-center">
                        <span class="product-price">$34.99</span>
                        <span class="badge bg-success">In Stock</span>
                    </div>
                </div>
                <div class="card-footer bg-light border-top">
                    <button class="btn btn-add-cart btn-sm w-100">
                        <i class="bi bi-cart-plus"></i> Add to Cart
                    </button>
                </div>
            </div>
        </div>
        
        {{-- Product 6: Screen Protector --}}
        <div class="col">
            <div class="card product-card">
                <div class="product-image">
                    <i class="bi bi-shield-exclamation"></i>
                </div>
                <div class="card-body">
                    <h5 class="card-title fw-bold">Screen Protector (3 Pack)</h5>
                    <p class="card-text text-muted small">
                        Tempered glass screen protectors with easy installation. Protect your device.
                    </p>
                    <div class="d-flex justify-content-between align-items-center">
                        <span class="product-price">$14.99</span>
                        <span class="badge bg-success">In Stock</span>
                    </div>
                </div>
                <div class="card-footer bg-light border-top">
                    <button class="btn btn-add-cart btn-sm w-100">
                        <i class="bi bi-cart-plus"></i> Add to Cart
                    </button>
                </div>
            </div>
        </div>
    </div>
    
    {{-- Shop Info Section --}}
    <div class="row mt-5 pt-5 border-top">
        <div class="col-md-4 text-center mb-3">
            <i class="bi bi-percent text-primary" style="font-size: 2rem;"></i>
            <h5 class="mt-3">Best Prices</h5>
            <p class="text-muted small">Competitive pricing on all products</p>
        </div>
        <div class="col-md-4 text-center mb-3">
            <i class="bi bi-truck text-success" style="font-size: 2rem;"></i>
            <h5 class="mt-3">Free Shipping</h5>
            <p class="text-muted small">On orders over $50</p>
        </div>
        <div class="col-md-4 text-center mb-3">
            <i class="bi bi-arrow-counterclockwise text-warning" style="font-size: 2rem;"></i>
            <h5 class="mt-3">Easy Returns</h5>
            <p class="text-muted small">30-day return policy</p>
        </div>
    </div>
@endsection
