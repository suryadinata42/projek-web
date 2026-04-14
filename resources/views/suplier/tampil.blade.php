@extends('layout.menu')
@section('konten')
<div class="card">
    <div class="card-header">
        <b>Data Suplier</b>
    </div>
    
    <div class="card-body">
        <a href="{{ route('suplier.tambah') }}" class="btn btn-primary mb-3">Tambah Data</a>
    <table class="table table-bordered table-hover" style="width:100%; font-family:Helvetica">
        <thead>
            <tr>
                <th>No</th>
                <th>ID Suplier</th>
                <th>Nama Suplier</th>
                <th>ALamat Suplier</th>
                <th>Kode Pos</th>
                <th>Kota</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($suplier as $d)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $d->id_suplier }}</td>
                <td>{{ $d->nama }}</td>
                <td>{!! nl2br($d->alamat) !!}</td>
                <td>{{ $d->kode_pos }}</td>
                <td>{{ $d->kota }}</td>
                <td>
                    <form method="POST" action="{{ route('suplier.hapus', $d->id_suplier) }}" 
                    onsubmit="return confirm('Yakin mau menghapus data ini?');">
                        @csrf
                        @method('DELETE')
                        <a href="{{ route('suplier.ubah', $d->id_suplier) }}" class="btn btn-warning btn-sm">Edit</a>
                        <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    </div>
</div>
@endsection