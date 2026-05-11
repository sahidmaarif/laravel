@extends('layouts.app')

@section('title', 'Home')

@section('content')
<div class="p-5 mb-4 bg-light rounded-3">
    <div class="container-fluid py-5">
        <h1 class="display-5 fw-bold">Welcome to Online Shop</h1>
        <p class="col-md-8 fs-4">Browse products, manage your cart, and complete checkout with a clean Laravel MVC setup.</p>
        <a class="btn btn-primary btn-lg" href="{{ route('products.index') }}" role="button">Shop Products</a>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="card mb-3">
            <div class="card-body">
                <h5 class="card-title">Modern Bootstrap Layout</h5>
                <p class="card-text">This sample app uses Laravel 12 conventions, controllers, models, and Blade views.</p>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card mb-3">
            <div class="card-body">
                <h5 class="card-title">MVC Architecture</h5>
                <p class="card-text">Routes call controllers, controllers use models, and views render HTML templates.</p>
            </div>
        </div>
    </div>
</div>
@endsection
