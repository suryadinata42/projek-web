@extends('layout.menu')

@section('konten')
<div class="card">
    <div class="card-header">
        <b>Tambah Data Pesanan</b>
    </div>
    <div class="card-body">
    
        {{-- Form Tambah Data --}}
        <form action="{{ route('pesanan.simpan') }}" method="POST">
            @csrf
            
            <div class="form-group">
                <label>ID Pesanan</label>
                <input type="text" name="id_pesanan" class="form-control" required>
            </div>
            
            <div class="form-group">
                <label>Pembeli</label>
                <select name="id_pelanggan" class="form-control" required>
                    <option value="">-- Pilih Pembeli --</option>
                    @foreach($pembeli as $p)
                        <option value="{{ $p->id_pembeli }}">{{ $p->nama }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label>Barang</label>
                <select name="id_barang" class="form-control" required>
                    <option value="">-- Pilih Barang --</option>
                    @foreach($barang as $b)
                        <option value="{{ $b->id_barang }}">{{ $b->nama }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label>Jumlah</label>
                <input type="number" name="qty" class="form-control" required min="1">
            </div>

            <div class="form-group">
                <label>Tanggal Pesan</label>
                <input type="date" name="tgl_pesan" class="form-control" required>
            </div>

            <div class="mt-3">
                <button type="submit" class="btn btn-primary btn-sm mt-2">Simpan</button>
                <a href="{{ route('pesanan.tampil') }}" class="btn btn-danger btn-sm mt-2">Kembali</a>
            </div>
        </form>
        
    </div>
</div>
@endsection