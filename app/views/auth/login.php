<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= $data['title']; ?></title>
  <style>
            body {
                font-family: Arial, sans-serif;
                background-color: #f3ca20;
                display: flex;
                justify-content: center;
                align-items: center;
                height: 100vh;
                margin: 0;
            }

            .login-container {
                background-color: #000000;
                padding: 30px;
                border-radius: 8px;
                box-shadow: 0 2px 100px rgb(255, 137, 10);
                width: 350px;
            }

            h2 {
                text-align: center;
                color: #f3ca20;
                margin-bottom: 30px;
            }

            .form-group {
                margin-bottom: 20px;
            }

            label {
                display: block;
                margin-bottom: 8px;
                color: #ffffff;
            }

            input[type="text"],
            input[type="password"] {
                width: 100%;
                padding: 10px;
                border: 1px solid #ddd;
                border-radius: 4px;
                box-sizing: border-box;
                background-color: rgb(23, 23, 23, 0.82)
            }

            input[type="text"]:focus,
            input[type="password"]:focus {
                border-color: #f3ca20;
                outline: none;
                color: #ffffff;
            }

            button {
                width: 100%;
                padding: 12px;
                background-color: #f3ca20;
                color: white;
                border: none;
                border-radius: 4px;
                cursor: pointer;
                font-size: 16px;
            }

            button:hover {
                background-color: #947a14;
            }

            .forgot-password {
                text-align: center;
                margin-top: 15px;
            }

            .forgot-password a {
                color: #ffffff;
                text-decoration: none;
            }

            .forgot-password a:hover {
                color: #9f9f9f;
            }

            .error-message {
                color: red;
                text-align: center;
                margin-bottom: 15px;
            }
            .create-an-account, p {
                text-align: center;
                margin-top: 15px;
            }

            p {
                color: #ffffff;
            }
            
            .create-an-account a {
                color: #f3ca20;
            }

            .create-an-account a:hover {
                color: #947a14;
                text-decoration: underline;
            }
    </style>
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
        <div class="create-an-account">
            <p>Belum punya akun? <a href="register.php">Daftar Sekarang</a></p>
        </div>
    </div>
</body>
</html>