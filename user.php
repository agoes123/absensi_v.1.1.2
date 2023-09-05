<?php
include 'dbconfig.php';
include 'session.php';
include 'ds_header.php';


?>

<div id='layoutSidenav_content'>
    <div class='container-fluid px-4'>
        <h1 class='mt-4'>Detail User</h1>
    </div>
    <div class="card-body">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">NIK</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Password</th>
                    <th scope="col">Role</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql2 = "SELECT * FROM user ORDER BY id DESC";
                $q2 = mysqli_query($conn, $sql2);
                $urut = 1;

                while ($r2 = mysqli_fetch_array($q2)) {
                    $id = $r2['id'];
                    $nik = $r2['nik'];
                    $username = $r2['username'];
                    $password = $r2['password'];
                    $role = $r2['role'];
                    ?>
                    <tr>
                        <th scope="row">
                            <?php echo $urut++ ?>
                        </th>
                        <td scope="row">
                            <?php echo $nik ?>
                        </td>
                        <td scope="row">
                            <?php echo $username ?>
                        </td>
                        <td scope="row">
                            <?php echo $password ?>
                        </td>
                        <td scope="row">
                            <?php echo $role ?>
                        </td>
                        <td scope="row">
                            <a href="edit_user.php?op=edit&id=<?php echo $id ?>"><button type="button"
                                    class="btn btn-warning btn-sm" name="edit" id="edit">Edit</button></a>
                            <a href="delete_user.php?op=delete&id=<?php echo $id ?>"
                                onclick="return confirm('Apakah Anda akan menghapus data ini ?')"><button type="button"
                                    class="btn btn-danger btn-sm">Delete</button></a>

                        </td>
                    </tr>
                    <?php
                }
                ?>
            </tbody>
        </table>
    </div>
</div>
<?php
include 'ds_footer.php';
?>