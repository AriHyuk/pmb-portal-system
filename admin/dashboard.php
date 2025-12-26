<?php
session_start();
include '../config/koneksi.php'; // Mundur satu folder untuk cari koneksi

// 1. CEK SECURITY: Wajib Admin!
if (!isset($_SESSION['status_login']) || $_SESSION['role'] != 'admin') {
    header("Location: ../login.php?pesan=dilarang");
    exit;
}

// 2. LOGIKA STATISTIK (Query Database)
// Hitung Total Akun Maba
$q_user = mysqli_query($conn, "SELECT COUNT(*) as total FROM users WHERE role='maba'");
$d_user = mysqli_fetch_assoc($q_user);

// Hitung Pendaftar yang sudah isi formulir (Status Pending)
$q_pending = mysqli_query($conn, "SELECT COUNT(*) as total FROM pendaftaran WHERE status_pendaftaran='pending'");
$d_pending = mysqli_fetch_assoc($q_pending);

// Hitung yang Lulus
$q_lulus = mysqli_query($conn, "SELECT COUNT(*) as total FROM pendaftaran WHERE status_pendaftaran='diterima'");
$d_lulus = mysqli_fetch_assoc($q_lulus);

// Ambil 5 Pendaftar Terbaru (Join tabel users & pendaftaran)
$q_terbaru = mysqli_query($conn, "
    SELECT users.nama_lengkap, users.email, pendaftaran.jurusan_pilihan, pendaftaran.status_pendaftaran, pendaftaran.tanggal_daftar 
    FROM users 
    JOIN pendaftaran ON users.id = pendaftaran.user_id 
    ORDER BY pendaftaran.id DESC 
    LIMIT 5
");
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin - SPMB</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: { 'jatim-blue': '#0f172a', 'jatim-gold': '#facc15' }
                }
            }
        }
    </script>
    <style>@import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700&display=swap'); body { font-family: 'Inter', sans-serif; }</style>
</head>
<body class="bg-gray-100 font-sans text-slate-800">

