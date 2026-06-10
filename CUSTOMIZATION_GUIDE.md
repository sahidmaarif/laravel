# Customization Guide - Authentication Pages

This guide provides common code snippets for customizing your authentication pages.

---

## 🎨 Styling Customizations

### Change Navbar Brand Name

**File:** `resources/views/components/navbar.blade.php`

**Find:**

```blade
<a class="navbar-brand fw-bold" href="{{ route('home') }}">
    <i class="bi bi-shop"></i> Online Shop
</a>
```

**Replace with:**

```blade
<a class="navbar-brand fw-bold" href="{{ route('home') }}">
    <i class="bi bi-star"></i> My Store Name
</a>
```

Available icons: bi-shop, bi-star, bi-heart, bi-gift, bi-bag, bi-box

---

### Change Navbar Background Color

**Find:**

```blade
<nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow">
```

**Options:**

```blade
<!-- Blue navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow">

<!-- Green navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-success shadow">

<!-- Teal navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-info shadow">

<!-- Custom color with CSS -->
<nav class="navbar navbar-expand-lg navbar-dark shadow" style="background-color: #2c3e50;">
```

---

### Change Primary Button Color

**Find in login/register:**

```blade
<x-primary-button class="btn btn-primary btn-lg">
```

**Options:**

```blade
<!-- Success (green) -->
<x-primary-button class="btn btn-success btn-lg">

<!-- Info (light blue) -->
<x-primary-button class="btn btn-info btn-lg">

<!-- Warning (orange) -->
<x-primary-button class="btn btn-warning btn-lg">
```

---

### Change Form Input Styling

**File:** `resources/views/components/text-input.blade.php`

**Current:**

```blade
<input @disabled($disabled) {{ $attributes->merge(['class' => 'form-control', 'type' => 'text']) }} />
```

**Add rounded style:**

```blade
<input @disabled($disabled) {{ $attributes->merge(['class' => 'form-control rounded-3', 'type' => 'text']) }} />
```

**Add larger padding:**

```blade
<input @disabled($disabled) {{ $attributes->merge(['class' => 'form-control form-control-lg', 'type' => 'text']) }} />
```

---

### Add Custom CSS to Authentication Pages

**File:** `resources/views/layouts/guest.blade.php`

**Add before `</style>`:**

```css
.auth-card {
    border-top: 4px solid #007bff;
}

.auth-card:hover {
    box-shadow: 0 0.5rem 1rem rgba(0, 123, 255, 0.3);
}

.auth-container {
    animation: slideUp 0.3s ease-in-out;
}

@keyframes slideUp {
    from {
        opacity: 0;
        transform: translateY(20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}
```

---

## 📝 Content Customizations

### Change Login Page Heading

**File:** `resources/views/auth/login.blade.php`

**Find:**

```blade
<h3 class="fw-bold text-center mb-1">Welcome Back</h3>
<p class="text-center text-muted small mb-0">Sign in to your account</p>
```

**Change to:**

```blade
<h3 class="fw-bold text-center mb-1">🎉 Welcome to My Store</h3>
<p class="text-center text-muted small mb-0">Login with your email and password</p>
```

---

### Add Logo to Auth Pages

**File:** `resources/views/layouts/guest.blade.php`

**Add after `<div class="auth-container px-3 px-md-0">`:**

```blade
<div class="text-center mb-4">
    <img src="{{ asset('images/logo.png') }}" alt="Logo" style="max-width: 100px; height: auto;">
    <h1 class="h5 fw-bold mt-2">My Store</h1>
</div>
```

Then create `public/images/` folder and add your `logo.png` file.

---

### Change Register Form Heading

**File:** `resources/views/auth/register.blade.php`

**Find:**

```blade
<h3 class="fw-bold text-center mb-1">Create Account</h3>
<p class="text-center text-muted small mb-0">Join us and start shopping</p>
```

**Change to:**

```blade
<h3 class="fw-bold text-center mb-1">Join Our Community</h3>
<p class="text-center text-muted small mb-0">Get instant access to exclusive deals</p>
```

---

### Add Legal Links to Auth Pages

**File:** `resources/views/auth/register.blade.php`

