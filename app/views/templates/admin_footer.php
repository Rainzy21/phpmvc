</main>
     </div>
    <script>
      // Script untuk toggle menu navigasi
      const menuToggle = document.getElementById('menuToggle');
  const sidebar = document.getElementById('sidebar');
  const mainContent = document.getElementById('mainContent');

  // Baca status collapse dari localStorage saat halaman dimuat
  if (localStorage.getItem('sidebar-collapsed') === 'true') {
    sidebar.classList.add('collapsed');
    mainContent.classList.add('sidebar-collapsed');
  }

  menuToggle.addEventListener('click', function() {
    sidebar.classList.toggle('collapsed');
    mainContent.classList.toggle('sidebar-collapsed');
    // Simpan status collapse ke localStorage
    localStorage.setItem('sidebar-collapsed', sidebar.classList.contains('collapsed'));
  });


// Script untuk Manajemen Konsol
document.addEventListener('DOMContentLoaded', function () {
  const tabs = document.querySelectorAll('.tab');
  const tabContents = document.querySelectorAll('.tab-content');
  const stockInput = document.getElementById('consoleStock');

  // Fungsi untuk set mode form
  window.setFormMode = function(isEdit) {
    if (stockInput) {
      stockInput.readOnly = !!isEdit;
      if (!isEdit) stockInput.value = '';
    }
  };

  // Tab switching saja
  tabs.forEach(tab => {
    tab.addEventListener('click', () => {
      tabs.forEach(t => t.classList.remove('active'));
      tab.classList.add('active');
      const tabName = tab.getAttribute('data-tab');
      tabContents.forEach(tc => {
        if(tc.id === tabName) {
          tc.style.display = 'block';
          tc.classList.add('active');
        } else {
          tc.style.display = 'none';
          tc.classList.remove('active');
        }
      });
      // Jika tab tambah/edit diklik, set mode tambah (bukan edit)
      if(tabName === 'manage') setFormMode(false);
    });
  });

  // Handler tombol Edit pada tabel konsol
  document.querySelectorAll('.btn-edit').forEach(btn => {
    btn.addEventListener('click', function(e) {
      e.preventDefault();
      const tr = this.closest('tr');
      document.getElementById('consoleId').value = tr.children[0].textContent.trim();
      document.getElementById('consoleName').value = tr.children[2].textContent.trim();
      document.getElementById('consoleCategory').value = tr.children[3].textContent.trim();
      document.getElementById('consolePrice').value = tr.children[5].textContent.replace(/\./g, '').replace(/,/g, '').trim();

      // Sembunyikan input stok saat edit
      document.getElementById('stockGroup').style.display = 'none';

      setFormMode(true);
      document.getElementById('saveConsoleBtn').textContent = 'Simpan Perubahan';
      document.getElementById('cancelEditBtn').style.display = 'inline-block';
      document.getElementById('consoleForm').action = "<?= BASE_URL ?>/admin/console/update/" + tr.children[0].textContent.trim();
      document.querySelector('.tab[data-tab="manage"]').click();
    });
  });

  // Handler tombol batal edit
  document.getElementById('cancelEditBtn').addEventListener('click', function() {
    document.getElementById('consoleForm').reset();
    document.getElementById('consoleId').value = '';
    document.getElementById('consoleForm').action = "<?= BASE_URL ?>/admin/console/add";
    document.getElementById('saveConsoleBtn').textContent = 'Tambah Konsol';
    this.style.display = 'none';
    setFormMode(false);

    // Tampilkan kembali input stok saat tambah
    document.getElementById('stockGroup').style.display = '';
  });
});

// User Management (biarkan jika memang dipakai di halaman user)
document.addEventListener('DOMContentLoaded', function () {
    const searchInput = document.querySelector('.search-input');
    const userTable = document.querySelector('.user-table');
    if (searchInput && userTable) {
        searchInput.addEventListener('input', function(e) {
            const searchTerm = e.target.value.toLowerCase();
            const rows = userTable.querySelectorAll('tbody tr');
            rows.forEach(row => {
                const email = row.children[1].textContent.toLowerCase();
                row.style.display = email.includes(searchTerm) ? '' : 'none';
            });
        });
    }
});
</script>
</body>
</html>