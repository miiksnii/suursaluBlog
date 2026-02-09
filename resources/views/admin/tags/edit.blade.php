@extends('partials.layout')

@section('content')
    <h1 class="text-xl font-bold mb-4">Edit tag</h1>

    <form method="POST" action="{{ route('tags.update', $tag) }}">
        @csrf
        @method('PUT')

        <input
            type="text"
            name="name"
            value="{{ old('name', $tag->name) }}"
            class="input input-bordered w-full max-w-md"
            required
        >

        <div class="mt-4 flex gap-2">
            <button class="btn btn-primary">Save</button>
            <a href="{{ route('tags.index') }}" class="btn btn-ghost">Cancel</a>
        </div>
    </form>
@endsection
