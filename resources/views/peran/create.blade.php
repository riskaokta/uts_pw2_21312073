@extends('layout.master')

@section('judul')
    Tambah Peran
@endsection

@section('content')
<form method="post" action="/peran">
    @csrf
    <div class="form-group">
        <label>Film</label>
        <input type="text" name="film" value="" class="form-control">
    </div>
    @error('nama')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror

    <div class="form-group">
        <label>Cast</label>
        <input type="text" name="cast" value="" class="form-control">
    </div>
    @error('nama')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror

    <div class="form-group">
        <label>Nama</label>
        <input type="text" name="nama" value="" class="form-control">
    </div>
    @error('nama')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror

    <button type="submit" class="btn btn-primary">Simpan</button>
</form>
@endsection 