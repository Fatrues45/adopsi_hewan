<!DOCTYPE html>
<html>
<head>
    <title>Laporan Data Hewan</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            font-size: 12px;
        }
        th, td {
            border: 1px solid #444;
            padding: 6px;
            text-align: left;
        }
        h2 { text-align: center; }
    </style>
</head>
<body>
    <h2>Laporan Data Hewan</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Jenis</th>
                <th>Ras</th>
                <th>Gender</th>
                <th>Umur</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($hewan as $h): ?>
            <tr>
                <td><?= $h->id_hewan ?></td>
                <td><?= $h->nama ?></td>
                <td><?= $h->jenis ?></td>
                <td><?= $h->ras ?></td>
                <td><?= $h->gender ?></td>
                <td><?= $h->umur ?></td>
                <td><?= $h->status_adopsi ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>