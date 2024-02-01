<?php

namespace App\Http\Controllers;

use App\Models\Foto;
use App\Models\User;
use App\Models\Album;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class FotoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $foto = Foto::with(['user', 'likefoto', 'komentarfoto'])->withCount('album')->get();
        $totalAlbumCount = Album::count();
        return view('galleryfoto.index', ['fotoList' => $foto, 'totalAlbumCount' => $totalAlbumCount]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $albumCB = Album::select('id', 'nama')->get();
        $UserCB = User::select('id', 'name')->get();
        return view('galleryfoto.add', ['albumCB' => $albumCB, 'userCB' => $UserCB]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $save_url = '';
        if ($request->file('foto')) {
            $manager = new ImageManager(new Driver());
            $extension = $request->file('foto')->getClientOriginalExtension();
            $newName = $request->AlbumID . '-' . now()->timestamp . '.' . $extension;
            $img = $manager->read($request->file('foto'));
            $img = $img->resize(1920, 1080);

            $img->toJpeg(80)->save(base_path('public/upload/foto/'. $newName));
            $save_url = 'upload/foto/'. $newName;
        }
        $request['lokasi'] = $save_url;
        $Foto = Foto::create($request->all());

        return redirect('/');
    }

    public function storeLike(Request $request)
    {
        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $fotoDetails = Foto::with(['user', 'album'])->withCount(['likefoto', 'komentarfoto']) ->findOrFail($id);
        return view('galleryfoto.details', ['fotoDetails' => $fotoDetails]);
    }
    

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $albumCB = Album::select('id', 'nama')->get();
        $userCB = User::select('id', 'name')->get();
        $foto = Foto::findOrFail($id);
        return view('galleryfoto.edit', ['foto' => $foto, 'albumCB' => $albumCB, 'userCB' => $userCB]);
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $foto = Foto::findOrFail($id);

        // Jika ada foto baru yang diunggah
        if ($request->hasFile('foto')) {
            // Hapus foto lama jika ada
            if ($foto->image) {
                Storage::delete('foto/' . $foto->image);
            }
            $manager = new ImageManager(new Driver());
            $extension = $request->file('foto')->getClientOriginalExtension();
            $newName = $request->AlbumID . '-' . now()->timestamp . '.' . $extension;
            $img = $manager->read($request->file('foto'));
            $img = $img->resize(1920, 1080);

            $img->toJpeg(80)->save(base_path('public/upload/foto/'. $newName));
            $save_url = 'upload/foto/'. $newName;
            // Set nama foto baru pada request
            $request['lokasi'] = $save_url;

        }
        // Lakukan update data fo$foto
        $foto->update($request->all());
        return redirect('/');
    }

    /**
     * Remove the specified resource from storage.
     */

    public function destroy(string $id)
    {
        $deleteFoto = Foto::findOrFail($id);
        $deleteFoto->delete();
        return redirect('/');
    }

    public function showdeleted(){
        $deleteFoto = Foto::with(['user', 'album'])->onlyTrashed()->get();
        return view('galleryfoto.listdeleted', ['deleteList' => $deleteFoto]);
    }

    public function restore($id)
    {
        $deleteFoto = Foto::withTrashed()->where('id', $id)->restore();
        return redirect('/');
    }
}
