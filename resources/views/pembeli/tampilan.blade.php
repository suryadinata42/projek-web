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
   <div class="card-header bg-info text-white">
      <i class="fa fa-user" aria-hidden="true"></i>&nbsp; <b>Data Pembeli</b>
   </div>
    
   <div class="card-body">
   <a href="{{ route('pembeli.tambah') }}" class="btn btn-primary mb-3"><i class="fa fa-plus-square" aria-hidden="true"></i>&nbsp; Tambah Data</a>
      <table class="table table-bordered table-hover" style="width:100%; font-family:Helvetica">
         <thead>
            <tr>
                  <td>No</td>
                  <td>Id Pembeli</td>
                  <td>Nama Pembeli</td>
                  <td>Jenis Kelamin</td>
                  <td>Alamat</td>
                  <td>Kode Pos</td>
                  <td>Tanggal Lahir</td>
                  <td style="width: 100px;">Aksi</td>
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
                     <form id="delete-form-{{ $d->id }}" method="POST" action="{{ route('pembeli.hapus', $d->id) }}">
                        @csrf
                        @method('DELETE')
                        <a href="{{ route('pembeli.ubah', $d->id) }}" class="btn btn-success btn-sm khusus mb-1"><i class="fa fa-edit"></i></a>
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