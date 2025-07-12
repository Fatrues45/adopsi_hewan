<div class="container-fluid">
        <!-- Judul Halaman -->
        <h1 class="h3 mb-4 text-dark-800">Data Hewan</h1>
            <div class="d-flex justify-content-end mb-3">
                <a href="<?= base_url('hewan/tambah') ?>" class="btn btn-primary">
                    <b class="fas fa-plus"></b> Tambah data hewan
                </a>
            </div>
            <div class="d-flex justify-content-end mb-3">
                <a href="<?= base_url('hewan/cetak_pdf') ?>" class="btn btn-danger" target="_blank">
                    <i class="fas fa-file-pdf"></i> Cetak PDF
                </a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                        <thead class="thead-light">
                            <tr>
                                <th class="text-center">ID</th>
                                <th class="text-center">Nama</th>
                                <th class="text-center">Jenis</th>
                                <th class="text-center">Ras</th>
                                <th class="text-center">Gender</th>
                                <th class="text-center">Umur</th>
                                <th class="text-center">Status</th>
                                <th class="text-center">Foto</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($hewan as $h): ?>
                            <tr>
                                <td><?= $h->id_hewan ?></td>
                                <td><?= $h->nama ?></td>
                                <td><?= $h->jenis ?></td>
                                <td><?= $h->ras ?></td>
                                <td><?= ucfirst($h->gender) ?></td>
                                <td><?= $h->umur ?></td>
                                <td><?= ucfirst($h->status_adopsi) ?></td>
                                <td>
                                    <?php if ($h->foto): ?>
                                        <img src="<?= base_url('assets/upload/' . $h->foto) ?>" 
                                            width="60" 
                                            class="img-thumbnail" 
                                            style="cursor:pointer"
                                            data-toggle="modal" 
                                            data-target="#modalFoto<?= $h->id_hewan ?>">
                                            
                                        <!-- Modal Preview Gambar -->
                                        <div class="modal fade" id="modalFoto<?= $h->id_hewan ?>" tabindex="-1" role="dialog" aria-labelledby="modalLabel<?= $h->id_hewan ?>" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                            <div class="modal-body text-center">
                                                <img src="<?= base_url('assets/upload/' . $h->foto) ?>" class="img-fluid">
                                            </div>
                                            </div>
                                        </div>
                                        </div>
                                    <?php else: ?>
                                        <span class="text-muted">-</span>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <a href="<?= base_url('hewan/edit/' . $h->id_hewan) ?>" class="btn btn-sm btn-warning">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <a href="<?= base_url('hewan/hapus/' . $h->id_hewan) ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus?')">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
</div>