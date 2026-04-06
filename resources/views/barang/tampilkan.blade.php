<a href="{{ route('barang.tambah') }}"> Tambah Data</a>
<body style="font-family:Helvetica">
    <table style="width:100%">
        <thred>
            <tr>
                <th>Nomor</th>
                <th>ID_Barang</th>
                <th>Nama Barang</th>
                <th>Varian</th>
                <th>Harga Beli</th>
                <th>harga Jual</th>
                <th>AKSI</th>
            </tr>
        </thred>
        <tbody>
            @foreach ($barang as $d)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$d->id_barang}}</td>
                <td>{{$d->nama}}</td>
                <td>{{$d->varian}}</td>
                <td>{{$d->harga_beli}}</td>
                <td>{{$d->harga_jual}}</td>
                <td>
                    <form action="{{ route('barang.hapus', $d->id) }}" method="POST" 
                    onsubmit="return confirm('Yakin ingin Mau Menghapus Data ini');">
                    @csrf
                    @method('DELETE')
                    <a href="{{ route('barang.ubah', $d->id) }}"> EDIT </a>
                    <button type="submit" class="btn btn-danger" >
                        HAPUS
                    </button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>