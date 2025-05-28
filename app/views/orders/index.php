<div class="container-orders">
    <?php if (!empty($orders)): ?>
        <?php foreach ($orders as $order): ?>
            <section class="order-card" aria-label="Detail Pesanan Konsol">
                <div class="order-header">
                    ID Pesanan: #<span class="order-id"><?= htmlspecialchars($order['id']) ?></span>
                </div>
                <div class="order-item">
                    <div class="order-label">Nama Konsol</div>
                    <div class="order-value"><?= htmlspecialchars($order['console_name']) ?></div>
                </div>
                <div class="order-item">
                    <div class="order-label">Jumlah Unit</div>
                    <div class="order-value"><?= htmlspecialchars($order['qty']) ?></div>
                </div>
                <div class="order-item">
                    <div class="order-label">Tanggal Sewa</div>
                    <div class="order-value">
                        <?= htmlspecialchars($order['rent_date']) ?> – <?= htmlspecialchars($order['return_date']) ?>
                    </div>
                </div>
                <div class="order-item">
                    <div class="order-label">Status Pesanan</div>
                    <div class="order-value" id="order-status-123" data-status="ongoing">
                        <span class="status-icon"></span>
                        <span class="status-text"></span>
                    </div>
                </div>
                <div class="order-item" id="notes-section-<?= $order['id'] ?>" style="display:none;">
                    <div class="order-label">Catatan / Notes</div>
                    <div class="notes" id="order-notes-<?= $order['id'] ?>">
                        <?php
                        // Jika ingin isi dari PHP, bisa isi di sini, misal:
                        if (
                            $order['status'] === 'ongoing' &&
                            date('Y-m-d') > $order['return_date']
                        ) {
                            echo 'Terlambat mengembalikan konsol. Silakan segera kembalikan!';
                        }
                        ?>
                    </div>
                </div>
            </section>
        <?php endforeach; ?>
    <?php else: ?>
        <div style="text-align:center; margin-top:2rem;">Belum ada pesanan.</div>
    <?php endif; ?>
</div>
