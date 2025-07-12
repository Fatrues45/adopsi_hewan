<div class="container my-5">
  <div class="row">
    <div class="col-md-5">
      <img src="<?= base_url('assets/upload/' . $hewan->foto) ?>" class="img-fluid rounded shadow-sm">
    </div>
    <div class="col-md-7">
      <h3><?= $hewan->nama ?></h3>
      <p><strong>Jenis:</strong> <?= $hewan->jenis ?></p>
      <p><strong>Ras:</strong> <?= $hewan->ras ?></p>
      <p><strong>Umur:</strong> <?= $hewan->umur ?></p>
      <p><strong>Gender:</strong> <?= ucfirst($hewan->gender) ?></p>
      <p><strong>Deskripsi:</strong><br><?= $hewan->deskripsi ?: '-' ?></p>
      <a href="<?= base_url('adopter/form_pengajuan/' . $hewan-> id_hewan) ?>" class="btn btn-primary">Ajukan Adopsi Sekarang</a>
      <br>
      <br>
      <a href="<?= isset($from) ? base_url('adopter/hewan/' . $from) : base_url('adopter/dashboard') ?>" class="btn btn-secondary">
          Kembali ke <?= isset($from) ? ucfirst($from) : 'Dashboard' ?>
      </a>
    </div>
  </div>
</div>