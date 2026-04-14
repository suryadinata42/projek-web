@extends('layout.menu')

@section('konten')
<style>
    .custom-font {
        font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
    }
    .custom-font label {
        font-weight: 600;
        margin-bottom: 5px;
    }
</style>
<div class="card">
   <div class="card-header">
      <b>Data Pembeli</b>
   </div>
    
   <div class="card-body">
   <a href="{{ route('pembeli.tambah') }}" class="btn btn-primary mb-3">Tambah Data</a>
      <table class="table table-bordered" style="width:100%; font-family:Helvetica">
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
                     @csrf
                     @method('DELETE')
                     <a href="{{ route('pembeli.ubah', $d->id) }}" class="btn btn-warning btn-sm">Edit</a>
                     <button type="submit" class="btn btn-danger btn-sm">
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
    </div> 
</div> 
@endsection
