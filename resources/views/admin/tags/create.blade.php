@extends('partials.layout')

@section('content')
    <h1 class="text-2xl font-bold mb-4">Create Tag</h1>

    <form method="POST" action="{{ route('tags.store') }}">
        @csrf

        <input
            type="text"
            name="name"
            class="input input-bordered w-full mb-4"
            placeholder="Tag name"
            required
        >

        <button class="btn btn-primary">Save</button>
    </form>
@endsection
