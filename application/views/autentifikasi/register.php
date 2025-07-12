<!DOCTYPE html>
<html>
<head>
  <title>Daftar Admin</title>
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
            <h4 class="text-gray-900">Buat Akun Admin</h4>
          </div>

          <form method="post" action="<?= base_url('autentifikasi/proses_register_admin') ?>">

            <div class="form-group position-relative">
              <span class="form-icon"><i class="fas fa-user"></i></span>
              <input type="text" name="nama" class="form-control" placeholder="Nama" required>
            </div>

            <div class="form-group position-relative">
              <span class="form-icon"><i class="fas fa-envelope"></i></span>
              <input type="email" name="email" class="form-control" placeholder="Email" required>
            </div>

            <div class="form-group position-relative">
              <span class="form-icon"><i class="fas fa-lock"></i></span>
              <input type="password" name="password" class="form-control" placeholder="Password" required>
            </div>

            <div class="form-group position-relative">
              <span class="form-icon"><i class="fas fa-phone"></i></span>
              <input type="text" name="telepon" class="form-control" placeholder="Telepon" required>
            </div>

            <button type="submit" class="btn btn-primary btn-block">Daftar</button>

            <div class="text-center mt-3">
              <a href="<?= base_url('autentifikasi/login') ?>">Sudah punya akun? masuk</a>
            </div>

            <?php if (isset($_SESSION['register_error'])): ?>
              <div class="mt-2 text-danger text-center"><?= $_SESSION['register_error']; unset($_SESSION['register_error']); ?></div>
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
