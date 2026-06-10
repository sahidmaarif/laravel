<section>
    <div class="mb-3">
        <h5 class="card-title fw-bold text-danger">
            {{ __('Danger Zone') }}
        </h5>
        <p class="text-muted small">
            {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.') }}
        </p>
    </div>

    <button 
        type="button"
        class="btn btn-outline-danger"
        onclick="document.dispatchEvent(new CustomEvent('open-modal', { detail: 'confirm-user-deletion' }))"
    >
        <i class="bi bi-trash"></i> {{ __('Delete Account') }}
    </button>

    <!-- Delete Confirmation Modal -->
    <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()">
        <div class="modal-header border-bottom">
            <h5 class="modal-title fw-bold">
                {{ __('Are you sure you want to delete your account?') }}
            </h5>
            <button 
                type="button" 
                class="btn-close" 
                aria-label="Close"
                onclick="document.dispatchEvent(new CustomEvent('close-modal', { detail: 'confirm-user-deletion' }))"
            ></button>
        </div>

        <form method="post" action="{{ route('profile.destroy') }}">
            <div class="modal-body">
                <p class="text-muted mb-3">
                    {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.') }}
                </p>

                <div class="mb-3">
                    <x-input-label for="password" :value="__('Password')" />
                    <x-text-input
                        id="password"
                        name="password"
                        type="password"
                        placeholder="{{ __('Enter your password') }}"
                        class="form-control {{ $errors->userDeletion->has('password') ? 'is-invalid' : '' }}"
                    />
                    <x-input-error :messages="$errors->userDeletion->get('password')" />
                </div>
            </div>

            <div class="modal-footer border-top">
                <button 
                    type="button" 
                    class="btn btn-secondary"
                    onclick="document.dispatchEvent(new CustomEvent('close-modal', { detail: 'confirm-user-deletion' }))"
                >
                    {{ __('Cancel') }}
                </button>
                @csrf
                @method('delete')
                <button type="submit" class="btn btn-danger">
                    <i class="bi bi-exclamation-triangle"></i> {{ __('Yes, Delete My Account') }}
                </button>
            </div>
        </form>
    </x-modal>
</section>
