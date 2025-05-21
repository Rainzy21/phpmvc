<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= $data['title']; ?></title>
  <meta name='viewport' content='width=device-width, initial-scale=1'>
  <link rel="stylesheet" href="<?= BASE_URL; ?>/css/authstyle.css">
  <script src='main.js'></script>
</head>
<body>
  <div class="login-container">
        <h2>Login</h2>
        
        <?php if (isset($_GET['error'])): ?>
            <p class="error-message">Invalid username or password!</p>
        <?php endif; ?>

        <form action="login.php" method="POST">
            <div class="form-group">
                <label for="username">ID</label>
                <input type="text" id="username" name="username" required placeholder="Masukkin Admin ID">
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required placeholder="Masukkin Password">
            </div>

            <div class="form-group">
                <button type="submit">Sign In</button>
            </div>
        </form>

        <div class="forgot-password">
            <a href="forgot-password.php">Forgot Password?</a>
        </div>
    </div>
</body>
</html>