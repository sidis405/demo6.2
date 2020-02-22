<?php

namespace App\Http\Controllers;

use App\Post;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Events\PostWasUpdated;
use App\Http\Requests\PostRequest;

class PostsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('index', 'show');
        $this->middleware('can:update,post')->only('edit', 'update');
        $this->middleware('can:delete,post')->only('destroy');
    }

    public function index(Request $request)
    {
        $posts = Post::with('user', 'category', 'tags');

        if ($year = $request->year) {
            $posts = $posts->whereYear('created_at', $year);
        }

        if ($monthName = $request->month) {
            try {
                $posts = $posts->whereMonth('created_at', Carbon::parse($monthName)->month);
            } catch (\Exception $e) {
                //
            }
        }

        $posts = $posts->latest()->paginate(10);

        return view('posts.index', compact('posts', 'sidebarCategories', 'sidebarTags'));
    }

    public function create()
    {
        $post = new Post;

        return view('posts.create', compact('post'));
    }

    public function store(PostRequest $request)
    {
        $post = auth()->user()
            ->posts()
            ->create($request->validated());

        $post->tags()->sync($request->tags);

        return redirect()->route('posts.show', $post);
    }

    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));
    }

    public function update(PostRequest $request, Post $post)
    {
        $post->update($request->validated());

        $post->tags()->sync($request->tags);

        event(new PostWasUpdated($post));

        return redirect()->route('posts.show', $post);
    }

    public function destroy(Post $post)
    {
        $post->tags()->sync([]);

        $post->delete();

        return redirect()->route('posts.index');
    }
}