**Add before `</form>`:**

```blade
<div class="alert alert-info alert-sm" role="alert">
    <small>
        By creating an account, you agree to our
        <a href="{{ route('home') }}#terms">Terms of Service</a> and
        <a href="{{ route('home') }}#privacy">Privacy Policy</a>.
    </small>
</div>
```

---

## 🔐 Security Customizations

### Add Email Verification Reminder

**File:** `resources/views/auth/login.blade.php`

**Add after password field:**

```blade
<!-- Email Verification Notice -->
<div class="alert alert-info alert-sm mt-3" role="alert">
    <small>
        <i class="bi bi-info-circle"></i>
        New users must verify their email address after registration.
    </small>
</div>
```

---

### Add Password Requirements

**File:** `resources/views/auth/register.blade.php`

**Find:**

```blade
<small class="text-muted d-block mt-1">
    Must be at least 8 characters
</small>
```

**Change to:**

```blade
<div class="alert alert-light alert-sm mt-1" role="alert">
    <small>
        Password must contain:
        <ul class="mb-0">
            <li>At least 8 characters</li>
            <li>One uppercase letter</li>
            <li>One number</li>
            <li>One special character (!@#$%)</li>
        </ul>
    </small>
</div>
```

---

### Add Two-Factor Authentication Notice

**File:** `resources/views/auth/login.blade.php`

**Add before submit button:**

```blade
<div class="form-check mb-3">
    <input class="form-check-input" type="checkbox" id="twoFactor" checked>
    <label class="form-check-label" for="twoFactor">
        Keep this device secure
    </label>
    <small class="d-block text-muted mt-1">
        We'll ask for extra verification next time from a new device
    </small>
</div>
```

---

## 🌍 Multi-Language Support

### Change Hardcoded Text to Translations

**File:** `resources/views/auth/login.blade.php`

**Instead of:**

```blade
<h3 class="fw-bold text-center mb-1">Welcome Back</h3>
```

**Use:**

```blade
<h3 class="fw-bold text-center mb-1">{{ __('messages.welcome_back') }}</h3>
```

**Then create:** `resources/lang/en/messages.php`

```php
<?php
return [
    'welcome_back' => 'Welcome Back',
    'sign_in' => 'Sign in to your account',
    // ... more translations
];
```

---

## 📧 Email Customizations

### Customize Email Verification Message

**File:** `resources/views/auth/verify-email.blade.php`

**Find:**

```blade
<div class="alert alert-info alert-dismissible fade show" role="alert">
    <small>
        {{ __('Thanks for signing up! ...') }}
    </small>
</div>
```

**Customize the text in the translation file** or replace directly with:

```blade
<div class="alert alert-info alert-dismissible fade show" role="alert">
    <h5 class="alert-heading">📧 Verify Your Email</h5>
    <p class="mb-0">
        We've sent a verification link to your email address.
        Click the link to confirm your email and activate your account.
        If you don't see it, check your spam folder.
    </p>
</div>
```

---

## 🎯 Advanced Customizations

### Add Social Login Buttons

**File:** `resources/views/auth/login.blade.php`

**Add after password section:**

```blade
<div class="divider my-3 position-relative">
    <span class="divider-text bg-white px-2">Or</span>
</div>

<div class="d-grid gap-2">
    <a href="{{ route('auth.google') }}" class="btn btn-outline-secondary">
        <i class="bi bi-google"></i> Sign in with Google
    </a>
    <a href="{{ route('auth.github') }}" class="btn btn-outline-secondary">
        <i class="bi bi-github"></i> Sign in with GitHub
    </a>
</div>

<style>
.divider {
    display: flex;
    align-items: center;
    margin: 1rem 0;
}
.divider::before {
    content: '';
    flex: 1;
    border-bottom: 1px solid #e9ecef;
}
.divider-text {
    padding: 0 0.5rem;
    color: #6c757d;
    font-size: 0.875rem;
}
</style>
```

---

### Add reCAPTCHA to Register

**File:** `resources/views/auth/register.blade.php`

**Add before submit button:**

