<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\Foto;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;

class FotoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Mendapatkan informasi pengguna yang login
        $user = Auth::user();

        // Menghitung total foto berdasarkan ID pengguna yang login
        $totalFoto = Foto::where('UserID', $user->id)->count();

        // Menghitung total album berdasarkan ID pengguna yang login
        $totalAlbum = Album::where('UserID', $user->id)->count();

        // Mengambil foto dengan relasi dan hitungan album
        $foto = Foto::with(['user', 'likefoto', 'komentarfoto'])->withCount('album')->where('UserID', $user->id)->get();

        return view('galleryfoto.index', ['fotoList' => $foto, 'totalFoto' => $totalFoto, 'totalAlbum' => $totalAlbum]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Mendapatkan informasi pengguna yang login
        $user = Auth::user();

        // Mengambil data album yang dimiliki oleh UserID pengguna yang login
        $albumCB = Album::where('UserID', $user->id)
            ->select('id', 'nama')
            ->get();

        $userCB = User::select('id', 'name')->get();

        return view('galleryfoto.add', ['albumCB' => $albumCB, 'userCB' => $userCB]);
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

            $img->toJpeg(80)->save(base_path('public/upload/foto/' . $newName));
            $save_url = 'upload/foto/' . $newName;
        }

        // Menggunakan 'UserID' untuk menyimpan 'id' pengguna
        $request['UserID'] = Auth::id();
        $request['lokasi'] = $save_url;

        $Foto = Foto::create($request->all());

        if ($Foto) {
            Session::flash('status', 'Success');
            Session::flash('message', 'Add New Foto Successfully created!');
        }

        return redirect('/');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = Auth::user();
        $fotoDetails = Foto::with(['user', 'album', 'komentarfoto'])->withCount(['likefoto', 'komentarfoto'])->findOrFail($id);
        return view('galleryfoto.details', ['fotoDetails' => $fotoDetails, 'user' => $user]);
    }

    public function showtable()
    {
        $foto = Foto::with(['user', 'album'])->get();
        return view('galleryfoto.table', ['fotoList' => $foto]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // Ambil data foto berdasarkan ID
        $foto = Foto::findOrFail($id);

        // Ambil data album yang dimiliki oleh pengguna yang login
        $albumCB = Album::select('id', 'nama')
            ->where('UserID', auth()->id()) // Filter berdasarkan ID pengguna yang login
            ->get();

        // Ambil data pengguna
        $userCB = User::select('id', 'name')->get();

        // Kirim data ke view
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

            $img->toJpeg(80)->save(base_path('public/upload/foto/' . $newName));
            $save_url = 'upload/foto/' . $newName;
            // Set nama foto baru pada request
            $request['lokasi'] = $save_url;
            $request['UserID'] = Auth::id();

        }
        // Lakukan update data fo$foto
        $foto->update($request->all());
        if ($foto) {
            Session::flash('status', 'Success');
            Session::flash('message', 'Foto Successfully update ! ');
        }
        return redirect('/');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete($id)
    {
        $Confirmfoto = Foto::findOrFail($id);
        return view('galleryfoto.delete', ['foto' => $Confirmfoto]);

    }

    public function destroy(string $id)
    {
        $deleteFoto = Foto::findOrFail($id);
        $deleteFoto->delete();
        if ($deleteFoto) {
            Session::flash('status', 'Success');
            Session::flash('message', 'Foto Successfully delete ! ');
        }
        return redirect('/');
    }

    public function showdeleted()
    {
        $deleteFoto = Foto::with(['user', 'album'])->onlyTrashed()->get();
        return view('galleryfoto.listdeleted', ['deleteList' => $deleteFoto]);
    }

    public function restore($id)
    {
        $deleteFoto = Foto::withTrashed()->where('id', $id)->restore();
        if ($deleteFoto) {
            Session::flash('status', 'Success');
            Session::flash('message', 'Success Restore Data');
        }
        return redirect('/');
    }

    public function exportfotoPdfDetails($id)
    {
        $fotoexport = Foto::with(['album'])->withCount(['likefoto', 'komentarfoto'])->findOrFail($id);
        $pdf = Pdf::loadView('pdf.export-foto-details', ['fotoDetails' => $fotoexport]);
        return $pdf->download('export-foto-details' . Carbon::now()->timestamp . '.pdf');
    }
}
