<?php
// 1. Inisialisasi session biar kita bisa akses data yang mau dihapus
session_start();

// 2. Kosongkan semua variabel session ($_SESSION['id'], $_SESSION['role'], dll)
$_SESSION = [];

// 3. Hapus session dari memori server
session_unset();

// 4. Hancurkan session sepenuhnya
session_destroy();

// 5. Tendang user kembali ke halaman login dengan pesan
header("Location: login.php?pesan=logout");
exit;
?>