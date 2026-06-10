<x-guest-layout>
    <div class="mb-4">
        <h3 class="fw-bold text-center mb-1">Verify Your Email</h3>
        <p class="text-center text-muted small mb-0">Almost there!</p>
    </div>

    <div class="alert alert-info alert-dismissible fade show" role="alert">
        <small>
            {{ __('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
        </small>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>

    @if (session('status') == 'verification-link-sent')
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <small>
                {{ __('A new verification link has been sent to the email address you provided during registration.') }}
            </small>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="d-flex flex-column gap-2">
        <form method="POST" action="{{ route('verification.send') }}">
            @csrf
            <button type="submit" class="btn btn-primary btn-lg w-100">
                <i class="bi bi-arrow-clockwise me-2"></i>{{ __('Resend Verification Email') }}
            </button>
        </form>

        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="btn btn-outline-secondary btn-lg w-100">
                <i class="bi bi-box-arrow-right me-2"></i>{{ __('Log Out') }}
            </button>
        </form>
    </div>
</x-guest-layout>
