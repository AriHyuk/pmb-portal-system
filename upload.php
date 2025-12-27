<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Arsip Dokumen Sihir - Hogwarts</title>
    
    <script src="https://cdn.tailwindcss.com"></script>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        hogwarts: {
                            dark: '#0f172a',
                            light: '#1e293b',
                            gold: '#d4af37',
                        }
                    },
                    fontFamily: {
                        hogwarts: ['Cinzel', 'serif'],
                    }
                }
            }
        }
    </script>
    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@400;700&display=swap" rel="stylesheet">
    
    <style>
        /* Custom Scrollbar */
        ::-webkit-scrollbar { width: 8px; }
        ::-webkit-scrollbar-track { background: #0f172a; }
        ::-webkit-scrollbar-thumb { background: #d4af37; border-radius: 4px; }
        
        .glow-text { text-shadow: 0 0 10px rgba(212, 175, 55, 0.3); }
        .glass-card {
            background: rgba(30, 41, 59, 0.7);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(212, 175, 55, 0.2);
        }
    </style>
</head>
<body class="bg-hogwarts-dark font-sans text-gray-300 min-h-screen pb-20 relative bg-[url('https://www.transparenttextures.com/patterns/stardust.png')]">

    <nav class="sticky top-0 z-50 bg-hogwarts-dark/95 border-b border-hogwarts-gold/30 shadow-lg backdrop-blur-md">
        <div class="container mx-auto px-6 py-4 flex justify-between items-center">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 rounded-full bg-hogwarts-gold p-0.5 shadow-[0_0_10px_rgba(212,175,55,0.5)]">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/6/6e/Harry_Potter_wordmark.svg/1200px-Harry_Potter_wordmark.svg.png" 
                         class="w-full h-full object-contain filter invert opacity-80">
                </div>
                <div>
                    <h1 class="font-hogwarts font-bold text-lg text-white tracking-wider glow-text">ARSIP DOKUMEN</h1>
                    <p class="text-[10px] text-hogwarts-gold uppercase tracking-widest">Kementerian Sihir Akademik</p>
                </div>
            </div>
            <a href="dashboard.php" class="px-4 py-2 text-xs font-bold text-hogwarts-gold border border-hogwarts-gold/50 rounded hover:bg-hogwarts-gold hover:text-hogwarts-dark transition duration-300 flex items-center gap-2">
                <i class="fas fa-arrow-left"></i> KEMBALI
            </a>
        </div>
    </nav>

    <div class="container mx-auto mt-10 px-3">
        
        <div class="glass-card rounded-xl p-6 mb-10 flex flex-col md:flex-row items-center justify-between gap-4 border-l-4 border-l-hogwarts-gold shadow-2xl relative overflow-hidden group">
            <div class="absolute -right-10 -top-10 opacity-10 group-hover:opacity-20 transition duration-500">
                <i class="fas fa-scroll text-9xl text-hogwarts-gold"></i>
            </div>
            
            <div class="z-10">
                <h2 class="text-2xl font-hogwarts font-bold text-white mb-1">Status Kelengkapan Berkas</h2>
                <p class="text-sm text-gray-400">Pastikan seluruh dokumen sihir Anda terunggah dengan format yang benar (PDF/JPG).</p>
            </div>
            
            <?php 
                $uploaded = 0;
                if(!empty($data['file_kk'])) $uploaded++;
                if(!empty($data['file_ijazah'])) $uploaded++;
                if(!empty($data['file_rapor'])) $uploaded++;
                $percent = ($uploaded / 3) * 100;
            ?>
            <div class="flex items-center gap-4 z-10 w-full md:w-auto bg-hogwarts-dark/50 p-3 rounded-lg border border-white/10">
                <div class="text-right">
                    <span class="block text-xs text-gray-400 uppercase">Progress</span>
                    <span class="font-bold text-hogwarts-gold text-lg"><?= $uploaded ?>/3</span>
                </div>
                <div class="w-32 h-2 bg-gray-700 rounded-full overflow-hidden">
                    <div class="h-full bg-gradient-to-r from-hogwarts-gold to-yellow-600 transition-all duration-1000" style="width: <?= $percent ?>%"></div>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

            <div class="glass-card rounded-xl overflow-hidden hover:transform hover:-translate-y-2 transition duration-300 group">
                <div class="h-2 bg-blue-500 w-full shadow-[0_0_10px_#3b82f6]"></div>
                <div class="p-6 text-center">
                    <div class="w-16 h-16 mx-auto bg-blue-900/30 rounded-full flex items-center justify-center mb-4 group-hover:scale-110 transition border border-blue-500/30">
                        <i class='bx bxs-id-card text-3xl text-blue-400'></i>
                    </div>
                    <h3 class="font-hogwarts font-bold text-white text-lg mb-1">Kartu Keluarga</h3>
                    <p class="text-xs text-gray-500 mb-4">Bukti Identitas Muggle/Penyihir</p>
                    
                    <?php if(!empty($data['file_kk'])): ?>
                        <div class="bg-green-900/30 text-green-400 text-xs py-1 px-3 rounded-full inline-flex items-center gap-1 mb-4 border border-green-500/30">
                            <i class='bx bxs-check-circle'></i> Terunggah
                        </div>
                        <a href="uploads/<?= $data['file_kk'] ?>" target="_blank" class="block w-full py-2 text-xs font-bold text-blue-400 border border-blue-500/30 rounded hover:bg-blue-900/50 transition">
                            <i class='bx bx-search'></i> LIHAT BERKAS
                        </a>
                    <?php else: ?>
                        <div class="bg-red-900/30 text-red-400 text-xs py-1 px-3 rounded-full inline-flex items-center gap-1 mb-4 border border-red-500/30">
                            <i class='bx bxs-x-circle'></i> Belum Ada
                        </div>
                    <?php endif; ?>

                    <form method="POST" enctype="multipart/form-data" class="mt-4 pt-4 border-t border-gray-700">
                        <label class="block cursor-pointer bg-blue-600 hover:bg-blue-700 text-white text-sm font-bold py-2 px-4 rounded transition text-center shadow-lg">
                            <span>PILIH FILE</span>
                            <input type="file" name="kk" class="hidden" onchange="this.form.submit()" accept=".pdf,.jpg">
                        </label>
                        <input type="hidden" name="upload_kk" value="1">
                        <p class="text-[10px] text-gray-500 mt-2">*Otomatis upload saat dipilih</p>
                    </form>
                </div>
            </div>

            <div class="glass-card rounded-xl overflow-hidden hover:transform hover:-translate-y-2 transition duration-300 group">
                <div class="h-2 bg-red-600 w-full shadow-[0_0_10px_#dc2626]"></div>
                <div class="p-6 text-center">
                    <div class="w-16 h-16 mx-auto bg-red-900/30 rounded-full flex items-center justify-center mb-4 group-hover:scale-110 transition border border-red-500/30">
                        <i class='bx bxs-graduation text-3xl text-red-400'></i>
                    </div>
                    <h3 class="font-hogwarts font-bold text-white text-lg mb-1">Ijazah / SKL</h3>
                    <p class="text-xs text-gray-500 mb-4">Bukti Kelulusan Sekolah Sihir</p>
                    
                    <?php if(!empty($data['file_ijazah'])): ?>
                        <div class="bg-green-900/30 text-green-400 text-xs py-1 px-3 rounded-full inline-flex items-center gap-1 mb-4 border border-green-500/30">
                            <i class='bx bxs-check-circle'></i> Terunggah
                        </div>
                        <a href="uploads/<?= $data['file_ijazah'] ?>" target="_blank" class="block w-full py-2 text-xs font-bold text-red-400 border border-red-500/30 rounded hover:bg-red-900/50 transition">
                            <i class='bx bx-search'></i> LIHAT BERKAS
                        </a>
                    <?php else: ?>
                        <div class="bg-red-900/30 text-red-400 text-xs py-1 px-3 rounded-full inline-flex items-center gap-1 mb-4 border border-red-500/30">
                            <i class='bx bxs-x-circle'></i> Belum Ada
                        </div>
                    <?php endif; ?>

                    <form method="POST" enctype="multipart/form-data" class="mt-4 pt-4 border-t border-gray-700">
                        <label class="block cursor-pointer bg-red-700 hover:bg-red-800 text-white text-sm font-bold py-2 px-4 rounded transition text-center shadow-lg">
                            <span>PILIH FILE</span>
                            <input type="file" name="ijazah" class="hidden" onchange="this.form.submit()" accept=".pdf,.jpg">
                        </label>
                        <input type="hidden" name="upload_ijazah" value="1">
                        <p class="text-[10px] text-gray-500 mt-2">*Otomatis upload saat dipilih</p>
                    </form>
                </div>
            </div>

            <div class="glass-card rounded-xl overflow-hidden hover:transform hover:-translate-y-2 transition duration-300 group">
                <div class="h-2 bg-yellow-500 w-full shadow-[0_0_10px_#eab308]"></div>
                <div class="p-6 text-center">
                    <div class="w-16 h-16 mx-auto bg-yellow-900/30 rounded-full flex items-center justify-center mb-4 group-hover:scale-110 transition border border-yellow-500/30">
                        <i class='bx bxs-report text-3xl text-yellow-400'></i>
                    </div>
                    <h3 class="font-hogwarts font-bold text-white text-lg mb-1">Rapor Nilai</h3>
                    <p class="text-xs text-gray-500 mb-4">Rekap Nilai Semester 1-5</p>
                    
                    <?php if(!empty($data['file_rapor'])): ?>
                        <div class="bg-green-900/30 text-green-400 text-xs py-1 px-3 rounded-full inline-flex items-center gap-1 mb-4 border border-green-500/30">
                            <i class='bx bxs-check-circle'></i> Terunggah
                        </div>
                        <a href="uploads/<?= $data['file_rapor'] ?>" target="_blank" class="block w-full py-2 text-xs font-bold text-yellow-400 border border-yellow-500/30 rounded hover:bg-yellow-900/50 transition">
                            <i class='bx bx-search'></i> LIHAT BERKAS
                        </a>
                    <?php else: ?>
                        <div class="bg-red-900/30 text-red-400 text-xs py-1 px-3 rounded-full inline-flex items-center gap-1 mb-4 border border-red-500/30">
                            <i class='bx bxs-x-circle'></i> Belum Ada
                        </div>
                    <?php endif; ?>

                    <form method="POST" enctype="multipart/form-data" class="mt-4 pt-4 border-t border-gray-700">
                        <label class="block cursor-pointer bg-yellow-600 hover:bg-yellow-700 text-white text-sm font-bold py-2 px-4 rounded transition text-center shadow-lg">
                            <span>PILIH FILE</span>
                            <input type="file" name="rapor" class="hidden" onchange="this.form.submit()" accept=".pdf">
                        </label>
                        <input type="hidden" name="upload_rapor" value="1">
                        <p class="text-[10px] text-gray-500 mt-2">*Format PDF (Digabung)</p>
                    </form>
                </div>
            </div>
        </div>

        <div class="mt-12 text-center">
            <a href="dashboard.php" class="inline-flex items-center gap-3 px-8 py-4 bg-hogwarts-gold text-hogwarts-dark font-bold font-hogwarts rounded-lg shadow-[0_0_20px_rgba(212,175,55,0.4)] hover:bg-yellow-400 hover:scale-105 transition transform duration-300">
                <i class='bx bxs-save text-xl'></i>
                SIMPAN & KEMBALI KE ASRAMA
            </a>
            <p class="mt-4 text-xs text-gray-500">Pastikan burung hantu telah mengirim semua berkas sebelum kembali.</p>
        </div>

    </div>
</body>
</html>