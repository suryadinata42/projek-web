@extends('layout.menu')
@section('konten')
<div class="card">
    <div class="card-header bg-info text-white">
        <i class="fa fa-shopping-basket" aria-hidden="true"></i>&nbsp; <b>Data Pesanan</b>
    </div>
    <div class="card-body">
        <a href="{{ route('pesanan.tambah') }}" class="btn btn-primary mb-3"><i class="fa fa-plus-square" aria-hidden="true"></i>&nbsp; Tambah Data</a>
        <table class="table table-bordered table-hover" style="width:100%; font-family:Helvetica">
            <thead>
                <tr>
                    <th>No</th>
                    <th>ID Pesanan</th>
                    <th>Nama Barang</th>
                    <th>Varian</th>
                    <th>Nama Pembeli</th>
                    <th>Jumlah</th>
                    <th>Tanggal</th>
                    <th style="width: 100px;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($pesanan as $d)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $d->id_pesanan }}</td>
                    <td>{{ $d->nama_barang }}</td>
                    <td>{{ $d->varian }}</td>
                    <td>{{ $d->nama_pembeli }}</td>
                    <td>{{ $d->qty }}</td>
                    <td>{{ $d->tgl_pesan }}</td>
                    <td>
                        <form id="delete-form-{{ $d->id }}" method="POST" action="{{ route('pesanan.hapus', $d->id) }}">
                            @csrf
                            @method('DELETE')
                            <a href="{{ route('pesanan.ubah', $d->id) }}" class="btn btn-success btn-sm khusus mb-1"><i class="fa fa-edit"></i></a>
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