<x-guest-layout>
    <div class="mb-4">
        <h3 class="fw-bold text-center mb-1">Reset Password</h3>
        <p class="text-center text-muted small mb-0">We'll help you get back to your account</p>
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-3" :status="session('status')" />

    <div class="alert alert-info alert-dismissible fade show" role="alert">
        <small>
            {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
        </small>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>

    <form method="POST" action="{{ route('password.email') }}" novalidate>
        @csrf

        <!-- Email Address -->
        <div class="mb-3">
            <x-input-label for="email" :value="__('Email Address')" />
            <x-text-input 
                id="email" 
                type="email" 
                name="email" 
                :value="old('email')" 
                required 
                autofocus
                class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}"
            />
            <x-input-error :messages="$errors->get('email')" />
        </div>

        <!-- Submit Button -->
        <div class="d-grid gap-2 mb-3">
            <x-primary-button class="btn btn-primary btn-lg">
                {{ __('Send Reset Link') }}
            </x-primary-button>
        </div>

        <!-- Back to Login -->
        <div class="text-center">
            <a href="{{ route('login') }}" class="text-decoration-none small">
                <i class="bi bi-arrow-left"></i> {{ __('Back to Login') }}
            </a>
        </div>
    </form>
</x-guest-layout>
