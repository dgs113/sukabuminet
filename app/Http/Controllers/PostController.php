<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::with(['user', 'category'])->where('is_archive', false)->latest();
        $page_title = "indeks berita";
        if (request('search')) {
            $page_title = "Hasil Pencarian";
        }


        $katagori = Category::all();
        $terbaru = Post::with(['user', 'category'])->where('is_archive', false)->latest()->get();
        $trending = Post::with(['user', 'category'])->where('is_archive', false)->where('published_at', '>=', today()->subDay(3))->orderBy('count', 'desc')->limit(5)->get();
        $popular = Post::with(['user', 'category'])->where('is_archive', false)->where('published_at', '>=', today()->subWeek(2))->orderBy('count', 'desc')->limit(10)->get();
        return view('posts', [
            'category' => $katagori,
            'page_title' => $page_title,
            'posts' => $posts->filter(request(['search']))->paginate(10),
            'popular' => $popular,
            'terbaru' => $terbaru,
            'trending' => $trending
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {


        Post::where('id', $post->id)->update(['count' => $post->count + 1]);

        $category = Category::all();
        $terbaru = Post::with(['user', 'category'])->where('is_archive', false)->latest()->get();
        $trending = Post::with(['user', 'category'])->where('is_archive', false)->where('published_at', '>=', today()->subDay(3))->orderBy('count', 'desc')->limit(5)->get();
        $popular = Post::with(['user', 'category'])->where('is_archive', false)->where('published_at', '>=', today()->subWeek(2))->orderBy('count', 'desc')->limit(10)->get();
        return view('post', [
            'category' => $category,
            'post' => $post,
            'popular' => $popular,
            'terbaru' => $terbaru,
            'trending' => $trending
        ]);
    }



    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        //
    }
}
