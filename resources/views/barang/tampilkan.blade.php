@extends('layout.menu')

@section('konten')
<div class="card">
    <div class="card-header bg-info text-white">
        <i class="fa fa-gift" aria-hidden="true"></i>&nbsp; <b>Data Barang</b>
    </div>
    
    <div class="card-body">
        <div class="mb-3 d-flex align-items-center">
            <a href="{{ route('barang.tambah') }}" class="btn btn-primary">
                <i class="fa fa-plus-square" aria-hidden="true"></i>&nbsp; Tambah Data
            </a>
            <a href="{{ route('barang.ekspor') }}" target="_blank" class="btn btn-success ml-2">
                <i class="fa fa-share-square-o"></i>&nbsp; Ekspor
            </a>
            <a href="{{ route('barang.cetak') }}" target="_blank" class="btn btn-info ml-2">
                <i class="fa fa-print"></i>&nbsp; Cetak
            </a>
        </div>
        <table class="table table-bordered table-hover" style="width:100%; font-family:Helvetica">
            <thead> 
                <tr>
                    <th>Nomor</th>
                    <th>ID Barang</th>
                    <th>Nama Barang</th>
                    <th>Varian</th>
                    <th>Harga Beli</th>
                    <th>Harga Jual</th>
                    <th style="width:100px;">Foto</th>
                    <th style="width:100px;">AKSI</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($barang as $d)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $d->id_barang }}</td>
                    <td>{{ $d->nama }}</td>
                    <td>{{ $d->varian }}</td>
                    <td>{{ rupiah($d->harga_beli) }}</td>
                    <td>{{ rupiah($d->harga_jual) }}</td>
                    <td>
                        @if($d->foto)
                            <a href="{{ asset('uploads/fotoBarang/' . $d->foto) }}" target=_blank>
                                <img src="{{ asset('uploads/fotoBarang/' . $d->foto) }}" style="width: 100px;
                                height: auto;" />
                            </a>
                        @else
                            No Foto
                        @endif
                        </td>   
                    </td>
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