<?php

namespace App\Http\Controllers;

use App\Models\Post;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class HomeController extends Controller
{
    public function index()
    {
        $category = Category::all();
        $posts = Post::with(['user', 'category'])->where('is_archive', false)->latest()->get();
        $trending = Post::with(['user', 'category'])->where('is_archive', false)->where('published_at', '>=', today()->subDay(3))->latest()->limit(5)->get();
        $popular = Post::with(['user', 'category'])->where('is_archive', false)->where('published_at', '>=', today()->subWeek(2))->latest()->limit(10)->get();
        $headlines = Post::with(['user', 'category'])->where('is_archive', false)->where('is_headline', true)->latest()->limit(8)->get();

        return view('home', [
            'title' => 'SukabumiNET | Berita Terupdate Untuk Kamu',
            'posts' => $posts,
            'trending' => $trending,
            'popular' => $popular,
            'headlines' => $headlines,
            'category' => $category
        ]);
    }

    public function about()
    {
        return view('about', [
            'title' => 'SukabumiNET | Berita Terupdate Untuk Kamu',
            'category' => Category::all()
        ]);
    }
}
