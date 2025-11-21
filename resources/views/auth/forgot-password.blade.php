@extends('partials.layout')
@section('title', 'Forgot Password')

@section('content')

    <div class="card w-96 bg-base-100 shadow-xl mx-auto mt-6">
        <div class="card-body p-8 space-y-6">

            {{-- Instructions --}}
            <p class="text-sm text-gray-600">
                {{ __('Forgot your password? No problem. Enter your email and we will send you a reset link.') }}
            </p>

            {{-- Session Status --}}
            @if (session('status'))
                <div role="alert" class="alert alert-success">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 shrink-0" fill="none" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <span>{{ session('status') }}</span>
                </div>
            @endif

            <form method="POST" action="{{ route('password.email') }}" class="space-y-6">
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
                    />

                    @error('email')
                        <div class="label">
                            <span class="label-text text-error">{{ $message }}</span>
                        </div>
                    @enderror
                </label>

                {{-- Submit --}}
                <div class="flex items-center justify-end pt-4">
                    <button class="btn btn-primary min-w-32">
                        {{ __('Send Reset Link') }}
                    </button>
                </div>

            </form>

        </div>
    </div>

@endsection
