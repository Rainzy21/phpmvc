  <h1>Manajemen Transaksi</h1>
  <div class="header-section">
      <div class="filter-group">
        <label for="statusFilter">Filter Status:</label>
        <select id="statusFilter" aria-label="Filter Status Transaksi">
          <option value="all">Semua</option>
          <option value="diproses">Diproses</option>
          <option value="selesai">Selesai</option>
          <option value="dibatalkan">Dibatalkan</option>
        </select>
      </div>
    </div>

    <table id="transactionTable" aria-label="Daftar Transaksi">
      <thead>
        <tr>
          <th>ID Transaksi</th>
          <th>User</th>
          <th>Konsol</th>
          <th>Periode Sewa</th>
          <th>Status</th>
          <th>Pembayaran</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        <!-- Rows will be injected dynamically by JS -->
      </tbody>
    </table>
    <p id="noDataMessage" class="no-transactions" style="display:none;">Tidak ada transaksi dengan status tersebut.</p>

    <div id="detailModal" class="modal" role="dialog" aria-modal="true" aria-labelledby="modalTitle">
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