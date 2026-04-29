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
    <form method="POST" action="{{ route('pembelian.simpan') }}">
        @csrf
        Id Pesanan :
        <input type="text" name="id_pembelian" required>
        @error('id_pembelian') {{ $message }} @enderror
        <br />

        Nama Barang :
        <select name="nama_barang" required>
            <option value="">Pilih</option>
            @foreach($barang as $brg)
            <option value="{{ $brg->id_barang }}">
                {{ $brg->nama }}
            </option>
            @endforeach
        </select>
        <br />

        Nama Suplier :
        <select name="nama_suplier" required>
            <option value="">Pilih</option>
            @foreach($suplier as $sup)
            <option value="{{ $sup->id_suplier }}">
                {{ $sup->nama }}
            </option>
            @endforeach
        </select>
        <br />

        Jumlah :
        <input type="number" name="qty" required>
        @error('qty') {{ $message }} @enderror
        <br />

        Tgl Pesan :
        <input type="date" name="tgl" required>
        @error('tgl') {{ $message }} @enderror
        <br /><br />

        <button type="submit">Save</button>
        <a href="{{ route('pembelian.tampil') }}">Back</a>
    </div>
    </form>
</div>
@endsection