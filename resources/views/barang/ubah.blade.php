@extends('layout.menu')
@section('konten')
<style>
    .custom-font {
        font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
    }
</style>
<div class="card">
    <div class="card-header">
        <b>Tambah Data Barang</b>
    </div>
    <div class="card-body">

    <form method="POST" action="{{ route('barang.update', $barang->id) }}">
        @csrf
        @method('PUT')
        ID Barang :
        <input type="text" name="id_barang" required readonly value="{{ old('id_barang', $barang->id_barang) }}">
        @error('id_barang') {{ $message }} @enderror
        <br>
        Nama Barang :
        <input type="text" name="nama" required value="{{ old('nama', $barang->nama) }}">
        @error('nama') {{ $message }} @enderror
        <br>
        Varian Barang :
        <select name="varian" required>
            <option value="">Pilih</option>
            <option value="Baru" {{ $barang->varian == 'baru' ? 'selected' : '' }}>Baru</option>
            <option value="Bekas" {{ $barang->varian == 'bekas' ? 'selected' : '' }}>Bekas</option>
            @error('varian') {{ $message }} @enderror
        </select>
        <br>
        Harga Beli :
        <input type="number" name="harga_beli" required value="{{ old('harga_beli', $barang->harga_beli) }}">
        @error('harga_beli') {{ $message }} @enderror
        <br>
        Harga Jual :
        <input type="number" name="harga_jual" required value="{{ old('harga_jual', $barang->harga_jual) }}">
        @error('harga_jual') {{ $message }} @enderror
        <br>


        <button type="submit">Simpan</button>
        <a href="{{ route('barang.tampilkan') }}">Kembali</a>
    </div>
    </form>
</div>
@endsection
