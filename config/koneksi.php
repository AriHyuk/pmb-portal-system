<?php
// config/koneksi.php
$version = "1.1.0-dev";
$hostname = "localhost";
$username = "root";
$password = "";      
$database = "db_spmb";

$conn = mysqli_connect($hostname, $username, $password, $database);

// Cek koneksi berhasil atau tidak
if (!$conn) {
    die("Koneksi Database Gagal: " . mysqli_connect_error());
}
?>