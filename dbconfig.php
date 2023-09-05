<?php

// Informasi koneksi database
$host = "localhost";
$username = "root"; // Ganti dengan username database mysql
$password = "";
$database = "db_absensi";

// Membuat koneksi ke database
$conn = mysqli_connect($host, $username, $password, $database);

// Memeriksa apakah koneksi berhasil atau tidak
if (!$conn) {
    die("Koneksi database gagal: ");
}

?>