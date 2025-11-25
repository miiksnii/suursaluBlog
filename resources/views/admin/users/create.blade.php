@extends('partials.layout')

@section('content')

<div class="max-w-xl mx-auto">

    <h1 class="text-3xl font-bold mb-6">Add User</h1>

    <form method="POST"
          action="{{ route('admin.users.store') }}"
          class="space-y-4">
        @csrf

        <div class="form-control">
            <label class="label">
                <span class="label-text">Name</span>
            </label>
            <input type="text"
                   name="name"
                   class="input input-bordered w-full"
                   required>
        </div>

        <div class="form-control">
            <label class="label">
                <span class="label-text">Email</span>
            </label>
            <input type="email"
                   name="email"
                   class="input input-bordered w-full"
                   required>
        </div>

        <div class="form-control">
            <label class="label">
                <span class="label-text">Password</span>
            </label>
            <input type="password"
                   name="password"
                   class="input input-bordered w-full"
                   required>
        </div>

        <button type="submit" class="btn btn-primary w-full">
            Create
        </button>

    </form>

</div>

@endsection
