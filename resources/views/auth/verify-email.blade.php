@extends('partials.layout')
@section('title', 'Verify Email')

@section('content')

<div class="card w-[32rem] bg-base-100 shadow-xl mx-auto mt-10">
    <div class="card-body space-y-6 p-8">

        {{-- Explanation --}}
        <p class="text-sm opacity-80 leading-relaxed">
            {{ __('Thanks for signing up! Before getting started, please verify your email address by clicking the link we sent to you. If you did not receive the email, you can request another one below.') }}
        </p>

        {{-- Success message --}}
        @if (session('status') == 'verification-link-sent')
            <div class="alert alert-success">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 shrink-0" fill="none" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
                <span>{{ __('A new verification link has been sent to your email address.') }}</span>
            </div>
        @endif

        {{-- Actions --}}
        <div class="flex items-center justify-between pt-2">

            {{-- Resend button --}}
            <form method="POST" action="{{ route('verification.send') }}">
                @csrf
                <button class="btn btn-primary">
                    {{ __('Resend Verification Email') }}
                </button>
            </form>

            {{-- Logout --}}
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button
                    type="submit"
                    class="btn btn-ghost text-sm"
                >
                    {{ __('Log Out') }}
                </button>
            </form>
        </div>

    </div>
</div>

@endsection
