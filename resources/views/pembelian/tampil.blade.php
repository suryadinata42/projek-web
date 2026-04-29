@extends('layout.menu')
@section('konten')
<style>
    .custom-font {
        font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
    }
</style>

<div class="card">
    <div class="card-header">
        <b>Tambah Data Barang</b>
    </div>
    <div class="card-body">
        <a href="{{ route('pembelian.tambah') }}">Tambah Data</a>
        <table style="width:100%">
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
                        <form method="POST" action="{{ route('pembelian.hapus', $d->id_pembelian) }}" 
                        onsubmit="return confirm('Yakin ingin menghapus data ini?');">
                            @csrf
                            @method('DELETE')
                            <a href="{{ route('pembelian.ubah', $d->id_pembelian) }}">Edit</a>
                            <button type="submit">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div> 
</div> 
@endsection