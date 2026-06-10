<x-guest-layout>
    <div class="mb-4">
        <h3 class="fw-bold text-center mb-1">Welcome Back</h3>
        <p class="text-center text-muted small mb-0">Sign in to your account</p>
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-3" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}" novalidate>
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
                autocomplete="username"
                class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}"
            />
            <x-input-error :messages="$errors->get('email')" />
        </div>

        <!-- Password -->
        <div class="mb-3">
            <x-input-label for="password" :value="__('Password')" />
            <x-text-input 
                id="password" 
                type="password"
                name="password"
                required 
                autocomplete="current-password"
                class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}"
            />
            <x-input-error :messages="$errors->get('password')" />
        </div>

        <!-- Remember Me -->
        <div class="mb-3 form-check">
            <input id="remember_me" type="checkbox" class="form-check-input" name="remember">
            <label for="remember_me" class="form-check-label">
                {{ __('Remember me') }}
            </label>
        </div>

        <!-- Action Buttons -->
        <div class="d-grid gap-2 mb-3">
            <x-primary-button class="btn btn-primary btn-lg">
                {{ __('Sign In') }}
            </x-primary-button>
        </div>

        <!-- Forgot Password Link -->
        <div class="text-center mb-3">
            @if (Route::has('password.request'))
                <a href="{{ route('password.request') }}" class="text-decoration-none small">
                    {{ __('Forgot your password?') }}
                </a>
            @endif
        </div>

        <!-- Register Link -->
        <hr class="my-3">
        <p class="text-center text-muted small mb-0">
            Don't have an account? 
            <a href="{{ route('register') }}" class="text-decoration-none fw-500">
                {{ __('Sign up here') }}
            </a>
        </p>
    </form>
</x-guest-layout>
