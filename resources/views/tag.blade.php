@extends('partials.layout')

@section('content')
    <h1 class="text-2xl font-bold mb-4">
        Tag: {{ $tag->name }}
    </h1>

    @foreach ($posts as $post)
        @include('partials.post-card', ['post' => $post])
    @endforeach

    {{ $posts->links() }}
@endsection
