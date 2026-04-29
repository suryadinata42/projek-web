@extends('layout.menu')
@section('konten')
<div class="card">
    <div class="card-header">
        <b>Data Pesanan</b>
    </div>
    <div class="card-body">
        <a href="{{ route('pesanan.tambah') }}" class="btn btn-primary btn-sm mb-3">Tambah Data</a>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID Pesanan</th>
                    <th>Nama Pembeli</th>
                    <th>Nama Barang</th>
                    <th>Qty</th>
                    <th>Tanggal Pesan</th>
                </tr>
            </thead>
            <tbody>
                @foreach($data as $d)
                <tr>
                    <td>{{ $d->id_pesanan }}</td>
                    <td>{{ $d->pembeli->nama ?? '-' }}</td>
                    <td>{{ $d->barang->nama ?? '-' }}</td>
                    <td>{{ $d->qty }}</td>
                    <td>{{ $d->tgl_pesan }}</td>
                    <td>
                    <a href="{{ route('pesanan.ubah', $d->id) }}" class="btn btn-success btn-sm">Ubah</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
