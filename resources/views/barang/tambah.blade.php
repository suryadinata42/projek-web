@extends('layout.menu')
@section('konten')
<form method="POST" action="{{ route('barang.simpan') }}">
    @csrf
    <div class="row g-2 align-items-center mb-3">
        <div class="col-sm-1">
            <label for="id_barang" class="col-form-label">ID Barang</label>
        </div>
        <div class="col-sm-11">
            <input type="number" name="id_barang" id="id_barang" class="form-control" required>
        </div>
        <div class="col-auto">
            @error('id_barang') 
                <span class="text-danger" style="font-size: 0.9em;">{{ $message }}</span> 
            @enderror
        </div>
    </div>
    <div class="row g-2 align-items-center mb-3">
        <div class="col-sm-1">
            <label for="nama" class="col-form-label">Nama</label>
        </div>
        <div class="col-sm-11">
            <input type="text" name="nama" id="nama" class="form-control" required>
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
            <select type="text" name="varian" id="varian" class="form-control" required>
                <option value="">Pilih Varian</option>
                <option value="Baru">Baru</option>
                <option value="Bekas">Bekas</option>
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
            <input type="number" name="harga_beli" id="harga_beli" class="form-control" required>
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
            <input type="number" name="harga_jual" id="harga_jual" class="form-control" required>
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
</form>
@endsection