<main>
    <div class="container">
        <section class="hero">
            <h1 style="color: var(--primary)">Sewa Konsol Game<br><span style="color: var(--primary)">Premium</span></h1>
            <p class="tagline">PS5, Xbox Series X, Nintendo Switch - Pilihan lengkap dengan kualitas terbaik</p>
            <a href="<?= BASE_URL; ?>/Catalog" class="cta-button">Jelajahi Katalog</a>
        </section>

        <section class="features">
            <div class="feature-card">
                <div class="feature-icon">🎮</div>
                <h3>100+ Konsol Tersedia</h3>
                <p>Pilihan berbagai generasi dan aksesori</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">🚚</div>
                <h3>Pengiriman Cepat</h3>
                <p>Gratis ongkir seluruh Indonesia</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">🔒</div>
                <h3>Garansi Aman</h3>
                <p>Dana kembali 100% jika ada masalah</p>
            </div>
        </section>

        <section class="advantages-section">
            <div class="section-title">
                <h2>Kenapa Memilih Kami?</h2>
                <p>Karena kita yang terbaik dari yang terbaik dan kita kerja tanpa rasa egois</p>
            </div>

            <div class="advantages-grid">
                <!-- Advantage 1 -->
                <div class="advantage-card">
                    <i class="fas fa-award advantage-icon"></i>
                    <h3>Pengalaman Kerja</h3>
                    <p>Tidak perlu diragukan lagi karena kami susah senang selalu bersama.</p>
                </div>

                <!-- Advantage 2 -->
                <div class="advantage-card">
                    <i class="fas fa-users advantage-icon"></i>
                    <h3>Cerita Klien</h3>
                    <p>Kami semua pandai berbaur karena kami orangnya asik.</p>
                </div>

                <!-- Advantage 3 -->
                <div class="advantage-card">
                    <i class="fas fa-lightbulb advantage-icon"></i>
                    <h3>Terobosan Kami</h3>
                    <p>Selain menyediakan jasa rental, kami juga menyediakan jasa curhat.</p>
                </div>

                <!-- Advantage 4 -->
                <div class="advantage-card">
                    <i class="fas fa-clock advantage-icon"></i>
                    <h3>Waktu Pengantaran</h3>
                    <p>Kami usahakan barang datang secepatnya karena kami nganggur.</p>
                </div>

                <!-- Advantage 5 -->
                <div class="advantage-card">
                    <i class="fas fa-hand-holding-usd advantage-icon"></i>
                    <h3>Harga Bersahabat</h3>
                    <p>Kami memberikan kualitas terbaik dan harga yang ekonomis karena kami tidak pelit.</p>
                </div>

                <!-- Advantage 6 -->
                <div class="advantage-card">
                    <i class="fas fa-headset advantage-icon"></i>
                    <h3>24/7 Aktif</h3>
                    <p>Kami selalu melayani secepat mungkin karena kami kesepian.</p>
                </div>
            </div>
        </section>

        <section class="testimonials-section">
            <h2 class="testimonials-title">Apa Kata Mereka</h2>
            <div class="testimonials-container">
                <?php if (!empty($reviews)): ?>
                    <?php foreach ($reviews as $review): ?>
                        <div class="testimonial-card">
                            <span class="quote-icon">“</span>
                            <div class="user-info" style="margin-bottom: 0.5rem;">
                                <div class="user-name" style="font-weight:700;">
                                    <?= htmlspecialchars($review['user_name']) ?>
                                </div>
                                <div class="user-role" style="color:#f9b700;">
                                    <?php for ($i = 0; $i < $review['rating']; $i++): ?>
                                        ⭐
                                    <?php endfor; ?>
                                </div>
                            </div>
                            <p class="testimonial-text">
                                <?= htmlspecialchars($review['comment']) ?>
                            </p>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <div style="padding:2rem; text-align:center;">Belum ada review dari user.</div>
                <?php endif; ?>
            </div>
        </section>
    </div>
</main>