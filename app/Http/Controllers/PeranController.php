<?php

namespace App\Http\Controllers;

use App\Models\Peran;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class PeranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $peran = Peran::all();
        return view(view: 'peran.index', data: compact(var_name: 'peran'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('Peran.create');
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
        $peran = new Peran;

        $request->validate([
            'film' => 'required',
            'cast' => 'required',
            'nama' => 'required',
        ]);

        $peran->film = $request->film;
        $peran->cast = $request->cast;
        $peran->nama = $request->nama;

        $simpan = $peran->save();

        if ($simpan) {
            Alert::success('Succes', 'Data Berhasil ditambah');
            return redirect('/peran');
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
        $peran = Peran::where('id', $id)->first();

        return view('peran.edit', compact('peran'));

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
            'film' => 'required',
            'cast' => 'required',
            'nama' => 'required',
        ]);

        $peran = Peran::find($id);

        $peran->film = $request->film;
        $peran->cast = $request->cast;
        $peran->nama = $request->nama;

        $ubah = $peran->save();

        if ($ubah) {
            Alert::success('Succes', 'Data Berhasil diubah');
            return redirect('/peran');
        } else {
            Alert::success('Failed', 'Data Gagal diubah');
        }

        return redirect('/peran');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $peran = Peran::find($id);
        $hapus = $peran->delete();

        if ($hapus) {
            Alert::success('Succes', 'Data Berhasil dihapus');
            return redirect('/peran');
        } else {
            Alert::success('Failed', 'Data Gagal dihapus');
        }

        Alert::info('Info', 'Data Berhasil dihapus');
        return redirect('/peran');
    }
}