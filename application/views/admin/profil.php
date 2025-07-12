<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Profil Admin</h1>
    <?php if ($this->session->flashdata('success')): ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <?= $this->session->flashdata('success'); ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Tutup">
        <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <?php endif; ?>
    <form method="post" action="<?= base_url('admin/update_profil') ?>">
        <div class="form-group">
            <label>Nama</label>
            <input type="text" name="nama" class="form-control" value="<?= $admin->nama ?>">
        </div>

        <div class="form-group">
            <label>Email</label>
            <input type="email" name="email" class="form-control" value="<?= $admin->email ?>">
        </div>

        <div class="form-group">
            <label>Telepon</label>
            <input type="text" name="telepon" class="form-control" value="<?= $admin->telepon ?>">
        </div>

        <button type="submit" class="btn btn-primary me-2">
            <b class="fas fa-save"></b> Simpan
        </button>
    </form>
    <br>
        <div class="d-flex justify-content-start mb-3">
            <a href="<?= base_url('admin/dashboard') ?>" class="btn btn-secondary">
                <b></b>Kembali
            </a>
        </div>
</div>
