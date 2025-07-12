<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Data Donasi Masuk</h1>
        <div class="d-flex justify-content-end mb-3">
            <a href="<?= base_url('admin/cetak_pdf_donasi') ?>" class="btn btn-danger" target="_blank">
                <i class="fas fa-file-pdf"></i> Cetak PDF
            </a>
        </div>
    <div class="table-responsive"> 
        <table class="table table-bordered table-striped">
                <thead class="thead-dark">
                <tr>
                    <th>No</th>
                    <th>ID Donasi</th>
                    <th>Nama Adopter</th>
                    <th>Jumlah</th>
                    <th>Metode</th>
                    <th>Tanggal</th>
                    <th>Bukti Transfer</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($donasi)): ?>
                    <?php $no = 1; foreach ($donasi as $d): ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $d->id_donasi ?></td>
                            <td>
                                <?= !empty($d->nama_donatur) 
                                    ? htmlspecialchars($d->nama_donatur) 
                                    : (!empty($d->nama_adopter) 
                                        ? htmlspecialchars($d->nama_adopter) 
                                        : '<i>Anonim</i>') ?>
                            </td>
                            <td>Rp <?= number_format($d->jumlah, 0, ',', '.') ?></td>
                            <td><?= ucfirst(str_replace('_', ' ', $d->metode_pembayaran)) ?></td>
                            <td><?= date('d-m-Y', strtotime($d->tanggal)) ?></td>
                            <td>
                                <?php if ($d->bukti_transfer): ?>
                                    <a href="<?= base_url('assets/upload/bukti/' . $d->bukti_transfer) ?>" target="_blank">Lihat</a>
                                <?php else: ?>
                                    <span class="text-muted">-</span>
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="7" class="text-center text-muted">Tidak ada data donasi.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>