<?php $this->load->view('templates/adopter_header'); ?>

<div class="donation-form-container">
    <h2 class="donation-form-title">Form Donasi</h2>

    <?= isset($error_upload) ? '<div style="color:red;">'.$error_upload.'</div>' : '' ?>

    <form onsubmit="disableSubmit()" action="<?= base_url('donasi/kirim'); ?>" method="post" class="donation-form" enctype="multipart/form-data">
        <div class="form-group">
            <label for="nama">Nama</label>
            <input type="text" name="nama" id="nama" class="form-input" required>
        </div>

        <div class="form-group">
            <label for="nominal">Nominal Donasi (Rp)</label>
            <input type="number" name="nominal" id="nominal" class="form-input" required min="1000">
        </div>

        <div class="form-group">
            <label for="metode_pembayaran">Metode Pembayaran</label>
            <select name="metode_pembayaran" id="metode_pembayaran" class="form-input" required onchange="tampilkanRekening()">
                <option value="">-- Pilih Metode --</option>
                <option value="transfer_bca">Transfer BCA</option>
                <option value="transfer_bni">Transfer BNI</option>
                <option value="ewallet">E-Wallet</option>
            </select>
        </div>

        <div class="form-group" id="rekening-info" style="display: none;">
            <label>Rekening Tujuan</label>
            <div id="rekening-text" style="font-weight: bold; color: #444;"></div>
        </div>

        <div class="form-group">
            <label for="bukti_transfer">Upload Bukti Transfer (jpg/png)</label>
            <input type="file" name="bukti_transfer" id="bukti_transfer" class="form-input" accept="image/*" required>
        </div>

        <div class="form-buttons" style="display: flex; gap: 10px; justify-content: space-between; margin-top: 20px;">
            <button type="submit" class="btn btn-primary me-2">Kirim</button>
            <a href="<?= base_url('adopter/dashboard') ?>" class="btn btn-secondary">Batal</a>
        </div>

    </form>
</div>

<script>
function tampilkanRekening() {
    const metode = document.getElementById('metode_pembayaran').value;
    const rekeningDiv = document.getElementById('rekening-info');
    const rekeningText = document.getElementById('rekening-text');

    let isi = '';

    switch(metode) {
        case 'transfer_bca':
            isi = 'BCA 1234567890 a.n. Yayasan Teman Sejati';
            break;
        case 'transfer_bni':
            isi = 'BNI 0987654321 a.n. Yayasan Teman Sejati';
            break;
        case 'ewallet':
            isi = 'OVO/DANA/GoPay: 0812-3456-7890 a.n. Yayasan Teman Sejati';
            break;
        default:
            isi = '';
    }

    rekeningDiv.style.display = isi ? 'block' : 'none';
    rekeningText.textContent = isi;
}
</script>
<script>
function disableSubmit() {
    const btn = document.querySelector('button[type="submit"]');
    btn.disabled = true;
    btn.innerText = "Mengirim...";
}
</script>

<?php $this->load->view('templates/adopter_footer'); ?>
