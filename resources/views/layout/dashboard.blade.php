@extends('layout.menu') 

@section('konten')
    <div class="card pd-20 pd-sm-40">
        <h6 class="card-body-title">Selamat Datang di Ripa!</h6>
        <p class="mg-b-20 mg-sm-b-30">Ini adalah halaman utama dashboard kamu. Sekarang isinya sudah tidak kosong lagi.</p>
        
        <div class="alert alert-success" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            <strong>Mantap!</strong> Kamu berhasil menampilkan isi konten dashboard.
        </div>
    </div>
@endsection