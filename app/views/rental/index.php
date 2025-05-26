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
    }
    button:hover {
        background: #5848c2;
    }
</style>
</head>
<body>
<div class="container">
    <h1>Form Pemesanan Konsol</h1>
    <form id="orderForm" action="<?= BASE_URL ?>/rental/add" method="POST">
        <label for="console_id">Pilih Konsol</label>
        <select id="console_id" name="console_id" required>
            <option value="" disabled selected>-- Pilih Konsol --</option>
            <?php if (isset($consoles) && is_array($consoles)): ?>
                <?php foreach ($consoles as $console): ?>
                    <option value="<?= $console['id'] ?>">
                        <?= htmlspecialchars($console['name']) ?> (Stok: <?= $console['stock'] ?>)
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

        <button type="submit">Pesan</button>
    </form>
</div>

<script>
    // Setting min attributes of date inputs to current date for user convenience
    const today = new Date().toISOString().split('T')[0];
    document.getElementById('rent_date').setAttribute('min', today);
    document.getElementById('return_date').setAttribute('min', today);

    // Optional: Set min return_date to rent_date
    document.getElementById('rent_date').addEventListener('change', function() {
        document.getElementById('return_date').setAttribute('min', this.value);
    });
</script>
</body>
</html>

