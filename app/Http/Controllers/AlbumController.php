<?php

namespace App\Http\Controllers;

use App\Models\Foto;
use App\Models\User;
use App\Models\Album;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class AlbumController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $albums = Album::with(['user'])
            ->withCount('foto')
            ->addSelect(['last_foto' => Foto::select('lokasi')
                    ->whereColumn('AlbumID', 'album.id')
                    ->latest()
                    ->limit(1),
            ])
            ->get();

        return view('galleryalbum.index', ['albumList' => $albums]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $userCB = User::select('id', 'name')->get();
        return view('galleryalbum.add', ['userCB' => $userCB]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $albums = Album::create($request->all());
        if ($albums) {
            Session::flash('status', 'Success');
            Session::flash('message', 'Add New Album Successfully created ! ');
        }
        return redirect()->route('album.index');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $albums = Album::with(['foto', 'user'])->findOrFail($id);
        return view('galleryalbum.details', ['albumDetails' => $albums]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $userCB = User::select('id', 'name')->get();
        $albums = Album::findOrFail($id);
        return view('galleryalbum.edit', ['albums' => $albums, 'userCB' => $userCB]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $albums = Album::findOrFail($id);
        $albums->update($request->all());
        if ($albums) {
            Session::flash('status', 'Success');
            Session::flash('message', 'Album Successfully update ! ');
        }
        return redirect()->route('album.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $deleteAlbum = Album::findOrFail($id);
        $deleteAlbum->delete();
        if ($deleteAlbum) {
            Session::flash('status', 'Success');
            Session::flash('message', 'Album Successfully delete ! ');
        }
        return redirect()->route('album.index');
    }
}
