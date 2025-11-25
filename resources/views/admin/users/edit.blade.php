@extends('partials.layout')

@section('content')

<div class="max-w-xl mx-auto">
    <h1 class="text-3xl font-bold mb-6">Edit User</h1>

    <form method="POST" action="{{ route('admin.users.update', $user) }}" class="space-y-4">
        @csrf
        @method('PUT')

        <div class="form-control">
            <label class="label">
                <span class="label-text">Name</span>
            </label>
            <input type="text" name="name" value="{{ $user->name }}" class="input input-bordered w-full" required>
        </div>

        <div class="form-control">
            <label class="label">
                <span class="label-text">Email</span>
            </label>
            <input type="email" name="email" value="{{ $user->email }}" class="input input-bordered w-full" required>
        </div>

        <div class="form-control">
            <label class="label">
                <span class="label-text">New Password (optional)</span>
            </label>
            <input type="password" name="password" class="input input-bordered w-full"
                   placeholder="Leave empty to keep current password">
        </div>

        <button type="submit" class="btn btn-primary">Save</button>
    </form>
</div>

@endsection