```blade
<div class="mb-3">
    <div class="g-recaptcha" data-sitekey="{{ env('RECAPTCHA_SITE_KEY') }}"></div>
    @error('g-recaptcha-response')
        <span class="invalid-feedback d-block">{{ $message }}</span>
    @enderror
</div>

<script src="https://www.google.com/recaptcha/api.js"></script>
```

---

### Customize Profile Page Layout

**File:** `resources/views/profile/edit.blade.php`

**Add custom CSS:**

```blade
<style>
    .profile-header {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        padding: 2rem;
        border-radius: 0.5rem;
        margin-bottom: 2rem;
    }

    .profile-avatar {
        width: 80px;
        height: 80px;
        border-radius: 50%;
        background: rgba(255,255,255,0.3);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 2rem;
    }
</style>

<div class="profile-header">
    <div class="d-flex align-items-center">
        <div class="profile-avatar me-3">
            <i class="bi bi-person"></i>
        </div>
        <div>
            <h2 class="mb-0">{{ Auth::user()->name }}</h2>
            <p class="mb-0 opacity-75">{{ Auth::user()->email }}</p>
        </div>
    </div>
</div>
```

---

## 🧪 Testing Customizations

### Add Debug Info to Auth Pages

**File:** `resources/views/auth/login.blade.php`

**Add at bottom (remove in production):**

```blade
@if(config('app.debug'))
    <hr class="my-3">
    <div class="alert alert-warning alert-sm" role="alert">
        <small>
            <strong>Debug Mode:</strong>
            Test email: test@example.com | Password: password
        </small>
    </div>
@endif
```

---

### Add Form Validation Visual Feedback

**File:** `resources/views/components/text-input.blade.php`

**Update to:**

```blade
@props(['disabled' => false, 'validated' => false])

<input
    @disabled($disabled)
    {{ $attributes->merge([
        'class' => 'form-control ' . ($validated ? 'is-valid' : ''),
        'type' => 'text'
    ]) }}
/>
```

---

## 📱 Mobile Optimization

### Add Mobile-Friendly Auth Container

**File:** `resources/views/layouts/guest.blade.php`

**Find `.auth-container` CSS:**

```css
.auth-container {
    max-width: 450px;
    margin: 3rem auto;
}
```

**Enhance for mobile:**

```css
.auth-container {
    max-width: 450px;
    margin: 1rem auto;
    padding: 0.5rem;
}

@media (max-width: 576px) {
    .auth-container {
        margin: 0.5rem auto;
        max-width: 100%;
    }

    .auth-card {
        border-radius: 0;
    }
}
```

---

## 🎯 Performance Tips

1. **Use CDN for Bootstrap & Icons** ✅ (Already included)
2. **Minimize CSS in Production:**

    ```bash
    npm run build
    ```

3. **Cache Configuration:**

    ```bash
    php artisan config:cache
    ```

4. **Preload Critical Resources:**
   Add to `guest.blade.php` head:
    ```blade
    <link rel="preload" as="style" href="https://cdn.jsdelivr.net/npm/bootstrap@5.4.0/dist/css/bootstrap.min.css">
    ```

---

## 📚 Resources

- Bootstrap Components: https://getbootstrap.com/docs/5.4/components
- Bootstrap Icons: https://icons.getbootstrap.com
- Laravel Blade: https://laravel.com/docs/blade
- Form Validation: https://laravel.com/docs/validation

---

## Quick Copy-Paste Templates

### Complete Custom Auth Page

```blade
@extends('layouts.guest')

@section('content')
<x-guest-layout>
    <div class="text-center mb-4">
        <h3 class="fw-bold mb-2">{{ __('Page Title') }}</h3>
        <p class="text-muted small">{{ __('Subtitle') }}</p>
    </div>

    <form method="POST" action="{{ route('route.name') }}" novalidate>
        @csrf

        <div class="mb-3">
            <x-input-label for="field_name" :value="__('Field Label')" />
            <x-text-input id="field_name" name="field_name" type="text" required />
            <x-input-error :messages="$errors->get('field_name')" />
        </div>

        <div class="d-grid gap-2">
            <x-primary-button class="btn btn-primary btn-lg">
                {{ __('Submit') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
```

Happy customizing! 🎉
