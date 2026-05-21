<!DOCTYPE html>
<html lang="en">
  <head>
    
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Twitter -->
    <meta name="twitter:site" content="@themepixels">
    <meta name="twitter:creator" content="@themepixels">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Amanda">
    <meta name="twitter:description" content="Premium Quality and Responsive UI for Dashboard.">
    <meta name="twitter:image" content="http://themepixels.me/amanda/img/amanda-social.png">

    <!-- Facebook -->
    <meta property="og:url" content="http://themepixels.me/amanda">
    <meta property="og:title" content="Bracket">
    <meta property="og:description" content="Premium Quality and Responsive UI for Dashboard.">

    <meta property="og:image" content="http://themepixels.me/amanda/img/amanda-social.png">
    <meta property="og:image:secure_url" content="http://themepixels.me/amanda/img/amanda-social.png">
    <meta property="og:image:type" content="image/png">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="600">

    <!-- Meta -->
    <meta name="description" content="Premium Quality and Responsive UI for Dashboard.">
    <meta name="author" content="ThemePixels">

    <!-- vendor css -->
    <link href="{{ asset('assets/slib/font-awesome/css/font-awesome.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/slib/Ionicons/css/ionicons.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/slib/perfect-scrollbar/css/perfect-scrollbar.css') }}" rel="stylesheet">

    <!-- Amanda CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/amanda.css') }}">
    <style>
        .am-signin-wrapper{
        background-image: url("{{ asset('assets/img/b.jpg') }}");
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        min-height: 100vh;
    }
    </style>
  </head>

  <body>

    <div class="am-signin-wrapper">
      <div class="am-signin-box">
        <div class="row no-gutters">
          <div class="col-lg-5">
            <div>
              <h2>Toko</h2>
              <p>Toko Sejahtera by Ripa Sandi</p>

              <hr>
              <p>Don't have an account? <br> <a href="page-signup.html">Sign up Now</a></p>
            </div>
          </div>
          <div class="col-lg-7">
            <h5 class="tx-gray-800 mg-b-25">Signin to Your Account</h5>

            <form action="{{ route('login') }}" method="POST">
                @csrf
                
                <div class="form-group">
                    <label class="form-control-label">Username:</label>
                    <!-- Ubah type menjadi email dan name menjadi email -->
                    <input type="text" name="username" class="form-control" placeholder="Enter your username" required>
                </div>

                <div class="form-group">
                    <label class="form-control-label">Password:</label>
                    <input type="password" name="password" class="form-control" placeholder="Enter your password" required>
                </div>

                <button type="submit" class="btn btn-primary btn-block">
                    Sign In
                </button>
            </form>
          </div><!-- col-7 -->
        </div><!-- row -->
      </div><!-- signin-box -->
    </div><!-- am-signin-wrapper -->

    <script src="{{ asset('assets/lib/jquery/jquery.js') }}"></script>
    <script src="{{ asset('assets/lib/popper.js/popper.js') }}"></script>
    <script src="{{ asset('assets/lib/bootstrap/bootstrap.js') }}"></script>
    <script src="{{ asset('assets/lib/perfect-scrollbar/js/perfect-scrollbar.jquery.js') }}"></script>

    <script src="{{ asset('assets/js/amanda.js') }}"></script>
  </body>
</html>
