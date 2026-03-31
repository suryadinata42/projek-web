<a href="{{ route('suplier.tambah') }}">Tambah Data</a>
<table style="width:100%">
    <thead>
        <tr>
            <th>No</th>
            <th>ID SUplier</th>
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
                    <a href="{{ route('suplier.ubah', $d->id_suplier) }}">Edit</a>
                    <button type="submit">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
