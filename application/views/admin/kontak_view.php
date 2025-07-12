<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>

    <?php if ($this->session->flashdata('success')): ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?= $this->session->flashdata('success') ?>
            <button type="button" class="close" data-dismiss="alert">&times;</button>
        </div>
    <?php endif; ?>

    <div class="card shadow border-0 mb-4">
        <div class="card-body">
            <h5 class="text-primary">Alamat</h5>
            <p><?= nl2br(htmlspecialchars($kontak->alamat)) ?></p>

            <h5 class="text-primary">Email</h5>
            <p><a href="mailto:<?= $kontak->email ?>"><?= $kontak->email ?></a></p>

            <h5 class="text-primary">Telepon</h5>
            <p><a href="tel:<?= $kontak->telepon ?>"><?= $kontak->telepon ?></a></p>

            <?php if (!empty($kontak->deskripsi)): ?>
                <h5 class="text-primary">Deskripsi</h5>
                <p><?= nl2br(htmlspecialchars($kontak->deskripsi)) ?></p>
            <?php endif; ?>

            <div class="mt-4">
                        <iframe 
                            src="https://www.google.com/maps?q=<?= urlencode($kontak->alamat) ?>&output=embed" 
                            width="100%" 
                            height="300" 
                            style="border:0;" 
                            allowfullscreen="" 
                            loading="lazy">
                        </iframe>
                    </div>

            <a href="<?= base_url('kontak/edit') ?>" class="btn btn-warning mt-3">
                <i class="fas fa-edit"></i> Edit Data
            </a>
        </div>
    </div>
</div>