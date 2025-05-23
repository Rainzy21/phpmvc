        </main>
     </div>
    <script>
        const sidebar = document.getElementById('sidebar');
        const menuToggle = document.getElementById('menuToggle');
        menuToggle.addEventListener('click', () => {
        sidebar.classList.toggle('collapsed');
        // adjust ARIA or other accessibility features if needed
        });

        // Manajemen Konsol
    // Data store for demo purposes
    let consoles = [
      { id: 1, name: "PlayStation 5", stock: 10, price: 150000, image: "" },
      { id: 2, name: "Xbox Series X", stock: 8, price: 140000, image: "" },
      { id: 3, name: "Nintendo Switch", stock: 15, price: 120000, image: "" }
    ];

    const tabs = document.querySelectorAll(".tab");
    const sections = document.querySelectorAll("section");

    // Switch tabs
    tabs.forEach(tab => {
      tab.addEventListener("click", () => {
        const target = tab.dataset.tab;
        // Set active tab and section
        tabs.forEach(t => t.classList.remove("active"));
        sections.forEach(s => s.classList.remove("active"));
        tab.classList.add("active");
        document.getElementById(target).classList.add("active");

        if(target === "tambah"){
          resetForm();
        }
        if(target === "stok"){
          renderStockPriceList();
        }
        if(target === "lihat"){
          renderConsoleList();
        }
      });
    });

    const consoleListBody = document.getElementById("console-list");
    const stockPriceBody = document.getElementById("stock-price-list");
    const imageInput = document.getElementById("console-image");
    const imagePreview = document.getElementById("image-preview");

    // Render "Lihat Semua Konsol"
    function renderConsoleList() {
      consoleListBody.innerHTML = "";
      if(consoles.length === 0){
        consoleListBody.innerHTML = '<tr><td colspan="5" style="text-align:center; padding:1rem;">Tidak ada data konsol.</td></tr>';
        return;
      }
      consoles.forEach(c => {
        const tr = document.createElement("tr");

        const imgHTML = c.image
          ? `<img class="thumb-img" src="${c.image}" alt="Gambar ${c.name}" />`
          : '<div style="width:50px; height:35px; background:#ddd; border-radius:4px; display:inline-block; margin-right:0.5rem; vertical-align:middle;"></div>';

        tr.innerHTML = `
          <td>${c.id}</td>
          <td><div class="name-with-img">${imgHTML}<span>${c.name}</span></div></td>
          <td>${c.stock}</td>
          <td>Rp ${c.price.toLocaleString("id-ID")}</td>
          <td>
            <button class="action-btn edit-btn" data-id="${c.id}">Edit</button>
            <button class="action-btn delete-btn" data-id="${c.id}">Hapus</button>
          </td>
        `;
        consoleListBody.appendChild(tr);
      });
      addTableListeners();
    }

    // Add listeners for edit and delete buttons in table
    function addTableListeners() {
      document.querySelectorAll(".edit-btn").forEach(btn => {
        btn.onclick = () => {
          const id = parseInt(btn.dataset.id);
          editConsole(id);
          // switch tab to tambah
          tabs.forEach(t => t.classList.remove("active"));
          sections.forEach(s => s.classList.remove("active"));
          document.querySelector('.tab[data-tab="tambah"]').classList.add("active");
          document.getElementById("tambah").classList.add("active");
        };
      });
      document.querySelectorAll(".delete-btn").forEach(btn => {
        btn.onclick = () => {
          const id = parseInt(btn.dataset.id);
          if(confirm("Yakin ingin menghapus konsol ini?")){
            deleteConsole(id);
          }
        };
      });
    }

    // Delete console by id
    function deleteConsole(id) {
      consoles = consoles.filter(c => c.id !== id);
      renderConsoleList();
      renderStockPriceList();
    }

    // Edit console function (populate form)
    function editConsole(id) {
      const c = consoles.find(c => c.id === id);
      if(!c) return;
      document.getElementById("form-title").textContent = "Edit Konsol";
      document.getElementById("console-id").value = c.id;
      document.getElementById("console-name").value = c.name;
      document.getElementById("console-stock").value = c.stock;
      document.getElementById("console-price").value = c.price;
      if(c.image){
        imagePreview.src = c.image;
        imagePreview.style.display = "block";
      } else {
        imagePreview.src = "";
        imagePreview.style.display = "none";
      }
      // Clear file input as setting .value to '' doesn't always work visually
      imageInput.value = "";
      document.getElementById("cancel-edit-btn").style.display = "inline-block";
    }

    // Reset the form to add mode
    function resetForm() {
      document.getElementById("form-title").textContent = "Tambah Konsol Baru";
      document.getElementById("console-id").value = "";
      document.getElementById("console-name").value = "";
      document.getElementById("console-stock").value = "";
      document.getElementById("console-price").value = "";
      imageInput.value = "";
      imagePreview.src = "";
      imagePreview.style.display = "none";
      document.getElementById("cancel-edit-btn").style.display = "none";
    }

    // Handle image input change
    imageInput.addEventListener("change", () => {
      const file = imageInput.files[0];
      if(file){
        const reader = new FileReader();
        reader.onload = e => {
          imagePreview.src = e.target.result;
          imagePreview.style.display = "block";
        };
        reader.readAsDataURL(file);
      } else {
        imagePreview.src = "";
        imagePreview.style.display = "none";
      }
    });

    // Form submission handling
    document.getElementById("console-form").addEventListener("submit", e => {
      e.preventDefault();
      const idStr = document.getElementById("console-id").value;
      const name = document.getElementById("console-name").value.trim();
      const stock = parseInt(document.getElementById("console-stock").value);
      const price = parseInt(document.getElementById("console-price").value);

      if(!name || isNaN(stock) || stock < 0 || isNaN(price) || price < 0){
        alert("Harap lengkapi data dengan benar.");
        return;
      }

      const file = imageInput.files[0];

      if(idStr) {
        // edit existing
        const id = parseInt(idStr);
        const idx = consoles.findIndex(c => c.id === id);
        if(idx > -1){
          consoles[idx].name = name;
          consoles[idx].stock = stock;
          consoles[idx].price = price;

          if(file) {
            const reader = new FileReader();
            reader.onload = e => {
              consoles[idx].image = e.target.result;
              alert("Konsol berhasil diperbarui.");
              resetForm();
              renderConsoleList();
              renderStockPriceList();
              // switch to lihat tab
              tabs.forEach(t => t.classList.remove("active"));
              sections.forEach(s => s.classList.remove("active"));
              document.querySelector('.tab[data-tab="lihat"]').classList.add("active");
              document.getElementById("lihat").classList.add("active");
            };
            reader.readAsDataURL(file);
          } else {
            alert("Konsol berhasil diperbarui.");
            resetForm();
            renderConsoleList();
            renderStockPriceList();
            // switch to lihat tab
            tabs.forEach(t => t.classList.remove("active"));
            sections.forEach(s => s.classList.remove("active"));
            document.querySelector('.tab[data-tab="lihat"]').classList.add("active");
            document.getElementById("lihat").classList.add("active");
          }
        }
      } else {
        if(file){
          const reader = new FileReader();
          reader.onload = e => {
            const newId = consoles.length > 0 ? consoles[consoles.length - 1].id + 1 : 1;
            consoles.push({ id: newId, name, stock, price, image: e.target.result });
            alert("Konsol baru berhasil ditambahkan.");
            resetForm();
            renderConsoleList();
            renderStockPriceList();
            // switch to lihat tab
            tabs.forEach(t => t.classList.remove("active"));
            sections.forEach(s => s.classList.remove("active"));
            document.querySelector('.tab[data-tab="lihat"]').classList.add("active");
            document.getElementById("lihat").classList.add("active");
          };
          reader.readAsDataURL(file);
        } else {
          const newId = consoles.length > 0 ? consoles[consoles.length - 1].id + 1 : 1;
          consoles.push({ id: newId, name, stock, price, image: "" });
          alert("Konsol baru berhasil ditambahkan.");
          resetForm();
          renderConsoleList();
          renderStockPriceList();
          // switch to lihat tab
          tabs.forEach(t => t.classList.remove("active"));
          sections.forEach(s => s.classList.remove("active"));
          document.querySelector('.tab[data-tab="lihat"]').classList.add("active");
          document.getElementById("lihat").classList.add("active");
        }
      }
    });

    // Cancel edit button
    document.getElementById("cancel-edit-btn").addEventListener("click", () => {
      resetForm();
    });

    // Render stok dan harga sewa section with inline editing
    function renderStockPriceList(){
      stockPriceBody.innerHTML = "";
      if(consoles.length === 0){
        stockPriceBody.innerHTML = '<tr><td colspan="4" style="text-align:center; padding:1rem;">Tidak ada data konsol.</td></tr>';
        return;
      }
      consoles.forEach(c => {
        const tr = document.createElement("tr");

        const imgHTML = c.image
          ? `<img class="thumb-img" src="${c.image}" alt="Gambar ${c.name}" />`
          : '<div style="width:50px; height:35px; background:#ddd; border-radius:4px; display:inline-block; margin-right:0.5rem; vertical-align:middle;"></div>';

        tr.innerHTML = `
          <td><div class="name-with-img">${imgHTML}<span>${c.name}</span></div></td>
          <td><input type="number" min="0" value="${c.stock}" data-id="${c.id}" data-type="stock" class="stock-price-input" style="width:8rem; border-radius:4px; border:1px solid #ccc; padding:0.25rem 0.5rem;" /></td>
          <td><input type="number" min="0" step="1000" value="${c.price}" data-id="${c.id}" data-type="price" class="stock-price-input" style="width:10rem; border-radius:4px; border:1px solid #ccc; padding:0.25rem 0.5rem;" /></td>
          <td><button class="action-btn save-price-btn" data-id="${c.id}" style="background:#27ae60;">Simpan</button></td>
        `;
        stockPriceBody.appendChild(tr);
      });

      // Add save button listeners
      document.querySelectorAll(".save-price-btn").forEach(btn => {
        btn.onclick = () => {
          const id = parseInt(btn.dataset.id);
          const stockInput = document.querySelector(`input[data-id="${id}"][data-type="stock"]`);
          const priceInput = document.querySelector(`input[data-id="${id}"][data-type="price"]`);
          const newStock = parseInt(stockInput.value);
          const newPrice = parseInt(priceInput.value);

          if(isNaN(newStock) || newStock < 0 || isNaN(newPrice) || newPrice < 0){
            alert("Stok dan harga harus angka positif.");
            return;
          }
          const idx = consoles.findIndex(c => c.id === id);
          if(idx > -1){
            consoles[idx].stock = newStock;
            consoles[idx].price = newPrice;
            alert("Stok dan harga sewa berhasil diperbarui.");
            renderConsoleList();
          }
        };
      });
    }

    // Initial rendering
    renderConsoleList();
    </script>
</body>
</html>