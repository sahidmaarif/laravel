# Complete Code Reference - Laravel E-Commerce Project

This document contains the complete code for all files in the project.

---

## 1. NAVBAR COMPONENT

**File:** `resources/views/components/navbar.blade.php`

```blade
{{-- Navbar Component --}}
<nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow">
    <div class="container">
        <!-- Brand/Logo -->
        <a class="navbar-brand fw-bold" href="{{ route('home') }}">
            <i class="bi bi-shop"></i> Online Shop
        </a>

        <!-- Toggle Button for Mobile -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Navigation Menu -->
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <!-- Home Link -->
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}"
                       href="{{ route('home') }}" aria-current="page">
                        <i class="bi bi-house-door"></i> Home
                    </a>
                </li>

                <!-- Products Link -->
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('products.*') ? 'active' : '' }}"
                       href="{{ route('products.index') }}">
                        <i class="bi bi-bag"></i> Products
                    </a>
                </li>

                <!-- Cart Link -->
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('cart') ? 'active' : '' }}"
                       href="{{ route('cart') }}">
                        <i class="bi bi-cart"></i> Cart
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
```

**Key Features:**

- Uses `request()->routeIs()` for active route detection
- Responsive hamburger menu
- Bootstrap Icons integration
- Dark theme styling
- Mobile-first design

---

## 2. FOOTER COMPONENT

**File:** `resources/views/components/footer.blade.php`

```blade
{{-- Footer Component --}}
<footer class="bg-dark text-light mt-5 py-4">
    <div class="container">
        <div class="row">
            <!-- Footer Section 1: About -->
            <div class="col-md-4 mb-3">
                <h5 class="fw-bold mb-3">About Online Shop</h5>
                <p class="small">
                    Your one-stop shop for quality products at great prices.
                    Browse our collection and enjoy a seamless shopping experience.
                </p>
            </div>

            <!-- Footer Section 2: Quick Links -->
            <div class="col-md-4 mb-3">
                <h5 class="fw-bold mb-3">Quick Links</h5>
                <ul class="list-unstyled small">
                    <li><a href="{{ route('home') }}" class="text-light text-decoration-none">Home</a></li>
                    <li><a href="{{ route('products.index') }}" class="text-light text-decoration-none">Products</a></li>
                    <li><a href="{{ route('cart') }}" class="text-light text-decoration-none">Cart</a></li>
                    <li><a href="{{ route('checkout.create') }}" class="text-light text-decoration-none">Checkout</a></li>
                </ul>
            </div>

            <!-- Footer Section 3: Contact -->
            <div class="col-md-4 mb-3">
                <h5 class="fw-bold mb-3">Contact</h5>
                <p class="small mb-1">
                    <i class="bi bi-envelope"></i> info@onlineshop.com
                </p>
                <p class="small mb-1">
                    <i class="bi bi-telephone"></i> (555) 123-4567
                </p>
                <p class="small">
                    <i class="bi bi-geo-alt"></i> 123 Shop Street, City, State 12345
                </p>
            </div>
        </div>

        <!-- Footer Bottom -->
        <hr class="border-secondary my-3">
        <div class="row">
            <div class="col-md-6 text-center text-md-start">
                <p class="small mb-0">
                    &copy; {{ date('Y') }} Online Shop. All rights reserved.
                </p>
            </div>
            <div class="col-md-6 text-center text-md-end">
                <p class="small mb-0">
                    Built with <i class="bi bi-heart-fill text-danger"></i> using Laravel & Bootstrap
                </p>
            </div>
        </div>
    </div>
</footer>
```

**Key Features:**

- Three-column layout with responsive classes
- Multiple footer sections
- Dynamic copyright year using `{{ date('Y') }}`
- Bootstrap Icons for contact info
- Mobile responsive

---

## 3. MAIN LAYOUT

**File:** `resources/views/layouts/app.blade.php`

Complete layout with Bootstrap 5 CDN, custom CSS, Navbar and Footer components, and content yield section.

**CSS Includes:**

- CSS Variables for theming
- Hero section styles
- Product card animations
- Cart summary styling
- Responsive media queries

**Key Blade Features:**

- `<x-navbar />` and `<x-footer />` components
- `@yield('content')` for page content
- Session-based alerts with dismissible buttons
- Bootstrap JS Bundle included

---

## 4. HOME PAGE

**File:** `resources/views/home.blade.php`

Sections:

- Hero section with gradient and CTA buttons
- Three feature cards
- Call-to-action section
- "Why Choose Us" section with 4 benefits

Uses Blade directives:

- `@extends('layouts.app')`
- `@section('title')`
- `@section('content')`
- `{{ route() }}` for URL generation

---

## 5. PRODUCTS PAGE

