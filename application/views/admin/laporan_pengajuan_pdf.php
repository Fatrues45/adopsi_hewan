<!DOCTYPE html>
<html>
<head>
    <title>Laporan Pengajuan Adopsi Hewan</title>
    <style>
        body { font-family: sans-serif; font-size: 12px; }
        h2 { text-align: center; margin-bottom: 20px; }
        table { width: 100%; border-collapse: collapse; margin: 0 auto; }
        th, td { border: 1px solid #000; padding: 6px; text-align: left; }
        th { background-color: #f2f2f2; }
    </style>
</head>
<body>
    <h2>Laporan Pengajuan Adopsi Hewan</h2>
    <table>
        <thead>
            <tr>
                <th class="text-center">ID</th>
                <th class="text-center">Nama Pengaju</th>
                <th class="text-center">Hewan</th>
                <th class="text-center">Jenis</th>
                <th class="text-center">Usia</th>
                <th class="text-center">Pekerjaan</th>
                <th class="text-center">Penghasilan</th>
                <th class="text-center">Telepon</th>
                <th class="text-center">Alamat</th>
                <th class="text-center">Alasan</th>
                <th class="text-center">Status</th>
                <th class="text-center">Tanggal</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($pengajuan as $p): ?>
            <tr>
                <td><?= $p->id_adopsi ?></td>
                <td><?= $p->nama_pengaju ?></td>
                <td><?= $p->nama_hewan ?></td>
                <td><?= $p->jenis ?></td>
                <td><?= $p->usia ?>th</td>
                <td><?= $p->pekerjaan ?></td>
                <td><?= $p->penghasilan ?></td>
                <td><?= $p->telepon ?></td>
                <td><?= $p->alamat ?></td>
                <td><?= $p->alasan ?></td>
                <td><?= ucfirst($p->status_pengajuan) ?></td>
                <td><?= $p->tanggal_pengajuan ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
