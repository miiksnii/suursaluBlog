<section class="space-y-6">
    <header class="space-y-2">
        <h2 class="text-lg font-semibold">
            {{ __('Update Password') }}
        </h2>

        <p class="text-sm opacity-80 max-w-md">
            {{ __('Ensure your account is using a long, random password to stay secure.') }}
        </p>
    </header>

    <form method="post" action="{{ route('password.update') }}" class="space-y-5">
        @csrf
        @method('put')

        <!-- Current Password -->
        <div class="form-control w-full">
            <label class="label">
                <span class="label-text">{{ __('Current Password') }}</span>
            </label>

            <input
                id="update_password_current_password"
                name="current_password"
                type="password"
                class="input input-bordered w-full"
                autocomplete="current-password"
            />

            @if ($errors->updatePassword->get('current_password'))
                <label class="label">
                    <span class="label-text text-error">
                        {{ $errors->updatePassword->first('current_password') }}
                    </span>
                </label>
            @endif
        </div>

        <!-- New Password -->
        <div class="form-control w-full">
            <label class="label">
                <span class="label-text">{{ __('New Password') }}</span>
            </label>

            <input
                id="update_password_password"
                name="password"
                type="password"
                class="input input-bordered w-full"
                autocomplete="new-password"
            />

            @if ($errors->updatePassword->get('password'))
                <label class="label">
                    <span class="label-text text-error">
                        {{ $errors->updatePassword->first('password') }}
                    </span>
                </label>
            @endif
        </div>

        <!-- Confirm Password -->
        <div class="form-control w-full">
            <label class="label">
                <span class="label-text">{{ __('Confirm Password') }}</span>
            </label>

            <input
                id="update_password_password_confirmation"
                name="password_confirmation"
                type="password"
                class="input input-bordered w-full"
                autocomplete="new-password"
            />

            @if ($errors->updatePassword->get('password_confirmation'))
                <label class="label">
                    <span class="label-text text-error">
                        {{ $errors->updatePassword->first('password_confirmation') }}
                    </span>
                </label>
            @endif
        </div>

        <!-- Actions -->
        <div class="flex items-center gap-3">
            <button class="btn btn-primary">
                {{ __('Save') }}
            </button>

            @if (session('status') === 'password-updated')
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
