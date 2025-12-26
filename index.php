<?php include 'layouts/header.php'; ?>

<nav class="bg-jatim-blue text-white py-4 border-b-4 border-jatim-gold sticky top-0 z-50">
    <div class="container mx-auto px-6 flex justify-between items-center">
        <div class="flex items-center gap-3">
            <div class="w-10 h-10 bg-white rounded-full flex items-center justify-center text-jatim-blue font-bold text-xl shadow-lg">
                U
            </div>
            <div>
                <h1 class="text-lg font-bold tracking-wide">PMB KAMPUS</h1>
                <p class="text-[10px] text-gray-300 uppercase tracking-wider">Penerimaan Mahasiswa Baru 2025</p>
            </div>
        </div>

        <div class="hidden md:flex items-center gap-8 text-sm font-medium">
            <a href="#beranda" class="hover:text-jatim-gold transition">Beranda</a>
            <a href="#alur" class="hover:text-jatim-gold transition">Alur Pendaftaran</a>
            <a href="#prodi" class="hover:text-jatim-gold transition">Program Studi</a>
            <a href="#kontak" class="hover:text-jatim-gold transition">Kontak</a>
        </div>

        <div class="flex gap-3">
            <a href="login.php" class="px-5 py-2 text-sm font-semibold text-white border border-white/30 rounded-full hover:bg-white hover:text-jatim-blue transition">
                Masuk
            </a>
            <a href="register.php" class="px-5 py-2 text-sm font-bold text-jatim-blue bg-jatim-gold rounded-full shadow-lg hover:bg-yellow-300 transition transform hover:-translate-y-0.5">
                Daftar Sekarang
            </a>
        </div>
    </div>
</nav>

<section id="beranda" class="relative bg-jatim-blue py-20 md:py-32 overflow-hidden">
    <div class="absolute inset-0 opacity-10 bg-[url('https://www.transparenttextures.com/patterns/cubes.png')]"></div>
    <div class="absolute top-0 right-0 w-96 h-96 bg-blue-500 rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-blob"></div>
    <div class="absolute -bottom-8 left-20 w-72 h-72 bg-purple-500 rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-blob animation-delay-2000"></div>

    <div class="container mx-auto px-6 relative z-10 text-center md:text-left flex flex-col md:flex-row items-center">
        
        <div class="w-full md:w-1/2 mb-10 md:mb-0">
            <span class="inline-block py-1 px-3 rounded-full bg-blue-800 text-blue-200 text-xs font-semibold mb-4 border border-blue-700">
                🚀 Pendaftaran Gelombang 1 Dibuka!
            </span>
            <h1 class="text-4xl md:text-6xl font-extrabold text-white leading-tight mb-6">
                Wujudkan Mimpimu <br>
                di <span class="text-transparent bg-clip-text bg-gradient-to-r from-jatim-gold to-yellow-200">Kampus Unggulan</span>
            </h1>
            <p class="text-blue-100 text-lg mb-8 leading-relaxed max-w-lg mx-auto md:mx-0">
                Bergabunglah dengan ribuan mahasiswa berprestasi lainnya. Sistem seleksi yang transparan, cepat, dan berbasis digital.
            </p>
            <div class="flex flex-col md:flex-row gap-4 justify-center md:justify-start">
                <a href="register.php" class="px-8 py-4 bg-jatim-gold text-jatim-blue font-bold rounded-lg shadow-lg hover:shadow-yellow-500/50 transition transform hover:-translate-y-1">
                    Daftar Sekarang
                </a>
                <a href="#prodi" class="px-8 py-4 bg-transparent border border-white/30 text-white font-semibold rounded-lg hover:bg-white/10 transition">
                    Lihat Jurusan
                </a>
            </div>
        </div>

        <div class="w-full md:w-1/2 flex justify-center relative">
            <div class="relative w-full max-w-md">
                <div class="absolute top-4 -left-4 w-full h-full bg-jatim-gold rounded-2xl"></div>
                <img src="https://images.unsplash.com/photo-1523050854058-8df90110c9f1?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80" 
                     alt="Mahasiswa Wisuda" 
                     class="relative rounded-2xl shadow-2xl border-4 border-white transform rotate-3 hover:rotate-0 transition duration-500">
            </div>
        </div>
    </div>
</section>

<section id="alur" class="py-20 bg-gray-50">
    <div class="container mx-auto px-6">
        <div class="text-center mb-16">
            <h2 class="text-3xl font-bold text-slate-800">Alur Pendaftaran Mudah</h2>
            <div class="h-1 w-24 bg-jatim-gold mx-auto mt-4 rounded-full"></div>
            <p class="text-gray-500 mt-4">Hanya butuh 4 langkah untuk menjadi bagian dari kami</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
            <div class="bg-white p-8 rounded-xl shadow-md hover:shadow-xl transition border-t-4 border-blue-500">
                <div class="w-12 h-12 bg-blue-100 text-blue-600 rounded-lg flex items-center justify-center text-xl font-bold mb-4">1</div>
                <h3 class="text-lg font-bold text-slate-800 mb-2">Buat Akun</h3>
                <p class="text-sm text-gray-500">Daftarkan email aktif kamu dan buat kata sandi yang aman.</p>
            </div>
            
            <div class="bg-white p-8 rounded-xl shadow-md hover:shadow-xl transition border-t-4 border-green-500">
                <div class="w-12 h-12 bg-green-100 text-green-600 rounded-lg flex items-center justify-center text-xl font-bold mb-4">2</div>
                <h3 class="text-lg font-bold text-slate-800 mb-2">Lengkapi Biodata</h3>
                <p class="text-sm text-gray-500">Isi data diri, data sekolah, dan pilih program studi impianmu.</p>
            </div>

            <div class="bg-white p-8 rounded-xl shadow-md hover:shadow-xl transition border-t-4 border-purple-500">
                <div class="w-12 h-12 bg-purple-100 text-purple-600 rounded-lg flex items-center justify-center text-xl font-bold mb-4">3</div>
                <h3 class="text-lg font-bold text-slate-800 mb-2">Upload Berkas</h3>
                <p class="text-sm text-gray-500">Unggah pas foto, ijazah/SKL, dan bukti pembayaran pendaftaran.</p>
            </div>

            <div class="bg-white p-8 rounded-xl shadow-md hover:shadow-xl transition border-t-4 border-jatim-gold">
                <div class="w-12 h-12 bg-yellow-100 text-yellow-600 rounded-lg flex items-center justify-center text-xl font-bold mb-4">4</div>
                <h3 class="text-lg font-bold text-slate-800 mb-2">Pengumuman</h3>
                <p class="text-sm text-gray-500">Pantau status kelulusanmu di dashboard secara berkala.</p>
            </div>
        </div>
    </div>
</section>

<footer class="bg-jatim-blue text-white py-8 border-t border-blue-900">
    <div class="container mx-auto px-6 text-center md:text-left flex flex-col md:flex-row justify-between items-center">
        <div class="mb-4 md:mb-0">
            <span class="font-bold text-xl">PMB KAMPUS</span>
            <p class="text-sm text-blue-300 mt-1">© 2025 AdmitFlow System. All Rights Reserved.</p>
        </div>
        <div class="flex gap-6 text-sm text-blue-200">
            <a href="#" class="hover:text-white">Privacy Policy</a>
            <a href="#" class="hover:text-white">Terms of Service</a>
            <a href="#" class="hover:text-white">Bantuan</a>
        </div>
    </div>
</footer>

<?php include 'layouts/footer.php'; ?>