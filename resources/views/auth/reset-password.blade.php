@extends('partials.layout')
@section('title', 'Reset Password')

@section('content')

<div class="card w-96 bg-base-100 shadow-xl mx-auto mt-6">
    <div class="card-body p-8 space-y-6">

        <form method="POST" action="{{ route('password.store') }}" class="space-y-6">
            @csrf

            {{-- Hidden token --}}
            <input type="hidden" name="token" value="{{ $request->route('token') }}">

            {{-- Email --}}
            <label class="form-control w-full space-y-2">
                <div class="label">
                    <span class="label-text text-base">{{ __('Email') }}</span>
                </div>

                <input
                    type="email"
                    name="email"
                    class="input input-bordered w-full h-12"
                    value="{{ old('email', $request->email) }}"
                    placeholder="{{ __('Email') }}"
                    required
                    autofocus
                    autocomplete="username"
                />

                @error('email')
                    <div class="label">
                        <span class="label-text text-error">{{ $message }}</span>
                    </div>
                @enderror
            </label>

            {{-- New Password --}}
            <label class="form-control w-full space-y-2">
                <div class="label">
                    <span class="label-text text-base">{{ __('Password') }}</span>
                </div>

                <input
                    type="password"
                    name="password"
                    class="input input-bordered w-full h-12"
                    placeholder="{{ __('Password') }}"
                    required
                    autocomplete="new-password"
                />

                @error('password')
                    <div class="label">
                        <span class="label-text text-error">{{ $message }}</span>
                    </div>
                @enderror
            </label>

            {{-- Confirm Password --}}
            <label class="form-control w-full space-y-2">
                <div class="label">
                    <span class="label-text text-base">{{ __('Confirm Password') }}</span>
                </div>

                <input
                    type="password"
                    name="password_confirmation"
                    class="input input-bordered w-full h-12"
                    placeholder="{{ __('Confirm Password') }}"
                    required
                    autocomplete="new-password"
                />

                @error('password_confirmation')
                    <div class="label">
                        <span class="label-text text-error">{{ $message }}</span>
                    </div>
                @enderror
            </label>

            {{-- Action --}}
            <div class="flex justify-end pt-4">
                <button class="btn btn-primary min-w-32">
                    {{ __('Reset Password') }}
                </button>
            </div>

        </form>

    </div>
</div>

@endsection
