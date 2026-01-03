<?php
session_start();
include 'config/koneksi.php';

// Cek Login
if (!isset($_SESSION['status_login'])) { header("Location: login.php"); exit; }

$id_user = $_SESSION['id_user'];

// Ambil data status
$query = mysqli_query($conn, "SELECT * FROM pendaftaran WHERE user_id = '$id_user'");
$data = mysqli_fetch_assoc($query);

// Kalau belum daftar sama sekali
if (!$data) {
    header("Location: dashboard.php"); // Atau formulir.php
    exit;
}

$status = $data['status_pendaftaran']; // 'pending', 'diterima', 'ditolak'
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengumuman Seleksi</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: { extend: { colors: { 'jatim-blue': '#0f172a', 'jatim-gold': '#facc15' } } }
        }
    </script>
</head>
<body class="bg-gray-100 h-screen flex items-center justify-center p-4">

    <div class="bg-white max-w-2xl w-full rounded-2xl shadow-2xl overflow-hidden text-center">
        
        <div class="bg-jatim-blue p-6">
            <h1 class="text-white font-bold text-xl tracking-wide">HASIL SELEKSI PMB 2025</h1>
            <p class="text-blue-200 text-sm">Universitas Keren Jawa Timur</p>
        </div>

        <div class="p-10">
            
            <p class="text-gray-500 mb-2">Halo, <strong><?php echo $_SESSION['nama']; ?></strong></p>
            <p class="text-sm text-gray-400 mb-8">Berdasarkan hasil verifikasi berkas dan seleksi akademik, dinyatakan:</p>

            <?php if ($status == 'pending'): ?>
                
                <div class="bg-yellow-50 border border-yellow-200 rounded-xl p-6">
                    <div class="text-6xl mb-4">⏳</div>
                    <h2 class="text-2xl font-bold text-yellow-600 mb-2">DATA SEDANG DIPROSES</h2>
                    <p class="text-gray-600">Mohon bersabar. Panitia sedang memverifikasi berkas Anda.</p>
                </div>

            <?php elseif ($status == 'diterima'): ?>

                <div class="bg-green-50 border border-green-200 rounded-xl p-8 relative overflow-hidden">
                    <div class="absolute top-0 left-0 w-full h-2 bg-green-500"></div>
                    <div class="text-6xl mb-4">🎉</div>
                    <h2 class="text-3xl font-extrabold text-green-600 mb-2">SELAMAT! ANDA LULUS</h2>
                    <p class="text-gray-700 font-medium">Anda diterima di Program Studi: <br>
                        <span class="text-black font-bold text-lg"><?php echo $data['jurusan_pilihan']; ?></span>
                    </p>
                    
                    <div class="mt-6">
                        <button onclick="window.print()" class="bg-green-600 text-white px-6 py-2 rounded-lg font-bold hover:bg-green-700 transition shadow-lg">
                            Cetak Bukti Lulus
                        </button>
                    </div>
                </div>

            <?php elseif ($status == 'ditolak'): ?>

                <div class="bg-red-50 border border-red-200 rounded-xl p-6">
                    <div class="text-6xl mb-4">😔</div>
                    <h2 class="text-2xl font-bold text-red-600 mb-2">MOHON MAAF</h2>
                    <p class="text-gray-600">Anda belum lolos seleksi tahap ini. Jangan menyerah dan coba lagi tahun depan!</p>
                </div>

            <?php endif; ?>

        </div>

        <div class="bg-gray-50 p-4 border-t border-gray-100">
            <a href="dashboard.php" class="text-gray-500 hover:text-jatim-blue text-sm font-semibold">&larr; Kembali ke Dashboard</a>
        </div>

    </div>

</body>
</html>