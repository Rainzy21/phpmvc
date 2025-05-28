<h1>Manajemen Transaksi</h1>
<div class="header-section">
</div>

<table id="transactionTable" aria-label="Daftar Transaksi">
    <thead>
        <tr>
            <th>ID Transaksi</th>
            <th>User</th>
            <th>Konsol</th>
            <th>Jumlah Yang dipinjam</th>
            <th>Periode Sewa</th>
            <th>Status</th>
            <th>Pembayaran</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php if (!empty($transactions)): ?>
            <?php foreach ($transactions as $transaction): ?>
                <tr>
                    <td><?= htmlspecialchars($transaction['rental_id']) ?></td>
                    <td><?= htmlspecialchars($transaction['user_name']) ?></td>
                    <td><?= htmlspecialchars($transaction['console_name']) ?></td>
                    <td><?= htmlspecialchars($transaction['qty']) ?></td>
                    <td><?= htmlspecialchars($transaction['rent_date']) ?> - <?= htmlspecialchars($transaction['return_date']) ?></td>
                    <td><?= ucfirst($transaction['rental_status']) ?></td>
                    <td><?= ucfirst($transaction['payment_status']) ?></td>
                    <td>
                        <?php if ($transaction['payment_status'] === 'pending'): ?>
                            <form action="<?= BASE_URL ?>/admin/transactions/confirm/<?= $transaction['rental_id'] ?>" method="post" style="display:inline;">
                                <button type="submit">Konfirmasi</button>
                            </form>
                            <form action="<?= BASE_URL ?>/admin/transactions/fail/<?= $transaction['rental_id'] ?>" method="post" style="display:inline;">
                                <button type="submit">Tandai Gagal</button>
                            </form>
                        <?php elseif (
                            $transaction['rental_status'] === 'ongoing' &&
                            date('Y-m-d') >= $transaction['return_date']
                        ): ?>
                            <form action="<?= BASE_URL ?>/admin/transactions/verify/<?= $transaction['rental_id'] ?>" method="post" style="display:inline;">
                                <button type="submit">Verifikasi Pengembalian</button>
                            </form>
                        <?php else: ?>
                            <!-- Tidak menampilkan apapun di sini -->
                        <?php endif; ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="8" class="no-transactions">Tidak ada transaksi dengan status tersebut.</td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>

<!-- Modal detail transaksi (opsional, jika ingin pakai JS untuk detail) -->
<div id="detailModal" class="modal" role="dialog" aria-modal="true" aria-labelledby="modalTitle" style="display:none;">
    <div class="modal-content">
        <span class="modal-close" aria-label="Tutup">&times;</span>
        <h2 id="modalTitle">Detail Sewa</h2>
        <div class="detail-section">
            <h3>User</h3>
            <ul id="detailUser" class="detail-list"></ul>
        </div>
        <div class="detail-section">
            <h3>Konsol</h3>
            <ul id="detailConsole" class="detail-list"></ul>
        </div>
    </div>
</div>