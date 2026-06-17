<!DOCTYPE html>
<html>
<head>
    <title>Export Data Barang</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h3>Ripa Mei sandi suryadinata 310124023848</h3>
    <h3>Data Barang</h3>
    
    <table border="1">
        <thead>
            <tr>
                <th>Nomor</th>
                <th>ID Barang</th>
                <th>Nama Barang</th>
                <th>Varian</th>
                <th>Harga Beli</th>
                <th>Harga Jual</th>
                <th>Foto</th>
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
                    {{-- 
                      Catatan: 
                      Pada metode eksport XLS dengan header HTML ini, tag <img> seringkali 
                      tidak muncul di Excel (karena Excel tidak bisa meload relative URL 
                      secara langsung). Lebih baik tampilkan nama filenya saja atau URL lengkapnya.
                    --}}
                    @if($d->foto)
                        {{ $d->foto }}
                    @else
                        No Foto
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>