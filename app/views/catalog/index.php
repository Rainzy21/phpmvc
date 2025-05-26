<main>
    <div class="catalog-container">
        <div class="catalog-heading">
            <h1>Petualangan menarik berawal dari konsol yang berkualitas!</h1>
            <p>Cek ketersediaan – stok bisa berubah kapan saja.</p>
        </div>
        <section class="catalog-products">
            <?php if (isset($consoles) && is_array($consoles) && count($consoles) > 0): ?>
                <?php foreach ($consoles as $console): ?>
                    <div class="catalog-card">
                        <?php if (!empty($console['image'])): ?>
                            <img src="<?= BASE_URL . '/' . htmlspecialchars($console['image']) ?>" alt="<?= htmlspecialchars($console['name']) ?>" class="catalog-img" style="width:100%; max-width:220px; height:160px; object-fit:contain; margin:auto; display:block;" />
                        <?php else: ?>
                            <img src="<?= BASE_URL ?>/assets/img/no-image.png" alt="No Image" class="catalog-img" style="width:100%; max-width:220px; height:160px; object-fit:contain; margin:auto; display:block;" />
                        <?php endif; ?>
                        <h2 class="catalog-title"><?= htmlspecialchars($console['name']) ?></h2>
                        <p class="catalog-price">Rp<?= number_format($console['price_per_day'], 0, ',', '.') ?>/hari</p>
                        <?php if (isset($_SESSION['user_id'])): ?>
                            <?php if ($console['stock'] > 0): ?>
                                <span class="catalog-status available">Tersedia</span>
                            <?php else: ?>
                                <span class="catalog-status unavailable">Tidak Tersedia</span>
                            <?php endif; ?>
                        <?php endif; ?>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p style="text-align:center;">Tidak ada konsol tersedia.</p>
            <?php endif; ?>
        </section>
    </div>
</main>
