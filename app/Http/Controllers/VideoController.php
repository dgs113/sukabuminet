<?php

namespace App\Http\Controllers;

use App\Models\Video;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class VideoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $katagori = Category::all();

        $video = Video::latest();
        return view('videos', [
            'page_title' => 'Videos',
            'category' => $katagori,
            'videos' => $video->paginate(8)
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Video $video)
    {



        $category = Category::all();
        $terbaru = Post::with(['user', 'category'])->where('is_archive', false)->latest()->get();
        $trending = Post::with(['user', 'category'])->where('is_archive', false)->where('published_at', '>=', today()->subDay(3))->orderBy('count', 'desc')->limit(5)->get();
        $popular = Post::with(['user', 'category'])->where('is_archive', false)->where('published_at', '>=', today()->subWeek(2))->orderBy('count', 'desc')->limit(10)->get();
        return view('video', [
            'page_title' => 'Video',
            'category' => $category,
            'post' => $terbaru,
            'popular' => $popular,
            'terbaru' => $terbaru,
            'trending' => $trending,
            'video' => $video
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Video $video)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Video $video)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Video $video)
    {
        //
    }
}
