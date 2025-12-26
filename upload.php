<?php
session_start();
include 'config/koneksi.php';

if (!isset($_SESSION['status_login'])) { header("Location: login.php"); exit; }
$id_user = $_SESSION['id_user'];

// Cek data saat ini
$data = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM pendaftaran WHERE user_id = '$id_user'"));
if (!$data) { echo "<script>window.location='formulir.php';</script>"; exit; }

// FUNGSI PRAKTIS: Upload File (Biar kodingan gak diulang-ulang)
function prosesUpload($inputName, $columnName, $conn, $id_user) {
    global $data; // Ambil data lama
    
    if (isset($_FILES[$inputName]) && $_FILES[$inputName]['error'] == 0) {
        $file_name = $_FILES[$inputName]['name'];
        $file_tmp = $_FILES[$inputName]['tmp_name'];
        $file_size = $_FILES[$inputName]['size'];
        
        // Validasi
        $ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
        if (!in_array($ext, ['pdf','jpg','jpeg','png'])) {
            echo "<script>alert('Format $inputName salah! Hanya PDF/JPG.');</script>";
            return false;
        }
        if ($file_size > 5000000) {
            echo "<script>alert('Ukuran $inputName terlalu besar (Max 5MB).');</script>";
            return false;
        }

        // Upload & Update DB
        $newName = strtoupper($inputName) . "_" . uniqid() . "." . $ext;
        if(move_uploaded_file($file_tmp, 'uploads/' . $newName)) {
            // Hapus file lama kalau ada (biar server gak penuh sampah)
            if(!empty($data[$columnName]) && file_exists('uploads/'.$data[$columnName])){
                unlink('uploads/'.$data[$columnName]);
            }
            
            mysqli_query($conn, "UPDATE pendaftaran SET $columnName = '$newName' WHERE user_id = '$id_user'");
            return true;
        }
    }
    return false;
}

