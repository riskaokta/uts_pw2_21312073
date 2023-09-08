<?php

namespace App\Http\Controllers;

use App\Models\film;
use App\Models\Genre;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class FilmController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $film = film::all();
        return view(view: 'film.index', data: compact(var_name: 'film'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $genre = Genre::all();
        return view('film.create', compact('genre'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $film = new Film;

        $request->validate([
            'judul' => 'required',
            'ringkasan' => 'required',
            'tahun' => 'required',
            'poster' => 'required',
            'genre' => 'required',
        ]);

        $film->judul = $request->judul;
        $film->ringkasan = $request->ringkasan;
        $film->tahun = $request->tahun;
        $film->poster = $request->poster;
        $film->genre_id = $request->genre;

        $simpan = $film->save();

        if ($simpan) {
            Alert::success('Succes', 'Data Berhasil ditambah');
            return redirect('/film');
        } else {
            Alert::success('Failed', 'Data Gagal ditambah');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $film = Film::where('id', $id)->first();

        return view('film.edit', compact('film'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $request->validate([
            'nama' => 'required',
            'umur' => 'required',
            'bio' => 'required',
        ]);

        $film = Film::find($id);

        $film->nama = $request->nama;
        $film->umur = $request->umur;
        $film->bio = $request->bio;

        $ubah = $film->save();

        if ($ubah) {
            Alert::success('Succes', 'Data Berhasil diubah');
            return redirect('/film');
        } else {
            Alert::success('Failed', 'Data Gagal diubah');
        }

        return redirect('/film');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $film = Film::find($id);
        $hapus = $film->delete();

        if ($hapus) {
            Alert::success('Succes', 'Data Berhasil dihapus');
            return redirect('/film');
        } else {
            Alert::success('Failed', 'Data Gagal dihapus');
        }

        Alert::info('Info', 'Data Berhasil dihapus');
        return redirect('/film');
    }
}