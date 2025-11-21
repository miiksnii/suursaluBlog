@extends('partials.layout')
@section('title', 'Login')

@section('content')

    {{-- Success alert --}}
    @if (session('status'))
        <div role="alert" class="alert alert-success w-96 mx-auto mb-6">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 shrink-0" fill="none" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            <span>{{ session('status') }}</span>
        </div>
    @endif

    <div class="card w-96 bg-base-100 shadow-xl mx-auto mt-6">
        <div class="card-body p-8 space-y-6">

            <form method="POST" action="{{ route('login') }}" class="space-y-6">
                @csrf

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
                        autofocus
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
                        autocomplete="current-password"
                    />

                    @error('password')
                        <div class="label">
                            <span class="label-text text-error">{{ $message }}</span>
                        </div>
                    @enderror
                </label>

                {{-- Remember Me --}}
                <label class="flex items-center gap-3 pt-2">
                    <input type="checkbox" name="remember" class="checkbox" />
                    <span class="label-text text-base">{{ __('Remember me') }}</span>
                </label>

                {{-- Actions --}}
                <div class="flex items-center justify-between pt-4">

                    @if (Route::has('password.request'))
                        <a class="link link-primary text-sm" href="{{ route('password.request') }}">
                            {{ __('Forgot your password?') }}
                        </a>
                    @endif

                    <button class="btn btn-primary min-w-24">
                        {{ __('Log in') }}
                    </button>
                </div>

            </form>

        </div>
    </div>

@endsection
