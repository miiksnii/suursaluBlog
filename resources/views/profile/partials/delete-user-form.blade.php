<section class="space-y-6">
    <header class="space-y-2">
        <h2 class="text-lg font-semibold">
            {{ __('Delete Account') }}
        </h2>

        <p class="text-sm opacity-80 max-w-md leading-relaxed">
            {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.') }}
        </p>
    </header>

    <!-- Trigger button -->
    <button class="btn btn-error" onclick="delete_account_modal.showModal()">
        {{ __('Delete Account') }}
    </button>

    <!-- Modal -->
    <dialog id="delete_account_modal" class="modal">
        <div class="modal-box space-y-6">

            <!-- Title -->
            <h3 class="text-lg font-semibold">
                {{ __('Are you sure you want to delete your account?') }}
            </h3>

            <!-- Description -->
            <p class="text-sm opacity-80 leading-relaxed">
                {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.') }}
            </p>

            <!-- Form -->
            <form id="delete-account" method="post" action="{{ route('profile.destroy') }}" class="space-y-4">
                @csrf
                @method('delete')

                <div class="form-control w-full">
                    <label class="label">
                        <span class="label-text">@lang('Password')</span>
                    </label>

                    <input
                        type="password"
                        name="password"
                        class="input input-bordered w-full"
                        placeholder="@lang('Password')"
                        required
                        autocomplete="current-password"
                    />

                    @error('password')
                        <label class="label">
                            <span class="label-text text-error">{{ $message }}</span>
                        </label>
                    @enderror
                </div>
            </form>

            <!-- Actions -->
            <div class="modal-action">
                <form method="dialog">
                    <button class="btn btn-secondary">
                        {{ __('Cancel') }}
                    </button>
                </form>

                <button class="btn btn-error" type="submit" form="delete-account">
                    {{ __('Delete Account') }}
                </button>
            </div>
        </div>
    </dialog>
</section>
