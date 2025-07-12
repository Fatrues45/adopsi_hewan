<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>
    <?php if ($this->session->flashdata('success')): ?>
        <div class="alert alert-success"><?= $this->session->flashdata('success') ?></div>
    <?php endif; ?>
    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="<?= base_url('kontak/update') ?>" method="post">
                <input type="hidden" name="id_kontak" value="<?= $kontak->id_kontak ?>">
                <div class="form-group">
                    <label>Alamat</label>
                    <input type="text" name="alamat" class="form-control" value="<?= $kontak->alamat ?>" required>
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control" value="<?= $kontak->email ?>" required>
                </div>
                <div class="form-group">
                    <label>Telepon</label>
                    <input type="text" name="telepon" class="form-control" value="<?= $kontak->telepon ?>" required>
                </div>
                <div class="form-group">
                    <label>Deskripsi</label>
                    <textarea name="deskripsi" class="form-control" rows="4"><?= $kontak->deskripsi ?></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                <a href="<?= base_url('kontak') ?>" class="btn btn-secondary">Kembali</a>
            </form>
        </div>
    </div>
</div>