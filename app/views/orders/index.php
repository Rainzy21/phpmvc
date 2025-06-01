<?php
?>
<div class="container-orders">
    <?php if (!empty($orders)): ?>
        <?php foreach ($orders as $order): ?>
            <section class="order-card" aria-label="Detail Pesanan Konsol">
                <div class="order-header">
                    ID Pesanan: #<span class="order-id"><?= htmlspecialchars($order['id']) ?></span>
                </div>
                <?php if (!empty($order['details'])): ?>
                    <?php foreach ($order['details'] as $detail): ?>
                        <div class="order-item">
                            <div class="order-label">Nama Konsol</div>
                            <div class="order-value"><?= htmlspecialchars($detail['console_name']) ?></div>
                        </div>
                        <div class="order-item">
                            <div class="order-label">Jumlah Unit</div>
                            <div class="order-value"><?= htmlspecialchars($detail['qty']) ?></div>
                        </div>
                        <?php if ($order['status'] === 'completed'): ?>
                             <div class="order-item">
                                <a class="btn-review"
                                   href="<?= BASE_URL; ?>/reviews/add?rental_id=<?= $order['id'] ?>&console_id=<?= $detail['console_id'] ?>">
                                    Beri Review
                                </a>
                            </div>
                        <?php endif; ?>
                    <?php endforeach; ?>
                <?php endif; ?>
                <div class="order-item">
                    <div class="order-label">Tanggal Sewa</div>
                    <div class="order-value">
                        <?= htmlspecialchars($order['rent_date']) ?> – <?= htmlspecialchars($order['return_date']) ?>
                    </div>
                </div>
                <div class="order-item">
                    <div class="order-label">Status Pesanan</div>
                    <div class="order-value" id="order-status-<?= $order['id'] ?>" data-status="<?= htmlspecialchars($order['status']) ?>">
                        <span class="status-icon"></span>
                        <span class="status-text"><?= htmlspecialchars($order['status']) ?></span>
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
