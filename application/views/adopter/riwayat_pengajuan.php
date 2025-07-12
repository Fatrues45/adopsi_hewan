<div class="container mt-4">
    <h3 class="mb-4">Riwayat Pengajuan Adopsi</h3>

    <table class="table table-bordered table-hover">
        <thead class="table-light">
            <tr>
                <th>Hewan</th>
                <th>Jenis</th>
                <th>Tanggal Pengajuan</th>
                <th>Status</th>
                <th>Alasan</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($riwayat as $r): ?>
                <tr>
                    <td><?= $r->nama_hewan ?></td>
                    <td><?= $r->jenis ?></td>
                    <td><?= $r->tanggal_pengajuan ?></td>
                    <td>
                        <span class="badge bg-<?= 
                            $r->status_pengajuan == 'diproses' ? 'warning' :
                            ($r->status_pengajuan == 'disetujui' ? 'success' : 'danger') ?>">
                            <?= ucfirst($r->status_pengajuan) ?>
                        </span>
                        <?php if ($r->status_pengajuan == 'disetujui'): ?>
                            <div class="mt-1 text-success" style="font-size: 0.9em;">
                                <i class="fas fa-info-circle"></i> Silahkan datang ke shelter untuk mengambil hewan Anda.
                            </div>
                        <?php endif; ?>
                    </td>
                    <td><?= $r->alasan ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="form-buttons" style="display: flex; gap: 10px; justify-content: space-between; margin-top: 20px;">
        <a href="<?= base_url('adopter/dashboard') ?>" class="btn btn-secondary">Kembali</a>
    </div>
</div>
