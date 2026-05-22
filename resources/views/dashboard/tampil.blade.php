@extends('layout.menu')
@section('konten')
<div class="card">
    <div class="card-body">
        <div class="row mg-b-20">
            <div class="col">
                <div class="card bg-primary tx-white">
                    <div class="card-body text-center pd-y-15">
                        <h6 class="tx-11 tx-uppercase tx-spacing-1 tx-white-8 mg-b-5">Total Data Barang</h6>
                        <h2 class="tx-white tx-bold mg-b-0">{{ $jumlah_barang }}</h2>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card bg-success tx-white">
                    <div class="card-body text-center pd-y-15">
                        <h6 class="tx-11 tx-uppercase tx-spacing-1 tx-white-8 mg-b-5">Total Data Pembeli</h6>
                        <h2 class="tx-white tx-bold mg-b-0">{{ $jumlah_pembeli }}</h2>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card bg-info tx-white">
                    <div class="card-body text-center pd-y-15">
                        <h6 class="tx-11 tx-uppercase tx-spacing-1 tx-white-8 mg-b-5">Total Data Suplier</h6>
                        <h2 class="tx-white tx-bold mg-b-0">{{ $jumlah_suplier }}</h2>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card bg-warning tx-white">
                    <div class="card-body text-center pd-y-15">
                        <h6 class="tx-11 tx-uppercase tx-spacing-1 tx-white-8 mg-b-5">Total Data Pesanan</h6>
                        <h2 class="tx-white tx-bold mg-b-0">{{ $jumlah_pesanan }}</h2>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card bg-danger tx-white">
                    <div class="card-body text-center pd-y-15">
                        <h6 class="tx-11 tx-uppercase tx-spacing-1 tx-white-8 mg-b-5">Total Data Pembelian</h6>
                        <h2 class="tx-white tx-bold mg-b-0">{{ $jumlah_pembelian }}</h2>
                    </div>
                </div>
            </div>
        </div>

        {{-- Carousel --}}
        <div class="card">
            <div class="card-body pd-0">
                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                    </ol>
                    <style>
                        .carousel-inner .carousel-item img {
                            height: 340px;
                            object-fit: cover;
                            object-position: center;
                        }
                    </style>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img class="d-block w-100" src="{{ asset('assets/img/a.jpg') }}" alt="First slide">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100" src="{{ asset('assets/img/b.jpg') }}" alt="Second slide">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100" src="{{ asset('assets/img/c.jpg') }}" alt="Third slide">
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
        </div>

        <div>
            <style>
                .menu-scroll-container {
                    display: flex;
                    flex-wrap: nowrap;
                    overflow-x: auto;
                    gap: 15px;
                    padding-bottom: 10px;
                    -webkit-overflow-scrolling: touch;
                    scrollbar-width: none;
                    -ms-overflow-style: none;
                }
                .menu-scroll-container::-webkit-scrollbar {
                    display: none;
                }
                .menu-box {
                    flex: 1 1 0;
                    min-width: 0;
                }
                .menu-box .nav-link {
                    height: 100%;
                    display: flex;
                    flex-direction: column;
                    justify-content: center;
                    align-items: center;
                }
            </style>

            <div class="mt-4">
                <div class="menu-scroll-container">

                    <div class="menu-box">
                        <a href="{{ route('barang.tampilkan') }}" class="nav-link bg-light p-3 rounded shadow-sm text-dark" style="border: 1px solid #0866C6; border-left: 10px solid #0866C6;">
                            <i class="fa fa-gift fa-3x mb-2 text-secondary"></i>
                            <p class="m-0 text-center" style="font-size: 13px; font-weight: 600;">Tampil Barang</p>
                        </a>
                    </div>

                    <div class="menu-box">
                        <a href="{{ route('pembeli.tampilan') }}" class="nav-link bg-light p-3 rounded shadow-sm text-dark" style="border: 1px solid #23BF08; border-left: 10px solid #23BF08;">
                            <i class="fa fa-user fa-3x mb-2 text-secondary"></i>
                            <p class="m-0 text-center" style="font-size: 13px; font-weight: 600;">Tampil Pembeli</p>
                        </a>
                    </div>

                    <div class="menu-box">
                        <a href="{{ route('suplier.tampil') }}" class="nav-link bg-light p-3 rounded shadow-sm text-dark" style="border: 1px solid #17A2B8; border-left: 10px solid #17A2B8;">
                            <i class="fa fa-users fa-3x mb-2 text-secondary"></i>
                            <p class="m-0 text-center" style="font-size: 13px; font-weight: 600;">Tampil Suplier</p>
                        </a>
                    </div>

                    <div class="menu-box">
                        <a href="{{ route('pesanan.tampil') }}" class="nav-link bg-light p-3 rounded shadow-sm text-dark" style="border: 1px solid #F49917; border-left: 10px solid #F49917;">
                            <i class="fa fa-shopping-basket fa-3x mb-2 text-secondary"></i>
                            <p class="m-0 text-center" style="font-size: 13px; font-weight: 600;">Tampil Pesanan</p>
                        </a>
                    </div>

                    <div class="menu-box">
                        <a href="{{ route('pembelian.tampil') }}" class="nav-link bg-light p-3 rounded shadow-sm text-dark" style="border: 1px solid #DC3545; border-left: 10px solid #DC3545;">
                            <i class="fa fa-handshake-o fa-3x mb-2 text-secondary"></i>
                            <p class="m-0 text-center" style="font-size: 13px; font-weight: 600;">Tampil Pembelian</p>
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
{{-- Stats Cards --}}


@endsection