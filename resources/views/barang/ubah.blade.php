@extends('layout.menu')
@section('konten')
<div class="card">
    <div class="card-header bg-info text-white">
        <i class="fa fa-gift" aria-hidden="true"></i>&nbsp; <b>Edit Data Barang</b>
    </div>
        <div class="card-body">
    <form method="POST" action="{{ route('barang.update', $barang->id) }}">
        @csrf
        @method('PUT')
        <div class="row g-2 align-items-center mb-3">
            <div class="col-sm-1">
                <label for="id_barang" class="col-form-label">ID Barang</label>
            </div>
            <div class="col-sm-11">
                <input type="number" name="id_barang" id="id_barang" class="form-control" required readonly value="{{ old('id_barang', $barang->id_barang) }}">
            </div>
            <div class="col-auto">
                @error('id_barang') 
                    <span class="text-danger" style="font-size: 0.9em;">{{ $message }}</span> 
                @enderror
            </div>
        </div>
        <div class="row g-2 align-items-center mb-3">
            <div class="col-sm-1">
                <label for="nama" class="col-form-label">Nama Barang</label>
            </div>
            <div class="col-sm-11">
                <input type="text" name="nama" id="nama" class="form-control" required value="{{ old('nama', $barang->nama) }}">
            </div>
            <div class="col-auto">
                @error('nama') 
                    <span class="text-danger" style="font-size: 0.9em;">{{ $message }}</span> 
                @enderror
            </div>
        </div>
        <div class="row g-2 align-items-center mb-3">
            <div class="col-sm-1">
                <label for="varian" class="col-form-label">Varian</label>
            </div>
            <div class="col-sm-11">
                <select name="varian" id="varian" class="form-control" required>
                    <option value="">-- Pilih Status --</option>
                    <option value="Baru" {{ old('varian', $barang->varian) == 'Baru' ? 'selected' : '' }}>Baru</option>
                    <option value="Bekas" {{ old('varian', $barang->varian) == 'Bekas' ? 'selected' : '' }}>Bekas</option>
                </select>
            </div>
            <div class="col-auto">
                @error('varian') 
                    <span class="text-danger" style="font-size: 0.9em;">{{ $message }}</span> 
                @enderror
            </div>
        </div>
        <div class="row g-2 align-items-center mb-3">
            <div class="col-sm-1">
                <label for="harga_beli" class="col-form-label">Harga Beli</label>
            </div>
            <div class="col-sm-11">
                <input type="number" name="harga_beli" id="harga_beli" class="form-control" required value="{{ old('harga_beli', $barang->harga_beli) }}">
            </div>
            <div class="col-auto">
                @error('harga_beli') 
                    <span class="text-danger" style="font-size: 0.9em;">{{ $message }}</span> 
                @enderror
            </div>
        </div>
    <div class="row g-2 align-items-center mb-3">
            <div class="col-sm-1">
                <label for="harga_jual" class="col-form-label">Harga Jual</label>
            </div>
            <div class="col-sm-11">
                <input type="number" name="harga_jual" id="harga_jual" class="form-control" required value="{{ old('harga_jual', $barang->harga_jual) }}">
            </div>
            <div class="col-auto">
                @error('harga_jual') 
                    <span class="text-danger" style="font-size: 0.9em;">{{ $message }}</span> 
                @enderror
            </div>
        </div>
        <div class="mt-4">
            <button type="submit" class="btn btn-primary"><i class="fa fa-floppy-o" aria-hidden="true"></i>&nbsp; Save</button>
            <a href="{{ route('barang.tampilkan') }}" class="btn btn-secondary"><i class="fa fa-undo" aria-hidden="true"></i>&nbsp; Back</a>
        </div>
    </div>
</div>
</form>
@endsection