@extends('layout.menu')
@section('konten')
<div class="card">
    <div class="card-header">
        <b>Data Pesanan</b>
    </div>
    <div class="card-body">
        <a href="{{ route('pesanan.tambah') }}" class="btn btn-primary mb-3">Tambah Data</a>
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
                    <th>Aksi</th>
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
                        <form method="POST" action="{{ route('pesanan.hapus', $d->id_pesanan) }}" 
                            onsubmit="return confirm('Yakin ingin menghapus data ini?');">
                            @csrf
                            @method('DELETE')
                            <a href="{{ route('pesanan.ubah', $d->id_pesanan) }}" class="btn btn-warning btn-sm">Edit</a>
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
