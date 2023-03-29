<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

use \Cviebrock\EloquentSluggable\Services\SlugService;



class PostDashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::with(['user', 'category'])->latest();

        return view('dashboard.post.index', [
            'title' => 'Berita',
            'posts' => $posts->paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.post.create', [
            'title' => 'Berita baru',
            'category' => Category::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'slug' => 'required|unique:posts',
            'category_id' => 'required',
            'image' => 'image|file|max:1024',
            'body' => 'required',
            'caption' => 'max:255'
        ]);

        $validatedData['user_id'] = auth()->user()->id;
        $validatedData['excerpt'] = Str::limit(strip_tags($request->body), 200);
        if ($request->is_headline) {
            $validatedData['is_headline'] = true;
        }
        if ($request->is_archive) {
            $validatedData['is_archive'] = true;
        }

        if ($request->file('image')) {
            $validatedData['image'] = $request->file('image')->store('berita-images');
        }

        Post::create($validatedData);

        return redirect('/dashboard/berita')->with('success', 'Berhasil Menambahkan Berita');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return $post;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {

        return view('dashboard.post.edit', [
            'title' => 'Edit Berita',
            'post' => $post,
            'category' => Category::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {

        $rules = [
            'title' => 'required|max:255',
            'category_id' => 'required',
            'image' => 'image|file|max:1024',
            'body' => 'required',
            'caption' => 'max:255'
        ];

        if ($request->slug != $post->slug) {
            $rules['slug'] =   'required|unique:posts';
        }

        $validatedData = $request->validate($rules);

        if ($request->is_headline) {
            $validatedData['is_headline'] = true;
        } else {
            $validatedData['is_headline'] = false;
        }

        if ($request->is_archive) {
            $validatedData['is_archive'] = true;
        } else {
            $validatedData['is_archive'] = false;
        }
        if ($request->file('image')) {
            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $validatedData['image'] = $request->file('image')->store('berita-images');
        }


        Post::where('id', $post->id)
            ->update($validatedData);

        return redirect('/dashboard/berita')->with('success', 'Berhasil Mengupdate Berita');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        if ($post->image) {
            Storage::delete($post->image);
        }
        Post::destroy($post->id);

        return redirect('/dashboard/berita')->with('success', 'Berhasil Menghapus Berita');
    }

    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Post::class, 'slug', $request->title);
        return response()->json(['slug' => $slug]);
    }
}
