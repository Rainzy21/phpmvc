<?php if (isset($data)) extract($data); ?> 

<h1>Manajemen Pengguna</h1>

<?php if (isset($flash)): ?>
  <div style="background:#dff0d8;color:#3c763d;padding:10px 16px;border-radius:4px;margin-bottom:16px;">
    <?= htmlspecialchars($flash) ?>
  </div>
<?php endif; ?>

<section id="user-list-section">
  <table id="user-list-table" role="grid" aria-label="Daftar User">
    <thead>
      <tr>
        <th scope="col">Nama</th>
        <th scope="col">Email</th>
        <th scope="col">Role</th>
        <th scope="col">Total Transaksi</th>
        <th scope="col" style="width: 120px;">Aksi</th>
      </tr>
    </thead>
    <tbody>
      <?php if (isset($users) && is_array($users) && count($users) > 0): ?>
        <?php foreach ($users as $user): ?>
          <tr>
            <td data-label="Nama"><?= htmlspecialchars($user['name']) ?></td>
            <td data-label="Email"><?= htmlspecialchars($user['email']) ?></td>
            <td data-label="Role"><?= htmlspecialchars($user['role']) ?></td>
            <td data-label="Total Transaksi"><?= isset($user['totalTransactions']) ? $user['totalTransactions'] : 0 ?></td>
            <td data-label="Aksi">
              <form action="<?= BASE_URL; ?>/admin/users/delete/<?= htmlspecialchars($user['id']) ?>" method="post" style="display:inline;">
                <button type="submit" class="btn-hapus-user" onclick="return confirm('Yakin ingin menghapus user ini?');">
                  Hapus
                </button>
              </form>
            </td>
          </tr>
        <?php endforeach; ?>
      <?php else: ?>
        <tr>
          <td colspan="5" style="text-align:center;">Tidak ada data user.</td>
        </tr>
      <?php endif; ?>
    </tbody>
  </table>
</section>
