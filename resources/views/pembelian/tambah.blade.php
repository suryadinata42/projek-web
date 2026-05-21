@extends('layout.menu')
@section('konten')
<form method="POST" action="{{ route('pembelian.simpan') }}">
    @csrf
    <div class="row g-2 align-items-center mb-3">
        <div class="col-sm-1">
            <label for="id_pembelian" class="col-form-label">ID Pembelian</label>
        </div>
        <div class="col-sm-11">
            <input type="number" name="id_pembelian" id="id_pembelian" class="form-control" required>
        </div>
        <div class="col-auto">
            @error('id_pembelian') 
                <span class="text-danger" style="font-size: 0.9em;">{{ $message }}</span> 
            @enderror
        </div>
    </div>
    <div class="row g-2 align-items-center mb-3">
        <div class="col-sm-1">
            <label for="nama_barang" class="col-form-label">ID Barang</label>
        </div>
        <div class="col-sm-11">
            <select name="nama_barang" id="nama_barang" class="form-control" required>
                <option value="">-- Pilih Barang --</option>
                @foreach($barang as $b)
                    <option value="{{ $b->id_barang }}" {{ old('nama_barang') == $b->id_barang ? 'selected' : '' }}>
                        {{ $b->id_barang }}
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
            <label for="nama_suplier" class="col-form-label">ID Suplier</label>
        </div>
        <div class="col-sm-11">
            <select name="nama_suplier" id="nama_suplier" class="form-control" required>
                <option value="">-- Pilih Suplier --</option>
                @foreach($suplier as $s)
                    <option value="{{ $s->id_suplier }}" {{ old('nama_suplier') == $s->id_suplier ? 'selected' : '' }}>
                        {{ $s->id_suplier }}
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
            <label for="qty" class="col-form-label">QTY</label>
        </div>
        <div class="col-sm-11">
            <input type="number" name="qty" id="qty" class="form-control" required>
        </div>
        <div class="col-auto">
            @error('qty') 
                <span class="text-danger" style="font-size: 0.9em;">{{ $message }}</span> 
            @enderror
        </div>
    </div>
    <div class="row g-2 align-items-center mb-3">
        <div class="col-sm-1">
            <label for="tgl" class="col-form-label">Tanggal</label>
        </div>
        <div class="col-sm-11">
            <input type="date" name="tgl" id="tgl" class="form-control" required>
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
@endsection