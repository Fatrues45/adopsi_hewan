<!-- Mulai Container Fluid -->
<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800"><?= isset($hewan) ? 'Edit' : 'Tambah' ?> Data Hewan</h1>

    <form action="<?= isset($hewan) ? base_url('hewan/update/'.$hewan->id_hewan) : base_url('hewan/simpan') ?>" method="post" enctype="multipart/form-data">
        
        <div class="form-group">
            <label>ID Hewan</label>
            <input type="text" 
                class="form-control" 
                value="<?= isset($hewan->id_hewan) ? $hewan->id_hewan : 'Akan di-generate otomatis' ?>" 
                readonly>
        </div>

        <div class="form-group">
            <label>Nama Hewan</label>
            <input type="text" name="nama" class="form-control" value="<?= @$hewan->nama ?>" required>
        </div>

        <div class="form-group">
            <label>Jenis</label>
            <select name="jenis" class="form-control" required>
                <option value="">-- Pilih Jenis --</option>
                <option value="Kucing" <?= (@$hewan->jenis == 'Kucing') ? 'selected' : '' ?>>Kucing</option>
                <option value="Anjing" <?= (@$hewan->jenis == 'Anjing') ? 'selected' : '' ?>>Anjing</option>
                <option value="Lainnya" <?= (@$hewan->jenis == 'Lainnya') ? 'selected' : '' ?>>Lainnya</option>
            </select>
        </div>

        <div class="form-group">
            <label>Ras</label>
            <input type="text" name="ras" class="form-control" value="<?= @$hewan->ras ?>">
        </div>

        <div class="form-group">
            <label>Gender</label><br>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="gender" id="jantan" value="jantan" required <?= (@$hewan->gender == 'jantan') ? 'checked' : '' ?>>
                <label class="form-check-label" for="jantan">Jantan</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="gender" id="betina" value="betina" required <?= (@$hewan->gender == 'betina') ? 'checked' : '' ?>>
                <label class="form-check-label" for="betina">Betina</label>
            </div>
        </div>

        <div class="form-group">
            <label>Umur</label>
            <input type="text" name="umur" class="form-control" value="<?= @$hewan->umur ?>" required>
        </div>

        <div class="form-group">
            <label for="deskripsi">Deskripsi</label>
            <textarea 
                name="deskripsi" 
                id="deskripsi" 
                class="form-control" 
                oninput="autoResize(this)" 
                style="overflow:hidden; resize:none;" 
                required><?= @$hewan->deskripsi ?></textarea>
        </div>

        <div class="form-group">
            <label>Foto</label>
            <input type="file" name="foto" class="form-control" <?= isset($hewan) ? '' : 'required' ?>>
            <?php if (!empty($hewan->foto) && file_exists('./assets/upload/'.$hewan->foto)): ?>
                <img src="<?= base_url('assets/upload/'.$hewan->foto) ?>" width="100" class="mt-2" data-toggle="modal" data-target="#fotoModal">
            <?php endif; ?>
        </div>

        <div class="form-group mt-4">
            <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Simpan</button>
            <a href="<?= base_url('hewan') ?>" class="btn btn-secondary">Kembali</a>
        </div>

        <!-- Modal -->
        <?php if (!empty($hewan->foto)): ?>
        <div class="modal fade" id="fotoModal" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-body text-center">
                        <img src="<?= base_url('assets/upload/'.$hewan->foto) ?>" class="img-fluid">
                    </div>
                </div>
            </div>
        </div>
        <?php endif; ?>
    </form>
</div>