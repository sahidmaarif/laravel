@extends('layouts.app')

@section('title', 'Shopping Cart - Online Shop')

@section('content')
    {{-- Page Header --}}
    <div class="mb-4">
        <h1 class="display-5 fw-bold">Shopping Cart</h1>
        <p class="text-muted">Review your items and proceed to checkout</p>
    </div>
    
    <div class="row">
        {{-- Cart Items Column --}}
        <div class="col-lg-8">
            {{-- Empty Cart Message --}}
            @if(session('cartEmpty') || true)
                {{-- For demonstration, showing sample cart data --}}
                <div class="alert alert-info mb-4" role="alert">
                    <i class="bi bi-info-circle me-2"></i>
                    <strong>Demo Mode:</strong> This is a sample cart display. In production, this would pull from session/database.
                </div>
                
                <div class="table-responsive">
                    <table class="table table-hover align-middle">
                        <thead class="table-light">
                            <tr>
                                <th>Product</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Subtotal</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- Sample Cart Item 1 --}}
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center gap-3">
                                        <div class="bg-primary bg-opacity-10 p-3 rounded" style="width: 60px; height: 60px; display: flex; align-items: center; justify-content: center;">
                                            <i class="bi bi-headphones text-primary" style="font-size: 1.5rem;"></i>
                                        </div>
                                        <div>
                                            <h6 class="mb-1 fw-bold">Wireless Headphones</h6>
                                            <small class="text-muted">High-quality audio</small>
                                        </div>
                                    </div>
                                </td>
                                <td><strong>$79.99</strong></td>
                                <td>
                                    <div class="input-group" style="width: 100px;">
                                        <button class="btn btn-outline-secondary btn-sm" type="button">−</button>
                                        <input type="text" class="form-control text-center" value="1">
                                        <button class="btn btn-outline-secondary btn-sm" type="button">+</button>
                                    </div>
                                </td>
                                <td><strong class="text-success">$79.99</strong></td>
                                <td>
                                    <button class="btn btn-sm btn-danger">
                                        <i class="bi bi-trash"></i> Remove
                                    </button>
                                </td>
                            </tr>
                            
                            {{-- Sample Cart Item 2 --}}
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center gap-3">
                                        <div class="bg-success bg-opacity-10 p-3 rounded" style="width: 60px; height: 60px; display: flex; align-items: center; justify-content: center;">
                                            <i class="bi bi-speaker text-success" style="font-size: 1.5rem;"></i>
                                        </div>
                                        <div>
                                            <h6 class="mb-1 fw-bold">Portable Speaker</h6>
                                            <small class="text-muted">12-hour battery</small>
                                        </div>
                                    </div>
                                </td>
                                <td><strong>$49.99</strong></td>
                                <td>
                                    <div class="input-group" style="width: 100px;">
                                        <button class="btn btn-outline-secondary btn-sm" type="button">−</button>
                                        <input type="text" class="form-control text-center" value="2">
                                        <button class="btn btn-outline-secondary btn-sm" type="button">+</button>
                                    </div>
                                </td>
                                <td><strong class="text-success">$99.98</strong></td>
                                <td>
                                    <button class="btn btn-sm btn-danger">
                                        <i class="bi bi-trash"></i> Remove
                                    </button>
                                </td>
                            </tr>
                            
                            {{-- Sample Cart Item 3 --}}
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center gap-3">
                                        <div class="bg-warning bg-opacity-10 p-3 rounded" style="width: 60px; height: 60px; display: flex; align-items: center; justify-content: center;">
                                            <i class="bi bi-lightning-charge text-warning" style="font-size: 1.5rem;"></i>
                                        </div>
                                        <div>
                                            <h6 class="mb-1 fw-bold">Premium USB Cable</h6>
                                            <small class="text-muted">2-meter length</small>
                                        </div>
                                    </div>
                                </td>
                                <td><strong>$12.99</strong></td>
                                <td>
                                    <div class="input-group" style="width: 100px;">
                                        <button class="btn btn-outline-secondary btn-sm" type="button">−</button>
                                        <input type="text" class="form-control text-center" value="3">
                                        <button class="btn btn-outline-secondary btn-sm" type="button">+</button>
                                    </div>
                                </td>
                                <td><strong class="text-success">$38.97</strong></td>
                                <td>
                                    <button class="btn btn-sm btn-danger">
                                        <i class="bi bi-trash"></i> Remove
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                
                {{-- Continue Shopping Button --}}
                <div class="mt-4">
                    <a href="{{ route('products.index') }}" class="btn btn-outline-primary">
                        <i class="bi bi-arrow-left"></i> Continue Shopping
                    </a>
                </div>
            @endif
        </div>
        
        {{-- Cart Summary Sidebar --}}
        <div class="col-lg-4">
            <div class="cart-summary">
                <h5 class="fw-bold mb-4">Order Summary</h5>
                
                {{-- Summary Items --}}
                <div class="summary-item">
                    <span>Subtotal (3 items):</span>
                    <span>$218.94</span>
                </div>
                
                <div class="summary-item">
                    <span>Shipping:</span>
                    <span>Free</span>
                </div>
                
                <div class="summary-item">
                    <span>Tax:</span>
                    <span>$17.51</span>
                </div>
                
                {{-- Promo Code Section --}}
                <div class="mb-4 mt-4 pb-4 border-bottom">
                    <label for="promoCode" class="form-label small fw-bold">Promo Code</label>
                    <div class="input-group">
                        <input type="text" class="form-control" id="promoCode" placeholder="Enter code">
                        <button class="btn btn-outline-secondary" type="button">Apply</button>
                    </div>
                </div>
                
                {{-- Total --}}
                <div class="summary-item summary-total">
                    <span>Total:</span>
                    <span class="text-primary">$236.45</span>
                </div>
                
                {{-- Checkout Button --}}
                <button class="btn btn-primary btn-lg w-100 mt-4 mb-2">
                    <i class="bi bi-credit-card me-2"></i> Proceed to Checkout
                </button>
                
                {{-- Continue Shopping Button --}}
                <button class="btn btn-outline-secondary w-100">
                    <i class="bi bi-bag me-2"></i> Continue Shopping
                </button>
            </div>
            
            {{-- Shipping Info Card --}}
            <div class="card mt-4 border-0 shadow-sm">
                <div class="card-body">
                    <h6 class="fw-bold mb-3">
                        <i class="bi bi-info-circle me-2"></i> Shipping Information
                    </h6>
                    <ul class="list-unstyled small text-muted">
                        <li class="mb-2">
                            <i class="bi bi-check-circle text-success me-2"></i>
                            Free shipping over $50
                        </li>
                        <li class="mb-2">
                            <i class="bi bi-check-circle text-success me-2"></i>
                            Delivery in 5-7 business days
                        </li>
                        <li class="mb-2">
                            <i class="bi bi-check-circle text-success me-2"></i>
                            Track your order anytime
                        </li>
                        <li>
                            <i class="bi bi-check-circle text-success me-2"></i>
                            Free returns within 30 days
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