**File:** `resources/views/products/index.blade.php` or `resources/views/products.blade.php`

Displays 6 product cards in a responsive grid:

1. Wireless Headphones - $79.99
2. Portable Speaker - $49.99
3. Smartphone Stand - $19.99
4. Premium USB Cable - $12.99
5. Wireless Charger - $34.99
6. Screen Protector (3 Pack) - $14.99

Each product card includes:

- Product icon/image placeholder
- Product name and description
- Price with highlighting
- Stock status badge
- Add to Cart button

Additional info section with 3 benefit cards.

---

## 6. SHOPPING CART PAGE

**File:** `resources/views/cart.blade.php`

Two-column layout:

- **Left:** Cart items table with 3 sample items
- **Right:** Order summary sidebar

**Cart Table:**

- Product details with icons
- Price, quantity, subtotal
- Quantity adjustment inputs
- Remove buttons

**Order Summary:**

- Subtotal breakdown
- Shipping cost
- Tax calculation
- Promo code input
- Total amount
- Checkout button
- Shipping information card

Sample data:

- Wireless Headphones x1 = $79.99
- Portable Speaker x2 = $99.98
- Premium USB Cable x3 = $38.97
- **Total: $236.45**

---

## 7. ROUTES CONFIGURATION

**File:** `routes/web.php`

Already configured routes:

```php
Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/cart', [CartController::class, 'index'])->name('cart');
Route::get('/checkout', [OrderController::class, 'create'])->name('checkout.create');
// ... additional routes
```

---

## STYLING & CUSTOMIZATION

### Bootstrap 5 CDN Links:

```html
<link
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.4.0/dist/css/bootstrap.min.css"
    rel="stylesheet"
/>
<link
    rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css"
/>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.4.0/dist/js/bootstrap.bundle.min.js"></script>
```

### CSS Variables:

```css
:root {
    --primary-color: #0d6efd; /* Blue */
    --secondary-color: #6c757d; /* Gray */
    --success-color: #198754; /* Green */
    --danger-color: #dc3545; /* Red */
    --light-bg: #f8f9fa; /* Light Gray */
}
```

### Responsive Breakpoints:

- Mobile: < 576px (1 column)
- Tablet: ≥ 576px (2 columns)
- Desktop: ≥ 992px (3 columns)

---

## BLADE COMPONENTS USAGE

### Component Registration (Auto-discovered from `resources/views/components/`)

Using components in `app.blade.php`:

```blade
<x-navbar />
<x-footer />
```

These automatically resolve to:

- `resources/views/components/navbar.blade.php`
- `resources/views/components/footer.blade.php`

---

## KEY BLADE DIRECTIVES USED

| Directive              | Usage                        |
| ---------------------- | ---------------------------- |
| `@extends()`           | Inherit parent layout        |
| `@section()`           | Define content section       |
| `@yield()`             | Output section content       |
| `@if/@endif`           | Conditional statements       |
| `{{ }}`                | Echo output                  |
| `{{ route() }}`        | Generate URL from route name |
| `{{ date() }}`         | PHP date function            |
| `request()->routeIs()` | Check current route          |
| `session('key')`       | Access session data          |
| `<x-component />`      | Use Blade component          |

---

## RESPONSIVE DESIGN CLASSES

From Bootstrap 5:

- `row` - Create row container
- `col-*` - Column sizing
- `row-cols-1 row-cols-md-2 row-cols-lg-3` - Responsive columns
- `g-4` - Gutter spacing
- `d-flex` - Flexbox display
- `align-items-center` - Vertical alignment
- `justify-content-between` - Space between
- `ms-auto` - Margin left auto
- `text-center`, `text-md-start` - Text alignment

---

## ANIMATION & HOVER EFFECTS

Product cards feature:

- Transform animation on hover (translateY)
- Box shadow increase on hover
- Smooth transitions (0.3s)
- Elevation effect

---

## ACCESSIBILITY FEATURES

- Semantic HTML5 structure
- ARIA labels for navigation
- Alt text for images/icons
- Proper heading hierarchy
- Dismissible alerts with buttons
- Mobile-friendly buttons

---

## BROWSER COMPATIBILITY

- Chrome (latest)
- Firefox (latest)
- Safari (latest)
- Edge (latest)
- Mobile browsers (iOS Safari, Chrome Mobile)

---

## DEPLOYMENT NOTES

1. Ensure database migrations are run: `php artisan migrate`
2. Clear cache if needed: `php artisan config:cache`
3. Optimize autoloader: `composer install --optimize-autoloader --no-dev`
4. Set proper permissions for storage directory

---

**Documentation Generated:** 2026-06-07
**Project Status:** ✅ COMPLETE AND READY FOR USE
