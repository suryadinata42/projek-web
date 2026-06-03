<head>
    <link rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
    integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N"
    crossorigin="anonymous">
    <style>
        @media print {
            @page {
                size: A4;
                margin-top: 20mm;
                margin-bottom: 20mm;
                margin-left: 20mm;
                margin-right: 20mm;
            }
            body {
                margin: 0;
                -webkit-print-color-adjust: exact;
            }
        }
    </style>
</head>
<body>
    <h3>Ripa Mei sandi suryadinata 310124023848</h3>
    <h3>Data Barang</h3>
    <table class="table">
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
                    @if($d->foto)
                        <a href="{{ asset('uploads/fotoBarang/' . $d->foto) }}" target="_blank">
                            <img src="{{ asset('uploads/fotoBarang/' . $d->foto) }}" style="width: 100px; height: auto;" />
                        </a>
                    @else
                        No Foto
                    @endif
                </td>
            </tr>  {{-- ✅ Fixed: added missing closing </tr> tag --}}
            @endforeach
        </tbody>
    </table>
    <script>
        window.addEventListener('load', function () {
            window.print();
        });

        window.addEventListener('afterprint', function () {
            window.close();
        });
    </script>
</body>