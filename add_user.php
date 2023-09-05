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

if (isset($_POST['simpan'])) {
    $nik = $_POST['nik'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $role = $_POST['role'];

    if (!empty($nik) && !empty($username) && !empty($password) && !empty($role)) {
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
    } else {
        $error = "Data Tidak Lengkap";
    }

}
?>

<div id='layoutSidenav_content'>
    <main>
        <div class='container-fluid px-4'>
            <h1 class='mt-4'>Add User</h1>
            <div class="card mb-5">
                <div class="card-header">
                    Create User Account
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
                    <form method="POST" action="">
                        <div class="col-md-6">
                            <label for="nik" class="form-label">NIK</label>
                            <input type="text" class="form-control" name="nik" id="nik" placeholder="KTP/SIM/Paspor"
                                value="<?php echo $nik ?>">
                        </div>
                        <div class="col-md-6">
                            <label for="username" class="form-label">Name</label>
                            <input type="text" class="form-control" name="username" id="username"
                                placeholder="Nama Lengkap" value="<?php echo $username ?>">
                        </div>
                        <div class="col-md-6">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" name="password" id="password"
                                placeholder="user123" value="<?php echo $password ?>">
                        </div>
                        <div class="col-md-6">
                            <label for="role" class="form-label">Role</label>
                            <select class="form-control" name="role" id="role">
                                <option selected>- Pilih Role -</option>
                                <option value="user" <?php if ($role == "user")
                                    echo "selected" ?>>User</option>
                                    <option value="admin" <?php if ($role == "admin")
                                    echo "selected" ?>>Admin</option>
                                </select>
                            </div>
                            <br>
                            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                <button class="btn btn-primary me-md-2" type="submit" name="simpan" id="submit">Add</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </main>
        <?php
                                include 'ds_footer.php';
                                ?>
</div>