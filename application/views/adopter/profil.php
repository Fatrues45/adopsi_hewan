<?php if ($this->session->flashdata('success')): ?>
  <div class="alert alert-success alert-dismissible fade show" role="alert">
    <?= $this->session->flashdata('success'); ?>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
<?php endif; ?>

<div class="container my-5">
  <div class="card p-4 shadow-sm">
    <h4 class="mb-4 text-center">Profil Adopter</h4>
    <form method="post" action="<?= base_url('adopter/update_profil') ?>">
      <div class="mb-3">
        <label>Nama</label>
        <input type="text" name="nama" class="form-control" value="<?= $adopter->nama ?>" required>
      </div>
      <div class="mb-3">
        <label>Email</label>
        <input type="email" name="email" class="form-control" value="<?= $adopter->email ?>" required>
      </div>
      <div class="mb-3">
        <label>Alamat</label>
        <textarea name="alamat" class="form-control" required><?= $adopter->alamat ?></textarea>
      </div>
      <div class="mb-3">
        <label>Telepon</label>
        <input type="text" name="telepon" class="form-control" value="<?= $adopter->telepon ?>" required>
      </div>
      <div class="mb-3">
        <label>Password Baru (opsional)</label>
        <input type="password" name="password" class="form-control" placeholder="Kosongkan jika tidak diganti">
      </div>
      <div class="form-buttons" style="display: flex; gap: 10px; justify-content: space-between; margin-top: 20px;">
        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        <a href="<?= base_url('adopter/dashboard') ?>" class="btn-cancel">Batal</a>
      </div>
    </form>
  </div>
</div>
