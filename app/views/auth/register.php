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
            background:linear-gradient(135deg, #229ebc, #023047);;
        }

        .signup-container {
            background: #023047;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 2px 100px #dadada;
            width: 100%;
            max-width: 400px;
        }

        h2 {
            text-align: center;
            color:rgb(255, 255, 255);
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
            color:rgb(255, 255, 255);
        }

        input:focus {
            outline: none;
            border-color: #8ecae6;

        }

        button {
            width: 100%;
            padding: 12px;
            background: #229ebc;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            transition: background 0.3s;
        }

        button:hover {
            background: #8ecae6;
        }

        .login-link {
            text-align: center;
            margin-top: 20px;
            color: #ffffff;
        }

        .login-link a {
            color: #229ebc;
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