<!-- Flash Message yang Lebih Menarik -->
<?php if ($this->session->flashdata('success')): ?>
    <div class="alert alert-success alert-dismissible fade show animate__animated animate__fadeInDown" role="alert">
        <div class="d-flex align-items-center">
            <i class="fas fa-paw me-2"></i>
            <div><?= $this->session->flashdata('success') ?></div>
            <button type="button" class="btn-close ms-auto" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    </div>
<?php endif; ?>

<?php if ($this->session->flashdata('pengajuan_sukses')): ?>
    <div class="alert alert-success alert-dismissible fade show animate__animated animate__fadeInDown" role="alert">
        <div class="d-flex align-items-center">
            <i class="fas fa-heart me-2"></i>
            <div><?= $this->session->flashdata('pengajuan_sukses') ?></div>
            <button type="button" class="btn-close ms-auto" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    </div>
<?php endif; ?>

<div class="dashboard-container">
    <!-- Bagian sambutan -->
    <div class="floating-pets">
        <img src="<?= base_url('assets/upload/paw.png') ?>" class="floating-paw paw-1">
        <img src="<?= base_url('assets/upload/paw.png') ?>" class="floating-paw paw-2">
    </div>
    <div class="welcome-section">
        <h1>Temukan Sahabat Sejatimu Hari Ini</h1>
        <p>Berikan mereka rumah penuh kasih.</p>
    </div>

    <!-- Grid statistik atau fitur -->
    <div class="card-container">

        <!-- Kucing Tersedia -->
        <a href="<?= $this->session->userdata('id_adopter') ? site_url('adopter/hewan/kucing') : site_url('adopter/login'); ?>" class="text-decoration-none text-dark">
            <div class="dashboard-card">
                <img src="<?= base_url('assets/upload/' . ($kucing->foto ?? 'kucing.jpg')) ?>" alt="Kucing" style="height:100px; object-fit:cover;">
                <h3>Kucing Tersedia</h3>
                <p><?= $jumlah_kucing ?> ekor kucing menunggu untuk diadopsi.</p>
            </div>
        </a>

        <!-- Anjing Tersedia -->
        <a href="<?= $this->session->userdata('id_adopter') ? site_url('adopter/hewan/anjing') : site_url('adopter/login'); ?>" class="text-decoration-none text-dark">
            <div class="dashboard-card">
                <img src="<?= base_url('assets/upload/' . ($anjing->foto ?? 'anjing.jpg')); ?>" alt="Anjing" style="height:100px; object-fit:cover;">
                <h3>Anjing Tersedia</h3>
                <p><?= $jumlah_anjing ?> ekor anjing menunggu untuk diadopsi.</p>
            </div>
        </a>

        <!-- Total Adopsi -->
        <div class="dashboard-card text-center d-flex flex-column justify-content-center align-items-cente">
            <h3>Total Adopsi</h3>
            <p><?= $jumlah_diadopsi ?> hewan telah berhasil diadopsi.</p>
        </div>

        <!-- Donasi Masuk -->
        <div class="dashboard-card text-center d-flex flex-column justify-content-center align-items-cente">
            <h3>Donasi Masuk</h3>
            <p>Rp <?= number_format($total_donasi, 0, ',', '.') ?> telah terkumpul untuk perawatan hewan.</p>
        </div>

    </div>

    <br><br><br>

    <div class="donation-doc-section">
        <h2 class="text-center">Tak bisa adopsi? Bantu mereka dengan berdonasi!</h2>
        <div class="card-container">
            <?php if (!empty($dokumentasi_donasi)): ?>
                <?php foreach ($dokumentasi_donasi as $donasi): ?>
                    <div class="dashboard-card">
                        <div style="aspect-ratio: 4/3; overflow: hidden;">
                            <img src="<?= base_url($donasi->foto_donasi); ?>" alt="<?= htmlspecialchars($donasi->judul_donasi ?? 'Dokumentasi Donasi'); ?>" style="width: 100%; height: 100%; object-fit: cover;">
                        </div>
                        <h3><?= !empty($donasi->judul_donasi) ? htmlspecialchars($donasi->judul_donasi) : 'Donasi'; ?></h3>
                        <p><?= !empty($donasi->deskripsi) ? htmlspecialchars($donasi->deskripsi) : 'Terima kasih atas donasinya.'; ?></p>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p class="text-center">Belum ada dokumentasi donasi.</p>
            <?php endif; ?>
        </div>
    </div>

        <!-- Tombol Donasi Sekarang -->
        <div style="text-align: center; margin-top: 20px;">
            <a href="<?= $this->session->userdata('id_adopter') ? site_url('donasi') : site_url('adopter/login'); ?>" class="btn-donate-now">Donasi Sekarang</a>
        </div>
    </div>
    <br>
    <br>
    <br> 
        <!-- Bagian Kontak -->
    <section class="hubungi-kami-section py-5">
    <div class="container">
        <h2 class="text-center mb-4 fw-bold text-dark">Hubungi Kami</h2>
        <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-sm border-0 p-4">
            <ul class="list-unstyled mb-0">
                <li class="mb-3">
                <h6 class="text-primary mb-1"><i class="fas fa-map-marker-alt me-2"></i> Alamat</h6>
                <p class="mb-0">Gg. Sirnagalih II Cinangka,Sawangan, Kota Depok. </p>
                </li>
                <li class="mb-3">
                <h6 class="text-primary mb-1"><i class="fas fa-envelope me-2"></i> Email</h6>
                <a href="mailto:temansejati@gmail.com">temansejati@gmail.com</a>
                </li>
                <li>
                <h6 class="text-primary mb-1"><i class="fas fa-phone me-2"></i> Telepon</h6>
                <a href="tel:081234567890">081234567890</a>
                </li>
            </ul>
            </div>
        </div>
        </div>
    </div>
    </section>


</div>


