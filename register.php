


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
    <title>Register</title>
    <link rel="stylesheet" href="<?= BASE_URL . 'assets/css/style01.css' ?>">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,500;0,700;0,900;1,400;1,500;1,700&display=swap" rel="stylesheet">
    <style>
        body {
    margin: 0;
    padding: 0;
    font-family: 'Roboto', sans-serif;
    background-image: url('desktop-wallpaper-pulsar-220-login-page.jpg');
    background-size: cover; /* Mengatur gambar agar menutupi seluruh background */
    background-position: center; /* Menengahkan gambar pada background */
}

/* Mengatur warna teks dan warna latar belakang topbar sesuai kebutuhan */
.topbar {
    width: 100%;
    background-color: purple;
    color: white;
    font-size: 1.5em;
    padding: 15px;
    text-align: center;
    margin-top: 25px; /* Sesuaikan margin atas sesuai kebutuhan */
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

        body {
            margin: 0;
            padding: 0;
            font-family: 'Roboto', sans-serif;
            background-color: grey;
        }

        .topbar {
            width: 100%;
            background-color: transparent;
            color: white;
            font-size: 1.5em;
            padding: 0px;
            text-align: center;
            box-shadow: 0 0px 0px rgba(0, 0, 0, 0.1);
            margin-top: 10px; /* Adjust the top margin as needed */
            
        }

        .text-topbar {
            margin: center;
            padding: center;
        }

        form {
            display: inline-grid;
        }

        .card-login {
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 90%;
            max-width: 400px;
            background: white;
            padding: 2em;
            border-radius: 10px;
            margin: 2em auto;
        }

        .card-header {
            text-align: center;
            font-size: 25px;
            border-bottom: 2px solid purple;
            padding: 0.5em 0;
            color: purple;
            margin-bottom: 1em;
        }

        .card-body {
            padding: 0.5em;
        }

        form.form-login {
            width: 100%;
        }

        input.form-input {
            padding: 1em;
            border-radius: 50px;
            border: 1px solid purple;
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
        }

        button.btn.btn-login {
            width: 100%;
            background-color: purple;
            border: none;
            padding: 1em;
            border-radius: 50px;
            margin-top: 2em;
            color: white;
            font-size: 14px;
            cursor: pointer;
            transition: background-color 0.3s ease-in-out;
        }

        button.btn.btn-login:hover {
            background-color: #005f99;
        }

        p {
            text-align: center;
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
            color: #005f99;
        }

        .alert {
            border-radius: 10px;
            padding: 1em;
            color: white;
            margin-bottom: 1em;
            text-align: center;
        }

        .alert-danger {
            background-color: red;
        }

        svg {
            display: none; /* Hides the SVG to remove the slide effect */
        }
    </style>
</head>

<body>
    <div class="topbar">
        <h3 class="text-topbar">Pendaftaran Admin</h3>
    </div>

    <div class="content">
        <div class="card-login">
            <div class="card-main">
                <div class="card-header">Form Register</div>
                <div class="card-body">
                    <?php if ($process == 'failedempty') : ?>
                        <div class="alert alert-danger">
                            Register gagal, terdapat form yang kosong
                        </div>
                    <?php endif; ?>
                    <?php if ($process == 'failedusername') : ?>
                        <div class="alert alert-danger">
                            Register gagal, username sudah terdaftar di database
                        </div>
                    <?php endif; ?>
                    <?php if ($process == 'failedpassword') : ?>
                        <div class="alert alert-danger">
                            Register gagal, password tidak sesuai
                        </div>
                    <?php endif; ?>
                    <form class="form-login" method="POST" action="<?= BASE_URL . 'process/process_register.php' ?>">
                        <label class="form-label">Username</label>
                        <input type="text" name="username" class="form-input" required>
                        <label class="form-label">Password</label>
                        <input type="password" name="password" class="form-input" required>
                        <label class="form-label">Re-Password</label>
                        <input type="password" name="repassword" class="form-input" required>
                        <button type="submit" class="btn btn-login">Register</button>
                    </form>
                    <p>Sudah punya akun? <span><a href="<?= BASE_URL . 'index.php' ?>">Masuk disini</a></span></p>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
