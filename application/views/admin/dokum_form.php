<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800"><?= isset($foto_donasi) ? 'Edit' : 'Tambah' ?> Foto Donasi</h1>

    <?php if($this->session->flashdata('error')): ?>
      <div class="alert alert-danger"><?= $this->session->flashdata('error') ?></div>
    <?php endif; ?>

    <form action="<?= isset($foto_donasi) ? site_url('dokum/edit/'.$foto_donasi->id_dokum) : site_url('dokum/tambah') ?>" method="post" enctype="multipart/form-data">

      <?php if(isset($foto_donasi)): ?>
        <div class="mb-3">
          <label>Foto Saat Ini:</label><br>
          <img src="<?= base_url($foto_donasi->foto_donasi) ?>" alt="Foto Lama" class="img-thumbnail" style="max-width: 250px;">
        </div>
      <?php endif; ?>

      <!-- Judul Foto -->
      <div class="mb-3">
        <label for="judul_donasi" class="form-label">Judul Foto</label>
        <input type="text" name="judul_donasi" id="judul_donasi" class="form-control" placeholder="Contoh: Donasi Makanan untuk Anjing" value="<?= isset($foto_donasi) ? htmlspecialchars($foto_donasi->judul_donasi) : '' ?>" required>
      </div>

      <!-- Upload Foto -->
      <div class="mb-3">
        <label for="foto" class="form-label" required>Upload Foto <?= isset($foto_donasi) ? '(kosongkan jika tidak ingin ganti)' : '' ?></label>
        <input type="file" name="foto" id="foto" class="form-control" <?= isset($foto_donasi) ? '' : 'required' ?>>
      </div>

      <!-- Deskripsi -->
      <div class="mb-3">
        <label for="deskripsi" class="form-label">Deskripsi</label>
        <textarea name="deskripsi" id="deskripsi" class="form-control" required><?= isset($foto_donasi) ? htmlspecialchars($foto_donasi->deskripsi) : '' ?></textarea>
      </div>

      <button type="submit" class="btn btn-primary me-2">
        <i class="fas fa-save"></i> Simpan
      </button>
      <a href="<?= site_url('dokum') ?>" class="btn btn-secondary">Batal</a>
    </form>
</div>
