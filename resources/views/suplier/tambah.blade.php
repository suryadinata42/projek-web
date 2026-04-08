@extends('menu')
@section('konten')
<div class="card">
    <div class="card-header">
        <b>Tambah Data Suplier</b>
    </div>
    <div class="card-body">
    <form method="POST" action="{{ route('suplier.simpan') }}">
        @csrf
        ID Suplier :
        <input type="text" name="id_suplier" required>
        @error('id_suplier') {{ $message }} @enderror
        <br>
        Nama Suplier :
        <input type="text" name="nama" required>
        @error('nama') {{ $message }} @enderror
        <br>
        Alamat Suplier :
        <textarea name="alamat" required></textarea>
        @error('alamat') {{ $message }} @enderror
        <br>
        Kode Pos :
        <input type="text" name="kode_pos" required>
        @error('kode_pos') {{ $message }} @enderror
        <br>
        Kota :
        <input type="text" name="kota" required>
        @error('kota') {{ $message }} @enderror
        <br>

        <button type="submit">Simpan</button>
        <a href="{{ route('suplier.tampil') }}">Kembali</a>
    </form>
    </div>
</div>
@endsection