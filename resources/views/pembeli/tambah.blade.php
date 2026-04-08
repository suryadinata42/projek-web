@extends('menu')
@section('konten')
<div class="card">
    <div class="card-header">
        <b>Tambah Data Pembeli</b>
    </div>
    <div class="card-body">
    <form method="POST" action="{{ route('pembeli.simpan') }}">
        @csrf
        ID Pembeli :
        <input type="text" name="id_pembeli" required>
        @error('id_pembeli') {{ $message }} @enderror
        <br>
        Nama Pembeli :
        <input type="text" name="nama" required>
        @error('nama') {{ $message }} @enderror
        <br>
        Jenis Kelamin :
        <select name="jenis_kelamin" required>
            <option value="">Pilih</option>
            <option value="Laki-laki">Laki-laki</option>
            <option value="Perempuan">Perempuan</option>
        </select>
        @error('jenis_kelamin') {{ $message }} @enderror
        <br>
        Alamat :
        <textarea name="alamat"></textarea>
        @error('alamat') {{ $message }} @enderror
        <br>
        Kode Pos :
        <input type="text" name="kode_pos" required>
        @error('kode_pos') {{ $message }} @enderror
        <br>
        Tanggal Lahir :
        <input type="date" name="tanggal_lahir" required>
        @error('tanggal_lahir') {{ $message }} @enderror
        <br>

        <button type="submit">Simpan</button>
        <a href="{{ route('pembeli.tampilan') }}">Kembali</a>
        </form>
    </div>
</div>
@endsection