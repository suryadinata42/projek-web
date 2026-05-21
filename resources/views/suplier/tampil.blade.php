@extends('layout.menu')
@section('konten')
<div class="card">
    <div class="card-header bg-info text-white">
        <i class="fa fa-users" aria-hidden="true"></i>&nbsp; <b>Data Suplier</b>
    </div>
    
    <div class="card-body">
        <a href="{{ route('suplier.tambah') }}" class="btn btn-primary mb-3"><i class="fa fa-plus-square" aria-hidden="true"></i>&nbsp; Tambah Data</a>
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
                    <form id="delete-form-{{ $d->id }}" method="POST" action="{{ route('suplier.hapus', $d->id) }}">
                        @csrf
                        @method('DELETE')
                        <a href="{{ route('suplier.ubah', $d->id) }}" class="btn btn-success btn-sm khusus mb-1"><i class="fa fa-edit"></i></a>
                        <button type="button" class="btn btn-danger btn-sm mb-1" 
                        onclick="confirmDelete({{ $d->id }})" title="Hapus Data"><i class="fa fa-trash"></i></button>
                    </form>

                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @if(session('success'))
    <script>
        alert("{{ session('success') }}");
    </script>
    @endif
    </div>
</div>
@endsection