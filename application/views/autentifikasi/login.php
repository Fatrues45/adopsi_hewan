<!DOCTYPE html>
<html>
<head>
  <title>Login Admin</title>
  <link href="<?= base_url('assets/vendor/fontawesome-free/css/all.min.css') ?>" rel="stylesheet">
  <link href="<?= base_url('assets/css/sb-admin-2.min.css') ?>" rel="stylesheet">
  <style>
    body {
      background: linear-gradient(to right, #4e73df, #224abe);
    }

    .auth-box {
      margin-top: 100px;
    }

    .form-control {
      padding-left: 2.5rem !important;
      font-size: 0.9rem;
    }

    .form-icon {
      position: absolute;
      left: 15px;
      top: 50%;
      transform: translateY(-50%);
      color: #aaa;
    }
  </style>
</head>
<body>

<div class="container auth-box">
  <div class="row justify-content-center">
    <div class="col-lg-5">
      <div class="card shadow-lg border-0 rounded-lg">
        <div class="card-body">
          <div class="text-center mb-4">
            <h4 class="text-gray-900">Login Akun</h4>
          </div>

          <form method="post" action="<?= base_url('autentifikasi/proses_login') ?>">
            <div class="form-group position-relative">
              <span class="form-icon"><i class="fas fa-envelope"></i></span>
              <input type="text" class="form-control" name="email" placeholder="Masukan email..." required>
            </div>

            <div class="form-group position-relative">
              <span class="form-icon"><i class="fas fa-lock"></i></span>
              <input type="password" class="form-control" name="password" placeholder="Masukan password..." required>
            </div>

            <button type="submit" class="btn btn-primary btn-block">Masuk</button>

            <div class="text-center mt-3">
              <a href="<?= base_url('autentifikasi/register_admin') ?>">Belum punya akun? Daftar sebagai admin</a>
            </div>

            <?php if (isset($_SESSION['login_error'])): ?>
              <div class="mt-2 text-danger text-center"><?= $_SESSION['login_error']; unset($_SESSION['login_error']); ?></div>
            <?php endif; ?>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

<script src="<?= base_url('assets/vendor/jquery/jquery.min.js') ?>"></script>
<script src="<?= base_url('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
</body>
</html>
