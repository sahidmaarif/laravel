<x-guest-layout>
    <div class="mb-4">
        <h3 class="fw-bold text-center mb-1">Create Account</h3>
        <p class="text-center text-muted small mb-0">Join us and start shopping</p>
    </div>

    <form method="POST" action="{{ route('register') }}" novalidate>
        @csrf

        <!-- Name -->
        <div class="mb-3">
            <x-input-label for="name" :value="__('Full Name')" />
            <x-text-input 
                id="name" 
                type="text" 
                name="name" 
                :value="old('name')" 
                required 
                autofocus 
                autocomplete="name"
                class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}"
            />
            <x-input-error :messages="$errors->get('name')" />
        </div>

        <!-- Email Address -->
        <div class="mb-3">
            <x-input-label for="email" :value="__('Email Address')" />
            <x-text-input 
                id="email" 
                type="email" 
                name="email" 
                :value="old('email')" 
                required 
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
                autocomplete="new-password"
                class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}"
            />
            <x-input-error :messages="$errors->get('password')" />
            <small class="text-muted d-block mt-1">
                Must be at least 8 characters
            </small>
        </div>

        <!-- Confirm Password -->
        <div class="mb-3">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
            <x-text-input 
                id="password_confirmation" 
                type="password"
                name="password_confirmation" 
                required 
                autocomplete="new-password"
                class="form-control {{ $errors->has('password_confirmation') ? 'is-invalid' : '' }}"
            />
            <x-input-error :messages="$errors->get('password_confirmation')" />
        </div>

        <!-- Register Button -->
        <div class="d-grid gap-2 mb-3">
            <x-primary-button class="btn btn-primary btn-lg">
                {{ __('Create Account') }}
            </x-primary-button>
        </div>

        <!-- Login Link -->
        <hr class="my-3">
        <p class="text-center text-muted small mb-0">
            Already have an account? 
            <a href="{{ route('login') }}" class="text-decoration-none fw-500">
                {{ __('Sign in here') }}
            </a>
        </p>
    </form>
</x-guest-layout>
