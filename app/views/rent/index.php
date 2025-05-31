<div class="carasewa-container" role="main" aria-label="Panduan Cara Sewa Perangkat Konsol">
  <header>
    <h1 style="color: var(--primary);">Cara Sewa Perangkat Konsol</h1>
    <p style="color: #666;">Panduan praktis untuk menyewa konsol game favorit Anda dengan mudah dan cepat.</p>
  </header>
  <ol>
    <li>
      <h3>Pilih Konsol</h3>
      <p>Telusuri daftar perangkat konsol yang kami sediakan, mulai dari PlayStation, Xbox, hingga Nintendo Switch, dan pilih sesuai selera Anda.</p>
    </li>
    <li>
      <h3>Cek Ketersediaan dan Durasi Sewa</h3>
      <p>Pastikan konsol yang ingin Anda sewa tersedia pada tanggal yang diinginkan dan tentukan durasi sewa yang sesuai kebutuhan.</p>
    </li>
    <li>
      <h3>Isi Formulir Pemesanan</h3>
      <p>Lengkapi data diri dan detail pemesanan pada formulir agar kami dapat memproses permintaan Anda dengan cepat dan tepat.</p>
    </li>
    <li>
      <h3>Lakukan Pembayaran</h3>
      <p>Pilih metode pembayaran yang mudah dan lakukan transfer sesuai instruksi yang diberikan oleh layanan kami.</p>
    </li>
    <li>
      <h3>Terima Konsol</h3>
      <p>Setelah pembayaran dikonfirmasi, konsol akan dikirimkan ke alamat Anda atau dapat diambil langsung sesuai kesepakatan.</p>
    </li>
    <li>
      <h3>Gunakan dan Kembalikan Tepat Waktu</h3>
      <p>Manfaatkan konsol selama masa sewa dan kembalikan sesuai jadwal agar tidak dikenakan biaya denda tambahan.</p>
    </li>
  </ol>
  <div class="cta">
    <?php if (isset($_SESSION['user_id'])): ?>
        <a href="<?= BASE_URL ?>/rental" class="btn-sewa">
            Mulai Sewa Konsol
        </a>
    <?php endif; ?>
  </div>
</div>