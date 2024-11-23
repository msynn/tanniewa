<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        .form-outline {
            position: relative;
            margin-bottom: 15px; /* Menambah jarak antar input */
        }

        .form-label {
            position: absolute;
            top: -10px;
            left: 10px;
            font-size: 14px;
            color: #495057;
            background-color: white;
            padding: 0 5px;
        }

        .form-control {
            padding: 10px 15px;
            font-size: 16px;
            border-radius: 10px;
            border: 1px solid #ced4da;
            width: 100%;
        }

        .form-outline input {
            margin-top: 10px; /* Menambah jarak atas antara input dan label */
        }
    </style>
</head>
<body>
    <section class="vh-100" style="background-color: #8a0808;">
        <div class="container py-5 h-100">
          <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col col-xl-10">
              <div class="card" style="border-radius: 1rem;">
                <div class="row g-0">
                  <div class="col-md-6 col-lg-5 d-none d-md-block">
                    <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/img1.webp"
                      alt="login form" class="img-fluid" style="border-radius: 1rem 0 0 1rem;" />
                  </div>
                  <div class="col-md-6 col-lg-7 d-flex align-items-center">
                    <div class="card-body p-4 p-lg-5 text-black">

                        <!-- Form Login -->
    <div id="login-card">
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="d-flex align-items-center mb-3 pb-1">
                <i class="fas fa-cubes fa-2x me-3" style="color: #ff6219;"></i>
                <span class="h1 fw-bold mb-0"><img src="assets/img/LogoTanniewa.png" alt="" style="width: 100px"></span>
            </div>
            <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Masuk ke akun Anda!</h5>
            <div data-mdb-input-init class="form-outline">
                <label class="form-label" for="form2Example17">NIK</label>
                <input type="email" id="form2Example17" class="form-control form-control-lg" placeholder="Masukkan NIK Anda" />
            </div>
            <div data-mdb-input-init class="form-outline">
                <label class="form-label" for="form2Example27">Password</label>
                <input type="password" id="form2Example27" class="form-control form-control-lg" placeholder="Masukkan Password Anda" />
            </div>
            <div class="pt-1 mb-4">
                <button data-mdb-button-init data-mdb-ripple-init class="btn btn-danger btn-lg btn-block" type="button">Masuk</button>
            </div>
            <a class="small text-muted" href="#!">Lupa Password?</a>
            <p class="mb-5 pb-lg-2" style="color: #393f81;">Belum memiliki Akun? <a href="#" style="color: #393f81;" onclick="showRegister()">Daftar disini</a></p>
            <a href="#!" class="small text-muted">Terms of use.</a>
            <a href="#!" class="small text-muted">Privacy policy</a>
        </form>
    </div>

    <!-- Form Register -->
    <div id="register-card" style="display: none;">
        <form method="POST" action="{{ route('register') }}">
            @csrf
            <div class="d-flex align-items-center mb-3 pb-1">
                <i class="fas fa-cubes fa-2x me-3" style="color: #ff6219;"></i>
                <span class="h1 fw-bold mb-0"><img src="assets/img/LogoTanniewa.png" alt="" style="width: 100px"></span>
            </div>
            <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Daftar Akun Baru</h5>
            <div data-mdb-input-init class="form-outline">
                <label class="form-label" for="register-name">Nama</label>
                <input type="text" id="register-name" class="form-control form-control-lg" placeholder="Masukkan Nama Anda" />
            </div>
            <div data-mdb-input-init class="form-outline">
                <label class="form-label" for="register-nik">NIK</label>
                <input type="email" id="register-nik" class="form-control form-control-lg" placeholder="Masukkan NIK Anda" />
            </div>
            <div data-mdb-input-init class="form-outline">
                <label class="form-label" for="register-password">Password</label>
                <input type="password" id="register-password" class="form-control form-control-lg" placeholder="Masukkan Password Anda" />
            </div>
            <div data-mdb-input-init class="form-outline">
                <label class="form-label" for="register-verify-password">Verifikasi Password</label>
                <input type="password" id="register-verify-password" class="form-control form-control-lg" placeholder="Masukkan Kembali Password Anda" />
            </div>
            <div id="error-message" class="error-message" style="display: none;">Password dan verifikasi password tidak cocok!</div>
            <div class="pt-1 mb-4">
                <button data-mdb-button-init data-mdb-ripple-init class="btn btn-danger btn-lg btn-block" type="button" onclick="validatePassword()">Register</button>
            </div>
            <p class="mb-5 pb-lg-2" style="color: #393f81;">Sudah memiliki Akun? <a href="#" style="color: #393f81;" onclick="showLogin()">Masuk disini</a></p>
        </form>
    </div>

    <script>
        function showRegister() {
            document.getElementById('login-card').style.display = 'none';
            document.getElementById('register-card').style.display = 'block';
        }

        function showLogin() {
            document.getElementById('register-card').style.display = 'none';
            document.getElementById('login-card').style.display = 'block';
        }

        function validatePassword() {
            // Mendapatkan nilai password dan verifikasi password
            var password = document.getElementById('register-password').value;
            var verifyPassword = document.getElementById('register-verify-password').value;

            // Cek apakah password dan verifikasi password cocok
            if (password !== verifyPassword) {
                // Menampilkan pesan error jika tidak cocok
                document.getElementById('error-message').style.display = 'block';
            } else {
                // Menyembunyikan pesan error jika cocok
                document.getElementById('error-message').style.display = 'none';

                // Proses form dapat dilakukan di sini, seperti mengirim data ke server
                alert('Registrasi berhasil!');
            }
        }
    </script>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

</body>
</html>
