<?php

namespace App\Http\Controllers;

use App\Models\Likefoto;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $like = Likefoto::with(['user', 'foto'])->get();
        return view('galleryfoto.index', ['LikeList' => $like]);
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
    public function store(Request $request, $id)
    {
        // Anda perlu menyesuaikan ini sesuai dengan kebutuhan aplikasi Anda
        $like = new Likefoto([
            'FotoID' => $id,
            // tambahkan data likefoto yang diperlukan
        ]);
        $like->save();

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
