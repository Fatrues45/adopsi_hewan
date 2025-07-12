# 📃 Sistem Informasi Adopsi Hewan

Sistem ini merupakan aplikasi web berbasis CodeIgniter 3 untuk mempermudah proses adopsi hewan peliharaan secara online. Dikembangkan sebagai bagian dari proyek **Sertifikasi Kompetensi Skema Analis Program (BNSP)**.

## 🌟 Fitur Utama

* Register, Login, & Autentikasi Admin dan Adopter
* Dashboard statistik hewan (tersedia & diadopsi)
* CRUD data pengguna
* CRUD data hewan
* Manajemen data adopter dan donasi
* Tampilan UI menggunakan template SB Admin 2
* Tampilan UI adopter menggunakan bootstrap 4

## 🛠️ Teknologi yang Digunakan

* Xampp
* Visual Studio Code
* PHP 8.x.x
* CodeIgniter 3
* MySQL
* HTML, CSS, JavaScript
* SB Admin 2 (UI Template)
* Bootstrap 4 (UI Icon)

## 📂 Struktur Folder

```
adopsi_hewan/
├── application/          # Folder utama CodeIgniter (Controllers, Models, Views, config, dll)
│   ├── config/
│   ├── controllers/
│   ├── core/
│   ├── helpers/
│   ├── hooks/
│   ├── language/
│   ├── libraries/
│   ├── logs/
│   ├── models/
│   └── views/
├── assets/               # Folder tambahan untuk menyimpan resource statis
│   ├── css/
│   ├── js/
│   ├── img/
├── system/               # Core dari CodeIgniter (pada beberapa file di tambahkan #[\AllowDynamicProperties])
├── uploads/              # Folder untuk menyimpan file upload (berikan .gitignore)
├── .gitignore            # File untuk mengabaikan file yang tidak perlu di Git
├── composer.json         # (Jika menggunakan Composer)
├── .env                  # (Opsional) file env jika memakai konfigurasi environment
├── README.md             # Penjelasan singkat proyek
└── index.php             # Front controller utama

```

## ⚙️ Cara Menjalankan

1. Letakkan folder `adopsi_hewan` di direktori `htdocs/` (XAMPP)
2. Buat database `adopsi_hewan` dan import file SQL jika ada
3. Atur koneksi database di `application/config/database.php`
4. Jalankan di browser melalui: `http://localhost/adopsi_hewan`

## 📄 Log Perkembangan Proyek

### Minggu 1

* Setup CodeIgniter dan konfigurasi awal database
* Buat modul autentikasi admin (login/logout)

### Minggu 2

* Implementasi dashboard admin dan tampilan statistik
* CRUD data hewan dengan model `Hewan_model`

### Minggu 3

* Modul donasi dan data adopter
* Penambahan validasi & optimasi tampilan UI

### Minggu 4

* Finalisasi dokumentasi & persiapan sertifikasi

## 📝 Status

> ✅ Proyek siap digunakan untuk demonstrasi dan uji kompetensi Analis Program.

---

Silakan sesuaikan README ini jika kamu menambahkan fitur lain atau ingin menyertakan screenshoot dan link demo.
