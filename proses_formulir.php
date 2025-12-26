<?php
session_start();
include 'config/koneksi.php';

if (!isset($_SESSION['status_login'])) { header("Location: login.php"); exit; }

if (isset($_POST['simpan'])) {
    
    $user_id = $_SESSION['id_user'];
    $telepon = mysqli_real_escape_string($conn, $_POST['no_telepon']);
    $alamat = mysqli_real_escape_string($conn, $_POST['alamat']);
    $sekolah = mysqli_real_escape_string($conn, $_POST['asal_sekolah']);
    $jurusan = mysqli_real_escape_string($conn, $_POST['jurusan']);

    // CEK DATA LAMA
    $cek = mysqli_query($conn, "SELECT * FROM pendaftaran WHERE user_id='$user_id'");
    $data_lama = mysqli_fetch_assoc($cek);
    $sudah_ada = mysqli_num_rows($cek) > 0;

    // LOGIKA UPLOAD FOTO
    $namaFileSimpan = $sudah_ada ? $data_lama['foto_bukti_bayar'] : ''; // Default pakai foto lama
    
    // Cek apakah user upload foto BARU?
    if ($_FILES['foto']['error'] !== 4) { 
        // Ada file baru yang diupload
        $foto_nama = $_FILES['foto']['name'];
        $foto_tmp = $_FILES['foto']['tmp_name'];
        $foto_size = $_FILES['foto']['size'];

        // Validasi simpel
        $ext = strtolower(pathinfo($foto_nama, PATHINFO_EXTENSION));
        if (!in_array($ext, ['jpg', 'jpeg', 'png']) || $foto_size > 2000000) {
             echo "<script>alert('Format/Ukuran Salah!'); window.location='formulir.php';</script>"; exit;
        }

        $namaFileSimpan = uniqid() . '.' . $ext;
        move_uploaded_file($foto_tmp, 'uploads/' . $namaFileSimpan);
        
        // Hapus foto lama biar server bersih
        if($sudah_ada && file_exists('uploads/'.$data_lama['foto_bukti_bayar'])) {
            unlink('uploads/'.$data_lama['foto_bukti_bayar']);
        }
    }

    if ($sudah_ada) {
        // --- PROSES UPDATE ---
        $query = "UPDATE pendaftaran SET 
                  no_telepon='$telepon', alamat='$alamat', asal_sekolah='$sekolah', 
                  jurusan_pilihan='$jurusan', foto_bukti_bayar='$namaFileSimpan' 
                  WHERE user_id='$user_id'";
        $pesan = "Data berhasil diperbarui!";
    } else {
        // --- PROSES INSERT ---
        // Kalau insert tapi ga upload foto (error 4), tolak
        if($_FILES['foto']['error'] === 4) {
             echo "<script>alert('Wajib upload foto untuk pendaftaran baru!'); window.location='formulir.php';</script>"; exit;
        }
        $query = "INSERT INTO pendaftaran (user_id, alamat, no_telepon, asal_sekolah, jurusan_pilihan, foto_bukti_bayar, status_pendaftaran)
                  VALUES ('$user_id', '$alamat', '$telepon', '$sekolah', '$jurusan', '$namaFileSimpan', 'pending')";
        $pesan = "Pendaftaran berhasil disimpan!";
    }

    if (mysqli_query($conn, $query)) {
        echo "<script>alert('$pesan'); window.location.href='dashboard.php';</script>";
    } else {
        echo "Error: " . mysqli_error($conn);
    }

} else {
    header("Location: formulir.php");
}
?>