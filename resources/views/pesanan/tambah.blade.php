@extends('layout.menu')

@section('konten')
<div class="card">
    <div class="card-header">
        <b>Tambah Data Pesanan</b>
    </div>
    <div class="card-body">
    
        {{-- Form Tambah Data --}}
        <form method="POST" action="{{ route('pesanan.simpan') }}">
            @csrf
            Id Pesanan :
            <input type="text" name="id_pesanan" required>
            @error('id_pesanan') {{ $message }} @enderror
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

            Nama Pembeli :
            <select name="nama_pembeli" required>
                <option value="">Pilih</option>
                @foreach($pembeli as $pem)
                <option value="{{ $pem->id_pembeli }}">
                    {{ $pem->nama }}
                </option>
                @endforeach
            </select>
            <br />

            Jumlah :
            <input type="number" name="qty" required>
            @error('qty') {{ $message }} @enderror
            <br />

            Tgl Pesan :
            <input type="date" name="tgl_pesan" required>
            @error('tgl_pesan') {{ $message }} @enderror
            <br /><br />

            <button type="submit">Simpan</button>
            <a href="{{ route('pesanan.tampil') }}">Kembali</a>
        </form>
    </div>
</div>
@endsection