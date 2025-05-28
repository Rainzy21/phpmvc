<?php if (isset($data)) extract($data); ?>
<h1>Dashboard</h1>
      <section class="cards">
        <div class="card">
          <div class="info">
            <span class="title">Total Users</span>
            <span class="value"><?= isset($totalUsers) ? $totalUsers : '' ?></span>
          </div>
          <div class="icon"><i class="fas fa-users"></i></div>
        </div>
        <div class="card">
          <div class="info">
            <span class="title">Total Konsol</span>
            <span class="value"><?= isset($totalKonsol) ? $totalKonsol : '' ?></span>
          </div>
          <div class="icon"><i class="fas fa-gamepad"></i></div>
        </div>
        <div class="card">
          <div class="info">
            <span class="title">Total Transaksi</span>
            <span class="value"><?= isset($totalTransaksi) ? $totalTransaksi : '' ?></span>
          </div>
          <div class="icon"><i class="fas fa-money-bill-wave"></i></div>
        </div>
        <div class="card">
          <div class="info">
            <span class="title">Transaksi Terbaru</span>
            <span class="value"><?= isset($TransaksiTerbaru) ? '#' . $TransaksiTerbaru : 'Belum ada transaksi' ?></span>
          </div>
          <div class="icon"><i class="fas fa-receipt"></i></div>
        </div>
      </section>
        <table>
          <thead>
            <tr>
              <th>Customer</th>
              <th>Order ID</th>
              <th>Status</th>
              <th>Amount</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>John Doe</td>
              <td>#12345</td>
              <td>Completed</td>
              <td>$150.00</td>
            </tr>
            <tr>
              <td>Jane Smith</td>
              <td>#12346</td>
              <td>Processing</td>
              <td>$250.00</td>
            </tr>
            <tr>
              <td>Michael Johnson</td>
              <td>#12347</td>
              <td>Pending</td>
              <td>$320.00</td>
            </tr>
            <tr>
              <td>Emily Davis</td>
              <td>#12348</td>
              <td>Completed</td>
              <td>$90.00</td>
            </tr>
          </tbody>
        </table>

