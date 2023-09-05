<?php
include 'dbconfig.php';
include 'session.php';
include 'ds_header.php';

?>

<?php
$nik = "";
$username = "";
$password = "";
$role = "";
$sukses = "";
$error = "";

if (isset($_GET['op'])) {
    $op = $_GET['op'];
} else {
    $op = "";
}

if ($op == 'delete') {
    $id = $_GET['id'];
    $sql1 = "delete from user where id = '$id'";
    $q1 = mysqli_query($conn, $sql1);
    if ($q1) {
        $sukses = "Berhasil Menghapus Data";

    } else {
        $error = "Gagal menghapus Data";
    }
}

if ($op == 'edit') {
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $sql1 = "SELECT * FROM user WHERE id = '$id'";
        $q1 = mysqli_query($conn, $sql1);
        $r2 = mysqli_fetch_array($q1);

        if ($r2) {
            $nik = $r2['nik'];
            $username = $r2['username'];
            $password = $r2['password'];
            $role = $r2['role'];
        } else {
            $error = "Data Tidak Ditemukan";
        }
    } else {
        $error = "ID User tidak valid";
    }
}

if (isset($_POST['simpan'])) {
    $nik = $_POST['nik'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $role = $_POST['role'];

    if (!empty($nik) && !empty($username) && !empty($password) && !empty($role)) {
        if ($op == 'edit') {
            $sql1 = "update user set nik = '$nik',username='$username',password='$password',role='$role' where id = '$id'";
            $q1 = mysqli_query($conn, $sql1);
            if ($q1) {
                $sukses = "Data Berhasil Diupdate";
            } else {
                $error = "Data Gagal Di update";
            }

        } else {
            // Hindari SQL Injection dengan menggunakan prepared statement
            $sql1 = "INSERT INTO user (nik, username, password, role) VALUES (?, ?, ?, ?)";
            $stmt = mysqli_prepare($conn, $sql1);

            if ($stmt) {
                // Bind parameter ke prepared statement
                mysqli_stmt_bind_param($stmt, "ssss", $nik, $username, $password, $role);

                // Eksekusi statement
                if (mysqli_stmt_execute($stmt)) {
                    $sukses = "Berhasil Menambahkan User";
                } else {
                    $error = "Gagal Menambahkan User";
                }

                // Tutup statement
                mysqli_stmt_close($stmt);
            } else {
                $error = "Gagal Menyiapkan Statement SQL";
            }
        }

    } else {
        $error = "Data Tidak Lengkap";
    }

}
?>

<div id='layoutSidenav_content'>
    <main>
        <div class='container-fluid px-4'>
            <h1 class='mt-4'>Delete User</h1>
            <div class="card mb-5">
                <div class="card-header">
                    Delete User Account
                </div>
                <div class="card-body">
                    <?php
                    if ($error) {
                        ?>
                        <div class="alert alert-danger" role="alert">
                            <?php echo $error ?>
                        </div>
                        <?php
                    }
                    ?>
                    <?php
                    if ($sukses) {
                        ?>
                        <div class="alert alert-success" role="alert">
                            <?php echo $sukses ?>
                        </div>
                        <?php
                    }
                    ?>

                </div>
            </div>
        </div>
    </main>
    <?php
    include 'ds_footer.php';
    ?>
</div>