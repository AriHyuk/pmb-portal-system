<?php
session_start();
// Pastikan path ini benar (mundur satu folder dari admin/)
include '../config/koneksi.php'; 

// 1. Cek Security Admin
if (!isset($_SESSION['status_login']) /* || $_SESSION['role'] != 'admin' */) {
    header("Location: ../login.php");
    exit;
}

// 2. LOGIKA UPDATE STATUS
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

// 3. AMBIL DATA PESERTA
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
                        'jatim-blue': '#0f172a', // Slate 900
                        'jatim-gold': '#facc15', // Yellow 400
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
<body class="bg-gray-100 min-h-screen">

    <nav class="bg-jatim-blue text-white shadow-lg sticky top-0 z-50 border-b border-gray-700">
        <div class="container mx-auto px-6 h-16 flex justify-between items-center">
            
            <div class="flex items-center gap-3">
                <a href="dashboard.php" class="text-xl font-bold tracking-wider hover:text-jatim-gold transition">
                    ADMIN<span class="text-jatim-gold">PANEL</span>
                </a>
                <span class="text-gray-500 text-sm hidden md:inline">|</span>
                <span class="text-gray-400 text-sm hidden md:inline">Verifikasi Data</span>
            </div>

            <div class="flex items-center gap-4">
                <a href="dashboard.php" class="text-gray-300 hover:text-white text-sm font-medium transition">
                    <i class='bx bxs-dashboard'></i> Dashboard
                </a>
                <a href="../auth/logout.php" onclick="return confirm('Yakin ingin logout?')" class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded-lg text-xs font-bold transition flex items-center gap-2">
                    <i class='bx bxs-log-out'></i> Keluar
                </a>
            </div>
        </div>
    </nav>

    <main class="container mx-auto px-4 py-8">
        
        <div class="flex flex-col md:flex-row justify-between items-center mb-6 gap-4">
            <div>
                <h2 class="text-2xl font-bold text-gray-800 flex items-center gap-2">
                    <i class='bx bxs-user-check text-jatim-blue'></i> Verifikasi Pendaftaran
                </h2>
                <p class="text-gray-500 text-sm mt-1">Kelola validasi data dan berkas calon mahasiswa baru.</p>
            </div>
            
            <div class="flex gap-3">
                <div class="bg-white px-4 py-2 rounded-lg shadow-sm border border-gray-200 text-sm font-semibold text-gray-600">
                    Total: <span class="text-jatim-blue font-bold"><?= mysqli_num_rows($result) ?></span> Peserta
                </div>
                <a href="verifikasi.php" class="bg-white text-gray-600 border border-gray-200 hover:bg-gray-50 px-3 py-2 rounded-lg shadow-sm transition">
                    <i class='bx bx-refresh text-xl'></i>
                </a>
            </div>
        </div>

        <div class="bg-white rounded-xl shadow-xl overflow-hidden border border-gray-200">
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead class="bg-jatim-blue text-white text-xs uppercase tracking-wider">
                        <tr>
                            <th class="p-4 border-b border-blue-800 w-16 text-center">No</th>
                            <th class="p-4 border-b border-blue-800">Profil Peserta</th>
                            <th class="p-4 border-b border-blue-800">Data Akademik</th>
                            <th class="p-4 border-b border-blue-800">Berkas Upload</th>
                            <th class="p-4 border-b border-blue-800 text-center">Status</th>
                            <th class="p-4 border-b border-blue-800 text-center w-40">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100 text-sm text-gray-700">
                        
                        <?php 
                        // Helper function tombol file
                        function btnFile($file, $label, $icon = 'bxs-file-pdf') {
                            if(!empty($file)) {
                                return "<a href='../uploads/$file' target='_blank' class='flex items-center gap-2 mb-1 px-3 py-1.5 rounded bg-blue-50 text-blue-700 hover:bg-blue-100 text-xs transition border border-blue-100 font-medium'>
                                            <i class='bx $icon'></i> $label
                                        </a>";
                            } else {
                                return "<span class='flex items-center gap-2 mb-1 px-3 py-1.5 rounded bg-gray-50 text-gray-400 text-xs border border-gray-200 cursor-not-allowed'>
                                            <i class='bx bx-x'></i> $label ( - )
                                        </span>";
                            }
                        }

                        $no = 1;
                        while($row = mysqli_fetch_assoc($result)): 
                        ?>
                        
                        <tr class="hover:bg-blue-50/40 transition duration-150 group">
                            <td class="p-4 text-center font-bold text-gray-400 align-top"><?= $no++ ?></td>
                            
                            <td class="p-4 align-top w-72">
                                <div class="flex items-start gap-3">
                                    <div class="w-12 h-12 rounded-full bg-gray-200 overflow-hidden flex-shrink-0 border-2 border-white shadow-sm">
                                        <?php if(!empty($row['pass_foto'])): ?>
                                            <img src="../uploads/<?= $row['pass_foto'] ?>" class="w-full h-full object-cover">
                                        <?php else: ?>
                                            <div class="w-full h-full flex items-center justify-center text-gray-400"><i class='bx bxs-user'></i></div>
                                        <?php endif; ?>
                                    </div>
                                    <div>
                                        <div class="font-bold text-gray-900 text-base"><?= $row['nama_lengkap'] ?></div>
                                        <div class="text-xs text-gray-500 mb-1"><?= $row['email'] ?></div>
                                        <div class="flex gap-1 mt-1">
                                            <span class="text-[10px] font-semibold text-gray-600 bg-gray-100 px-2 py-0.5 rounded border border-gray-200">
                                                <i class='bx bxs-phone'></i> <?= $row['no_telepon'] ?>
                                            </span>
                                        </div>
                                        <p class="text-[10px] text-gray-400 mt-2 leading-tight">
                                            <i class='bx bxs-map'></i> <?= $row['alamat'] ?>
                                        </p>
                                    </div>
                                </div>
                            </td>

                            <td class="p-4 align-top">
                                <div class="space-y-3">
                                    <div>
                                        <span class="text-[10px] uppercase text-gray-400 font-bold block mb-0.5">Asal Sekolah</span>
                                        <p class="font-semibold text-gray-800"><?= $row['asal_sekolah'] ?></p>
                                    </div>
                                    <div>
                                        <span class="text-[10px] uppercase text-gray-400 font-bold block mb-0.5">Jurusan Pilihan</span>
                                        <span class="bg-blue-100 text-blue-700 px-2 py-0.5 rounded text-xs font-bold border border-blue-200">
                                            <?= $row['jurusan_pilihan'] ?>
                                        </span>
                                    </div>
                                    <div>
                                        <span class="text-[10px] uppercase text-gray-400 font-bold block mb-0.5">Nilai Rata-Rata</span>
                                        <p class="font-bold text-gray-800 text-lg">
                                            <?= $row['nilai_rata_rata'] ?? '0.00' ?>
                                        </p>
                                    </div>
                                </div>
                            </td>

                            <td class="p-4 align-top w-60">
                                <div class="grid grid-cols-1 gap-1">
                                    <?= btnFile($row['file_bukti'], 'Bukti Bayar', 'bxs-wallet') ?>
                                    <?= btnFile($row['file_ijazah'], 'Scan Ijazah') ?>
                                    <?= btnFile($row['file_kk'], 'Kartu Keluarga') ?>
                                    <?= btnFile($row['file_rapor'], 'Scan Rapor') ?>
                                </div>
                            </td>

                            <td class="p-4 align-top text-center">
                                <?php if($row['status_pendaftaran'] == 'pending'): ?>
                                    <span class="inline-flex flex-col items-center gap-1 bg-yellow-50 text-yellow-700 px-3 py-2 rounded-lg border border-yellow-200 w-full">
                                        <span class="flex items-center gap-1 text-xs font-bold uppercase">
                                            <span class="w-2 h-2 rounded-full bg-yellow-500 animate-pulse"></span> Pending
                                        </span>
                                        <span class="text-[10px] text-yellow-600/70">Menunggu Review</span>
                                    </span>
                                <?php elseif($row['status_pendaftaran'] == 'diterima'): ?>
                                    <span class="inline-flex flex-col items-center gap-1 bg-green-50 text-green-700 px-3 py-2 rounded-lg border border-green-200 w-full">
                                        <span class="flex items-center gap-1 text-xs font-bold uppercase">
                                            <i class='bx bxs-check-circle'></i> Diterima
                                        </span>
                                        <span class="text-[10px] text-green-600/70">Lulus Seleksi</span>
                                    </span>
                                <?php else: ?>
                                    <span class="inline-flex flex-col items-center gap-1 bg-red-50 text-red-700 px-3 py-2 rounded-lg border border-red-200 w-full">
                                        <span class="flex items-center gap-1 text-xs font-bold uppercase">
                                            <i class='bx bxs-x-circle'></i> Ditolak
                                        </span>
                                        <span class="text-[10px] text-red-600/70">Tidak Lolos</span>
                                    </span>
                                <?php endif; ?>
                                
                                <div class="text-[10px] text-gray-400 mt-2">
                                    <?= date('d/m/Y H:i', strtotime($row['tanggal_daftar'])) ?>
                                </div>
                            </td>

                            <td class="p-4 align-top text-center">
                                <div class="flex flex-col gap-2">
                                    <a href="verifikasi.php?aksi=terima&id=<?= $row['id'] ?>" onclick="return confirm('ACC siswa ini?')" 
                                       class="w-full bg-emerald-600 text-white px-3 py-2 rounded-lg text-xs font-bold hover:bg-emerald-700 shadow-sm hover:shadow hover:-translate-y-0.5 transition flex items-center justify-center gap-2">
                                        <i class='bx bx-check-double text-base'></i> TERIMA
                                    </a>
                                    
                                    <a href="verifikasi.php?aksi=tolak&id=<?= $row['id'] ?>" onclick="return confirm('TOLAK siswa ini?')" 
                                       class="w-full bg-white text-red-600 border border-red-200 px-3 py-2 rounded-lg text-xs font-bold hover:bg-red-50 hover:border-red-300 transition flex items-center justify-center gap-2">
                                        <i class='bx bx-x text-base'></i> TOLAK
                                    </a>
                                </div>
                            </td>
                        </tr>
                        <?php endwhile; ?>

                    </tbody>
                </table>

                <?php if(mysqli_num_rows($result) == 0): ?>
                    <div class="p-16 text-center">
                        <div class="bg-gray-50 w-24 h-24 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class='bx bx-folder-open text-4xl text-gray-300'></i>
                        </div>
                        <h3 class="text-gray-500 font-bold text-lg">Belum Ada Data</h3>
                        <p class="text-gray-400 text-sm">Data pendaftaran akan muncul di sini.</p>
                    </div>
                <?php endif; ?>

            </div>
        </div>

        <div class="mt-6 text-center text-gray-400 text-xs">
            &copy; <?= date('Y') ?> AdmitFlow Admin Panel. Hak Cipta Dilindungi.
        </div>

    </main>

</body>
</html>