<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\Artist;
use Illuminate\Http\Request;

class AlbumController extends Controller
{
    /**
     * Menampilkan daftar album.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $album = Album::all(); 
        // Ambil semua album dari database
        return view('album.index', ['album' => $album]);
    }

    /**
     * Menampilkan form untuk membuat album baru.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $artist = Artist::all();
        return view('album.create')->with('artist',$artist);
    }

    /**
     * Menyimpan album baru ke dalam database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validasi data dari request
        $val=$request->validate([
            'nama' =>'required|unique:albums',
            'album_id' =>'required',
            'tahun_keluar' =>'required'
        ]);

        // Simpan data album baru ke database
        Album::create([$val]);
        // Redirect ke halaman index album dengan pesan sukses
        return redirect()->route('album.index')->with('success', $val['nama'] . ' berhasil disimpan');
    }

    /**
     * Menampilkan form untuk mengedit album.
     *
     * @param  \App\Models\Album  $album
     * @return \Illuminate\Http\Response
     */
    public function edit(Album $album)
    {
        return view('album.edit', ['album' => $album]);
    }

    /**
     * Mengupdate album yang ada di dalam database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Album  $album
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Album $album)
    {
        // Validasi data dari request
        $request->validate([
            'title' => 'required',
            'artist' => 'required',
            'year' => 'required|integer|min:1900|max:' . date('Y'),
        ]);

        // Update data album yang ada di database
        $album->update([
            'title' => $request->title,
            'artist' => $request->artist,
            'genre' => $request->genre,
            'year' => $request->year,
        ]);

        // Redirect ke halaman index album dengan pesan sukses
        return redirect()->route('albums.index')->with('success', 'Album berhasil diperbarui.');
    }

    /**
     * Menghapus album dari database.
     *
     * @param  \App\Models\Album  $album
     * @return \Illuminate\Http\Response
     */
    public function destroy(Album $album)
    {
        // Hapus data album dari database
        $album->delete();

        // Redirect ke halaman index album dengan pesan sukses
        return redirect()->route('album.index')->with('success', 'Album berhasil dihapus.');
    }
}
