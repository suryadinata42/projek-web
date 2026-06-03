<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="icon" href="img/logo.png" type="image/png" />
    <title>Home</title>

    <link href="{{ asset('assets/lib/font-awesome/css/font-awesome.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/lib/Ionicons/css/ionicons.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/lib/perfect-scrollbar/css/perfect-scrollbar.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/lib/jquery-toggles/toggles-full.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/lib/rickshaw/rickshaw.min.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('assets/css/amanda.css') }}">
    <style>
        body, h1, h2, h3, h4, h5, h6, p, a, span, div, .nav-link, .am-title {
            font-family: 'Helvetica', 'Arial', sans-serif !important;
        }
        
        @media (min-width: 992px) {
        
        /* === KONDISI 1: SIDEBAR SEMBUNYI === */
        body:not(.sidebar-aktif) .am-sideleft {
            left: -230px !important; 
        }
        body:not(.sidebar-aktif) .am-mainpanel {
            margin-left: 0 !important; 
            width: 100% !important; 
            max-width: 100% !important;
        }
        /* INI OBAT KHUSUS UNTUK PAGETITLE BIAR IKUT MELAR FULL */
        body:not(.sidebar-aktif) .am-pagetitle {
            width: 100% !important;
            max-width: 100% !important;
            left: 0 !important;
            margin-left: 0 !important;
            flex: 1 1 auto !important; /* Memaksa flexbox untuk memenuhi sisa ruang */
        }
        
        /* === KONDISI 2: SIDEBAR MUNCUL === */
        body.sidebar-aktif .am-sideleft {
            left: 0 !important;
        }
        body.sidebar-aktif .am-mainpanel {
            margin-left: 230px !important;
            width: calc(100% - 230px) !important; 
        }
        /* Kembalikan pagetitle ke ukuran normal biar gak nabrak saat sidebar muncul */
        body.sidebar-aktif .am-pagetitle {
            width: 100% !important;
            max-width: 100% !important;
        }

        /* === ANIMASI TRANSISI Mulus === */
        .am-sideleft, .am-mainpanel, .am-pagetitle {
            transition: all 0.3s ease-in-out !important;
        }
    }
    </style>
</head>

