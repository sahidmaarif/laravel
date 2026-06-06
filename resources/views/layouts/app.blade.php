<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Online Shop')</title>
    
    {{-- Bootstrap 5 CSS --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.4.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    {{-- Bootstrap Icons --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    
    {{-- Custom Styles --}}
    <style>
        :root {
            --primary-color: #0d6efd;
            --secondary-color: #6c757d;
            --success-color: #198754;
            --danger-color: #dc3545;
            --light-bg: #f8f9fa;
        }
        
        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            background-color: #f5f5f5;
        }
        
        main {
            flex: 1;
        }
        
        .main-container {
            background-color: white;
            min-height: 70vh;
            padding-top: 2rem;
            padding-bottom: 2rem;
        }
        
        /* Hero Section Styles */
        .hero-section {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 60px 0;
            margin-bottom: 40px;
            border-radius: 10px;
        }
        
        .hero-section h1 {
            font-weight: 700;
            margin-bottom: 20px;
        }
        
        .hero-section p {
            font-size: 1.1rem;
            margin-bottom: 30px;
            opacity: 0.9;
        }
        
        /* Card Styles */
        .product-card {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            border: none;
            border-radius: 10px;
            overflow: hidden;
            height: 100%;
        }
        
        .product-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
        }
        
        .product-image {
            height: 200px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 3rem;
        }
        
        .product-price {
            color: var(--primary-color);
            font-weight: 700;
            font-size: 1.5rem;
        }
        
        /* Button Styles */
        .btn-add-cart {
            background-color: var(--success-color);
            border-color: var(--success-color);
        }
        
        .btn-add-cart:hover {
            background-color: #157347;
            border-color: #157347;
        }
        
        /* Cart Table Styles */
        .cart-table {
            background-color: white;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.08);
        }
        
        .cart-summary {
            background-color: var(--light-bg);
            border-radius: 10px;
            padding: 30px;
        }
        
        .summary-item {
            display: flex;
            justify-content: space-between;
            padding: 10px 0;
        }
        
        .summary-total {
            border-top: 2px solid var(--primary-color);
            padding-top: 15px;
            margin-top: 15px;
            font-weight: 700;
            font-size: 1.25rem;
        }
        
        /* Navbar Active State */
        .navbar-nav .nav-link.active {
            font-weight: 600;
            border-bottom: 3px solid var(--primary-color);
        }
        
        /* Alert Styles */
        .alert {
            border-radius: 10px;
            border: none;
        }
        
        /* Responsive */
        @media (max-width: 768px) {
            .hero-section {
                padding: 40px 0;
            }
            
            .hero-section h1 {
                font-size: 2rem;
            }
            
            .product-image {
                height: 150px;
            }
        }
    </style>
</head>
<body>
    {{-- Navbar Component --}}
    <x-navbar />
    
    {{-- Main Content --}}
    <main class="main-container">
        <div class="container">
            {{-- Success Message Alert --}}
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <i class="bi bi-check-circle me-2"></i>
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            
            {{-- Error Message Alert --}}
            @if(session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <i class="bi bi-exclamation-circle me-2"></i>
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            
            {{-- Page Content --}}
            @yield('content')
        </div>
    </main>
    
    {{-- Footer Component --}}
    <x-footer />
    
    {{-- Bootstrap JS Bundle --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.4.0/dist/js/bootstrap.bundle.min.js"></script>
    
    {{-- Additional Scripts --}}
    @yield('scripts')
</body>
</html>
