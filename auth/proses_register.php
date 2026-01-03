<?php
// Panggil koneksi database
include '../config/koneksi.php';

// Cek apakah tombol daftar ditekan
if (isset($_POST['register'])) {

    // Ambil data dari form dan amankan dari karakter aneh (SQL Injection)
    $nama = mysqli_real_escape_string($conn, $_POST['nama_lengkap']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $confirm_pass = mysqli_real_escape_string($conn, $_POST['konfirmasi_password']);

    // 1. Validasi Password
    if ($password != $confirm_pass) {
        echo "<script>
                alert('Password dan Konfirmasi Password tidak sama!');
                window.location.href='auth/register.php';
              </script>";
        exit; // Stop proses
    }

    // 2. Cek apakah email sudah terdaftar
    $cek_email = mysqli_query($conn, "SELECT email FROM users WHERE email = '$email'");
    if (mysqli_num_rows($cek_email) > 0) {
        echo "<script>
                alert('Email sudah terdaftar! Silakan login.');
                window.location.href='login.php';
              </script>";
        exit;
    }

    // 3. Enkripsi Password (Wajib untuk keamanan!)
    // Kita pakai MD5 untuk pemula, tapi di industri nanti pakai password_hash()
    $password_hashed = md5($password); 

    // 4. Masukkan ke Database
    $query = "INSERT INTO users (nama_lengkap, email, password, role) VALUES ('$nama', '$email', '$password_hashed', 'maba')";
    
    if (mysqli_query($conn, $query)) {
        // Jika berhasil
        echo "<script>
                alert('Pendaftaran Berhasil! Silakan Login.');
                window.location.href='login.php';
              </script>";
    } else {
        // Jika gagal
        echo "Error: " . $query . "<br>" . mysqli_error($conn);
    }

} else {
    // Kalau user coba buka file ini tanpa lewat form
    header("Location: auth/register.php");
}
?>