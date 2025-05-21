<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $data['title']; ?></title>
    <link rel="stylesheet" href="<?= BASE_URL; ?>/css/adminstyle.css">
</head>
<body>
    <div class="container">
        <!-- Sidebar -->
        <div class="sidebar">
            <div class="logo">Admin Bray</div>
            <ul class="nav-menu">
                <li class="nav-item">
                    <a href="<?= BASE_URL; ?>/Admin/Dashboard" class="nav-link active">
                        <i class="fas fa-home"></i> Dashboard
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= BASE_URL; ?>/Admin/Users" class="nav-link">
                        <i class="fas fa-users"></i> Users
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= BASE_URL; ?>/Admin/Dashboard" class="nav-link">
                        <i class="fas fa-box"></i> Products
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="fas fa-chart-bar"></i> Transactions
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= BASE_URL; ?>/Admin/Dashboard" class="nav-link">
                        <i class="fas fa-cog"></i> Settings
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= BASE_URL; ?>/Admin/Dashboard" class="nav-link">
                        <i class="fas fa-cog"></i> Profile
                    </a>
                </li>
            </ul>
        </div>