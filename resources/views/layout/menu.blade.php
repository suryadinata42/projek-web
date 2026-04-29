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
    body, h1, h2, h3, h4, h5, h6, p, span, a, div, li {
        font-family: "Helvetica Neue", Helvetica, Arial, sans-serif !important;
    }
    </style>
</head>

<body>

    <div class="am-header">
        <div class="am-header-left">
            <a id="naviconLeft" href="" class="am-navicon d-none d-lg-flex"><i class="icon ion-navicon-round"></i></a>
            <a id="naviconLeftMobile" href="" class="am-navicon d-lg-none"><i class="icon ion-navicon-round"></i></a>
            <a href="index.html" class="am-logo">Ripa</a>
        </div>

        <div class="am-header-right">

            <div class="dropdown dropdown-profile">
                <a href="" class="nav-link nav-link-profile" data-toggle="dropdown">
                    <img src="img/img3.jpg" class="wd-32 rounded-circle" alt="">
                    <span class="logged-name"><span class="hidden-xs-down">Jhon Doe</span> <i class="fa fa-angle-down mg-l-3"></i></span>
                </a>
                <div class="dropdown-menu wd-200">
                    <ul class="list-unstyled user-profile-nav">
                        <li><a href=""><i class="icon ion-ios-person-outline"></i> Edit Profile</a></li>
                        <li><a href=""><i class="icon ion-power"></i> Sign Out</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="am-sideleft">
        <ul class="nav am-sideleft-tab">
            <li class="nav-item">
                <a href="#" class="nav-link non active"><i class="icon ion-ios-home-outline tx-24"></i></a>
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
                    <li class="nav-item">
                        <a href="{{ route('home') }}" class="nav-link">
                            <i class="icon ion-ios-home-outline"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('barang.tampilkan') }}" class="nav-link">
                            <i class="icon ion-ios-home-outline"></i>
                            <span>Barang</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('pembeli.tampilan') }}" class="nav-link">
                            <i class="icon ion-ios-home-outline"></i>
                            <span>Pembeli</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('suplier.tampil') }}" class="nav-link">
                            <i class="icon ion-ios-home-outline"></i>
                            <span>Suplier</span>
                        </a>
                    </li>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('pesanan.tampil') }}" class="nav-link">
                            <i class="icon ion-ios-home-outline"></i>
                            <span>Pesanan</span>
                        </a>
                    </li>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('pembelian.tampil') }}" class="nav-link">
                            <i class="icon ion-ios-home-outline"></i>
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
            <div class="card">
                <div class="card-body">
                    @yield('konten')
                </div>
            </div>
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
		title: "{{session('status')['judul']}}",
		text: "{{session('status')['pesan']}}",
		icon: "{{session('status')['icon']}}"
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
                confirmButtonColor: '#3085d6', 
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
</html>

