@extends('layouts.app')

@section('title', 'Home - Online Shop')

@section('content')
    {{-- Hero/Banner Section --}}
    <div class="hero-section mb-5">
        <div class="container">
            <h1 class="display-4 fw-bold mb-4">Welcome to Online Shop</h1>
            <p class="lead mb-4">
                Discover amazing products at unbeatable prices. Browse our exclusive collection and enjoy a seamless shopping experience.
            </p>
            <a href="{{ route('products.index') }}" class="btn btn-light btn-lg me-3">
                <i class="bi bi-bag"></i> Shop Now
            </a>
            <a href="{{ route('cart') }}" class="btn btn-outline-light btn-lg">
                <i class="bi bi-cart"></i> View Cart
            </a>
        </div>
    </div>
    
    {{-- Features Section --}}
    <div class="row mb-5">
        {{-- Feature 1: Wide Selection --}}
        <div class="col-md-4 mb-4">
            <div class="card h-100 border-0 shadow-sm">
                <div class="card-body text-center">
                    <i class="bi bi-box-seam text-primary" style="font-size: 3rem;"></i>
                    <h5 class="card-title mt-3 mb-2">Wide Selection</h5>
                    <p class="card-text text-muted">
                        Browse through our extensive collection of quality products from trusted brands.
                    </p>
                </div>
            </div>
        </div>
        
        {{-- Feature 2: Fast Shipping --}}
        <div class="col-md-4 mb-4">
            <div class="card h-100 border-0 shadow-sm">
                <div class="card-body text-center">
                    <i class="bi bi-truck text-success" style="font-size: 3rem;"></i>
                    <h5 class="card-title mt-3 mb-2">Fast Shipping</h5>
                    <p class="card-text text-muted">
                        Quick and reliable delivery to your doorstep. Track your order anytime.
                    </p>
                </div>
            </div>
        </div>
        
        {{-- Feature 3: Secure Checkout --}}
        <div class="col-md-4 mb-4">
            <div class="card h-100 border-0 shadow-sm">
                <div class="card-body text-center">
                    <i class="bi bi-shield-check text-warning" style="font-size: 3rem;"></i>
                    <h5 class="card-title mt-3 mb-2">Secure Payment</h5>
                    <p class="card-text text-muted">
                        Your transactions are protected. We use industry-standard security measures.
                    </p>
                </div>
            </div>
        </div>
    </div>
    
    {{-- Call to Action Section --}}
    <div class="bg-light p-5 rounded-3 mb-5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <h2 class="fw-bold mb-3">Ready to Shop?</h2>
                    <p class="lead mb-0">
                        Browse our products and find exactly what you're looking for. Add items to your cart and checkout with ease.
                    </p>
                </div>
                <div class="col-md-4 text-md-end text-start mt-3 mt-md-0">
                    <a href="{{ route('products.index') }}" class="btn btn-primary btn-lg">
                        <i class="bi bi-arrow-right"></i> Shop Products
                    </a>
                </div>
            </div>
        </div>
    </div>
    
    {{-- Store Description --}}
    <section class="mb-5">
        <h2 class="fw-bold mb-4">Why Choose Us?</h2>
        <div class="row">
            <div class="col-lg-6">
                <h5 class="fw-bold mb-3">
                    <i class="bi bi-check-circle text-success me-2"></i>Quality Assurance
                </h5>
                <p class="text-muted">
                    Every product is carefully selected and quality-checked to ensure customer satisfaction. 
                    We work with verified suppliers to bring you only the best.
                </p>
            </div>
            <div class="col-lg-6">
                <h5 class="fw-bold mb-3">
                    <i class="bi bi-check-circle text-success me-2"></i>Best Prices
                </h5>
                <p class="text-muted">
                    We offer competitive prices without compromising on quality. Regular promotions and discounts 
                    help you save more while shopping.
                </p>
            </div>
            <div class="col-lg-6 mt-4">
                <h5 class="fw-bold mb-3">
                    <i class="bi bi-check-circle text-success me-2"></i>Easy Returns
                </h5>
                <p class="text-muted">
                    Not satisfied? Our hassle-free return policy ensures you can shop with confidence. 
                    Easy returns and refunds within 30 days.
                </p>
            </div>
            <div class="col-lg-6 mt-4">
                <h5 class="fw-bold mb-3">
                    <i class="bi bi-check-circle text-success me-2"></i>24/7 Support
                </h5>
                <p class="text-muted">
                    Our customer support team is available round the clock to help you with any questions or concerns.
                </p>
            </div>
        </div>
    </section>
@endsection
