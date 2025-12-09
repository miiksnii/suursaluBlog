@extends('partials.layout')
@section('title', $post->title)

@section('content')
    @include('partials.post-card', ['full' => true])

    {{-- Comments --}}
    <div class="mt-10">
        <h3 class="text-xl font-semibold mb-4">Comments</h3>
        <div class="space-y-4">
            @forelse ($post->comments as $comment)
                <div class="card bg-base-200 shadow-sm">
                    <div class="card-body py-4 px-5">
                        <div class="flex items-center gap-2 mb-1">
                            <span class="font-semibold">{{ $comment->user->name ?? 'Anonymous' }}</span>
                            <span class="badge badge-sm">{{ $comment->created_at->diffForHumans() }}</span>
                        </div>

                        <p>{{ $comment->body }}</p>
                    </div>
                </div>
            @empty
                <p class="text-gray-500">No comments yet.</p>
            @endforelse
        </div>
    </div>

    <div class="divider my-10"></div>

    {{-- Add comment --}}
    <div class="card bg-base-100 shadow-md">
        <div class="card-body">
            <h3 class="card-title text-lg">Add a Comment</h3>

            <form action="{{ route('comments.store', $post) }}" method="POST" class="mt-3 space-y-3">
                @csrf

                <textarea name="body"
                          rows="3"
                          class="textarea textarea-bordered w-full"
                          placeholder="Write your comment..."
                          required></textarea>

                <button class="btn btn-primary w-full">
                    Post Comment
                </button>
            </form>
        </div>
    </div>
@endsection
