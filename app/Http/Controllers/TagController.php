<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Http\Requests\StoreTagRequest;
use App\Http\Requests\UpdateTagRequest;
use App\Models\Post;
use Illuminate\Http\Request;


class TagController extends Controller
{


    /**
     * Display the specified resource.
     */
    public function show(Tag $tag)
    {
        $posts = Post::with('user')
            ->withCount('comments', 'likes')
            ->whereHas('tags', function ($q) use ($tag) {
                $q->where('tags.id', $tag->id);
            })
            ->latest()
            ->simplePaginate(16);

        return view('tag', compact('tag', 'posts'));
    }

    public function index()
    {
        $tags = Tag::orderBy('name')->get();
        return view('admin.tags.index', compact('tags'));
    }

    public function create()
    {
        return view('admin.tags.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|unique:tags,name',
        ]);

        Tag::create([
            'name' => $request->name,
        ]);

        return redirect()->route('tags.index');
    }

    public function edit(Tag $tag)
    {
        return view('admin.tags.edit', compact('tag'));
    }

    public function update(Request $request, Tag $tag)
    {
        $request->validate([
            'name' => 'required|string|unique:tags,name,' . $tag->id,
        ]);

        $tag->update([
            'name' => $request->name,
        ]);

        return redirect()->route('tags.index');
    }

    public function destroy(Tag $tag)
    {
        $tag->delete();
        return redirect()->route('tags.index');
    }
}
