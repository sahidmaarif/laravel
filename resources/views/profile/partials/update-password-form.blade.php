<section>
    <div class="mb-3">
        <h5 class="card-title fw-bold">
            {{ __('Update Password') }}
        </h5>
        <p class="text-muted small">
            {{ __('Ensure your account is using a long, random password to stay secure.') }}
        </p>
    </div>

    <form method="post" action="{{ route('password.update') }}">
        @csrf
        @method('put')

        <!-- Current Password -->
        <div class="mb-3">
            <x-input-label for="update_password_current_password" :value="__('Current Password')" />
            <x-text-input 
                id="update_password_current_password" 
                name="current_password" 
                type="password" 
                autocomplete="current-password"
                class="form-control {{ $errors->updatePassword->has('current_password') ? 'is-invalid' : '' }}"
            />
            <x-input-error :messages="$errors->updatePassword->get('current_password')" />
        </div>

        <!-- New Password -->
        <div class="mb-3">
            <x-input-label for="update_password_password" :value="__('New Password')" />
            <x-text-input 
                id="update_password_password" 
                name="password" 
                type="password" 
                autocomplete="new-password"
                class="form-control {{ $errors->updatePassword->has('password') ? 'is-invalid' : '' }}"
            />
            <x-input-error :messages="$errors->updatePassword->get('password')" />
        </div>

        <!-- Confirm Password -->
        <div class="mb-3">
            <x-input-label for="update_password_password_confirmation" :value="__('Confirm Password')" />
            <x-text-input 
                id="update_password_password_confirmation" 
                name="password_confirmation" 
                type="password" 
                autocomplete="new-password"
                class="form-control {{ $errors->updatePassword->has('password_confirmation') ? 'is-invalid' : '' }}"
            />
            <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" />
        </div>

        <!-- Submit -->
        <div class="d-flex gap-2 align-items-center">
            <x-primary-button class="btn btn-primary">{{ __('Update Password') }}</x-primary-button>

            @if (session('status') === 'password-updated')
                <small class="text-success">
                    <i class="bi bi-check-circle"></i> {{ __('Password updated successfully.') }}
                </small>
            @endif
        </div>
    </form>
</section>
