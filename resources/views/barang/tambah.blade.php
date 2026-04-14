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
    <form method="POST" action="{{ route('barang.simpan') }}">
        @csrf
        ID Barang:
        <input type="text" name="id_barang" required>
        @error('id_barang') {{ $message }} @enderror
        <br>
        Nama Barang:
        <input type="text" name="nama" required>
        @error('nama') {{ $message }} @enderror
        <br>
        Varian Barang:
        <select name="varian" required>
            <option value="">Pilih</option>
            <option value="baru">Baru</option>
            <option value="bekas">Bekas</option>
        </select>
        @error('varian') {{ $message }} @enderror
        <br>
        Harga Beli:
        <input type="number" name="harga_beli" required>
        @error('harga_beli') {{ $message }} @enderror
        <br>
        harga Jual:
        <input type="number" name="harga_jual" required>
        @error('harga_jual') {{ $message }} @enderror
        <br>
        <button type="submit">Simpan</button>
        <a href="{{ route('barang.tampilkan') }}">Kembali</button>
    </div>
    </form>
</div>
@endsection