<?php if ($this->session->flashdata('success')): ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <?= $this->session->flashdata('success'); ?>
    </div>
<?php endif; ?>

<div class="container-fluid">
    <h3 class="mb-4">Pengajuan Adopsi Hewan</h3>
    <div class="d-flex justify-content-end mb-3">
        <a href="<?= base_url('admin/cetak_pdf_pengajuan') ?>" class="btn btn-danger" target="_blank">
            <i class="fas fa-file-pdf"></i> Cetak PDF
        </a>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered table-hover align-middle">
            <thead class="thead-light">
                <tr>
                    <th>ID</th>
                    <th>Nama Pengaju</th>
                    <th>Hewan</th>
                    <th>Jenis</th>
                    <th class="text-center">Usia</th>
                    <th>Pekerjaan</th>
                    <th class="text-end">Penghasilan</th>
                    <th>Telepon</th>
                    <th>Alamat</th>
                    <th>Alasan</th>
                    <th>Status</th>
                    <th>Tanggal</th>
                    <th>Aksi</th>
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
                    <td>
                        <?php if ($p->status_pengajuan == 'diproses'): ?>
                            <span class="badge rounded-pill bg-warning text-light">Diproses</span>
                        <?php elseif ($p->status_pengajuan == 'disetujui'): ?>
                            <span class="badge rounded-pill bg-success text-white">Disetujui</span>
                        <?php else: ?>
                            <span class="badge rounded-pill bg-danger">Ditolak</span>
                        <?php endif; ?>
                    </td>

                    <td><?= $p->tanggal_pengajuan ?></td>
                    <td class="text-nowrap">
                        <?php if ($p->status_pengajuan == 'diproses'): ?>
                            <a href="<?= base_url('admin/setujui/' . $p->id_adopsi) ?>" class="btn btn-success btn-sm">Setujui</a>
                            <a href="<?= base_url('admin/tolak/' . $p->id_adopsi) ?>" class="btn btn-danger btn-sm">Tolak</a>
                        <?php else: ?>
                            
                        <?php endif; ?>

                        <!-- Tombol Hapus dengan konfirmasi -->
                        <a href="<?= base_url('admin/hapus_pengajuan/' . $p->id_adopsi) ?>"
                        class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus data pengajuan?');">
                        <i class="fas fa-trash"></i>
                        </a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
