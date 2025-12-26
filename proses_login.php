<?php
// 1. Mulai Session (Wajib di baris pertama!)
session_start();

// 2. Panggil Koneksi Database
include 'config/koneksi.php';

// 3. Cek apakah tombol login ditekan
if (isset($_POST['login'])) {

    // Ambil data input & bersihkan dari karakter berbahaya (SQL Injection prevention)
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    // Ubah password jadi MD5 (sesuai saat register tadi)
    // Note Profesional: Nanti di dunia kerja pakai password_verify(), tapi untuk tugas ini MD5 cukup.
    $password_hash = md5($password);

    // 4. Cek ke Database
    $query = "SELECT * FROM users WHERE email = '$email' AND password = '$password_hash'";
    $result = mysqli_query($conn, $query);

    // Hitung jumlah data yang ditemukan
    if (mysqli_num_rows($result) > 0) {
        
        // Ambil datanya
        $data = mysqli_fetch_assoc($result);

        // 5. SET SESSION (Menyimpan tiket masuk user)
        $_SESSION['id_user'] = $data['id'];
        $_SESSION['nama'] = $data['nama_lengkap'];
        $_SESSION['role'] = $data['role']; // 'admin' atau 'maba'
        $_SESSION['status_login'] = true;

        // 6. Cek Role (Admin atau Maba?)
        if ($data['role'] == "admin") {
            // Jika Admin, lempar ke folder admin
            header("Location: admin/dashboard.php");
        } else {
            // Jika Maba, lempar ke dashboard maba
            header("Location: dashboard.php");
        }

    } else {
        // Jika Gagal (Email/Pass salah)
        header("Location: login.php?pesan=gagal");
    }

} else {
    // Kalau coba akses file ini langsung tanpa lewat form
    header("Location: login.php");
}
?>