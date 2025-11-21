@extends('partials.layout')
@section('title', 'Confirm Password')

@section('content')

<div class="card w-96 bg-base-100 shadow-xl mx-auto mt-6">
    <div class="card-body p-8 space-y-6">

        {{-- Message --}}
        <p class="text-sm text-gray-600">
            {{ __('This is a secure area. Please confirm your password before continuing.') }}
        </p>

        <form method="POST" action="{{ route('password.confirm') }}" class="space-y-6">
            @csrf

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

            {{-- Button --}}
            <div class="flex justify-end pt-4">
                <button class="btn btn-primary min-w-32">
                    {{ __('Confirm') }}
                </button>
            </div>

        </form>

    </div>
</div>

@endsection