// Logic Handle Form (Looping cek tombol mana yang diklik)
if (isset($_POST['upload_ijazah'])) {
    if(prosesUpload('ijazah', 'file_ijazah', $conn, $id_user)) header("Refresh:0");
}
if (isset($_POST['upload_kk'])) {
    if(prosesUpload('kk', 'file_kk', $conn, $id_user)) header("Refresh:0");
}
if (isset($_POST['upload_rapor'])) {
    if(prosesUpload('rapor', 'file_rapor', $conn, $id_user)) header("Refresh:0");
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Dokumen Lengkap</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body class="bg-gray-100 font-sans pb-20">

    <nav class="bg-slate-900 p-4 text-white flex justify-between items-center shadow-md">
        <h1 class="font-bold text-lg flex items-center gap-2">
            <i class='bx bxs-folder-open'></i> Kelengkapan Berkas
        </h1>
        <a href="dashboard.php" class="text-sm hover:text-yellow-400">Kembali ke Dashboard</a>
    </nav>

    <div class="max-w-5xl mx-auto mt-8 px-4">
        
        <div class="bg-white p-6 rounded-xl shadow-sm mb-6 border-l-4 border-yellow-400">
            <h2 class="text-xl font-bold text-slate-800">Status Dokumen</h2>
            <p class="text-sm text-gray-500">Wajib upload semua dokumen agar bisa diverifikasi oleh Admin.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

            <div class="bg-white rounded-xl shadow-md overflow-hidden">
                <div class="bg-blue-50 p-4 border-b border-blue-100 flex justify-between items-center">
                    <h3 class="font-bold text-blue-900">Kartu Keluarga</h3>
                    <?php if(!empty($data['file_kk'])): ?>
                        <span class="text-green-600 text-xs font-bold bg-green-100 px-2 py-1 rounded">✔ Ada</span>
                    <?php else: ?>
                        <span class="text-red-500 text-xs font-bold bg-red-100 px-2 py-1 rounded">✖ Kosong</span>
                    <?php endif; ?>
                </div>
                <div class="p-6">
                    <form method="POST" enctype="multipart/form-data">
                        <input type="file" name="kk" required accept=".pdf,.jpg" class="block w-full text-sm text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-xs file:bg-blue-600 file:text-white mb-4">
                        <button type="submit" name="upload_kk" class="w-full bg-slate-800 text-white text-sm py-2 rounded hover:bg-slate-900 transition">Upload KK</button>
                    </form>
                    <?php if(!empty($data['file_kk'])): ?>
                        <a href="uploads/<?= $data['file_kk'] ?>" target="_blank" class="block mt-3 text-center text-xs text-blue-600 hover:underline">Lihat File</a>
                    <?php endif; ?>
                </div>
            </div>

            <div class="bg-white rounded-xl shadow-md overflow-hidden">
                <div class="bg-purple-50 p-4 border-b border-purple-100 flex justify-between items-center">
                    <h3 class="font-bold text-purple-900">Ijazah / SKL</h3>
                    <?php if(!empty($data['file_ijazah'])): ?>
                        <span class="text-green-600 text-xs font-bold bg-green-100 px-2 py-1 rounded">✔ Ada</span>
                    <?php else: ?>
                        <span class="text-red-500 text-xs font-bold bg-red-100 px-2 py-1 rounded">✖ Kosong</span>
                    <?php endif; ?>
                </div>
                <div class="p-6">
                    <form method="POST" enctype="multipart/form-data">
                        <input type="file" name="ijazah" required accept=".pdf,.jpg" class="block w-full text-sm text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-xs file:bg-purple-600 file:text-white mb-4">
                        <button type="submit" name="upload_ijazah" class="w-full bg-slate-800 text-white text-sm py-2 rounded hover:bg-slate-900 transition">Upload Ijazah</button>
                    </form>
                    <?php if(!empty($data['file_ijazah'])): ?>
                        <a href="uploads/<?= $data['file_ijazah'] ?>" target="_blank" class="block mt-3 text-center text-xs text-purple-600 hover:underline">Lihat File</a>
                    <?php endif; ?>
                </div>
            </div>

            <div class="bg-white rounded-xl shadow-md overflow-hidden">
                <div class="bg-orange-50 p-4 border-b border-orange-100 flex justify-between items-center">
                    <h3 class="font-bold text-orange-900">Scan Rapor (Sem 1-5)</h3>
                    <?php if(!empty($data['file_rapor'])): ?>
                        <span class="text-green-600 text-xs font-bold bg-green-100 px-2 py-1 rounded">✔ Ada</span>
                    <?php else: ?>
                        <span class="text-red-500 text-xs font-bold bg-red-100 px-2 py-1 rounded">✖ Kosong</span>
                    <?php endif; ?>
                </div>
                <div class="p-6">
                    <form method="POST" enctype="multipart/form-data">
                        <input type="file" name="rapor" required accept=".pdf" class="block w-full text-sm text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-xs file:bg-orange-600 file:text-white mb-4">
                        <p class="text-xs text-gray-400 mb-2">*Format PDF (Digabung)</p>
                        <button type="submit" name="upload_rapor" class="w-full bg-slate-800 text-white text-sm py-2 rounded hover:bg-slate-900 transition">Upload Rapor</button>
                    </form>
                    <?php if(!empty($data['file_rapor'])): ?>
                        <a href="uploads/<?= $data['file_rapor'] ?>" target="_blank" class="block mt-3 text-center text-xs text-orange-600 hover:underline">Lihat File</a>
                    <?php endif; ?>
                </div>
            </div>

        </div>

        <div class="mt-8 text-center">
            <a href="dashboard.php" class="inline-block px-8 py-3 bg-green-600 text-white font-bold rounded-lg hover:bg-green-700 shadow-lg transition">
                Selesai & Kembali ke Dashboard
            </a>
        </div>

    </div>
</body>
</html>