<?php
session_start();

// 1. Cek Security: Apakah user sudah login?
if (!isset($_SESSION['status_login']) || $_SESSION['status_login'] != true) {
    header("Location: login.php?pesan=belum_login");
    exit;
}

// 2. Ambil data session
$nama_user = $_SESSION['nama'];

// (Nanti di sini kita query ke tabel pendaftaran buat cek status, sementara kita hardcode dulu visualnya)
$status_daftar = "Belum Lengkap"; 
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Maba - AdmitFlow</title>
    
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

    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    
    <style>
        /* Custom Font */
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700&display=swap');
        body { font-family: 'Inter', sans-serif; }
    </style>
</head>
<body class="bg-gray-100">

<div class="flex h-screen overflow-hidden">

    <aside class="w-64 bg-jatim-blue text-white hidden md:flex flex-col shadow-2xl z-20">
        <div class="h-16 flex items-center justify-center border-b border-gray-700 bg-slate-900">
            <h1 class="text-xl font-bold tracking-wider text-white">ADMIT<span class="text-jatim-gold">FLOW</span></h1>
        </div>

        <nav class="flex-1 px-4 py-6 space-y-2 overflow-y-auto">
            
            <p class="text-xs text-gray-400 uppercase font-semibold mb-2">Menu Utama</p>
            
            <a href="dashboard.php" class="flex items-center gap-3 px-4 py-3 bg-blue-800 text-white rounded-lg transition shadow-inner border-l-4 border-jatim-gold">
                <i class='bx bxs-dashboard text-xl'></i>
                <span class="font-medium">Dashboard</span>
            </a>

            <a href="formulir.php" class="flex items-center gap-3 px-4 py-3 text-gray-300 hover:bg-slate-800 hover:text-white rounded-lg transition">
                <i class='bx bxs-file-doc text-xl'></i>
                <span class="font-medium">Isi Biodata</span>
            </a>

            <a href="upload.php" class="flex items-center gap-3 px-4 py-3 text-gray-300 hover:bg-slate-800 hover:text-white rounded-lg transition">
                <i class='bx bxs-cloud-upload text-xl'></i>
                <span class="font-medium">Upload Berkas</span>
            </a>

            <p class="text-xs text-gray-400 uppercase font-semibold mt-6 mb-2">Lainnya</p>

            <a href="pengumuman.php" class="flex items-center gap-3 px-4 py-3 text-gray-300 hover:bg-slate-800 hover:text-white rounded-lg transition">
                <i class='bx bxs-bell text-xl'></i>
                <span class="font-medium">Pengumuman</span>
                <span class="ml-auto bg-red-500 text-white text-xs font-bold px-2 py-0.5 rounded-full">1</span>
            </a>
            
            <a href="logout.php" onclick="return confirm('Yakin ingin keluar?')" class="flex items-center gap-3 px-4 py-3 text-red-400 hover:bg-red-900/20 hover:text-red-300 rounded-lg transition mt-auto">
                <i class='bx bxs-log-out text-xl'></i>
                <span class="font-medium">Keluar</span>
            </a>

        </nav>
        
        <div class="p-4 border-t border-gray-700 bg-slate-900">
            <div class="flex items-center gap-3">
                <div class="w-8 h-8 rounded-full bg-jatim-gold flex items-center justify-center text-jatim-blue font-bold">
                    <?php echo substr($nama_user, 0, 1); ?>
                </div>
                <div>
                    <p class="text-sm font-semibold text-white truncate w-32"><?php echo $nama_user; ?></p>
                    <p class="text-xs text-gray-400">Calon Mahasiswa</p>
                </div>
            </div>
        </div>
    </aside>

    <div class="flex-1 flex flex-col h-screen overflow-y-auto">
        
        <header class="h-16 bg-white shadow-sm flex items-center justify-between px-6 sticky top-0 z-10">
            <div class="md:hidden font-bold text-jatim-blue">ADMITFLOW</div> <div class="hidden md:block text-gray-500 text-sm">
                Sistem Penerimaan Mahasiswa Baru &raquo; <span class="text-jatim-blue font-bold">Dashboard</span>
            </div>

            <div class="flex items-center gap-4">
                <button class="relative p-2 text-gray-400 hover:text-jatim-blue transition">
                    <i class='bx bxs-bell text-xl'></i>
                    <span class="absolute top-1 right-1 w-2 h-2 bg-red-500 rounded-full"></span>
                </button>
            </div>
        </header>

        <main class="p-6 md:p-10 bg-gray-50 flex-1">
            
            <div class="bg-gradient-to-r from-jatim-blue to-blue-800 rounded-2xl p-6 md:p-10 text-white shadow-xl mb-8 relative overflow-hidden">
                <div class="relative z-10">
                    <h2 class="text-3xl font-bold mb-2">Halo, <?php echo $nama_user; ?>! 👋</h2>
                    <p class="text-blue-200 mb-6 max-w-xl">Selamat datang di portal pendaftaran. Segera lengkapi data diri dan berkas untuk mengikuti seleksi masuk.</p>
                    
                    <div class="bg-blue-900/50 rounded-full h-4 w-full max-w-lg mb-2 backdrop-blur-sm border border-white/10">
                        <div class="bg-jatim-gold h-4 rounded-full" style="width: 25%"></div> </div>
                    <p class="text-xs text-blue-200 font-semibold">Progres Pendaftaran: 25%</p>
                </div>
                
                <i class='bx bxs-graduation absolute -right-6 -bottom-6 text-[150px] text-white opacity-10 rotate-12'></i>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                
                <div class="bg-white p-6 rounded-xl shadow-sm border-l-4 border-yellow-400 hover:shadow-md transition">
                    <div class="flex justify-between items-start mb-4">
                        <div>
                            <p class="text-xs text-gray-500 font-bold uppercase tracking-wider">Status Seleksi</p>
                            <h3 class="text-lg font-bold text-gray-800 mt-1">Pending</h3>
                        </div>
                        <div class="p-2 bg-yellow-100 text-yellow-600 rounded-lg">
                            <i class='bx bxs-time-five text-xl'></i>
                        </div>
                    </div>
                    <p class="text-sm text-gray-500">Menunggu verifikasi admin.</p>
                </div>

                <div class="bg-white p-6 rounded-xl shadow-sm border-l-4 border-red-500 hover:shadow-md transition">
                    <div class="flex justify-between items-start mb-4">
                        <div>
                            <p class="text-xs text-gray-500 font-bold uppercase tracking-wider">Kelengkapan Berkas</p>
                            <h3 class="text-lg font-bold text-red-500 mt-1">Belum Lengkap</h3>
                        </div>
                        <div class="p-2 bg-red-100 text-red-600 rounded-lg">
                            <i class='bx bxs-file-pdf text-xl'></i>
                        </div>
                    </div>
                    <a href="upload.php" class="text-sm text-red-500 font-semibold hover:underline">Upload sekarang &rarr;</a>
                </div>

                <div class="bg-white p-6 rounded-xl shadow-sm border-l-4 border-blue-500 hover:shadow-md transition">
                    <div class="flex justify-between items-start mb-4">
                        <div>
                            <p class="text-xs text-gray-500 font-bold uppercase tracking-wider">Jadwal Ujian</p>
                            <h3 class="text-lg font-bold text-gray-800 mt-1">-</h3>
                        </div>
                        <div class="p-2 bg-blue-100 text-blue-600 rounded-lg">
                            <i class='bx bxs-calendar text-xl'></i>
                        </div>
                    </div>
                    <p class="text-sm text-gray-500">Menunggu jadwal keluar.</p>
                </div>
            </div>

            <h3 class="text-lg font-bold text-slate-800 mb-4">Aksi Cepat</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                
                <a href="formulir.php" class="group bg-white p-4 rounded-xl border border-gray-200 hover:border-jatim-blue hover:shadow-lg transition cursor-pointer flex flex-col items-center text-center">
                    <div class="w-12 h-12 bg-blue-50 rounded-full flex items-center justify-center text-jatim-blue group-hover:bg-jatim-blue group-hover:text-white transition mb-3">
                        <i class='bx bxs-user-detail text-2xl'></i>
                    </div>
                    <h4 class="font-bold text-gray-700">Isi Biodata</h4>
                    <p class="text-xs text-gray-500 mt-1">Lengkapi data diri utama</p>
                </a>

                <a href="upload.php" class="group bg-white p-4 rounded-xl border border-gray-200 hover:border-jatim-blue hover:shadow-lg transition cursor-pointer flex flex-col items-center text-center">
                    <div class="w-12 h-12 bg-blue-50 rounded-full flex items-center justify-center text-jatim-blue group-hover:bg-jatim-blue group-hover:text-white transition mb-3">
                        <i class='bx bxs-folder-open text-2xl'></i>
                    </div>
                    <h4 class="font-bold text-gray-700">Upload Berkas</h4>
                    <p class="text-xs text-gray-500 mt-1">Ijazah & Foto</p>
                </a>
                
                </div>

        </main>
    </div>
</div>

</body>
</html>