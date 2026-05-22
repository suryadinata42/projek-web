@extends('layout.menu')
@section('konten')
<div class="card">
    <div class="card-header bg-info text-white">
        <i class="fa fa-handshake-o" aria-hidden="true"></i>&nbsp; <b>Edit Data Pembelian</b>
    </div>
    <div class="card-body">
        <form method="POST" action="{{ route('pembelian.update', $pembelian->id_pembelian) }}">
            @csrf
            @method('PUT')

            <div class="row g-2 align-items-center mb-3">
                <div class="col-sm-1">
                    <label for="id_pembelian" class="col-form-label">ID Pembelian</label>
                </div>
                <div class="col-sm-11">
                    <input type="text" name="id_pembelian" id="id_pembelian" class="form-control" required readonly value="{{ old('id_pembelian', $pembelian->id_pembelian) }}">
                </div>
                <div class="col-auto">
                    @error('id_pembelian')
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
                            <option value="{{ $brg->id_barang }}" {{ $brg->id_barang === $pembelian->id_barang ? 'selected' : '' }}>
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
                    <label for="nama_suplier" class="col-form-label">Nama Suplier</label>
                </div>
                <div class="col-sm-11">
                    <select name="nama_suplier" id="nama_suplier" class="form-control" required>
                        <option value="">-- Pilih Suplier --</option>
                        @foreach($suplier as $sup)
                            <option value="{{ $sup->id_suplier }}" {{ $sup->id_suplier === $pembelian->id_suplier ? 'selected' : '' }}>
                                {{ $sup->nama }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-auto">
                    @error('nama_suplier')
                        <span class="text-danger" style="font-size: 0.9em;">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="row g-2 align-items-center mb-3">
                <div class="col-sm-1">
                    <label for="qty" class="col-form-label">Jumlah</label>
                </div>
                <div class="col-sm-11">
                    <input type="number" name="qty" id="qty" class="form-control" required value="{{ old('qty', $pembelian->qty) }}">
                </div>
                <div class="col-auto">
                    @error('qty')
                        <span class="text-danger" style="font-size: 0.9em;">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="row g-2 align-items-center mb-3">
                <div class="col-sm-1">
                    <label for="tgl" class="col-form-label">Tgl Pembelian</label>
                </div>
                <div class="col-sm-11">
                    <input type="date" name="tgl" id="tgl" class="form-control" required value="{{ old('tgl', $pembelian->tgl) }}">
                </div>
                <div class="col-auto">
                    @error('tgl')
                        <span class="text-danger" style="font-size: 0.9em;">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="mt-4">
                <button type="submit" class="btn btn-primary"><i class="fa fa-floppy-o" aria-hidden="true"></i>&nbsp; Save</button>
                <a href="{{ route('pembelian.tampil') }}" class="btn btn-secondary"><i class="fa fa-undo" aria-hidden="true"></i>&nbsp; Back</a>
            </div>

        </form>
    </div>
</div>
@endsection