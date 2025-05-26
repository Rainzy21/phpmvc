<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $data['title']; ?></title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background: #f3ca20;
        }

        .signup-container {
            background: black;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 2px 100px rgb(255, 137, 10);
            width: 100%;
            max-width: 400px;
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
            margin-bottom: 5px;
            color: #ffffff;
            font-size: 14px;
        }

        input {
            width: 100%;
            padding: 10px;
            border-radius: 5px;
            font-size: 15px;
            background-color:rgba(23, 23, 23, 0.82);
            color: #f3ca20;
        }

        input:focus {
            outline: none;
            border-color:#f3ca20;

        }

        button {
            width: 100%;
            padding: 12px;
            background: #f3ca20;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            transition: background 0.3s;
        }

        button:hover {
            background: #947a14;
        }

        .login-link {
            text-align: center;
            margin-top: 20px;
            color: #ffffff;
        }

        .login-link a {
            color: #f3ca20;
            text-decoration: none;
            font-size: 14px;
        }

        .login-link a:hover {
            text-decoration: underline;
        }

        @media (max-width: 480px) {
            .signup-container {
                padding: 20px;
                margin: 10px;
            }
        }
    </style>
</head>
<body>
    <div class="signup-container">
        <h2>Create a New Account</h2>
        <form action="<?= BASE_URL; ?>/auth/register" method="POST">
            <div class="form-group">
                <label for="name">Nama Lengkap</label>
                <input type="text" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" required>
            </div>
            
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
            </div>
            
            <div class="form-group">
                <label for="confirm-password">Confirm Password</label>
                <input type="password" id="confirm-password" name="confirm-password" required>
            </div>
            
            <button type="submit">Sign Up</button>
        </form>
        <div class="login-link">
            Sudah punya Akun? <a href="<?= BASE_URL; ?>/auth/login">Log in</a>
        </div>
    </div>
</body>
</html>