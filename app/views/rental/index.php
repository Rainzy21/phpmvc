<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<title>Form Pemesanan Konsol</title>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap');
    body {
        margin: 0;
        font-family: 'Montserrat', sans-serif;
        background: linear-gradient(135deg, #667eea, #764ba2);
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        color: #fff;
    }
    .container {
        background: rgba(255,255,255,0.1);
        padding: 2rem 3rem;
        border-radius: 16px;
        box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.37);
        max-width: 400px;
        width: 100%;
        text-align: center;
    }
    h1 {
        margin-bottom: 1.5rem;
        font-weight: 700;
        font-size: 2rem;
        letter-spacing: 1.2px;
    }
    label {
        display: block;
        text-align: left;
        margin-bottom: 0.5rem;
        font-weight: 600;
        font-size: 1rem;
        color: #e0e0e0;
    }
    select, input[type="date"], input[type="number"] {
        width: 100%;
        padding: 0.75rem 1rem;
        border-radius: 8px;
        border: none;
        font-size: 1rem;
        color: #333;
        appearance: none;
        background: #f0f0f0;
        margin-bottom: 1.5rem;
        cursor: pointer;
        transition: box-shadow 0.3s ease;
        box-sizing: border-box;
    }
    select:focus, input[type="date"]:focus, input[type="number"]:focus {
        outline: none;
        box-shadow: 0 0 8px #a29bfe;
    }
    input[type="number"] {
        cursor: text;
    }
    button {
        background: #6c5ce7;
        border: none;
        padding: 0.75rem 2rem;
        border-radius: 50px;
        color: white;
        font-weight: 700;
        font-size: 1.1rem;
        cursor: pointer;
        transition: background 0.3s ease;
        width: 100%;
        margin-top: 1rem;
    }
    button:hover {
        background: #5848c2;
    }
    .error-message {
        color: #ff7675;
        margin-bottom: 1rem;
        font-weight: 600;
    }
</style>
</head>
<body>
<div class="container">
    <h1>Form Pemesanan Konsol</h1>
    <?php if (!empty($error)): ?>
        <div class="error-message"><?= htmlspecialchars($error) ?></div>
    <?php endif; ?>
    <form id="orderForm" action="<?= BASE_URL ?>/rental/add" method="POST" autocomplete="off">
        <label for="console_id">Pilih Konsol</label>
        <select id="console_id" name="console_id" required>
            <option value="" disabled selected>-- Pilih Konsol --</option>
            <?php if (isset($consoles) && is_array($consoles)): ?>
                <?php foreach ($consoles as $console): ?>
                    <option value="<?= $console['id'] ?>" data-stock="<?= $console['stock'] ?>">
                        <?= htmlspecialchars($console['name']) ?>
                    </option>
                <?php endforeach; ?>
            <?php endif; ?>
        </select>

        <label for="rent_date">Tanggal Mulai Sewa</label>
        <input type="date" id="rent_date" name="rent_date" required min="" />

        <label for="return_date">Tanggal Selesai Sewa</label>
        <input type="date" id="return_date" name="return_date" required min="" />

        <label for="qty">Jumlah Unit</label>
        <input type="number" id="qty" name="qty" required min="1" max="100" placeholder="Masukkan jumlah unit" />

        <!-- Tambahkan ini untuk menampilkan biaya pesanan -->
        <div id="orderCost" style="margin-bottom:1rem;font-weight:600;color:#fff;">
            Biaya Pesanan: <span id="costValue">Rp 0</span>
        </div>

        <label for="payment_method">Metode Pembayaran</label>
        <select id="payment_method" name="payment_method" required>
            <option value="" disabled selected>-- Pilih Metode --</option>
            <option value="transfer">Transfer</option>
            <option value="cod">COD</option>
        </select>

        <button type="submit">Pesan</button>
    </form>
</div>

<script>
    // Set min tanggal hari ini
    const today = new Date().toISOString().split('T')[0];
    document.getElementById('rent_date').setAttribute('min', today);
    document.getElementById('return_date').setAttribute('min', today);

    // Set min return_date ke rent_date
    document.getElementById('rent_date').addEventListener('change', function() {
        document.getElementById('return_date').setAttribute('min', this.value);
        if (document.getElementById('return_date').value < this.value) {
            document.getElementById('return_date').value = '';
        }
    });

    // Otomatis set max qty sesuai stok konsol yang dipilih
    document.getElementById('console_id').addEventListener('change', function() {
        const selected = this.options[this.selectedIndex];
        const stock = selected.getAttribute('data-stock');
        const qtyInput = document.getElementById('qty');
        qtyInput.max = stock;
        qtyInput.value = '';
        qtyInput.placeholder = 'Ada ' + stock + ' unit tersedia';
    });

    // Ambil data harga per hari dari PHP ke JS
    const consolePrices = {};
    <?php if (isset($consoles) && is_array($consoles)): ?>
        <?php foreach ($consoles as $console): ?>
            consolePrices['<?= $console['id'] ?>'] = <?= (int)$console['price_per_day'] ?>;
        <?php endforeach; ?>
    <?php endif; ?>

    function formatRupiah(angka) {
        return 'Rp ' + angka.toLocaleString('id-ID');
    }

    function updateOrderCost() {
        const consoleId = document.getElementById('console_id').value;
        const pricePerDay = consolePrices[consoleId] || 0;
        const qty = parseInt(document.getElementById('qty').value) || 0;
        const rentDate = document.getElementById('rent_date').value;
        const returnDate = document.getElementById('return_date').value;

        let days = 1;
        if (rentDate && returnDate) {
            const start = new Date(rentDate);
            const end = new Date(returnDate);
            days = Math.max(1, Math.round((end - start) / 86400000));
        }

        const total = pricePerDay * qty * days;
        document.getElementById('costValue').textContent = formatRupiah(total);
    }

    document.getElementById('console_id').addEventListener('change', updateOrderCost);
    document.getElementById('qty').addEventListener('input', updateOrderCost);
    document.getElementById('rent_date').addEventListener('change', updateOrderCost);
    document.getElementById('return_date').addEventListener('change', updateOrderCost);

    // Inisialisasi biaya pesanan saat halaman pertama kali dibuka
    updateOrderCost();
</script>
</body>
</html>

