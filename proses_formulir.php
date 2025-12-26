<?php
session_start();
include 'config/koneksi.php';

// Cek Login
if (!isset($_SESSION['status_login'])) {
    header("Location: login.php");
    exit;
}

if (isset($_POST['simpan'])) {
    
    // 1. Ambil Data Text
    $user_id = $_SESSION['id_user'];
    $telepon = mysqli_real_escape_string($conn, $_POST['no_telepon']);
    $alamat = mysqli_real_escape_string($conn, $_POST['alamat']);
    $sekolah = mysqli_real_escape_string($conn, $_POST['asal_sekolah']);
    $jurusan = mysqli_real_escape_string($conn, $_POST['jurusan']);

    // 2. LOGIKA UPLOAD FILE
    $foto_nama = $_FILES['foto']['name'];
    $foto_tmp = $_FILES['foto']['tmp_name'];
    $foto_size = $_FILES['foto']['size'];
    $foto_error = $_FILES['foto']['error'];

    // Cek ada file yang diupload ga
    if ($foto_error === 4) {
        echo "<script>alert('Pilih foto terlebih dahulu!'); window.location='formulir.php';</script>";
        exit;
    }

    // Cek Ekstensi (Hanya Gambar)
    $ekstensiValid = ['jpg', 'jpeg', 'png'];
    $ekstensiFile = explode('.', $foto_nama);
    $ekstensiFile = strtolower(end($ekstensiValid)); // Ambil ekstensi (jpg)
    
    // Cek Ukuran (Max 2MB)
    if ($foto_size > 2000000) {
        echo "<script>alert('Ukuran file terlalu besar! Max 2MB.'); window.location='formulir.php';</script>";
        exit;
    }

    // GENERATE NAMA BARU (Penting buat Security)
    // Nama file jadi: unikID_namaasli.jpg
    $namaFileBaru = uniqid() . '.' . pathinfo($foto_nama, PATHINFO_EXTENSION);
    
    // Pindahkan file ke folder uploads
    move_uploaded_file($foto_tmp, 'uploads/' . $namaFileBaru);

    // 3. Masukkan ke Database
    // Kita pakai INSERT. (Catatan: Kalau mau fitur edit, nanti querynya beda lagi)
    $query = "INSERT INTO pendaftaran 
              (user_id, alamat, no_telepon, asal_sekolah, jurusan_pilihan, foto_bukti_bayar, status_pendaftaran)
              VALUES 
              ('$user_id', '$alamat', '$telepon', '$sekolah', '$jurusan', '$namaFileBaru', 'pending')";

    if (mysqli_query($conn, $query)) {
        echo "<script>
                alert('Berhasil! Data pendaftaran terkirim.');
                window.location.href='dashboard.php';
              </script>";
    } else {
        echo "Error: " . mysqli_error($conn);
    }

} else {
    header("Location: formulir.php");
}
?>