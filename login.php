<?php
session_start();
include "dbconfig.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f0f0f0;
        }

        .login-container {
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            padding: 20px;
            max-width: 400px;
            margin: 0 auto;
            margin-top: 100px;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1 class="text-center mt-5">PT Kolangkaling Tbk</h1>
        <div class="login-container">
            <h2 class="text-center mb-4">LOGIN</h2>
            <form action="" method="POST">
                <div class="mb-3">
                    <input class="form-control" type="text" name="username" placeholder="Username" required>
                </div>
                <div class="mb-3">
                    <input class="form-control" type="password" name="password" placeholder="Password" required>
                </div>
                <button class="btn btn-primary btn-block" type="submit" name="proseslog">Login</button>
            </form>
            <?php
            if (isset($_POST['proseslog'])) {
                $sql = mysqli_query($conn, "SELECT * FROM user WHERE username = '$_POST[username]'
        AND password = '$_POST[password]'");

                $row = mysqli_fetch_assoc($sql);

                if ($row) {
                    // Cek peran pengguna
                    $role = $row['role'];

                    // Sesuaikan aksi berdasarkan peran
                    if ($role == 'admin') {
                        // Pengguna adalah admin
                        $_SESSION['username'] = $_POST['username'];
                        $_SESSION['role'] = 'admin';
                        echo "<script>window.location.href = 'dashboard.php';</script>";
                    } elseif ($role == 'user') {
                        // Pengguna adalah user
                        $_SESSION['username'] = $_POST['username'];
                        $_SESSION['role'] = 'user';
                        echo "<script>window.location.href = 'absen.php';</script>";
                    } else {
                        // Peran tidak valid
                        echo "<p class='text-danger'><b>Peran tidak valid !!!</b></p>";
                    }
                } else {
                    // Username atau Password salah
                    echo "<p class='text-danger'><b>Username atau Password salah !!!</b></p>";
                }
            }
            ?>

        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>