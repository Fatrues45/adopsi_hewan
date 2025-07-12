<!DOCTYPE html>
<html>
<head>
    <title>Data Hewan</title>
    <style>
        body { font-family: sans-serif; }
        table { width: 100%; border-collapse: collapse; }
        th, td { border: 1px solid #000; padding: 5px; text-align: left; }
    </style>
</head>
<body>
    <h2>Data Hewan</h2>
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
