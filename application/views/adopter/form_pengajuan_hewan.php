<div class="container mt-5">
    <div class="card shadow">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">Form Pengajuan Adopsi</h4>
        </div>
        <div class="card-body">

            <form action="<?= base_url('adopter/simpan_pengajuan_hewan') ?>" method="post">
                <input type="hidden" name="id_hewan" value="<?= $hewan->id_hewan ?>">

                    <div class="row">
                    <!-- Info Hewan -->
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Hewan yang Dipilih</label>
                        <input type="text" class="form-control" value="<?= $hewan->nama ?> (<?= $hewan->jenis ?>)" readonly>
                    </div>
                    </div>

                        <div class="row">
                            <!-- Nama Adopter -->
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Nama Lengkap Anda</label>
                            <input type="text" name="nama" class="form-control" required>
                        </div>
                    </div>
                    <div class="row">
                    <!-- Usia -->
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Usia Anda</label>
                        <input type="number" name="usia" class="form-control" placeholder="Minimal 21 tahun" required min="21">
                    </div>
                    </div>


                <div class="row">
                    <!-- Pekerjaan -->
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Pekerjaan</label>
                        <input type="text" name="pekerjaan" class="form-control" required>
                    </div>

                    <!-- Penghasilan -->
                    <div class="mb-3">
                        <label class="form-label">Penghasilan Bulanan</label>
                        <select name="penghasilan" class="form-select" required>
                            <option value="" selected disabled>-- Pilih Rentang Penghasilan --</option>
                            <option value="<1jt">&lt; 1 juta</option>
                            <option value="1-3jt">1 - 3 juta</option>
                            <option value="3-5jt">3 - 5 juta</option>
                            <option value=">5jt">&gt; 5 juta</option>
                        </select>
                    </div>
                </div>

                <!-- Alamat -->
                <div class="mb-3">
                    <label class="form-label">Alamat</label>
                    <textarea name="alamat" class="form-control" placeholder="" required></textarea>
                </div>

                <!-- Telepon -->
                <div class="mb-3">
                    <label class="form-label">Nomor Telepon</label>
                    <input type="text" name="telepon" class="form-control" placeholder="" required>
                </div>

                <!-- Alasan -->
                <div class="mb-3">
                    <label class="form-label">Alasan Mengadopsi</label>
                    <textarea name="alasan" class="form-control" placeholder="Mengapa Anda ingin mengadopsi hewan ini?" required></textarea>
                </div>
                <div class="text-between">
                    <button type="submit" class="btn btn-primary me-2">Kirim Pengajuan</button>
                    <a href="<?= isset($from) ? base_url('adopter/hewan/' . $from) : base_url('adopter/hewan') ?>" class="btn btn-secondary">
                    Kembali ke <?= isset($from) ? ucfirst($from) : '' ?>
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
