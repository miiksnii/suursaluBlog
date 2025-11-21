@extends('partials.layout')
@section('title', 'Register')

@section('content')

    <div class="card w-96 bg-base-100 shadow-xl mx-auto mt-6">
        <div class="card-body p-8 space-y-6">

            <form method="POST" action="{{ route('register') }}" class="space-y-6">
                @csrf

                {{-- Name --}}
                <label class="form-control w-full space-y-2">
                    <div class="label">
                        <span class="label-text text-base">{{ __('Name') }}</span>
                    </div>

                    <input
                        type="text"
                        name="name"
                        class="input input-bordered w-full h-12"
                        placeholder="{{ __('Name') }}"
                        value="{{ old('name') }}"
                        required
                        autofocus
                        autocomplete="name"
                    />

                    @error('name')
                        <div class="label">
                            <span class="label-text text-error">{{ $message }}</span>
                        </div>
                    @enderror
                </label>

                {{-- Email --}}
                <label class="form-control w-full space-y-2">
                    <div class="label">
                        <span class="label-text text-base">{{ __('Email') }}</span>
                    </div>

                    <input
                        type="email"
                        name="email"
                        class="input input-bordered w-full h-12"
                        placeholder="{{ __('Email') }}"
                        value="{{ old('email') }}"
                        required
                        autocomplete="username"
                    />

                    @error('email')
                        <div class="label">
                            <span class="label-text text-error">{{ $message }}</span>
                        </div>
                    @enderror
                </label>

                {{-- Password --}}
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

                {{-- Actions --}}
                <div class="flex items-center justify-between pt-4">

                    <a class="link link-primary text-sm" href="{{ route('login') }}">
                        {{ __('Already registered?') }}
                    </a>

                    <button class="btn btn-primary min-w-24">
                        {{ __('Register') }}
                    </button>

                </div>

            </form>

        </div>
    </div>

@endsection
