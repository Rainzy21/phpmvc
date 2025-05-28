<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Konfirmasi Pesanan</title>
  <style>
    body {
      margin: 0;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background: linear-gradient(135deg, #70e1f5, #ffd194);
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
      color: #333;
      padding: 1rem;
      box-sizing: border-box;
    }
    .container {
      background-color: #ffffffdd;
      padding: 2rem;
      border-radius: 12px;
      box-shadow: 0 8px 24px rgba(0,0,0,0.15);
      max-width: 420px;
      width: 100%;
      text-align: center;
      animation: fadeIn 1s ease forwards;
      box-sizing: border-box;
    }
    h1 {
      color: #2c7a7b;
      font-weight: 700;
      margin-bottom: 1rem;
      font-size: 1.6rem;
      line-height: 1.3;
    }
    p {
      font-size: 1.1rem;
      line-height: 1.5;
      margin: 0.75rem 0;
      color: #555;
    }

    .button-home {
      margin-top: 2rem;
    }

    .btn-home {
      display: inline-block;
      padding: 0.6em 1.2em;
      background: #2c7a7b;
      color: #fff;
      border: none;
      border-radius: 6px;
      text-decoration: none;
      font-weight: 600;
      transition: background 0.2s;
    }

    .btn-home:hover {
      background: #205e5e;
    }

    @media (max-width: 480px) {
      h1 {
        font-size: 1.3rem;
      }
      p {
        font-size: 1rem;
      }
      .container {
        padding: 1.5rem 1rem;
        max-width: 90vw;
      }
    }

    @keyframes fadeIn {
      from {opacity: 0; transform: translateY(20px);}
      to {opacity: 1; transform: translateY(0);}
    }
  </style>
</head>
<body>
  <div class="container">
    <h1>Terima kasih! Pesanan Anda telah berhasil dibuat.</h1>
    <p>Silakan tunggu konfirmasi dari kami. Kami akan segera memproses pesanan Anda dan menginformasikan statusnya.</p>
    <div class="button-home">
      <a href="<?= BASE_URL; ?> /Home" class="btn-home">Kembali ke Beranda</a>
    </div>
  </div>
</body>
</html>