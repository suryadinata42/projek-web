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
    <div class="card-body"></div>
    <form method="POST" action="{{ route('pembelian.update', $pembelian->id_pembelian) }}">
        @csrf
        @method('PUT')
        Id Pembelian :
        <input type="text" name="id_pembelian" required readonly value="{{ old('id_pembelian', $pembelian->id_pembelian) }}">
        @error('id_pesanan') {{ $message }} @enderror
        <br />

        Nama Barang :
        <select name="nama_barang" required>
            <option value="">Pilih</option>
            @foreach($barang as $brg)
            <option value="{{ $brg->id_barang }}" {{ $brg->id_barang === $pembelian->id_barang ? 'selected' : '' }}>
                {{ $brg->nama }}
            </option>
            @endforeach
        </select>
        <br />

        Nama Suplier :
        <select name="nama_suplier" required>
            <option value="">Pilih</option>
            @foreach($suplier as $sup)
            <option value="{{ $sup->id_suplier }}" {{ $sup->id_suplier === $pembelian->id_suplier ? 'selected' : '' }}>
                {{ $sup->nama }}
            </option>
            @endforeach
        </select>
        <br />

        Jumlah :
        <input type="number" name="qty" required value="{{ old('qty', $pembelian->qty) }}">
        @error('qty') {{ $message }} @enderror
        <br />

        Tgl Pesan :
        <input type="date" name="tgl" required value="{{ old('tgl', $pembelian->tgl) }}">
        @error('tgl_pesan') {{ $message }} @enderror
        <br /><br />

        <button type="submit">Simpan</button>
        <a href="{{ route('pembelian.tampil') }}">Kembali</a>
    </div>
    </form>
</div>
@endsection