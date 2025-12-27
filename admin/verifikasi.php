<?php
session_start();
include '../config/koneksi.php'; // Pastikan path koneksi benar

// 1. Cek Security Admin
// Pastikan di tabel users ada kolom 'role' atau logika login admin disesuaikan
if (!isset($_SESSION['status_login']) /* || $_SESSION['role'] != 'admin' */) {
    header("Location: ../login.php");
    exit;
}

// 2. LOGIKA UPDATE STATUS (Terima / Tolak)
if (isset($_GET['aksi']) && isset($_GET['id'])) {
    $id_daftar = $_GET['id'];
    $aksi = $_GET['aksi'];
    
    $status_baru = 'pending';
    if ($aksi == 'terima') $status_baru = 'diterima';
    if ($aksi == 'tolak') $status_baru = 'ditolak';

    $query_update = "UPDATE pendaftaran SET status_pendaftaran = '$status_baru' WHERE id = '$id_daftar'";
    mysqli_query($conn, $query_update);
    
    echo "<script>alert('Status berhasil diubah menjadi: $status_baru'); window.location='verifikasi.php';</script>";
}

// 3. AMBIL DATA PESERTA LENGKAP
$query = "SELECT pendaftaran.*, users.nama_lengkap, users.email 
          FROM pendaftaran 
          JOIN users ON pendaftaran.user_id = users.id 
          ORDER BY pendaftaran.tanggal_daftar DESC";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verifikasi Peserta - Admin AdmitFlow</title>
    
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'jatim-blue': '#0f172a',
                        'jatim-gold': '#facc15',
                    }
                }
            }
        }
    </script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700&display=swap');
        body { font-family: 'Inter', sans-serif; }
    </style>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body class="bg-gray-100 flex h-screen overflow-hidden">


    <aside class="w-64 bg-slate-900 text-white flex flex-col shadow-2xl z-20">
        <div class="h-16 flex items-center justify-center border-b border-gray-700 bg-jatim-blue">
            <h1 class="text-xl font-bold tracking-wider">ADMIN<span class="text-jatim-gold">PANEL</span></h1>
        </div>
        
        <nav class="flex-1 px-4 py-6 space-y-2">
            <p class="text-xs text-gray-500 uppercase font-bold mb-2">Main Menu</p>
            
            <a href="dashboard.php" class="flex items-center gap-3 px-4 py-3 bg-jatim-gold text-jatim-blue rounded-lg font-bold shadow-md">
                <i class='bx bxs-dashboard text-xl'></i> <span>Dashboard</span>
            </a>
            
            <a href="verifikasi.php" class="flex items-center gap-3 px-4 py-3 text-gray-400 hover:bg-white/10 hover:text-white rounded-lg transition">
                <i class='bx bxs-user-check text-xl'></i> <span>Verifikasi Peserta</span>
            </a>

            <a href="laporan.php" class="flex items-center gap-3 px-4 py-3 text-gray-400 hover:bg-white/10 hover:text-white rounded-lg transition">
                <i class='bx bxs-report text-xl'></i> <span>Laporan / Export</span>
            </a>

            <div class="mt-8 border-t border-gray-700 pt-4">
                <a href="../logout.php" onclick="return confirm('Logout Admin?')" class="flex items-center gap-3 px-4 py-3 text-red-400 hover:bg-red-900/20 rounded-lg transition">
                    <i class='bx bxs-log-out text-xl'></i> <span>Keluar</span>
                </a>
            </div>
        </nav>
    </aside>

    <div class="flex-1 flex flex-col h-screen overflow-y-auto">
        
        <header class="bg-white shadow-sm p-4 flex justify-between items-center md:hidden">
            <div class="font-bold text-jatim-blue">ADMIN PANEL</div>
            <button class="text-gray-600"><i class='bx bx-menu text-2xl'></i></button>
        </header>

        <main class="p-6 md:p-8">
            <div class="flex justify-between items-center mb-6">
                <div>
                    <h2 class="text-2xl font-bold text-gray-800">Verifikasi Pendaftaran</h2>
                    <p class="text-gray-500 text-sm">Kelola data masuk calon mahasiswa baru.</p>
                </div>
                <div class="bg-white px-4 py-2 rounded shadow text-sm font-semibold text-jatim-blue">
                    Total Peserta: <?= mysqli_num_rows($result) ?>
                </div>
            </div>

            <div class="bg-white rounded-xl shadow-lg overflow-hidden border border-gray-200">
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead class="bg-jatim-blue text-white text-xs uppercase tracking-wider">
                            <tr>
                                <th class="p-4 border-b border-blue-800">Profil Peserta</th>
                                <th class="p-4 border-b border-blue-800">Data Akademik</th>
                                <th class="p-4 border-b border-blue-800">Berkas Upload</th>
                                <th class="p-4 border-b border-blue-800">Status</th>
                                <th class="p-4 border-b border-blue-800 text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100 text-sm text-gray-700">
                            
                            <?php 
                            // Helper function buat tombol file biar rapi
                            function btnFile($file, $label, $icon = 'bxs-file-pdf') {
                                if(!empty($file)) {
                                    return "<a href='../uploads/$file' target='_blank' class='flex items-center gap-2 mb-1 px-2 py-1.5 rounded bg-blue-50 text-blue-700 hover:bg-blue-100 text-xs transition border border-blue-100'>
                                                <i class='bx $icon'></i> $label
                                            </a>";
                                } else {
                                    return "<span class='flex items-center gap-2 mb-1 px-2 py-1.5 rounded bg-gray-100 text-gray-400 text-xs border border-gray-200 cursor-not-allowed'>
                                                <i class='bx bx-x'></i> $label ( - )
                                            </span>";
                                }
                            }

                            while($row = mysqli_fetch_assoc($result)): 
                            ?>
                            
                            <tr class="hover:bg-blue-50/50 transition duration-150">
                                <td class="p-4 align-top w-64">
                                    <div class="flex items-start gap-3">
                                        <div class="w-12 h-12 rounded-lg bg-gray-200 overflow-hidden flex-shrink-0 border border-gray-300">
                                            <?php if(!empty($row['pass_foto'])): ?>
                                                <img src="../uploads/<?= $row['pass_foto'] ?>" class="w-full h-full object-cover">
                                            <?php else: ?>
                                                <div class="w-full h-full flex items-center justify-center text-gray-400"><i class='bx bxs-user'></i></div>
                                            <?php endif; ?>
                                        </div>
                                        <div>
                                            <div class="font-bold text-gray-900"><?= $row['nama_lengkap'] ?></div>
                                            <div class="text-xs text-gray-500 mb-1"><?= $row['email'] ?></div>
                                            <div class="text-xs font-semibold text-gray-600 bg-gray-100 px-2 py-0.5 rounded inline-block">
                                                <i class='bx bxs-phone'></i> <?= $row['no_telepon'] ?>
                                            </div>
                                            <div class="text-[10px] text-gray-400 mt-2">
                                                <?= $row['alamat'] ?>
                                            </div>
                                        </div>
                                    </div>
                                </td>

                                <td class="p-4 align-top">
                                    <div class="space-y-2">
                                        <div>
                                            <span class="text-[10px] uppercase text-gray-400 font-bold">Asal Sekolah</span>
                                            <p class="font-semibold text-gray-800"><?= $row['asal_sekolah'] ?></p>
                                        </div>
                                        <div>
                                            <span class="text-[10px] uppercase text-gray-400 font-bold">Jurusan Pilihan</span>
                                            <p class="font-semibold text-blue-600"><?= $row['jurusan_pilihan'] ?></p>
                                        </div>
                                        <div>
                                            <span class="text-[10px] uppercase text-gray-400 font-bold">Nilai Rata-Rata</span>
                                            <p class="font-bold text-gray-800 text-lg">
                                                <?= $row['nilai_rata_rata'] ?? '0.00' ?>
                                            </p>
                                        </div>
                                    </div>
                                </td>

                                <td class="p-4 align-top w-56">
                                    <div class="grid grid-cols-1 gap-1">
                                        <?= btnFile($row['file_bukti'], 'Bukti Bayar', 'bxs-wallet') ?>
                                        <?= btnFile($row['file_ijazah'], 'Scan Ijazah') ?>
                                        <?= btnFile($row['file_kk'], 'Kartu Keluarga') ?>
                                        <?= btnFile($row['file_rapor'], 'Scan Rapor') ?>
                                    </div>
                                </td>

                                <td class="p-4 align-top">
                                    <?php if($row['status_pendaftaran'] == 'pending'): ?>
                                        <span class="inline-flex items-center gap-1 bg-yellow-100 text-yellow-800 text-xs font-bold px-3 py-1 rounded-full border border-yellow-200">
                                            <span class="w-2 h-2 rounded-full bg-yellow-500 animate-pulse"></span> Pending
                                        </span>
                                    <?php elseif($row['status_pendaftaran'] == 'diterima'): ?>
                                        <span class="inline-flex items-center gap-1 bg-green-100 text-green-800 text-xs font-bold px-3 py-1 rounded-full border border-green-200">
                                            <i class='bx bxs-check-circle'></i> Diterima
                                        </span>
                                    <?php else: ?>
                                        <span class="inline-flex items-center gap-1 bg-red-100 text-red-800 text-xs font-bold px-3 py-1 rounded-full border border-red-200">
                                            <i class='bx bxs-x-circle'></i> Ditolak
                                        </span>
                                    <?php endif; ?>
                                    
                                    <div class="text-[10px] text-gray-400 mt-2">
                                        Daftar: <?= date('d M Y', strtotime($row['tanggal_daftar'])) ?>
                                    </div>
                                </td>

                                <td class="p-4 align-top text-center w-32">
                                    <div class="flex flex-col gap-2">
                                        <a href="verifikasi.php?aksi=terima&id=<?= $row['id'] ?>" onclick="return confirm('Apakah data sudah valid dan ingin MENERIMA siswa ini?')" 
                                           class="w-full bg-emerald-600 text-white px-3 py-2 rounded-lg text-xs font-bold hover:bg-emerald-700 shadow hover:shadow-md transition flex items-center justify-center gap-2">
                                            <i class='bx bx-check-double text-lg'></i> Terima
                                        </a>
                                        
                                        <a href="verifikasi.php?aksi=tolak&id=<?= $row['id'] ?>" onclick="return confirm('Yakin ingin MENOLAK siswa ini?')" 
                                           class="w-full bg-white text-red-600 border border-red-200 px-3 py-2 rounded-lg text-xs font-bold hover:bg-red-50 transition flex items-center justify-center gap-2">
                                            <i class='bx bx-x text-lg'></i> Tolak
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            <?php endwhile; ?>

                        </tbody>
                    </table>
                    
                    <?php if(mysqli_num_rows($result) == 0): ?>
                        <div class="p-10 text-center text-gray-400">
                            <i class='bx bx-folder-open text-6xl mb-2'></i>
                            <p>Belum ada data pendaftaran.</p>
                        </div>
                    <?php endif; ?>

                </div>
            </div>
        </main>
    </div>

</body>
</html>