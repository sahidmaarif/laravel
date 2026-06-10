<x-guest-layout>
    <div class="mb-4">
        <h3 class="fw-bold text-center mb-1">Confirm Password</h3>
        <p class="text-center text-muted small mb-0">Verify your identity to continue</p>
    </div>

    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <small>
            {{ __('This is a secure area of the application. Please confirm your password before continuing.') }}
        </small>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>

    <form method="POST" action="{{ route('password.confirm') }}" novalidate>
        @csrf

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

        <!-- Submit Button -->
        <div class="d-grid gap-2">
            <x-primary-button class="btn btn-primary btn-lg">
                {{ __('Confirm') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
