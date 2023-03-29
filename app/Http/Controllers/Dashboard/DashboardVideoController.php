<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


use \Cviebrock\EloquentSluggable\Services\SlugService;


class DashboardVideoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $videos = Video::latest();
        return view('dashboard.video.index', [
            'title' => 'Video',
            'videos' => $videos->paginate(8)
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

        $validatedData = $request->validate([
            'uri' => 'required',
            'title' => 'required|max:255',
            'slug' => 'required|unique:posts',
            'body' => 'required',
        ]);
        $validatedData['excerpt'] = Str::limit(strip_tags($request->body), 100);
        Video::create($validatedData);

        return redirect('/dashboard/video')->with('success', 'Berhasil Menambahkan Berita');
    }

    /**
     * Display the specified resource.
     */
    public function show(Video $video)
    {
        //
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
        Video::destroy($video->id);

        return redirect('/dashboard/video')->with('success', 'Berhasil Menghapus Video');
    }
}
