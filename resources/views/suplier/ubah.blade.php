@extends('layout.menu')
@section('konten')
<div class="card">
    <div class="card-header bg-info text-white">
        <i class="fa fa-users" aria-hidden="true"></i>&nbsp; <b>Data Suplier</b>
    </div>
        <div class="card-body">
        <form method="POST" action="{{ route('suplier.update', $sup->id_suplier) }}">
            @csrf
            @method('PUT')
            
            <div class="row g-2 align-items-center mb-3">
                <div class="col-sm-1">
                    <label for="id_suplier" class="col-form-label">ID Suplier</label>
                </div>
                <div class="col-sm-11">
                    <input type="text" name="id_suplier" id="id_suplier" class="form-control" required readonly value="{{ old('id_suplier', $sup->id_suplier) }}">
                </div>
                <div class="col-auto">
                    @error('id_suplier') 
                        <span class="text-danger" style="font-size: 0.9em;">{{ $message }}</span> 
                    @enderror
                </div>
            </div>

            <div class="row g-2 align-items-center mb-3">
                <div class="col-sm-1">
                    <label for="nama" class="col-form-label">Nama Suplier</label>
                </div>
                <div class="col-sm-11">
                    <input type="text" name="nama" id="nama" class="form-control" required value="{{ old('nama', $sup->nama) }}">
                </div>
                <div class="col-auto">
                    @error('nama') 
                        <span class="text-danger" style="font-size: 0.9em;">{{ $message }}</span> 
                    @enderror
                </div>
            </div>

            <div class="row g-2 align-items-center mb-3">
                <div class="col-sm-1">
                    <label for="alamat" class="col-form-label">Alamat</label>
                </div>
                <div class="col-sm-11">
                    <textarea name="alamat" id="alamat" class="form-control" required>{{ old('alamat', $sup->alamat) }}</textarea>
                </div>
                <div class="col-auto">
                    @error('alamat') 
                        <span class="text-danger" style="font-size: 0.9em;">{{ $message }}</span> 
                    @enderror
                </div>
            </div>

            <div class="row g-2 align-items-center mb-3">
                <div class="col-sm-1">
                    <label for="kode_pos" class="col-form-label">Kode Pos</label>
                </div>
                <div class="col-sm-11">
                    <input type="text" name="kode_pos" id="kode_pos" class="form-control" required value="{{ old('kode_pos', $sup->kode_pos) }}">
                </div>
                <div class="col-auto">
                    @error('kode_pos') 
                        <span class="text-danger" style="font-size: 0.9em;">{{ $message }}</span> 
                    @enderror
                </div>
            </div>

            <div class="row g-2 align-items-center mb-3">
                <div class="col-sm-1">
                    <label for="kota" class="col-form-label">Kota</label>
                </div>
                <div class="col-sm-11">
                    <input type="text" name="kota" id="kota" class="form-control" required value="{{ old('kota', $sup->kota) }}">
                </div>
                <div class="col-auto">
                    @error('kota') 
                        <span class="text-danger" style="font-size: 0.9em;">{{ $message }}</span> 
                    @enderror
                </div>
            </div>

            <div class="mt-4">
                <button type="submit" class="btn btn-primary"><i class="fa fa-floppy-o" aria-hidden="true"></i>&nbsp; Save</button>
                <a href="{{ route('suplier.tampil') }}" class="btn btn-secondary"><i class="fa fa-undo" aria-hidden="true"></i>&nbsp; Back</a>
            </div>
        </form>
        </div>
    </div>
</div>
@endsection