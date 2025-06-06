<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= $data['title']; ?></title>
  <style>
            :root{
                --primary-color: #023047;
                --secondary-color: #229ebc;
                --text-color: #ffffff;
                --skin-color: #8ecae6;
                --third-color: #ffb703; 
                --fourth-color: #fb8500;
            }
            
            body {
                font-family: Arial, sans-serif;
                background-color: var(--primary-color);
                display: flex;
                justify-content: center;
                align-items: center;
                height: 100vh;
                margin: 0;
            }

            .login-container {
                background-color: var(--primary-color);
                padding: 30px;
                border-radius: 8px;
                box-shadow: 0 2px 100px #8ecae6;
                width: 350px;
            }

            h2 {
                text-align: center;
                color: var(--secondary-color);
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
                border-color: var(--secondary-color);
                outline: none;
                color: #ffffff;
            }

            button {
                width: 100%;
                padding: 12px;
                background-color: var(--secondary-color);
                color: white;
                border: none;
                border-radius: 4px;
                cursor: pointer;
                font-size: 16px;
            }

            button:hover {
                background-color: var(--skin-color);
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
            .register-link {
            text-align: center;
            margin-top: 20px;
            color: #ffffff;
            }

            .register-link a {
                color: var(--secondary-color);
                text-decoration: none;
                font-size: 14px;
            }

            .register-link a:hover {
                text-decoration: underline;
            }
    </style>
</head>
<body>
  <div class="login-container">
        <h2>Login</h2>
        <form action="<?= BASE_URL; ?>/auth/login" method="POST">
            <div class="form-group">
                <label for="email">Email</label>
                <input type="text" id="email" name="email" required placeholder="Masukkan Email">
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required placeholder="Masukkan Password">
            </div>

            <div class="form-group">
                <button type="submit">Sign In</button>
            </div>
        </form>

        <div class="forgot-password">
            <a href="forgot-password.php">Forgot Password?</a>
        </div>
        <div class="register-link">
            Belum punya akun? <a href="<?= BASE_URL; ?>/auth/register">Daftar</a>
        </div>
    </div>
</body>
</html>