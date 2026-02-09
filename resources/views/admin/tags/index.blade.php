@extends('partials.layout')

@section('content')
    <h1 class="text-2xl font-bold mb-4">Tags</h1>

    <a href="{{ route('tags.create') }}" class="btn btn-primary mb-4">
        New Tag
    </a>

    <table class="table w-full">
        @foreach ($tags as $tag)
            <tr>
                <td>{{ $tag->name }}</td>
                <td class="text-right">
                    <a href="{{ route('tags.edit', $tag) }}" class="btn btn-sm">
                        Edit
                    </a>

                    <form
                        action="{{ route('tags.destroy', $tag) }}"
                        method="POST"
                        class="inline"
                    >
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-error">
                            Delete
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
@endsection
