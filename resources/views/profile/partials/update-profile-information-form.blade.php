<section class="space-y-6">
    <header class="space-y-2">
        <h2 class="text-lg font-semibold">
            {{ __('Profile Information') }}
        </h2>

        <p class="text-sm opacity-80 max-w-md">
            {{ __("Update your account's profile information and email address.") }}
        </p>
    </header>

    <!-- Verification resend form -->
    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <!-- Update form -->
    <form method="post" action="{{ route('profile.update') }}" class="space-y-5">
        @csrf
        @method('patch')

        <!-- Name -->
        <div class="form-control w-full">
            <label class="label">
                <span class="label-text">{{ __('Name') }}</span>
            </label>

            <input
                type="text"
                name="name"
                class="input input-bordered w-full"
                value="{{ old('name', $user->name) }}"
                placeholder="{{ __('Name') }}"
                required
                autocomplete="name"
                autofocus
            />

            @error('name')
                <label class="label">
                    <span class="label-text text-error">{{ $message }}</span>
                </label>
            @enderror
        </div>

        <!-- Email -->
        <div class="form-control w-full">
            <label class="label">
                <span class="label-text">{{ __('Email') }}</span>
            </label>

            <input
                type="email"
                name="email"
                class="input input-bordered w-full"
                value="{{ old('email', $user->email) }}"
                placeholder="{{ __('Email') }}"
                required
                autocomplete="username"
            />

            @error('email')
                <label class="label">
                    <span class="label-text text-error">{{ $message }}</span>
                </label>
            @enderror
        </div>

        <!-- Email verification -->
        @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && !$user->hasVerifiedEmail())
            <div class="space-y-1">
                <p class="text-sm opacity-80 leading-relaxed">
                    {{ __('Your email address is unverified.') }}

                    <button form="send-verification" class="link link-primary">
                        {{ __('Click here to re-send the verification email.') }}
                    </button>
                </p>

                @if (session('status') === 'verification-link-sent')
                    <p class="text-sm text-success">
                        {{ __('A new verification link has been sent to your email address.') }}
                    </p>
                @endif
            </div>
        @endif

        <!-- Actions -->
        <div class="flex items-center gap-3">
            <button class="btn btn-primary">
                {{ __('Save') }}
            </button>

            @if (session('status') === 'profile-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm opacity-70"
                >
                    {{ __('Saved.') }}
                </p>
            @endif
        </div>
    </form>
</section>
