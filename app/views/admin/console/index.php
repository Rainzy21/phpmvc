      <h1>Manajemen Konsol</h1>
            <nav class="tabs" aria-label="Manajemen Konsol navigation">
            <div class="tab active" data-tab="lihat">Lihat semua konsol</div>
            <div class="tab" data-tab="tambah">Tambah / Edit / Hapus konsol</div>
            <div class="tab" data-tab="stok">Stok dan harga sewa</div>
            </nav>

            <section id="lihat" class="active" aria-label="Lihat semua konsol">
                <table aria-describedby="lihat-desc">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nama Konsol</th>
                            <th>Stok</th>
                            <th>Harga Sewa (Rp)</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody id="console-list">
                    <!-- Console rows are dynamically added -->
                    </tbody>
                </table>
                <p id="lihat-desc" class="sr-only">Daftar semua konsol yang tersedia di sistem.</p>
            </section>

            <section id="tambah" aria-label="Tambah, edit, dan hapus konsol">
                <form id="console-form" aria-describedby="form-desc">
                    <h2 id="form-title">Tambah Konsol Baru</h2>
                    <p id="form-desc" class="sr-only">
                    Formulir untuk menambah atau mengubah data konsol.
                    </p>
                    <input type="hidden" id="console-id" />
                    <label for="console-name">Nama Konsol</label>
                    <input type="text" id="console-name" placeholder="Masukkan nama konsol" required />
                    <label for="console-stock">Stok</label>
                    <input type="number" id="console-stock" min="0" placeholder="Masukkan jumlah stok" required />
                    <label for="console-price">Harga Sewa (Rp)</label>
                    <input type="number" id="console-price" min="0" step="1000" placeholder="Masukkan harga sewa" required />
                    <label for="console-image">Gambar Konsol (opsional)</label>
                    <input type="file" id="console-image" accept="image/*" />
                    <img id="image-preview" class="img-preview" src="" alt="Preview gambar konsol" style="display:none;" />
                    <button type="submit" class="submit-btn">Simpan</button>
                    <button type="button" id="cancel-edit-btn" style="display:none;">Batal</button>
                </form>
            </section>

            <section id="stok" aria-label="Stok dan harga sewa">
                <h2>Stok dan Harga Sewa Konsol</h2>
                <table aria-describedby="stok-desc">
                    <thead>
                        <tr>
                            <th>Nama Konsol</th>
                            <th>Stok Tersedia</th>
                            <th>Harga Sewa (Rp)</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody id="stock-price-list">
                        <!-- Rows dynamically generated -->
                    </tbody>
                </table>
                <p id="stok-desc" class="sr-only">Edit stok dan harga sewa konsol yang ada.</p>
            </section>
