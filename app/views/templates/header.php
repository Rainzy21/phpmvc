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
                <li><a href="<?= BASE_URL; ?>/Home" class="active">Beranda</a></li>
                <li><a href="#">Katalog</a></li>
                <li><a href="#">Cara Sewa</a></li>
                <li><a href="#">Tentang Kami</a></li>
                <li><a href="#"></a></li>
            </ul>
            
            <div class="auth-buttons">
                <a href="<?= BASE_URL; ?>/Auth" class="login">Login</a>
                <a href="#" class="signup">Daftar</a>
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
                <li><a href="<?= BASE_URL; ?>/Home" class="active">Beranda</a></li>
                <li><a href="#">Katalog</a></li>
                <li><a href="#">Cara Sewa</a></li>
                <li><a href="#">Tentang Kami</a></li>
                <li><a href="#">Kontak</a></li>
            </ul>
            <div class="auth-buttons">
                <a href="#" class="login">Login</a>
                <a href="#" class="signup">Daftar</a>
            </div>
        </div>
    </nav>
    </header>