<?php
session_start();
include '../config/koneksi.php';

// 1. Cek Security Admin
if (!isset($_SESSION['status_login']) || $_SESSION['role'] != 'admin') {
    header("Location: ../login.php");
    exit;
}

// 2. LOGIKA UPDATE STATUS (Terima / Tolak / Reset)
if (isset($_GET['aksi']) && isset($_GET['id'])) {
    $id_daftar = $_GET['id'];
    $aksi = $_GET['aksi'];
    
    $status_baru = 'pending';
    if ($aksi == 'terima') $status_baru = 'diterima';
    if ($aksi == 'tolak') $status_baru = 'ditolak';

    $query_update = "UPDATE pendaftaran SET status_pendaftaran = '$status_baru' WHERE id = '$id_daftar'";
    mysqli_query($conn, $query_update);
    
    // Refresh halaman biar status langsung berubah
    header("Location: verifikasi.php");
}

// 3. AMBIL DATA PESERTA (JOIN TABLE)
// Kita hanya ambil user yang SUDAH isi formulir (Inner Join)
$query = "SELECT pendaftaran.*, users.nama_lengkap, users.email 
          FROM pendaftaran 
          JOIN users ON pendaftaran.user_id = users.id 
          ORDER BY pendaftaran.id DESC";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Verifikasi Peserta - Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body class="bg-gray-100 font-sans">

    <nav class="bg-slate-900 text-white p-4 shadow-md sticky top-0 z-50">
        <div class="container mx-auto flex justify-between items-center">
            <h1 class="font-bold text-lg flex items-center gap-2">
                <i class='bx bxs-user-check'></i> Verifikasi Pendaftaran
            </h1>
            <a href="dashboard.php" class="text-sm hover:text-yellow-400">&larr; Kembali ke Dashboard</a>
        </div>
    </nav>

    <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead class="bg-slate-50 text-slate-500 text-xs uppercase">
                        <tr>
                            <th class="p-4 border-b">Nama / Email</th>
                            <th class="p-4 border-b">Data Akademik</th>
                            <th class="p-4 border-b">Berkas Upload</th>
                            <th class="p-4 border-b">Status Saat Ini</th>
                            <th class="p-4 border-b text-center">Aksi Verifikasi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100 text-sm">
                        
                        <?php 
                        // --- PERBAIKAN: Fungsi ditaruh DI SINI (Sebelum Loop) ---
                        function btnFile($file, $label, $color) {
                            if(!empty($file)) {
                                // Note: Path uploads mundur satu folder (../) karena kita ada di folder admin
                                echo "<a href='../uploads/$file' target='_blank' class='text-[10px] bg-$color-100 text-$color-700 px-2 py-1 rounded hover:bg-$color-200 block w-fit mb-1'>📄 $label</a>";
                            } else {
                                echo "<span class='text-[10px] text-gray-400 block mb-1'>❌ $label Kosong</span>";
                            }
                        }
                        // ---------------------------------------------------------

                        while($row = mysqli_fetch_assoc($result)): 
                        ?>
                        
                        <tr class="hover:bg-blue-50 transition">
                            <td class="p-4 align-top">
                                <div class="font-bold text-slate-800"><?= $row['nama_lengkap'] ?></div>
                                <div class="text-xs text-gray-400"><?= $row['email'] ?></div>
                                <div class="text-xs text-gray-500 mt-1">Telp: <?= $row['no_telepon'] ?></div>
                            </td>

                            <td class="p-4 align-top">
                                <div class="font-semibold text-blue-600"><?= $row['jurusan_pilihan'] ?></div>
                                <div class="text-xs text-gray-500">Asal: <?= $row['asal_sekolah'] ?></div>
                                <div class="text-xs text-gray-500">Alamat: <?= substr($row['alamat'], 0, 30) ?>...</div>
                            </td>

                            <td class="p-4 align-top">
                                <?php 
                                    btnFile($row['file_ijazah'], 'Ijazah', 'purple');
                                    btnFile($row['file_kk'], 'Kartu Keluarga', 'blue');
                                    btnFile($row['file_rapor'], 'Rapor', 'orange');
                                ?>
                            </td>

                            <td class="p-4 align-top">
                                <?php if($row['status_pendaftaran'] == 'pending'): ?>
                                    <span class="bg-yellow-100 text-yellow-800 text-xs font-bold px-2 py-1 rounded">Pending</span>
                                <?php elseif($row['status_pendaftaran'] == 'diterima'): ?>
                                    <span class="bg-green-100 text-green-800 text-xs font-bold px-2 py-1 rounded">Diterima</span>
                                <?php else: ?>
                                    <span class="bg-red-100 text-red-800 text-xs font-bold px-2 py-1 rounded">Ditolak</span>
                                <?php endif; ?>
                            </td>

                            <td class="p-4 align-top text-center">
                                <div class="flex flex-col gap-2">
                                    <a href="verifikasi.php?aksi=terima&id=<?= $row['id'] ?>" onclick="return confirm('Yakin TERIMA peserta ini?')" 
                                       class="bg-green-600 text-white px-3 py-1 rounded text-xs font-bold hover:bg-green-700 shadow">
                                       ✅ Terima
                                    </a>
                                    <a href="verifikasi.php?aksi=tolak&id=<?= $row['id'] ?>" onclick="return confirm('Yakin TOLAK peserta ini?')" 
                                       class="bg-red-500 text-white px-3 py-1 rounded text-xs font-bold hover:bg-red-600 shadow">
                                       ⛔ Tolak
                                    </a>
                                </div>
                            </td>
                        </tr>
                        <?php endwhile; ?>

                    </tbody>
                </table>
            </div>

</body>
</html>