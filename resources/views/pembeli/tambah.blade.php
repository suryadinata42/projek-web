@extends('layout.menu')
@section('konten')
<form method="POST" action="{{ route('pembeli.simpan') }}">
    @csrf
    <div class="row g-2 align-items-center mb-3">
        <div class="col-sm-1">
            <label for="id_pembeli" class="col-form-label">ID Pembeli</label>
        </div>
        <div class="col-sm-11">
            <input type="number" name="id_pembeli" id="id_pembeli" class="form-control" required>
        </div>
        <div class="col-auto">
            @error('id_pembeli') 
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
            <label for="jenis_kelamin" class="col-form-label">Jenis Kelamin</label>
        </div>
        <div class="col-sm-11">
            <select type="text" name="jenis_kelamin" id="jenis_kelamin" class="form-control" required>
                <option value="">Pilih Jenis Kelamin</option>
                <option value="Laki-laki">Laki-laki</option>
                <option value="Perempuan">Perempuan</option>
            </select>
        </div>
        <div class="col-auto">
            @error('jenis_kelamin') 
                <span class="text-danger" style="font-size: 0.9em;">{{ $message }}</span> 
            @enderror
        </div>
    </div>
    <div class="row g-2 align-items-center mb-3">
        <div class="col-sm-1">
            <label for="alamat" class="col-form-label">Alamat</label>
        </div>
        <div class="col-sm-11">
            <textarea name="alamat" id="alamat" class="form-control" required></textarea>
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
            <input type="number" name="kode_pos" id="kode_pos" class="form-control" required>
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
            <input type="text" name="kota" id="kota" class="form-control" required>
        </div>
        <div class="col-auto">
            @error('kota') 
                <span class="text-danger" style="font-size: 0.9em;">{{ $message }}</span> 
            @enderror
        </div>
    </div>
    <div class="row g-2 align-items-center mb-3">
        <div class="col-sm-1">
            <label for="tanggal_lahir" class="col-form-label">Tanggal Lahir</label>
        </div>
        <div class="col-sm-11">
            <input type="date" name="tanggal_lahir" id="tanggal_lahir" class="form-control" required>
        </div>
        <div class="col-auto">
            @error('tanggal_lahir') 
                <span class="text-danger" style="font-size: 0.9em;">{{ $message }}</span> 
            @enderror
        </div>
    </div>
    
    <div class="mt-4">
        <button type="submit" class="btn btn-primary"><i class="fa fa-floppy-o" aria-hidden="true"></i>&nbsp; Save</button>
        <a href="{{ route('pembeli.tampilan') }}" class="btn btn-secondary"><i class="fa fa-undo" aria-hidden="true"></i>&nbsp; Back</a>
    </div>
</form>
@endsection