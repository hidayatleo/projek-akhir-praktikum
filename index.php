<?php
require_once('function/helper.php');
require_once('function/koneksi.php');
$process = isset($_GET['process']) ? ($_GET['process']) : false;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Aplikasi</title>
    <link rel="stylesheet" href="<?= BASE_URL . 'assets/style01.css' ?>">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,500;0,700;0,900;1,400;1,500;1,700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"> <!-- Bootstrap CSS -->
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'Roboto', sans-serif;
            background-image: url('desktop-wallpaper-pulsar-220-login-page.jpg');
            background-size: cover;
            background-position: center;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            color: #333;
        }

        .topbar {
            width: 100%;
            background-color: none;
            color: white;
            font-size: 1.5em;
            padding: 20px;
            text-align: center;
            position: absolute;
            top: 0;
            z-index: 1;
        }

        .card-login {
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            width: 90%;
            max-width: 400px;
            background: white;
            padding: 2em;
            border-radius: 10px;
            margin-top: 6em;
            text-align: center;
        }

        .card-header {
            font-size: 25px;
            border-bottom: 2px solid purple;
            padding: 0.5em 0;
            color: purple;
            margin-bottom: 1em;
        }

        .card-body {
            padding: 1em;
        }

        form.form-login {
            width: 100%;
        }

        input.form-input {
            width: calc(100% - 2em);
            padding: 1em;
            border-radius: 50px;
            border: 1px solid #ccc;
            margin-bottom: 1em;
            transition: border-color 0.3s ease-in-out;
        }

        input.form-input:focus {
            border-color: purple;
            outline: none;
        }

        label.form-label {
            color: purple;
            padding: 0.5em;
            margin-top: 0.5em;
            text-align: left;
            display: block;
        }

        button.btn.btn-login {
            width: 100%;
            background-color: purple;
            border: none;
            padding: 1em;
            border-radius: 50px;
            margin-top: 1em;
            color: white;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease-in-out;
        }

        button.btn.btn-login:hover {
            background-color: #005f99;
        }

        p {
            margin-top: 1em;
            color: #333;
        }

        p a {
            color: purple;
            text-decoration: none;
            font-weight: bold;
            transition: color 0.3s ease-in-out;
        }

        p a:hover {
            color: blue;
        }

        .alert {
            text-align: center;
            margin-bottom: 1em;
            padding: 0.5em;
            border-radius: 5px;
        }

        .alert-success {
            background-color: #dff0d8;
            color: #3c763d;
            border: none;
            border-radius: 5px;
            margin-bottom: 1em;
            padding: 15px;
            font-size: 14px; /* Adjust font size */
        }

        .alert-danger {
            background-color: #f8d7da;
            color: #721c24;
            border: none;
            border-radius: 5px;
            margin-bottom: 1em;
            padding: 15px;
            font-size: 14px; /* Adjust font size */
        }
    </style>
    <script>
        function validateForm() {
            var username = document.getElementById('username').value;
            var password = document.getElementById('password').value;
            if (username == "" || password == "") {
                alert("Tolong masukkan username dan password anda");
                return false;
            }
            return true;
        }
    </script>
</head>

<body>
    <div class="topbar">
        <h3>Aplikasi Sederhana Data Pegawai</h3>
    </div>

    <div class="card-login">
        <div class="card-header">Form Login</div>
        <div class="card-body">
            <?php if ($process == 'successregister') : ?>
                <div class="alert alert-success">
                    Register berhasil, silahkan masuk dengan akun anda
                </div>
            <?php elseif ($process == 'logout') : ?>
                <div class="alert alert-success">
                    Anda telah berhasil logout
                </div>
            <?php elseif ($process == 'loginfailed') : ?>
                <div class="alert alert-danger">
                    Login gagal, silakan coba lagi
                </div>
            <?php endif; ?>
            <form class="form-login" method="POST" action="<?= BASE_URL . 'process/process_login.php' ?>" onsubmit="return validateForm();">
                <label class="form-label">Username</label>
                <input type="text" name="username" id="username" class="form-input">
                <label class="form-label">Password</label>
                <input type="password" name="password" id="password" class="form-input">
                <button type="submit" class="btn btn-login">Login</button>
            </form>
            <p>Belum punya akun? <span><a href="<?= BASE_URL . 'register.php' ?>">Daftar disini</a></span></p>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
