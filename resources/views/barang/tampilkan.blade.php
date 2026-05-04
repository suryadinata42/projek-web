@extends('layout.menu')

@section('konten')
<div class="card">
    <div class="card-header">
        <b>Data Barang</b>
    </div>
    
    <div class="card-body">
        <a href="{{ route('barang.tambah') }}" class="btn btn-primary mb-3">Tambah Data</a>

        <table class="table table-bordered table-hover" style="width:100%; font-family:Helvetica">
            <thead> 
                <tr>
                    <th>Nomor</th>
                    <th>ID Barang</th>
                    <th>Nama Barang</th>
                    <th>Varian</th>
                    <th>Harga Beli</th>
                    <th>Harga Jual</th>
                    <th>AKSI</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($barang as $d)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $d->id_barang }}</td>
                    <td>{{ $d->nama }}</td>
                    <td>{{ $d->varian }}</td>
                    <td>{{ $d->harga_beli }}</td>
                    <td>{{ $d->harga_jual }}</td>
                    <td>
                    <form id="delete-form-{{ $d->id }}" method="POST" action="{{ route('barang.hapus', $d->id) }}">
                        @csrf
                        @method('DELETE')
                        <a href="{{ route('barang.ubah', $d->id) }}" class="btn btn-success btn-sm khusus mb-1"><i class="fa fa-edit"></i></a>
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