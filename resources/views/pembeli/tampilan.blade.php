<a href="{{ route('pembeli.tambah') }}">Tambah Data</a>
<body style="font-family:Helvetica">
   <table style="width:100%">
      <thead>
         <tr>
               <td>No</td>
               <td>Id Pembeli</td>
               <td>Nama Pembeli</td>
               <td>Jenis Kelamin</td>
               <td>Alamat</td>
               <td>Kode Pos</td>
               <td>Tanggal Lahir</td>
               <td>Aksi</td>
         </tr>
      </thead>
      <tbody>
         @foreach($pembeli as $d)
         <tr>
            <td>{{ $loop->iteration }}</td>
               <td>{{ $d->id_pembeli }}</td>
               <td>{{ $d->nama }}</td>
               <td>{{ $d->jenis_kelamin }}</td>
               <td>{!! nl2br($d->alamat) !!}</td>
               <td>{{ $d->kode_pos }}</td>
               <td>{{ $d->tanggal_lahir }}</td>
               <td>
               <form action="{{ route('pembeli.hapus', $d->id) }}" method="POST" 
               onsubmit="return confirm('Yakin mau menghapus data ini?');">
                  <!-- @csrf -->
                  @method('DELETE')
                  <a href="{{ route('pembeli.ubah', $d->id) }}">Edit</a>
                  <button type="submit" class="btn btn-danger">
                        Hapus
                  </button>
                  </form>
            </td>
            </tr>
         @endforeach
      </tbody>
   </table>
   @if(session('BERHASIL'))
   <script>
   alert("{{ session('success') }}");
   </script>
   @endif
</body>
