<x-app-layout>
    <x-slot name="header">
        <div class="d-flex justify-content-between align-items-center">
            <h2 class="h4 fw-bold mb-0">
                {{ __('Dashboard') }}
            </h2>
            <span class="badge bg-success">
                {{ __('Welcome, ') . Auth::user()->name }}
            </span>
        </div>
    </x-slot>

    <div class="container py-4">
        <div class="row">
            <!-- Welcome Card -->
            <div class="col-md-8">
                <div class="card mb-4">
                    <div class="card-body">
                        <h5 class="card-title fw-bold">
                            <i class="bi bi-hand-thumbs-up text-success me-2"></i>{{ __("Welcome to Your Dashboard!") }}
                        </h5>
                        <p class="card-text text-muted mb-3">
                            {{ __("You're successfully logged in! Explore your account, browse our products, and enjoy shopping.") }}
                        </p>
                        <div class="btn-group" role="group">
                            <a href="{{ route('products.index') }}" class="btn btn-primary">
                                <i class="bi bi-bag"></i> {{ __('Browse Products') }}
                            </a>
                            <a href="{{ route('profile.edit') }}" class="btn btn-outline-secondary">
                                <i class="bi bi-person"></i> {{ __('Edit Profile') }}
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Quick Stats -->
                <div class="row mb-4">
                    <div class="col-md-6">
                        <div class="card bg-light">
                            <div class="card-body text-center">
                                <i class="bi bi-bag-check text-primary" style="font-size: 2rem;"></i>
                                <h6 class="card-title fw-bold mt-2 mb-0">Orders</h6>
                                <p class="text-muted small mb-0">0 orders</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card bg-light">
                            <div class="card-body text-center">
                                <i class="bi bi-heart text-danger" style="font-size: 2rem;"></i>
                                <h6 class="card-title fw-bold mt-2 mb-0">Wishlist</h6>
                                <p class="text-muted small mb-0">0 items</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Sidebar -->
            <div class="col-md-4">
                <div class="card mb-4">
                    <div class="card-body">
                        <h5 class="card-title fw-bold mb-3">Account Info</h5>
                        <p class="mb-2">
                            <strong>Name:</strong><br>
                            <small class="text-muted">{{ Auth::user()->name }}</small>
                        </p>
                        <p class="mb-2">
                            <strong>Email:</strong><br>
                            <small class="text-muted">{{ Auth::user()->email }}</small>
                        </p>
                        <p class="mb-2">
                            <strong>Member Since:</strong><br>
                            <small class="text-muted">{{ Auth::user()->created_at->format('M d, Y') }}</small>
                        </p>
                        <hr>
                        <a href="{{ route('profile.edit') }}" class="btn btn-sm btn-outline-primary w-100">
                            <i class="bi bi-pencil"></i> {{ __('Manage Account') }}
                        </a>
                    </div>
                </div>

                <div class="card bg-info bg-opacity-10">
                    <div class="card-body">
                        <h6 class="card-title fw-bold mb-2">
                            <i class="bi bi-info-circle"></i> Tip
                        </h6>
                        <p class="small text-muted mb-0">
                            Keep your profile information updated to ensure smooth transactions.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
