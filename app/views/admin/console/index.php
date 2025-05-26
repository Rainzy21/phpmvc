<h1>Manajemen Konsol</h1>
<div class="tabs">
  <div class="tab active" data-tab="view">Lihat Semua Konsol</div>
  <div class="tab" data-tab="manage">Tambah/Edit Konsol</div>
</div>

<!-- Tab content sections -->

<section id="view" class="tab-content active">
  <table id="consoleTable">
    <thead>
      <tr>
        <th>ID</th>
        <th>Gambar</th>
        <th>Nama Konsol</th>
        <th>Brand</th>
        <th>Stok</th>
        <th>Harga Sewa (Rp)</th>
        <th>Aksi</th> <!-- Tambah kolom aksi -->
      </tr>
    </thead>
    <tbody>
      <?php if (isset($consoles) && is_array($consoles) && count($consoles) > 0): ?>
        <?php foreach ($consoles as $console): ?>
          <tr>
            <td><?= htmlspecialchars($console['id']) ?></td>
            <td>
              <?php if (!empty($console['image'])): ?>
                <img src="<?= BASE_URL . '/' . htmlspecialchars($console['image']) ?>" alt="Gambar Konsol" style="width:60px; height:auto;">
              <?php else: ?>
                <img src="<?= BASE_URL ?>/assets/img/no-image.png" alt="No Image" style="width:60px; height:auto;">
              <?php endif; ?>
            </td>
            <td><?= htmlspecialchars($console['name']) ?></td>
            <td><?= htmlspecialchars($console['brand']) ?></td>
            <td><?= htmlspecialchars($console['stock']) ?></td>
            <td><?= htmlspecialchars(number_format($console['price_per_day'], 0, ',', '.')) ?></td>
            <td>
              <form action="<?= BASE_URL ?>/admin/console/update/<?= $console['id'] ?>" method="get" style="display:inline;">
                <button type="submit" class="btn-edit">Edit</button>
              </form>
              <form action="<?= BASE_URL ?>/admin/console/delete/<?= $console['id'] ?>" method="post" style="display:inline;" onsubmit="return confirm('Yakin ingin menghapus konsol ini?')">
                <button type="submit" class="btn-delete">Delete</button>
              </form>
            </td>
          </tr>
        <?php endforeach; ?>
      <?php else: ?>
        <tr>
          <td colspan="7" style="text-align:center;">Tidak ada data konsol.</td>
        </tr>
      <?php endif; ?>
    </tbody>
  </table>
  <p class="message" id="viewMessage"></p>
</section>

<section id="manage" class="tab-content" style="display:none;">
  <form id="consoleForm" method="POST" action="<?= BASE_URL ?>/admin/console/add" enctype="multipart/form-data" novalidate>
    <input type="hidden" name="consoleId" id="consoleId" />
    <label for="consoleName">Nama Konsol</label>
    <input type="text" name="consoleName" id="consoleName" placeholder="Masukkan nama konsol" required />
    <label for="consoleBrand">Brand</label>
    <input type="text" name="consoleBrand" id="consoleBrand" placeholder="Masukkan Brand konsol" required />
    <div id="stockGroup">
      <label for="consoleStock">Stok</label>
      <input type="number" name="consoleStock" id="consoleStock" min="0" placeholder="Masukkan jumlah stok" required />
    </div>
    <label for="consolePrice">Harga Sewa (Rp)</label>
    <input type="number" name="consolePrice" id="consolePrice" min="0" placeholder="Masukkan harga sewa" required />
    <label for="consoleImage">Gambar Konsol</label>
    <input type="file" name="consoleImage" id="consoleImage" accept="image/*" />
    <img src="" alt="Preview Gambar Konsol" id="imagePreview" class="img-preview" style="display:none;" />
    <button type="submit" id="saveConsoleBtn">Tambah Konsol</button>
    <button type="button" id="cancelEditBtn" style="display:none; margin-left:10px;">Batal Edit</button>
  </form>
  <p class="message" id="manageMessage"></p>
</section>