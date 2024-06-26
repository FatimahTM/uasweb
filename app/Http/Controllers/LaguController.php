<?php

namespace App\Http\Controllers;

use App\Models\Lagu;
use App\Models\Artist; // Import model Artist
use Illuminate\Http\Request;

class LaguController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lagus = Lagu::all(); // Mengambil semua data lagu dari database
        return view('lagus.index', compact('lagus')); // Mengirimkan data lagu ke view 'lagus.index'
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Ambil daftar artis untuk dropdown
        $artists = Artist::all();
        dd($artists);
        // Tampilkan form untuk menambahkan lagu baru
        return view('lagus.create', compact('artists'));
    }
    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

public function store(Request $request)
{
    // Validasi data dari request
    $request->validate([
        'title' => 'required',
        'album' => 'required',
        'genre' => 'required',
        'artist_name' => 'required', // Validasi nama artis
    ]);

    // Cari atau buat artis berdasarkan nama
    $artist = Artist::firstOrCreate(['name' => $request->artist_name]);

    // Simpan data lagu baru ke database
    Lagu::create([
        'title' => $request->title,
        'artist_id' => $artist->id,
        'album' => $request->album,
        'genre' => $request->genre,
    ]);

    // Redirect ke halaman index lagu dengan pesan sukses
    return redirect()->route('lagus.index')->with('success', 'Lagu berhasil ditambahkan.');
}
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Lagu  $lagu
     * @return \Illuminate\Http\Response
     */
    public function show(Lagu $lagu)
    {
        // Tampilkan halaman detail lagu (bisa diteruskan ke view show.blade.php)
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Lagu  $lagu
     * @return \Illuminate\Http\Response
     */
    public function edit(Lagu $lagu)
    {
        // Misalnya, ambil daftar artis untuk dropdown
        $artists = Artist::all();

        // Tampilkan form untuk mengedit lagu (misalnya, view 'lagus.edit')
        return view('lagus.edit', compact('lagu', 'artists'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Lagu  $lagu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Lagu $lagu)
    {
        // Validasi data dari request
        $request->validate([
            'title' => 'required',
            'artist_id' => 'required|exists:artists,id',
            'album' => 'required',
            'genre' => 'required',
        ]);

        // Update data lagu yang ada di database
        $lagu->update([
            'title' => $request->title,
            'artist_id' => $request->artist_id,
            'album' => $request->album,
            'genre' => $request->genre,
        ]);

        // Redirect ke halaman index lagu dengan pesan sukses
        return redirect()->route('lagus.index')->with('success', 'Lagu berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Lagu  $lagu
     * @return \Illuminate\Http\Response
     */
    public function destroy(Lagu $lagu)
    {
        // Hapus data lagu dari database
        $lagu->delete();

        // Redirect ke halaman index lagu dengan pesan sukses
        return redirect()->route('lagus.index')->with('success', 'Lagu berhasil dihapus.');
    }
}
