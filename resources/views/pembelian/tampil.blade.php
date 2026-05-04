@extends('layout.menu')
@section('konten')
<style>
    .custom-font {
        font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
    }
</style>

<div class="card">
    <div class="card-header">
        <b>Data Pembelian</b>
    </div>
    <div class="card-body">
        <a href="{{ route('pembelian.tambah') }}" class="btn btn-primary mb-3">Tambah Data</a>
        <table class="table table-bordered table-hover" style="width:100%; font-family:Helvetica">
            <thead>
                <tr>
                    <th>No</th>
                    <th>ID pembelian</th>
                    <th>Nama Barang</th>
                    <th>Varian</th>
                    <th>Nama Suplier/tr></th>
                    <th>Jumlah</th>
                    <th>Tanggal</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($pembelian as $d)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $d->id_pembelian }}</td>
                    <td>{{ $d->nama_barang }}</td>
                    <td>{{ $d->varian}}</td>
                    <td>{{ $d->nama_suplier }}</td>
                    <td>{{ $d->qty}}</td>
                    <td>{{ $d->tgl}}</td>
                    <td>
                       <form id="delete-form-{{ $d->id }}" method="POST" action="{{ route('pembelian.hapus', $d->id) }}">
                            @csrf
                            @method('DELETE')
                            <a href="{{ route('pembelian.ubah', $d->id) }}" class="btn btn-success btn-sm khusus mb-1"><i class="fa fa-edit"></i></a>
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