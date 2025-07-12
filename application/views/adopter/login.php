<?php $this->load->view('templates/header'); ?>

<div class="d-flex justify-content-center align-items-center" style="min-height: 100vh; background-color: #f5f5f5;">
  <div class="card shadow-sm p-4" style="max-width: 420px; width: 100%; border-radius: 16px;">
    <h4 class="mb-4 text-center">Masuk Adopter</h4>

    <?php if (isset($_SESSION['login_error'])): ?>
      <div class="alert alert-danger"><?= $_SESSION['login_error']; unset($_SESSION['login_error']); ?></div>
    <?php endif; ?>
    <?php if (isset($_SESSION['register_success'])): ?>
      <div class="alert alert-success"><?= $_SESSION['register_success']; unset($_SESSION['register_success']); ?></div>
    <?php endif; ?>

    <form method="post" action="<?= base_url('adopter/proses_login') ?>">
      <div class="mb-3">
        <label class="form-label">Email</label>
        <input type="email" name="email" class="form-control" placeholder="Masukkan email..." required>
      </div>

      <div class="mb-3">
        <label class="form-label">Password</label>
        <div class="input-group">
          <input type="password" name="password" id="password" class="form-control" placeholder="Masukan password..." required>
          <button class="btn btn-outline-secondary toggle-password" type="button">
            <i class="fas fa-eye"></i>
          </button>
        </div>
      </div>

      <button type="submit" class="btn btn-primary me-2 w-100">Masuk</button>
    </form>

    <p class="mt-3 text-center">Belum punya akun? <a href="<?= base_url('adopter/register') ?>">Daftar di sini</a></p>
  </div>
</div>

<?php $this->load->view('templates/footer'); ?>
