-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 10 Jul 2025 pada 07.29
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_adophewan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id_admin` varchar(11) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `telepon` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_admin`, `nama`, `email`, `password`, `foto`, `telepon`) VALUES
('ADM954', 'Admin', 'admsejati@gmail.com', 'bf8baa9838efebf3087d3e4ea81e6753', 'default_admin.jpg', '085175211446');

-- --------------------------------------------------------

--
-- Struktur dari tabel `adopsi`
--

CREATE TABLE `adopsi` (
  `id_adopsi` varchar(11) NOT NULL,
  `id_adopter` varchar(11) DEFAULT NULL,
  `id_hewan` varchar(11) NOT NULL,
  `tanggal_pengajuan` date DEFAULT NULL,
  `status_pengajuan` enum('diproses','disetujui','ditolak') DEFAULT NULL,
  `alasan` text DEFAULT NULL,
  `nama_pengaju` varchar(100) DEFAULT NULL,
  `usia` int(11) DEFAULT NULL,
  `pekerjaan` varchar(100) DEFAULT NULL,
  `penghasilan` varchar(10) DEFAULT NULL,
  `telepon` varchar(20) DEFAULT NULL,
  `alamat` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `adopsi`
--

INSERT INTO `adopsi` (`id_adopsi`, `id_adopter`, `id_hewan`, `tanggal_pengajuan`, `status_pengajuan`, `alasan`, `nama_pengaju`, `usia`, `pekerjaan`, `penghasilan`, `telepon`, `alamat`) VALUES
('ADP82825', 'ADP477', 'KC001', '2025-07-05', 'disetujui', 'Mau punya peliharaan', 'Paramayu', 22, 'Mahasiswa yang rajin dan pintar', '1-3jt', '0852396642393', 'JL. Sirnagalih KP.Kebon Cinangka, Sawangan Depok RT002 RW008');

-- --------------------------------------------------------

--
-- Struktur dari tabel `adopter`
--

CREATE TABLE `adopter` (
  `id_adopter` varchar(11) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `telepon` varchar(20) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `adopter`
--

INSERT INTO `adopter` (`id_adopter`, `nama`, `email`, `password`, `alamat`, `telepon`, `foto`) VALUES
('ADP291', 'Parama Ayu', 'ayusparama@example.com', 'f71dacf3c5933aabd43dbacd79a20ead', 'Jl. Desa Cinangka', '085773383423', 'default_adopter.jpg'),
('ADP477', 'Paramayu cantik', 'paramayu@gmail.com', 'bf8baa9838efebf3087d3e4ea81e6753', 'JL. Sirnagalih KP.Kebon Cinangka, Sawangan Depok RT002 RW008', '0851759984223', 'default_adopter.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `dokumentasi_donasi`
--

CREATE TABLE `dokumentasi_donasi` (
  `id_dokum` varchar(255) NOT NULL,
  `foto_donasi` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `deskripsi` text DEFAULT NULL,
  `judul_donasi` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `dokumentasi_donasi`
--

INSERT INTO `dokumentasi_donasi` (`id_dokum`, `foto_donasi`, `created_at`, `deskripsi`, `judul_donasi`) VALUES
('DKM686d360f0026c', 'assets/upload/donasi/vaksinasi_anjing.jpg', '2025-07-08 10:15:27', 'vaksinasi agar mencegah penyakit rabies kepada calon hewan yang ingin kita tambahkan ke shelter', 'vaksinasi anjing'),
('DKM686d3642e7190', 'assets/upload/donasi/donasi.jpg', '2025-07-08 10:16:18', 'donasi yang terkumpul kami gunakan untuk memberi makan kucing', 'Memberi Makanan Untuk Kucing Liar'),
('DKM686d3774d4348', 'assets/upload/donasi/tim_street_feeding.jpg', '2025-07-08 10:21:24', 'tim street feeding akan memberikan makanan untuk anjing dan kucing liar', 'Komunitas street feeding kami'),
('DKM686d37be3a43d', 'assets/upload/donasi/vaksinasi_kucing.jpg', '2025-07-08 10:22:38', 'vaksinasi untuk kucing yang akan kami rawat di shelter', 'vaksinasi kucing');

-- --------------------------------------------------------

--
-- Struktur dari tabel `donasi`
--

CREATE TABLE `donasi` (
  `id` int(11) NOT NULL,
  `id_donasi` varchar(50) DEFAULT NULL,
  `id_adopter` varchar(11) DEFAULT NULL,
  `nama_donatur` varchar(100) DEFAULT NULL,
  `jumlah` decimal(10,2) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `metode_pembayaran` varchar(100) DEFAULT NULL,
  `bukti_transfer` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `donasi`
--

INSERT INTO `donasi` (`id`, `id_donasi`, `id_adopter`, `nama_donatur`, `jumlah`, `tanggal`, `metode_pembayaran`, `bukti_transfer`) VALUES
(1, 'DNS00001', 'ADP291', 'Ayu Cantik', 2000000.00, '2025-07-05', 'transfer_bca', 'e0bccdc8554a52767390ab9ef3b6428a.png'),
(2, 'DNS00002', 'ADP291', 'Fathur', 2500000.00, '2025-07-05', 'transfer_bca', '426b889abafcc3db635241dd9c0bb970.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `hewan`
--

CREATE TABLE `hewan` (
  `id_hewan` varchar(11) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `jenis` varchar(255) DEFAULT NULL,
  `ras` varchar(100) DEFAULT NULL,
  `gender` enum('betina','jantan') DEFAULT NULL,
  `umur` varchar(50) DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  `status_adopsi` varchar(20) NOT NULL DEFAULT 'tersedia',
  `foto` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `hewan`
--

INSERT INTO `hewan` (`id_hewan`, `nama`, `jenis`, `ras`, `gender`, `umur`, `deskripsi`, `status_adopsi`, `foto`) VALUES
('AJG001', 'Popo', 'Anjing', 'Pomeranian', 'betina', '2 Tahun', 'Popo adalah anjing yang aktif dan sangat pintar', 'tersedia', 'd235f0e399fc895a7f84b7e378de27fb.jpg'),
('AJG004', 'Nanbaa', 'Anjing', 'Golden Retriever', 'jantan', '3 Tahun', 'instingnya bagus keren\r\n', 'tersedia', 'e8d8a8a915ebdef883de5043c90fd90d.jpg'),
('AJG005', 'Conosi', 'Anjing', 'ozarpat', 'jantan', '3 Tahun', 'lincah banget', 'tersedia', '0c383d60155337d58c26f2f5425620f0.jpg'),
('KC001', 'TOM', 'Kucing', 'Persia', 'jantan', '4 Tahun', 'Tom manja', 'diadopsi', '495d8f673c58af7d7c17c8a81d0df650.jpg'),
('KC002', 'Kuming', 'Kucing', 'Munchkin', 'betina', '5 Tahun', 'bisa lebih besar lagi', 'tersedia', 'b5857f5d65aafe469f4325ae4cd8cebf.jpg'),
('KC003', 'Angcoo', 'Kucing', 'Absysinian', 'jantan', '5 Tahun', 'Kucing langka', 'tersedia', '078986a963292d8b92e435d4b61e3f2b.jpg'),
('KC004', 'Poni', 'Kucing', 'Persia', 'jantan', '7 Bulan', 'Bandel tapi lucu', 'tersedia', '32394dfd4710473c3cd3f09b72a0467d.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kontak`
--

CREATE TABLE `kontak` (
  `id_kontak` varchar(11) NOT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `telepon` varchar(20) DEFAULT NULL,
  `deskripsi` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `kontak`
--

INSERT INTO `kontak` (`id_kontak`, `alamat`, `email`, `telepon`, `deskripsi`) VALUES
('KNT001', 'Gg. Al Hikmah 7', 'temansejati@gmail.com', '081234567890', 'https://maps.app.goo.gl/fqKnhYrp44jpsBnn8');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indeks untuk tabel `adopsi`
--
ALTER TABLE `adopsi`
  ADD PRIMARY KEY (`id_adopsi`),
  ADD KEY `id_adopter` (`id_adopter`),
  ADD KEY `adopsi_ibfk_2` (`id_hewan`);

--
-- Indeks untuk tabel `adopter`
--
ALTER TABLE `adopter`
  ADD PRIMARY KEY (`id_adopter`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indeks untuk tabel `dokumentasi_donasi`
--
ALTER TABLE `dokumentasi_donasi`
  ADD PRIMARY KEY (`id_dokum`);

--
-- Indeks untuk tabel `donasi`
--
ALTER TABLE `donasi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_adopter` (`id_adopter`);

--
-- Indeks untuk tabel `hewan`
--
ALTER TABLE `hewan`
  ADD PRIMARY KEY (`id_hewan`);

--
-- Indeks untuk tabel `kontak`
--
ALTER TABLE `kontak`
  ADD PRIMARY KEY (`id_kontak`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `donasi`
--
ALTER TABLE `donasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `adopsi`
--
ALTER TABLE `adopsi`
  ADD CONSTRAINT `adopsi_ibfk_1` FOREIGN KEY (`id_adopter`) REFERENCES `adopter` (`id_adopter`),
  ADD CONSTRAINT `adopsi_ibfk_2` FOREIGN KEY (`id_hewan`) REFERENCES `hewan` (`id_hewan`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `donasi`
--
ALTER TABLE `donasi`
  ADD CONSTRAINT `donasi_ibfk_1` FOREIGN KEY (`id_adopter`) REFERENCES `adopter` (`id_adopter`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
