<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function store(StoreCategoryRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        $katagori = Category::all();
        $terbaru = Post::with(['user', 'category'])->where('is_archive', false)->latest()->get();
        $trending = Post::with(['user', 'category'])->where('is_archive', false)->where('published_at', '>=', today()->subDay(3))->orderBy('count', 'desc')->limit(5)->get();
        $popular = Post::with(['user', 'category'])->where('is_archive', false)->where('published_at', '>=', today()->subWeek(2))->orderBy('count', 'desc')->limit(10)->get();
         return view('posts', [
            'category' => $katagori,
            'page_title' => 'Kategori : ' . $category->name,
            'posts' => Post::where('category_id', $category->id)->where('is_archive', false)->latest()->paginate(10),
            'popular' => $popular,
            'terbaru' => $terbaru,
            'trending' => $trending
         ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        //
    }
}
