<div class="container mt-5">
    <h2 class="text-center">Daftar <?= $jenis ?> Tersedia Diadopsi</h2>
    <div class="row justify-content-center mt-4">
        <?php foreach ($hewan as $h): ?>
            <div class="col-md-4 mb-4">
                <div class="card h-100 shadow-sm">
                    <img src="<?= base_url('assets/upload/' . $h->foto); ?>" class="card-img-top" alt="<?= $h->nama ?>">
                    <div class="card-body text-center">
                        <h5 class="card-title"><?= $h->nama ?></h5>
                        <p class="card-text"><?= $h->ras ?> - <?= $h->umur ?> </p>
                        <a href="<?= base_url('adopter/detail_hewan/' . $h->id_hewan . '?from=' . strtolower($jenis)); ?>" class="btn btn-primary">Lihat Detail</a>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
            <div class="d-flex justify-content-center mb-3">
                <a href="<?= base_url('adopter/dashboard') ?>" class="btn btn-secondary">
                    <i></i>Kembali
                </a>
            </div>
    </div>
</div>
