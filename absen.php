<?php
include "session.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .navbar {
            margin-bottom: 20px;
        }

        .navbar-brand {
            font-size: 1.5rem;
        }

        .button-container {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-wrap: wrap;
            gap: 20px;
            margin-top: 50px;
        }

        .icon-button {
            background-color: #ccc;
            /* Grey background color */
            color: #080808;
            border: none;
            padding: 15px 20px;
            border-radius: 5px;
            cursor: pointer;
            display: flex;
            flex-direction: column;
            align-items: center;
            transition: background-color 0.3s;
        }

        .icon-button:hover {
            background-color: #2991f3;
        }

        .icon-button i {
            font-size: 5rem;
            margin-bottom: 10px;
        }
    </style>
    <title>Absensi</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand"><b>
                <?php echo $_SESSION['username']; ?>
            </b></a>
    </nav>

    <div class="container">
        <div class="button-container">
            <button class="icon-button" id="Masuk">
                <i class="fas fa-user"></i>
                <span>
                    <h5>Masuk</h5>
                </span>
            </button>
            <button class="icon-button" id="Lembur">
                <i class="fas fa-clock"></i>
                <span>
                    <h5>Lembur</h5>
                </span>
            </button>
            <button class="icon-button" id="Pulang">
                <i class="fas fa-sign-out-alt"></i>
                <span>
                    <h5>Pulang</h5>
                </span>
            </button>
        </div>
    </div>
    <script>
        document.getElementById("Masuk").addEventListener("click", function () {
            // Redirect ke halaman masuk.php
            window.location.href = "masuk.php";
        });
        document.getElementById("Lembur").addEventListener("click", function () {
            // Redirect ke halaman lembur.php
            window.location.href = "lembur.php";
        });
        document.getElementById("Pulang").addEventListener("click", function () {
            // Redirect ke halaman pulang.php
            window.location.href = "pulang.php";
        });
    </script>
</body>

</html>