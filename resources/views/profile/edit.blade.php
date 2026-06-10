<x-app-layout>
    <x-slot name="header">
        <div class="d-flex justify-content-between align-items-center">
            <h2 class="h4 fw-bold mb-0">
                {{ __('Profile Settings') }}
            </h2>
            <a href="{{ route('home') }}" class="btn btn-sm btn-outline-secondary">
                <i class="bi bi-house-door"></i> Back to Home
            </a>
        </div>
    </x-slot>

    <div class="container py-4">
        <div class="row">
            <div class="col-lg-8">
                <!-- Update Profile Information -->
                <div class="card mb-4">
                    <div class="card-body">
                        @include('profile.partials.update-profile-information-form')
                    </div>
                </div>

                <!-- Update Password -->
                <div class="card mb-4">
                    <div class="card-body">
                        @include('profile.partials.update-password-form')
                    </div>
                </div>

                <!-- Delete Account -->
                <div class="card border-danger">
                    <div class="card-body">
                        @include('profile.partials.delete-user-form')
                    </div>
                </div>
            </div>

            <!-- Sidebar -->
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title fw-bold mb-3">Account Info</h5>
                        <p class="mb-2">
                            <strong>Name:</strong><br>
                            <span class="text-muted">{{ Auth::user()->name }}</span>
                        </p>
                        <p class="mb-2">
                            <strong>Email:</strong><br>
                            <span class="text-muted">{{ Auth::user()->email }}</span>
                        </p>
                        <p class="mb-0">
                            <strong>Member Since:</strong><br>
                            <span class="text-muted">{{ Auth::user()->created_at->format('M d, Y') }}</span>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
