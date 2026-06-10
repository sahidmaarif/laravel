<section>
    <div class="mb-3">
        <h5 class="card-title fw-bold">
            {{ __('Profile Information') }}
        </h5>
        <p class="text-muted small">
            {{ __("Update your account's profile information and email address.") }}
        </p>
    </div>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}">
        @csrf
        @method('patch')

        <!-- Name -->
        <div class="mb-3">
            <x-input-label for="name" :value="__('Full Name')" />
            <x-text-input 
                id="name" 
                name="name" 
                type="text" 
                :value="old('name', $user->name)" 
                required 
                autofocus 
                autocomplete="name"
                class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}"
            />
            <x-input-error :messages="$errors->get('name')" />
        </div>

        <!-- Email -->
        <div class="mb-3">
            <x-input-label for="email" :value="__('Email Address')" />
            <x-text-input 
                id="email" 
                name="email" 
                type="email" 
                :value="old('email', $user->email)" 
                required 
                autocomplete="username"
                class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}"
            />
            <x-input-error :messages="$errors->get('email')" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div class="mt-2">
                    <div class="alert alert-warning alert-sm" role="alert">
                        <small>
                            {{ __('Your email address is unverified.') }}
                            <button form="send-verification" class="btn btn-link btn-sm p-0">
                                {{ __('Click here to re-send the verification email.') }}
                            </button>
                        </small>
                    </div>

                    @if (session('status') === 'verification-link-sent')
                        <div class="alert alert-success alert-sm" role="alert">
                            <small>
                                {{ __('A new verification link has been sent to your email address.') }}
                            </small>
                        </div>
                    @endif
                </div>
            @endif
        </div>

        <!-- Submit -->
        <div class="d-flex gap-2 align-items-center">
            <x-primary-button class="btn btn-primary">{{ __('Save Changes') }}</x-primary-button>

            @if (session('status') === 'profile-updated')
                <small class="text-success">
                    <i class="bi bi-check-circle"></i> {{ __('Saved successfully.') }}
                </small>
            @endif
        </div>
    </form>
</section>
