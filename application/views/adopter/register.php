<?php $this->load->view('templates/header'); ?>

<div class="d-flex justify-content-center align-items-center" style="min-height: 100vh; background-color: #f5f5f5;">
  <div class="card shadow-sm p-4" style="max-width: 500px; width: 100%; border-radius: 16px;">
    <h4 class="mb-4 text-center">Daftar Akun Adopter</h4>

    <?php if (isset($_SESSION['register_error'])): ?>
      <div class="alert alert-danger"><?= $_SESSION['register_error']; unset($_SESSION['register_error']); ?></div>
    <?php endif; ?>

    <form method="post" action="<?= base_url('adopter/proses_register') ?>">
      <div class="mb-3">
        <label class="form-label">Nama Lengkap</label>
        <input type="text" name="nama" class="form-control" required>
      </div>
      <div class="mb-3">
        <label class="form-label">Email</label>
        <input type="email" name="email" class="form-control" required>
      </div>
      <div class="mb-3">
        <label class="form-label">Password</label>
        <div class="input-group">
          <input type="password" name="password" id="password" class="form-control" required>
          <button class="btn btn-outline-secondary toggle-password" type="button">
            <i class="fas fa-eye"></i>
          </button>
        </div>
      </div>
      <div class="mb-3">
        <label class="form-label">Alamat</label>
        <textarea name="alamat" class="form-control" required></textarea>
      </div>
      <div class="mb-3">
        <label class="form-label">Telepon</label>
        <input type="text" name="telepon" class="form-control" required>
      </div>
      <button type="submit" class="btn btn-primary me-2">Daftar</button>
    </form>

    <p class="mt-3 text-center">Sudah punya akun? <a href="<?= base_url('adopter/login') ?>">Masuk di sini</a></p>
  </div>
</div>

<?php $this->load->view('templates/footer'); ?>
