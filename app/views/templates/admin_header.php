<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title><?= $data['title']; ?></title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" />
  <link rel="stylesheet" href="<?= BASE_URL; ?>/css/adminstyle.css">
</head>
<body>
  <aside class="sidebar" id="sidebar">
    <div class="sidebar-header">
      <i class="fas fa-user-shield"></i> <span class="sidebar-title">ADMIN</span>
    </div>
    <nav class="sidebar-menu">
      <a href="<?= BASE_URL; ?>/Admin/Dashboard" class="<?= ($data['active_menu'] ?? '') === 'dashboard' ? 'active' : '' ?>"><i class="fas fa-home"></i><span>Dashboard</span></a>
      <a href="<?= BASE_URL; ?>/Admin/Console" class="<?= ($data['active_menu'] ?? '') === 'console' ? 'active' : '' ?>"><i class="fas fa-gamepad"></i><span>Konsol</span></a>
      <a href="<?= BASE_URL; ?>/Admin/Transactions" class="<?= ($data['active_menu'] ?? '') === 'transactions' ? 'active' : '' ?>"><i class="fas fa-money-bill-wave"></i><span>Transaksi</span></a>
      <a href="<?= BASE_URL; ?>/Admin/Users" class="<?= ($data['active_menu'] ?? '') === 'users' ? 'active' : '' ?>"><i class="fas fa-users"></i><span>Pengguna</span></a>
      <a href="<?= BASE_URL; ?>/auth/logout" onclick="return confirm('Yakin ingin logout?')" class="<?= ($data['active_menu'] ?? '') === 'profile' ? 'active' : '' ?>"><i class="fa-solid fa-right-from-bracket"></i><span>Keluar</span></a>
    </nav>
  </aside>
  <div class="main-content" id="mainContent">
    <header class="topbar">
      <div class="menu-toggle" id="menuToggle" title="Toggle Menu">
        <i class="fas fa-bars"></i>
      </div>
      <div class="topbar-right">
        <div class="profile-pic" title="User Profile"></div>
      </div>
    </header>
    <main>