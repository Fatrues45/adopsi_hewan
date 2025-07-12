<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title><?= isset($title) ? $title : 'Dashboard Adopter' ?></title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap & Icons -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

  <!-- Custom CSS -->
  <link rel="stylesheet" href="<?= base_url('assets/css/adopter-dashboard.css') ?>">
</head>

<body>
<div class="min-vh-100 d-flex flex-column"> <!-- Tambahkan wrapper utama -->

<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm sticky-top">
  <div class="container">
    <a class="navbar-brand fw-bold" href="<?= base_url('adopter/dashboard') ?>">
      <i class="fas fa-paw text-danger"></i> Teman Sejati
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarAdopter">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarAdopter">
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
  <li class="nav-item">
    <a class="nav-link" href="<?= base_url('adopter/dashboard') ?>">Beranda</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="<?= base_url('adopter/riwayat_pengajuan') ?>">Riwayat Adopsi</a>
  </li>
  <li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" href="#" id="dropdownAdopter" role="button" data-bs-toggle="dropdown" aria-expanded="false">
      <i class="fas fa-user-circle me-1"></i> <?= $_SESSION['nama_adopter'] ?? 'Akun' ?>
    </a>
    <ul class="dropdown-menu dropdown-menu-end shadow-sm" aria-labelledby="dropdownAdopter">
      <li><a class="dropdown-item" href="<?= base_url('adopter/profil') ?>"><i class="fas fa-user me-2 text-secondary"></i> Profil</a></li>
      <li><hr class="dropdown-divider"></li>
      <li><a class="dropdown-item text-danger" href="<?= base_url('adopter/logout') ?>"><i class="fas fa-sign-out-alt me-2"></i> Keluar</a></li>
    </ul>
  </li>
</ul>

    </div>
  </div>
</nav>

<!-- START PAGE CONTENT -->
<div class="container my-4 flex-grow-1">