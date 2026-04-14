@extends('layout.menu')
@section('konten')
<style>
    .custom-font {
        font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
    }
</style>
<div class="card">
    <div class="card-header">
        <b>Tambah Data Suplier</b>
    </div>
    <div class="card-body">

    <form method="POST" action="{{ route('suplier.update', $sup->id_suplier) }}">
        @csrf
        @method('PUT')
        ID Suplier :
        <input type="text" name="id_suplier" required readonly value="{{ old('id_suplier', $sup->id_suplier) }}">
        @error('id_suplier') {{ $message }} @enderror
        <br>
        Nama Suplier :
        <input type="text" name="nama" required value="{{ old('nama', $sup->nama) }}">
        @error('nama') {{ $message }} @enderror
        <br>
        Alamat Suplier :
        <textarea name="alamat" required>{{ old('alamat', $sup->alamat) }}</textarea>
        @error('alamat') {{ $message }} @enderror
        <br>
        Kode Pos :
        <input type="text" name="kode_pos" required value="{{ old('kode_pos', $sup->kode_pos) }}">
        @error('kode_pos') {{ $message }} @enderror
        <br>
        Kota :
        <input type="text" name="kota" required value="{{ old('kota', $sup->kota) }}">
        @error('kota') {{ $message }} @enderror
        <br>

        <button type="submit">Simpan</button>
        <a href="{{ route('suplier.tampil') }}">Kembali</a>
    </form>
    </div>
</div>
@endsection