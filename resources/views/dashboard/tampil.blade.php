@extends('layout.menu')
@section('konten')
<div class="row">
    <div class="col-sm-6 col-md-4 mg-t-20 mg-sm-t-0">
        <div class="card bg-primary tx-white">
            <div class="card-body text-center">
                <h6 class="tx-11 tx-uppercase tx-spacing-1 tx-white-8 mg-b-10">BARANG</h6>
                <h2 class="tx-white tx-bold mg-b-0">{{ $jumlah_barang }}</h2>
            </div>
        </div>
    </div>

    <div class="col-sm-6 col-md-4 mg-t-20 mg-md-t-0">
        <div class="card bg-success tx-white">
            <div class="card-body text-center">
                <h6 class="tx-11 tx-uppercase tx-spacing-1 tx-white-8 mg-b-10">PEMBELI</h6>
                <h2 class="tx-white tx-bold mg-b-0">{{ $jumlah_pembeli }}</h2>
            </div>
        </div>
    </div>

    <div class="col-sm-6 col-md-4 mg-t-20 mg-md-t-0">
        <div class="card bg-info tx-white">
            <div class="card-body text-center">
                <h6 class="tx-11 tx-uppercase tx-spacing-1 tx-white-8 mg-b-10">SUPLIER</h6>
                <h2 class="tx-white tx-bold mg-b-0">{{ $jumlah_suplier }}</h2>
            </div>
        </div>
    </div>
</div>
@endsection