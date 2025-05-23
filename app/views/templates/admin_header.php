<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title><?= $data['title']; ?></title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
  <link rel="stylesheet" href="<?= BASE_URL; ?>/css/adminstyle.css">
</head>
<body>
  <aside class="sidebar" id="sidebar">
    <div class="sidebar-header">ADMIN</div>
    <nav class="sidebar-menu">
      <a href="<?= BASE_URL; ?>/Admin/Dashboard" class="active"><i class="fas fa-home"></i><span>Dashboard</span></a>
      <a href="<?= BASE_URL; ?>/Admin/Console"><i class="fas fa-gamepad"></i><span>Konsol</span></a>
      <a href="#"><i class="fas fa-money-bill-wave"></i><span>Transaksi</span></a>
      <a href="#"><i class="fas fa-users"></i><span>Pengguna</span></a>
      <a href="#"><i class="fas fa-user"></i><span>Profil</span></a>
    </nav>
  </aside>
  <div class="main-content" id="mainContent">
    <header class="topbar">
      <div class="menu-toggle" id="menuToggle" title="Toggle Menu">
        <i class="fas fa-bars"></i>
      </div>
      <div class="topbar-right">
        <div class="notifications" title="Notifications">
          <i class="fas fa-bell"></i>
          <div class="notification-badge">3</div>
        </div>
        <div class="profile-pic" title="User  Profile"></div>
      </div>
    </header>
    <main>