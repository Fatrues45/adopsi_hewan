<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
        <div class="mb-3">
            <h4 class="mb-1">Selamat datang, <?= $_SESSION['nama_admin']; ?></h4>
        </div>
            <!-- Statistik Hewan -->
            <div class="row">
                <!-- Hewan Tersedia -->
                <div class="col-xl-6 col-md-6 mb-4">
                    <div class="card border-left-primary shadow h-100 py-2">
                        <div class="card-body">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Hewan Tersedia</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $tersedia ?></div>
                        </div>
                    </div>
                </div>

                <!-- Hewan Diadopsi -->
                <div class="col-xl-6 col-md-6 mb-4">
                    <div class="card border-left-success shadow h-100 py-2">
                        <div class="card-body">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Hewan Diadopsi</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $diadopsi ?></div>
                        </div>
                    </div>
                </div>
            </div>
</div>