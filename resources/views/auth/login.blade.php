<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Aplikasi</title>
    
    <!-- Bootstrap CSS dari CDN agar tidak perlu setting path manual -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- FontAwesome untuk Icon -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    
    <style>
        body {
            /* Warna background yang lembut */
            background-color: #f4f7f6;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
        }
        .login-card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            width: 100%;
            max-width: 400px;
        }
        .login-header {
            /* Gradien biru senada dengan tombol template kamu */
            background: linear-gradient(135deg, #0054fb, #00d2ff);
            color: white;
            text-align: center;
            padding: 35px 20px;
        }
        .login-header h3 {
            margin: 0;
            font-weight: 600;
            letter-spacing: 1px;
        }
        .login-body {
            padding: 40px 30px;
            background: white;
        }
        .form-control {
            border-radius: 10px;
            padding: 12px 15px;
            border: 1px solid #ced4da;
            background-color: #f8f9fa;
        }
        .form-control:focus {
            box-shadow: none;
            border-color: #0054fb;
            background-color: #ffffff;
        }
        .btn-login {
            background-color: #0054fb;
            border: none;
            border-radius: 10px;
            padding: 12px;
            width: 100%;
            color: white;
            font-weight: bold;
            letter-spacing: 1px;
            transition: 0.3s;
        }
        .btn-login:hover {
            background-color: #003db8;
            color: white;
            box-shadow: 0 5px 15px rgba(0, 84, 251, 0.4);
        }
        .input-group-text {
            background-color: #f8f9fa;
            border-right: none;
            color: #6c757d;
            border-radius: 10px 0 0 10px;
        }
        .form-control.with-icon {
            border-left: none;
            border-radius: 0 10px 10px 0;
        }
    </style>
</head>
<body>

    <div class="container d-flex justify-content-center">
        <div class="login-card">
            <div class="login-header">
                <i class="fa-solid fa-circle-user fa-3x mb-3"></i>
                <h3>LOGIN SISTEM</h3>
                <p class="mb-0 text-white-50 mt-1">Silakan masuk menggunakan akun Anda</p>
            </div>
            
            <div class="login-body">
                
                <!-- Menangkap Notifikasi Berhasil Logout dari Controller Clogin -->
                @if(session('logout'))
                    <div class="alert alert-success alert-dismissible fade show text-center py-2" role="alert">
                        <i class="fa-solid fa-circle-check me-1"></i> {{ session('logout') }}
                        <button type="button" class="btn-close py-2" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <!-- Menangkap Notifikasi Error (jika username/password salah) -->
                @if(session('error'))
                    <div class="alert alert-danger alert-dismissible fade show text-center py-2" role="alert">
                        <i class="fa-solid fa-circle-exclamation me-1"></i> {{ session('error') }}
                        <button type="button" class="btn-close py-2" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <!-- Form Login -->
                <!-- Pastikan route('login.proses') sesuai dengan nama route POST di web.php kamu -->
                <form action="{{ route('login_proses') }}" method="POST">
                    @csrf
                    
                    <div class="mb-3">
                        <label class="form-label text-muted fw-bold" style="font-size: 14px;">Username</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fa-solid fa-user"></i></span>
                            <input type="text" name="username" class="form-control with-icon" placeholder="Masukkan username..." required autofocus>
                        </div>
                    </div>

                    <div class="mb-4">
                        <label class="form-label text-muted fw-bold" style="font-size: 14px;">Password</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fa-solid fa-lock"></i></span>
                            <input type="password" name="password" class="form-control with-icon" placeholder="Masukkan password..." required>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-login mt-2">
                        LOGIN SEKARANG <i class="fa-solid fa-arrow-right-to-bracket ms-1"></i>
                    </button>
                </form>
                
            </div>
        </div>
    </div>

    <!-- Bootstrap JS untuk fitur alert close -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>