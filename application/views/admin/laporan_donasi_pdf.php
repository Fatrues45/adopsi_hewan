<!DOCTYPE html>
<html>
<head>
    <title>Laporan Donasi Masuk</title>
    <style>
        body { font-family: sans-serif; font-size: 12px; }
        h2 { text-align: center; margin-bottom: 20px; }
        table { width: 100%; border-collapse: collapse; margin: 0 auto; }
        th, td { border: 1px solid #000; padding: 6px; text-align: left; }
        th { background-color: #f2f2f2; }
    </style>
</head>
<body>
    <h2>Laporan Donasi Masuk</h2>
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
                            <td><?= $d->id_donasi ?? '-' ?></td>
                            <td><?= $d->nama_donatur ?? $d->nama_adopter ?? '<i>Anonim</i>' ?></td>
                            <td>Rp <?= number_format($d->jumlah ?? 0, 0, ',', '.') ?></td>
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
</body>
</html>
