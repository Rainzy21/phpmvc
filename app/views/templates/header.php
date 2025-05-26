<?php
$current = $_SERVER['REQUEST_URI'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $data['title']; ?></title>
    <link rel="stylesheet" href="<?= BASE_URL; ?>/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>
<body>
    <header>
     <nav>
        <div class="nav-container">
            <ul class="nav-links">
                <li><a href="<?= BASE_URL; ?>/Home" class="<?= ($data['active_menu'] ?? '') === 'home' ? 'active' : '' ?>">Beranda</a></li>
                <li><a href="<?= BASE_URL; ?>/Catalog" class="<?= ($data['active_menu'] ?? '') === 'catalog' ? 'active' : '' ?>">Katalog</a></li>
                <li><a href="<?= BASE_URL; ?>/Rent" class="<?= ($data['active_menu'] ?? '') === 'rent' ? 'active' : '' ?>">Cara Sewa</a></li>
                <li><a href="<?= BASE_URL; ?>/TentangKami" class="<?= ($data['active_menu'] ?? '') === 'tentangkami' ? 'active' : '' ?>">Tentang Kami</a></li>
            </ul>
            
            <div class="auth-buttons">
                <?php if (isset($_SESSION['user_id'])): ?>
                    <span class="username">
                        <i class="fas fa-user"></i>
                        <span class="halo-text">Halo,</span> 
                        <b class="user-name"><?= htmlspecialchars($_SESSION['user_name']); ?></b>
                    </span>
                    <a href="<?= BASE_URL; ?>/auth/logout" class="logout" onclick="return confirm('Yakin ingin logout?')" title="Keluar">
                        <i class="fas fa-sign-out-alt"></i>
                    </a>
                <?php else: ?>
                    <a href="<?= BASE_URL; ?>/auth/login" class="login" title="Masuk"><i class="fas fa-sign-in-alt"></i></a>
                    <a href="<?= BASE_URL; ?>/auth/register" class="signup" title="Daftar"><i class="fas fa-user-plus"></i> </a>
                <?php endif; ?>
            </div>

            <button class="hamburger">
                <span></span>
                <span></span>
                <span></span>
            </button>
        </div>

        <!-- Mobile Menu -->
        <div class="mobile-menu">
            <ul class="nav-links">
                <li><a href="<?= BASE_URL; ?>/Home" class="<?= ($data['active_menu'] ?? '') === 'home' ? 'active' : '' ?>">Beranda</a></li>
                <li><a href="<?= BASE_URL; ?>/Catalog" class="<?= ($data['active_menu'] ?? '') === 'catalog' ? 'active' : '' ?>">Katalog</a></li>
                <li><a href="<?= BASE_URL; ?>/Rent" class="<?= ($data['active_menu'] ?? '') === 'carasewa' ? 'active' : '' ?>">Cara Sewa</a></li>
                <li><a href="<?= BASE_URL; ?>/TentangKami" class="<?= ($data['active_menu'] ?? '') === 'tentangkami' ? 'active' : '' ?>">Tentang Kami</a></li>
                <li><a href="#">Kontak</a></li>
            </ul>
            <div class="auth-buttons">
                <?php if (isset($_SESSION['user_id'])): ?>
                    <span class="username">
                        <i class="fas fa-user"></i>
                        <span class="halo-text">Halo,</span> 
                        <b class="user-name"><?= htmlspecialchars($_SESSION['user_name']); ?></b>
                    </span>
                    <a href="<?= BASE_URL; ?>/auth/logout" class="logout" onclick="return confirm('Yakin ingin logout?')" title="Keluar">
                        <i class="fas fa-sign-out-alt"></i>
                    </a>
                <?php else: ?>
                    <a href="<?= BASE_URL; ?>/auth/login" class="login" title="Masuk"><i class="fas fa-sign-in-alt"></i></a>
                    <a href="<?= BASE_URL; ?>/auth/register" class="signup" title="Daftar"><i class="fas fa-user-plus"></i></a>
                <?php endif; ?>
            </div>
        </div>
    </nav>
    </header>