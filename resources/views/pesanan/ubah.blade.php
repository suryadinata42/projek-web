@extends('layout.menu')
@section('konten')
<div class="card">
    <div class="card-header bg-info text-white">
        <i class="fa fa-shopping-basket" aria-hidden="true"></i>&nbsp; <b>Edit Data Pesanan</b>
    </div>
        <div class="card-body">
        <form method="POST" action="{{ route('pesanan.update', $pesanan->id_pesanan) }}">
            @csrf
            @method('PUT')

            <div class="row g-2 align-items-center mb-3">
                <div class="col-sm-1">
                    <label for="id_pesanan" class="col-form-label">ID Pesanan</label>
                </div>
                <div class="col-sm-11">
                    <input type="text" name="id_pesanan" id="id_pesanan" class="form-control" required readonly value="{{ old('id_pesanan', $pesanan->id_pesanan) }}">
                </div>
                <div class="col-auto">
                    @error('id_pesanan')
                        <span class="text-danger" style="font-size: 0.9em;">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="row g-2 align-items-center mb-3">
                <div class="col-sm-1">
                    <label for="nama_barang" class="col-form-label">Nama Barang</label>
                </div>
                <div class="col-sm-11">
                    <select name="nama_barang" id="nama_barang" class="form-control" required>
                        <option value="">-- Pilih Barang --</option>
                        @foreach($barang as $brg)
                            <option value="{{ $brg->id_barang }}" {{ $brg->id_barang == $pesanan->id_barang ? 'selected' : '' }}>
                                {{ $brg->nama }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-auto">
                    @error('nama_barang')
                        <span class="text-danger" style="font-size: 0.9em;">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="row g-2 align-items-center mb-3">
                <div class="col-sm-1">
                    <label for="nama_pembeli" class="col-form-label">Nama Pembeli</label>
                </div>
                <div class="col-sm-11">
                    <select name="nama_pembeli" id="nama_pembeli" class="form-control" required>
                        <option value="">-- Pilih Pembeli --</option>
                        @foreach($pembeli as $pem)
                            <option value="{{ $pem->id_pembeli }}" {{ $pem->id_pembeli == $pesanan->id_pelanggan ? 'selected' : '' }}>
                                {{ $pem->nama }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-auto">
                    @error('nama_pembeli')
                        <span class="text-danger" style="font-size: 0.9em;">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="row g-2 align-items-center mb-3">
                <div class="col-sm-1">
                    <label for="qty" class="col-form-label">Jumlah</label>
                </div>
                <div class="col-sm-11">
                    <input type="number" name="qty" id="qty" class="form-control" required value="{{ old('qty', $pesanan->qty) }}">
                </div>
                <div class="col-auto">
                    @error('qty')
                        <span class="text-danger" style="font-size: 0.9em;">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="row g-2 align-items-center mb-3">
                <div class="col-sm-1">
                    <label for="tgl_pesan" class="col-form-label">Tgl Pesan</label>
                </div>
                <div class="col-sm-11">
                    <input type="date" name="tgl_pesan" id="tgl_pesan" class="form-control" required value="{{ old('tgl_pesan', $pesanan->tgl_pesan) }}">
                </div>
                <div class="col-auto">
                    @error('tgl_pesan')
                        <span class="text-danger" style="font-size: 0.9em;">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="mt-4">
                <button type="submit" class="btn btn-primary"><i class="fa fa-floppy-o" aria-hidden="true"></i>&nbsp; Save</button>
                <a href="{{ route('pesanan.tampil') }}" class="btn btn-secondary"><i class="fa fa-undo" aria-hidden="true"></i>&nbsp; Back</a>
            </div>

        </form>
    </div>
</div>
@endsection