<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\Foto;
use App\Models\User;
use Illuminate\Http\Request;
use Intervention\Image\ImageManager;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Drivers\Gd\Driver;

class AlbumController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $album = Album::with(['user'])->withCount('fotos')->get();
        return view('galleryfoto.index', ['albumList' => $album]);
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

            $img->toJpeg(80)->save(base_path('public/uploads/perjalanan'. $newName));
            $save_url = 'uploads/perjalanan/'. $newName;
        }
        $request['lokasi'] = $save_url;
        $Foto = Foto::create($request->all());

        return redirect('/');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $albumDetails = Album::with(['user', 'fotos'])->findOrFail($id);
        return view('galleryfoto.details', ['albumDetails' => $albumDetails]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