<body>

    <div class="am-header">
        <div class="am-header-left">
            <a id="naviconLeft" href="" class="am-navicon d-none d-lg-flex"><i class="icon ion-navicon-round"></i></a>
            <a id="naviconLeftMobile" href="" class="am-navicon d-lg-none"><i class="icon ion-navicon-round"></i></a>
            <a href="{{ route('home') }}" class="am-logo">Toko Ripa</a>
        </div>

        <div class="am-header-right">

            <div class="dropdown dropdown-profile">
                <a href="" class="nav-link nav-link-profile" data-toggle="dropdown">
                    <img src="img/img3.jpg" class="wd-32 rounded-circle" alt="">
                    <span class="logged-name">
                        <span class="hidden-xs-down">{{ Auth::user()->name }}</span> 
                        <i class="fa fa-angle-down mg-l-3"></i>
                    </span>
                </a>
                <div class="dropdown-menu wd-200">
                    <ul class="list-unstyled user-profile-nav">
                        <li><a href=""><i class="icon ion-ios-person-outline"></i> Edit Profile</a></li>
                        <li><a href="{{ route('logout') }}"><i class="icon ion-power"></i> Sign Out</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="am-sideleft">
        <ul class="nav am-sideleft-tab">
            <li class="nav-item">
                <a href="{{ route('home') }}" class="nav-link"><i class="fa fa-home tx-24"></i></a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link non"></a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link non"></a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link non"></a>
            </li>
        </ul>
        <style>
            .non {
                pointer-events: none;
            }
        </style>

        <div class="tab-content">
            <div id="mainMenu" class="tab-pane active">
                <ul class="nav am-sideleft-menu">
                    <!-- <li class="nav-item">
                        <a href="{{ route('home') }}" class="nav-link">
                            <i class="icon ion-ios-home-outline"></i>
                            <span>Dashboard</span>
                        </a>
                    </li> -->
                    <li class="nav-item">
                        <a href="{{ route('barang.tampilkan') }}" class="nav-link {{ Request::is('barang') ? 'active' : '' }}">
                            <i class="fa fa-gift" style="font-size:1.2em"></i> 
                            <span>Barang</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('pembeli.tampilan') }}" class="nav-link {{ Request::is('pembeli') ? 'active' : '' }}">
                            <i class="fa fa-user" style="font-size:1.2em"></i>
                            <span>Pembeli</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('suplier.tampil') }}" class="nav-link {{ Request::is('suplier') ? 'active' : '' }}">
                            <i class="fa fa-users" style="font-size:1.2em"></i>
                            <span>Suplier</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('pesanan.tampil') }}" class="nav-link {{ Request::is('pesanan') ? 'active' : '' }}">
                            <i class="fa fa-shopping-basket" style="font-size:1.2em"></i>
                            <span>Pesanan</span>
                        </a>
                    </li>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('pembelian.tampil') }}" class="nav-link {{ Request::is('pembelian') ? 'active' : '' }}">
                            <i class="fa fa-handshake-o" style="font-size:1.2em"></i>
                            <span>Pembelian</span>
                        </a>
                    </li>


                    <!--
                    <li class="nav-item">
                        <a href="" class="nav-link with-sub">
                            <i class="icon ion-ios-gear-outline"></i>
                            <span>Forms</span>
                        </a>
                        <ul class="nav-sub">
                            <li class="nav-item"><a href="form-elements.html" class="nav-link">Form Elements</a></li>
                            <li class="nav-item"><a href="form-layouts.html" class="nav-link">Form Layouts</a></li>
                            <li class="nav-item"><a href="form-validation.html" class="nav-link">Form Validation</a></li>
                            <li class="nav-item"><a href="form-wizards.html" class="nav-link">Form Wizards</a></li>
                            <li class="nav-item"><a href="form-editor-text.html" class="nav-link">Text Editor</a></li>
                        </ul>
                    </li>
                    -->
                </ul>
            </div>
        </div>
    </div>

    <div class="am-mainpanel">
        <div class="am-pagetitle">
            <h5 class="am-title">{{ isset($judul) ? ($judul) : '' }}</h5>         
        </div>
        <div class="am-pagebody">

            <!-- Isi disini ---------------------------------------- -->
            @yield('konten')
            <!-- Batas isi disini ---------------------------------- -->

        </div>
    </div>
    <script src="{{ asset('assets/lib/jquery/jquery.js') }}"></script>
    <script src="{{ asset('assets/lib/popper.js/popper.js') }}"></script>
    <script src="{{ asset('assets/lib/bootstrap/bootstrap.js') }}"></script>
    <script src="{{ asset('assets/lib/perfect-scrollbar/js/perfect-scrollbar.jquery.js') }}"></script>
    <script src="{{ asset('assets/lib/jquery-toggles/toggles.min.js') }}"></script>
    <script src="{{ asset('assets/lib/d3/d3.js') }}"></script>
    <script src="{{ asset('assets/lib/rickshaw/rickshaw.min.js') }}"></script>
    <script src="http://maps.google.com/maps/api/js?key=AIzaSyAEt_DBLTknLexNbTVwbXyq2HSf2UbRBU8"></script>
    <script src="{{ asset('assets/lib/gmaps/gmaps.js') }}"></script>
    <script src="{{ asset('assets/lib/Flot/jquery.flot.js') }}"></script>
    <script src="{{ asset('assets/lib/Flot/jquery.flot.pie.js') }}"></script>
    <script src="{{ asset('assets/lib/Flot/jquery.flot.resize.js') }}"></script>
    <script src="{{ asset('assets/lib/flot-spline/jquery.flot.spline.js') }}"></script>

    <script src="js/amanda.js"></script>
    <script src="js/ResizeSensor.js"></script>
    <script src="js/dashboard.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
    @if(session('status'))
    <script>
        Swal.fire({
        position: "top-end",
        icon: "{{session('status')['icon']}}",
        title: "{{session('status')['judul']}}",
        showConfirmButton: false,
        timer: 1500
        });
    </script>
    @endif

    <script>
        function confirmDelete(id) {
            Swal.fire({
                title: 'Yakin Data ini?', 
                text: "Data yang dihapus tidak dapat dikembalikan!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#0054fb', 
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, hapus!', 
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('delete-form-' + id).submit();
                }
            });
        }
    </script>

</body>
<script>
    $(document).ready(function() {

        $('#naviconLeft').off('click').on('click', function(e) {
            e.preventDefault();
            $('body').toggleClass('sidebar-aktif');
        });
    });
</script>
</html>

