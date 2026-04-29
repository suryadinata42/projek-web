@extends('layout.menu')

@section('konten')
<div class="card">
    <div class="card-header">
        <b>Edit Data Pesanan</b>
    </div>
    <div class="card-body">
        
        {{-- Menampilkan pesan error jika ada --}}
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- Form Edit Data --}}
        <form action="{{ route('pesanan.update', $pesanan->id) }}" method="POST">
            @csrf
            @method('PUT')
            
            <div class="form-group mb-3">
                <label for="id_pelanggan">Pembeli</label>
                <select name="id_pelanggan" class="form-control" required>
                    @foreach($pembeli as $p)
                        <option value="{{ $p->id_pembeli }}" {{ $pesanan->id_pelanggan == $p->id_pembeli ? 'selected' : '' }}>
                            {{ $p->nama }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group mb-3">
                <label for="id_barang">Barang</label>
                <select name="id_barang" class="form-control" required>
                    @foreach($barang as $b)
                        <option value="{{ $b->id_barang }}" {{ $pesanan->id_barang == $b->id_barang ? 'selected' : '' }}>
                            {{ $b->nama }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group mb-3">
                <label for="qty">Jumlah</label>
                <input type="number" name="qty" class="form-control" value="{{ $pesanan->qty }}" required min="1">
            </div>

            <div class="form-group mb-3">
                <label for="tgl_pesan">Tanggal Pesan</label>
                <input type="date" name="tgl_pesan" class="form-control" value="{{ $pesanan->tgl_pesan }}" required>
            </div>

            <div class="mt-3">
                <button type="submit" class="btn btn-primary btn-sm mt-2">Update</button>
                <a href="{{ route('pesanan.tampil') }}" class="btn btn-danger btn-sm mt-2">Kembali</a>
            </div>
        </form>
        
    </div>
</div>
@endsection