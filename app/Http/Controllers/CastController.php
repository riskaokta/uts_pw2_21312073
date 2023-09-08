<?php

namespace App\Http\Controllers;

use App\Models\cast;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class CastController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cast = Cast::all();
        return view(view: 'cast.index', data: compact(var_name: 'cast'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('Cast.create');
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
        $cast = new Cast;

        $request->validate([
            'nama' => 'required',
            'umur' => 'required',
            'bio' => 'required',
        ]);

        $cast->nama = $request->nama;
        $cast->umur = $request->umur;
        $cast->bio = $request->bio;

        $simpan = $cast->save();

        if ($simpan) {
            Alert::success('Succes', 'Data Berhasil ditambah');
            return redirect('/cast');
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
        $cast = Cast::where('id', $id)->first();

        return view('cast.edit', compact('cast'));

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

        $cast = Cast::find($id);

        $cast->nama = $request->nama;
        $cast->umur = $request->umur;
        $cast->bio = $request->bio;

        $ubah = $cast->save();

        if ($ubah) {
            Alert::success('Succes', 'Data Berhasil diubah');
            return redirect('/cast');
        } else {
            Alert::success('Failed', 'Data Gagal diubah');
        }

        return redirect('/cast');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cast = Cast::find($id);
        $hapus = $cast->delete();

        if ($hapus) {
            Alert::success('Succes', 'Data Berhasil dihapus');
            return redirect('/cast');
        } else {
            Alert::success('Failed', 'Data Gagal dihapus');
        }

        Alert::info('Info', 'Data Berhasil dihapus');
        return redirect('/cast');
    }
}