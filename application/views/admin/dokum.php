<div class="container-fluid">
  <h1 class="h3 mb-4 text-gray-800">Dokumentasi Donasi</h1>
  
  <a href="<?= site_url('dokum/tambah') ?>" class="btn btn-primary mb-3">
    <i class="fas fa-plus"></i> Tambah Data
    </a>

  <?php if($this->session->flashdata('error')): ?>
    <div class="alert alert-danger"><?= $this->session->flashdata('error') ?></div>
  <?php endif; ?>

  <table class="table table-bordered table-striped">
    <thead class="table-dark">
      <tr>
        <th>No</th>
        <th>Foto</th>
        <th><strong>Judul</strong></th> <!-- ✅ Kolom baru -->
        <th>Deskripsi</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>
      <?php $no = 1; foreach($foto_donasi as $f): ?>
      <tr>
        <td><?= $no++ ?></td>
        <td><img src="<?= base_url($f->foto_donasi) ?>" alt="Foto Donasi" class="img-thumbnail" style="max-width: 150px;"></td>
        <td><?= !empty($f->judul_donasi) ? htmlspecialchars($f->judul_donasi) : '-' ?></td> <!-- ✅ Judul ditampilkan -->
        <td><?= !empty($f->deskripsi) ? nl2br(htmlspecialchars($f->deskripsi)) : '-' ?></td>
        <td>
          <a href="<?= site_url('dokum/edit/'.$f->id_dokum) ?>" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></a>
          <a href="<?= site_url('dokum/hapus/'.$f->id_dokum) ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin hapus?')"><i class="fas fa-trash"></i></a>
        </td>
      </tr>
      <?php endforeach; ?>

      <?php if(empty($foto_donasi)): ?>
      <tr>
        <td colspan="5" class="text-center">Belum ada foto donasi</td> <!-- ✅ Sesuaikan colspan jadi 5 -->
      </tr>
      <?php endif; ?>
    </tbody>
  </table>
</div>
