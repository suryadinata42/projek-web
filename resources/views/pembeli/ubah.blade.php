@extends('layout.menu')
@section('konten')
<style>
    .custom-font {
        font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
    }
    .custom-font label {
        font-weight: 600;
        margin-bottom: 5px;
    }
</style>
<div class="card">
    <div class="card-header">
        <b>Tambah Data Pembeli</b>
    </div>
    <div class="card-body">
    <form method="POST" action="{{ route('pembeli.update', $pembeli->id) }}">
        @csrf
        @method('PUT')
        ID Pembeli :
        <input type="text" name="id_pembeli" required readonly value="{{ old('id_pembeli', $pembeli->id_pembeli) }}">
        @error('id_pembeli') {{ $message }} @enderror
        <br>
        Nama Pembeli :
        <input type="text" name="nama" required value="{{ old('nama', $pembeli->nama) }}">
        @error('nama') {{ $message }} @enderror
        <br>
        Jenis Kelamin :
        <select name="jenis_kelamin" required>
        <option value="">Pilih</option>
            <option value="laki-laki" {{ $pembeli->jenis_kelamin == 'laki-laki' ? 'selected' : '' }}>Laki-laki</option>
            <option value="perempuan" {{ $pembeli->jenis_kelamin == 'perempuan' ? 'selected' : '' }}>Perempuan</option>
        </select>
         @error('jenis_kelamin') {{ $message }} @enderror
        <br>
        Alamat :
        <textarea name="alamat">{{ $pembeli->alamat }}</textarea>
        @error('alamat') {{ $message }} @enderror
        <br>
        Kode Pos :
        <input type="text" name="kode_pos" required value="{{ old('kode_pos', $pembeli->kode_pos) }}">
        @error('kode_pos') {{ $message }} @enderror
        <br>
        Tanggal Lahir :
        <input type="date" name="tanggal_lahir" required value="{{ old('tanggal_lahir', $pembeli->tanggal_lahir) }}">
        @error('tanggal_lahir') {{ $message }} @enderror
        <br>

        <button type="submit">SAVE</button>
        <a href="{{ route('pembeli.tampilan') }}">Kembali</a>
    </form>
    </div>
</div>
@endsection