<div class="flex h-screen overflow-hidden">

    <aside class="w-64 bg-slate-900 text-white flex flex-col shadow-2xl z-20">
        <div class="h-16 flex items-center justify-center border-b border-gray-700 bg-jatim-blue">
            <h1 class="text-xl font-bold tracking-wider">ADMIN<span class="text-jatim-gold">PANEL</span></h1>
        </div>
        
        <nav class="flex-1 px-4 py-6 space-y-2">
            <p class="text-xs text-gray-500 uppercase font-bold mb-2">Main Menu</p>
            
            <a href="dashboard.php" class="flex items-center gap-3 px-4 py-3 bg-jatim-gold text-jatim-blue rounded-lg font-bold shadow-md">
                <i class='bx bxs-dashboard text-xl'></i>
                <span>Dashboard</span>
            </a>
            
            <a href="verifikasi.php" class="flex items-center gap-3 px-4 py-3 text-gray-400 hover:bg-white/10 hover:text-white rounded-lg transition">
                <i class='bx bxs-user-check text-xl'></i>
                <span>Verifikasi Peserta</span>
                <?php if($d_pending['total'] > 0): ?>
                    <span class="ml-auto bg-red-500 text-white text-xs px-2 py-0.5 rounded-full"><?= $d_pending['total'] ?></span>
                <?php endif; ?>
            </a>

            <a href="laporan.php" class="flex items-center gap-3 px-4 py-3 text-gray-400 hover:bg-white/10 hover:text-white rounded-lg transition">
                <i class='bx bxs-report text-xl'></i>
                <span>Laporan / Export</span>
            </a>

            <div class="mt-8 border-t border-gray-700 pt-4">
                <a href="../logout.php" onclick="return confirm('Logout Admin?')" class="flex items-center gap-3 px-4 py-3 text-red-400 hover:bg-red-900/20 rounded-lg transition">
                    <i class='bx bxs-log-out text-xl'></i>
                    <span>Keluar</span>
                </a>
            </div>
        </nav>
    </aside>

    <div class="flex-1 flex flex-col h-screen overflow-y-auto">
        
        <header class="h-16 bg-white shadow-sm flex items-center justify-between px-8 sticky top-0 z-10">
            <div class="text-gray-500 text-sm">Selamat Datang, <span class="font-bold text-jatim-blue">Administrator</span></div>
            <div class="w-8 h-8 rounded-full bg-slate-200 flex items-center justify-center font-bold text-slate-600">A</div>
        </header>

        <main class="p-8 bg-gray-50 flex-1">
            
            <div class="flex justify-between items-center mb-8">
                <h2 class="text-2xl font-bold text-slate-800">Ringkasan Statistik</h2>
                <span class="text-sm text-gray-500"><?php echo date('d F Y'); ?></span>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-10">
                
                <div class="bg-white p-6 rounded-xl shadow-sm border-b-4 border-blue-500 flex items-center gap-4">
                    <div class="w-12 h-12 bg-blue-100 text-blue-600 rounded-lg flex items-center justify-center text-2xl"><i class='bx bxs-user-account'></i></div>
                    <div>
                        <p class="text-gray-500 text-xs font-bold uppercase">Total Akun</p>
                        <h3 class="text-2xl font-bold text-slate-800"><?= $d_user['total'] ?></h3>
                    </div>
                </div>

                <div class="bg-white p-6 rounded-xl shadow-sm border-b-4 border-yellow-400 flex items-center gap-4">
                    <div class="w-12 h-12 bg-yellow-100 text-yellow-600 rounded-lg flex items-center justify-center text-2xl"><i class='bx bxs-time'></i></div>
                    <div>
                        <p class="text-gray-500 text-xs font-bold uppercase">Perlu Verifikasi</p>
                        <h3 class="text-2xl font-bold text-slate-800"><?= $d_pending['total'] ?></h3>
                    </div>
                </div>

                <div class="bg-white p-6 rounded-xl shadow-sm border-b-4 border-green-500 flex items-center gap-4">
                    <div class="w-12 h-12 bg-green-100 text-green-600 rounded-lg flex items-center justify-center text-2xl"><i class='bx bxs-check-shield'></i></div>
                    <div>
                        <p class="text-gray-500 text-xs font-bold uppercase">Lulus Seleksi</p>
                        <h3 class="text-2xl font-bold text-slate-800"><?= $d_lulus['total'] ?></h3>
                    </div>
                </div>

                <div class="bg-white p-6 rounded-xl shadow-sm border-b-4 border-purple-500 flex items-center gap-4">
                    <div class="w-12 h-12 bg-purple-100 text-purple-600 rounded-lg flex items-center justify-center text-2xl"><i class='bx bxs-school'></i></div>
                    <div>
                        <p class="text-gray-500 text-xs font-bold uppercase">Total Jurusan</p>
                        <h3 class="text-2xl font-bold text-slate-800">5</h3>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-xl shadow-lg border border-gray-100 overflow-hidden">
                <div class="px-6 py-4 border-b border-gray-100 flex justify-between items-center bg-gray-50">
                    <h3 class="font-bold text-slate-700">Pendaftaran Terbaru Masuk</h3>
                    <a href="verifikasi.php" class="text-sm text-jatim-blue hover:underline font-semibold">Lihat Semua &rarr;</a>
                </div>
                
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-gray-50 text-gray-500 text-xs uppercase tracking-wider">
                                <th class="px-6 py-3 font-semibold">Nama Peserta</th>
                                <th class="px-6 py-3 font-semibold">Jurusan</th>
                                <th class="px-6 py-3 font-semibold">Tanggal</th>
                                <th class="px-6 py-3 font-semibold">Status</th>
                                <th class="px-6 py-3 font-semibold text-right">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100 text-sm">
                            
                            <?php if(mysqli_num_rows($q_terbaru) > 0): ?>
                                <?php while($row = mysqli_fetch_assoc($q_terbaru)): ?>
                                <tr class="hover:bg-blue-50/50 transition">
                                    <td class="px-6 py-4">
                                        <p class="font-bold text-slate-700"><?= $row['nama_lengkap'] ?></p>
                                        <p class="text-xs text-gray-400"><?= $row['email'] ?></p>
                                    </td>
                                    <td class="px-6 py-4 text-gray-600"><?= $row['jurusan_pilihan'] ?></td>
                                    <td class="px-6 py-4 text-gray-500"><?= date('d/m/Y', strtotime($row['tanggal_daftar'])) ?></td>
                                    <td class="px-6 py-4">
                                        <?php if($row['status_pendaftaran'] == 'pending'): ?>
                                            <span class="px-3 py-1 bg-yellow-100 text-yellow-700 rounded-full text-xs font-bold">Pending</span>
                                        <?php elseif($row['status_pendaftaran'] == 'diterima'): ?>
                                            <span class="px-3 py-1 bg-green-100 text-green-700 rounded-full text-xs font-bold">Lulus</span>
                                        <?php else: ?>
                                            <span class="px-3 py-1 bg-red-100 text-red-700 rounded-full text-xs font-bold">Ditolak</span>
                                        <?php endif; ?>
                                    </td>
                                    <td class="px-6 py-4 text-right">
                                        <a href="#" class="text-blue-600 hover:text-blue-800 font-semibold text-xs border border-blue-200 px-3 py-1 rounded hover:bg-blue-50">Detail</a>
                                    </td>
                                </tr>
                                <?php endwhile; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="5" class="px-6 py-8 text-center text-gray-400 italic">Belum ada data pendaftaran masuk.</td>
                                </tr>
                            <?php endif; ?>

                        </tbody>
                    </table>
                </div>
            </div>

        </main>
    </div>
</div>

</body>
</html>