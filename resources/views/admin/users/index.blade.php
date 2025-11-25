@extends('partials.layout')

@section('content')

<div class="flex items-center justify-between mb-6">
    <h1 class="text-3xl font-bold">Users</h1>

    <a href="{{ route('admin.users.create') }}" class="btn btn-primary">
        + Add User
    </a>
</div>

<div class="overflow-x-auto">
    <table class="table table-zebra w-full">
        <thead>
            <tr>
                <th class="text-left">ID</th>
                <th class="text-left">Name</th>
                <th class="text-left">Email</th>
                <th class="text-left">Actions</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td class="py-3">{{ $user->id }}</td>
                    <td class="py-3">{{ $user->name }}</td>
                    <td class="py-3">{{ $user->email }}</td>
                    <td class="flex gap-2 py-3">

                        <a href="{{ route('admin.users.edit', $user) }}"
                           class="btn btn-sm btn-outline">
                            Edit
                        </a>

                        <form action="{{ route('admin.users.destroy', $user) }}"
                              method="POST"
                              onsubmit="return confirm('Delete this user?')">
                            @csrf
                            @method('DELETE')

                            <button class="btn btn-sm btn-error text-white">
                                Delete
                            </button>
                        </form>

                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

<div class="mt-6">
    {{ $users->links() }}
</div>

@endsection
