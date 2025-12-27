<?php include 'layouts/header.php'; ?>

<link rel="stylesheet" href="css/style.css">

<!-- NAVBAR STICKY-->
<div class="nav-wrapper">
    <!-- Top Primary Navigation -->
    <nav class="nav-primary text-white">
        <div class="container mx-auto px-4 md:px-6">
            <div class="flex justify-between items-center">
                <!-- Desktop Logo & Brand -->
                <div class="hidden md:flex items-center gap-3 desktop-brand">
                    <div class="logo-container">
                        <img src="data:image/jpeg;base64,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" 
                            alt="Hogwarts Logo">
                    </div>
                    <div class="desktop-brand-text">
                        <h1 class="text-lg font-bold tracking-wider hogwarts-font glow">SPMB UNIVERSITAS HOGWARTS</h1>
                        <p class="text-xs text-gray-400 uppercase tracking-widest">Mencetak Generasi Unggul dan Berintegritas</p>
                    </div>
                </div>

                <!-- Mobile Layout: Logo (Left) - Title (Center) -->
                <div class="flex md:hidden items-center w-full">
                    <!-- Logo for Mobile (Left) -->
                    <div class="logo-container">
                        <img src="data:image/jpeg;base64,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" 
                            alt="Hogwarts Logo">
                    </div>

                    <!-- Mobile Brand Info (Center) -->
                    <div class="mobile-brand-info">
                        <h1 class="text-sm font-bold tracking-wider hogwarts-font glow leading-tight">
                            SPMB UNIVERSITAS<br>
                            <span class="text-hogwarts-gold">HOGWARTS</span>
                        </h1>
                    </div>
                </div>

                <!-- Desktop Auth Buttons -->
                <div class="hidden md:flex gap-3 items-center auth-buttons">
                    <a href="login.php" class="px-4 py-2 text-sm font-semibold text-white border border-hogwarts-gold/50 rounded-lg hover:bg-hogwarts-gold hover:text-hogwarts-dark transition duration-300 hogwarts-font flex items-center h-10">
                        Masuk
                    </a>
                    <a href="register.php" class="px-4 py-2 text-sm font-bold text-hogwarts-dark bg-hogwarts-gold rounded-lg shadow-lg hover:bg-yellow-300 transition transform hover:-translate-y-0.5 hogwarts-font flex items-center h-10">
                        Daftar Sekarang
                    </a>
                </div>
                
                <!-- Hamburger Menu for Mobile -->
                <button class="hamburger md:hidden" id="hamburger" type="button" aria-label="Toggle menu">
                    <span></span>
                    <span></span>
                    <span></span>
                </button>
            </div>
        </div>
        
        <!-- Mobile Navigation Dropdown -->
        <div class="mobile-nav" id="mobileNav">
            <!-- Menu Items -->
            <a href="#beranda" class="nav-tab" data-target="beranda">
                <i class="fas fa-home"></i>
                <span>BERANDA</span>
            </a>
            <a href="#alur" class="nav-tab" data-target="alur">
                <i class="fas fa-scroll"></i>
                <span>ALUR PENDAFTARAN</span>
            </a>
            <a href="#fakultas" class="nav-tab" data-target="fakultas">
                <i class="fas fa-graduation-cap"></i>
                <span>FAKULTAS & PRODI</span>
            </a>
            <a href="#kontak" class="nav-tab" data-target="kontak">
                <i class="fas fa-phone-alt"></i>
                <span>KONTAK</span>
            </a>
            
            <!-- Auth Buttons in Mobile Menu -->
            <div class="mobile-auth-buttons">
                <a href="login.php">
                    <i class="fas fa-sign-in-alt mr-2"></i>
                    Masuk
                </a>
                <a href="register.php">
                    <i class="fas fa-user-plus mr-2"></i>
                    Daftar Sekarang
                </a>
            </div>
        </div>
    </nav>

    <!-- Second Row: Main Navigation-->
    <div class="nav-secondary w-full hidden md:block">
        <div class="container mx-auto px-6">
            <div class="flex items-center justify-center">
                <!-- Desktop Navigation Menu -->
                <div class="flex items-center gap-1 hogwarts-font" id="main-nav">
                    <a href="#beranda" class="nav-tab" data-target="beranda">
                        <i class="fas fa-home mr-2"></i><span>BERANDA</span>
                    </a>
                    <a href="#alur" class="nav-tab" data-target="alur">
                        <i class="fas fa-scroll mr-2"></i><span>ALUR PENDAFTARAN</span>
                    </a>
                    <a href="#fakultas" class="nav-tab" data-target="fakultas">
                        <i class="fas fa-graduation-cap mr-2"></i><span>FAKULTAS & PRODI</span>
                    </a>
                    <a href="#kontak" class="nav-tab" data-target="kontak">
                        <i class="fas fa-phone-alt mr-2"></i><span>KONTAK</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<section id="beranda" class="relative bg-hogwarts-dark py-12 md:py-28 overflow-hidden parallax-bg" 
        style="background-image: url('https://wallpapercat.com/w/full/b/1/f/15784-1920x1080-desktop-full-hd-hogwarts-legacy-wallpaper-photo.jpg');">
    <div class="absolute inset-0 bg-gradient-to-b from-transparent via-hogwarts-dark/90 to-hogwarts-dark"></div>
    
    <div class="container mx-auto px-4 md:px-6 relative z-10 text-center md:text-left flex flex-col md:flex-row items-center">
        
        <div class="w-full md:w-1/2 mb-8 md:mb-0 px-4">
            <span class="inline-block py-2 px-4 rounded-full bg-hogwarts-gold/20 text-hogwarts-gold text-sm font-semibold mb-6 border border-hogwarts-gold/30 hogwarts-font floating">
                ✨ Penerimaan Mahasiswa Baru 2025/2026
            </span>
            <h1 class="hero-title text-3xl md:text-6xl font-extrabold text-white leading-tight mb-6 hogwarts-font glow">
                Wujudkan Impian Akademik <br class="hidden md:block">
                <span class="text-transparent bg-clip-text bg-gradient-to-r from-yellow-300 via-yellow-100 to-yellow-300">di Universitas Terbaik</span>
            </h1>
            <p class="hero-subtitle text-gray-200 text-base md:text-lg mb-8 leading-relaxed max-w-lg mx-auto md:mx-0 md:text-justify text-center md:text-left">
                Bergabunglah dan dapatkan pendidikan berkualitas dari profesor-profesor ternama dengan fasilitas 
                pembelajaran yang lengkap dan modern.
            </p>
            <div class="hero-buttons flex flex-col md:flex-row gap-4 justify-center md:justify-start">
                <a href="register.php" class="px-6 md:px-8 py-3 md:py-4 bg-hogwarts-gold text-hogwarts-dark font-bold rounded-lg shadow-lg hover:shadow-hogwarts-gold/50 transition transform hover:-translate-y-1 hogwarts-font text-base md:text-lg group">
                    Daftar Sekarang
                </a>
                <a href="#fakultas" class="px-6 md:px-8 py-3 md:py-4 bg-transparent border border-hogwarts-gold/50 text-white font-semibold rounded-lg hover:bg-hogwarts-gold/10 transition transform hover:-translate-y-1 hogwarts-font text-center">
                    Lihat Fakultas
                </a>
            </div>
        </div>

        <div class="w-full md:w-1/2 flex justify-center relative mt-8 md:mt-0">
            <div class="relative w-full max-w-md floating px-4">
                <!-- Ikon juga ikut floating -->
                <div class="absolute -top-10 -right-2 z-20 transform rotate-[15deg]">
                    <i class="fas fa-hat-wizard text-hogwarts-gold text-5xl md:text-7xl drop-shadow-lg" 
                    style="text-shadow: 0 0 10px rgba(212, 175, 55, 0.5);"></i>
                </div>
                
                <div class="absolute -bottom-4 -left-4 w-full h-full bg-gradient-to-br from-hogwarts-gold/30 to-purple-500/30 rounded-3xl blur-xl z-0"></div>
                
                <!-- Hapus transform hover dari sini -->
                <div class="relative rounded-2xl shadow-2xl border-4 border-hogwarts-gold overflow-hidden z-10">
                    <div class="aspect-video">
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQBuNgGy2knV-YAxyB0JfuUlGLq9tmrc0HrAw&s" 
                            alt="Kampus Hogwarts"
                            class="w-full h-full object-cover">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/30 to-transparent"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="fakultas" class="py-12 md:py-20 bg-hogwarts-dark">
    <div class="container mx-auto px-4 md:px-6">
        <div class="text-center mb-12 md:mb-16">
            <div class="inline-block">
                <h2 class="section-title text-2xl md:text-4xl font-bold text-white hogwarts-font mb-4">
                    FAKULTAS & PROGRAM STUDI
                </h2>
                <div class="h-1 bg-hogwarts-gold rounded-full w-full mx-auto"></div>
            </div>
            <p class="text-gray-300 max-w-3xl mx-auto mt-6 md:mt-8 text-sm md:text-base px-4">
                Universitas Hogwarts menawarkan berbagai program studi unggulan.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 md:gap-8 mb-12 md:mb-16">
            <!-- Fakultas Ilmu Komputer -->
            <div class="faculty-card rounded-2xl overflow-hidden shadow-2xl hover:shadow-red-900/50 transition-all duration-300 border border-red-800/50 group">
                <div class="h-14 md:h-16 faculty-magic flex items-center justify-center px-4">
                    <h3 class="text-lg md:text-2xl font-bold text-white hogwarts-font text-center">FAKULTAS ILMU KOMPUTER</h3>
                </div>
                <div class="p-6 md:p-8 bg-gradient-to-b from-hogwarts-light to-hogwarts-dark">
                    <div class="mb-6">
                        <h4 class="text-base md:text-lg font-bold text-hogwarts-gold mb-3">Program Studi:</h4>
                        <ul class="space-y-2">
                            <li class="text-gray-300 flex items-start">
                                <i class="fas fa-code mr-3 text-red-400 mt-1"></i>
                                <div>
                                    <span class="font-semibold">S1 Teknik Informatika</span>
                                    <p class="text-sm text-gray-400">Akreditasi A</p>
                                </div>
                            </li>
                            <li class="text-gray-300 flex items-start">
                                <i class="fas fa-database mr-3 text-red-400 mt-1"></i>
                                <div>
                                    <span class="font-semibold">S1 Sistem Informasi</span>
                                    <p class="text-sm text-gray-400">Akreditasi A</p>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <a href="#" class="inline-block w-full text-center py-3 bg-red-800/50 text-white rounded-lg hover:bg-red-700 transition hogwarts-font text-sm md:text-base">
                        <i class="fas fa-info-circle mr-2"></i>
                        Detail Fakultas
                    </a>
                </div>
            </div>

            <!-- Fakultas Ekonomi dan Bisnis -->
            <div class="faculty-card rounded-2xl overflow-hidden shadow-2xl hover:shadow-green-900/50 transition-all duration-300 border border-green-800/50 group">
                <div class="h-14 md:h-16 faculty-potions flex items-center justify-center px-4">
                    <h3 class="text-lg md:text-2xl font-bold text-white hogwarts-font text-center">FAKULTAS EKONOMI DAN BISNIS</h3>
                </div>
                <div class="p-6 md:p-8 bg-gradient-to-b from-hogwarts-light to-hogwarts-dark">
                    <div class="mb-6">
                        <h4 class="text-base md:text-lg font-bold text-hogwarts-gold mb-3">Program Studi:</h4>
                        <ul class="space-y-2">
                            <li class="text-gray-300 flex items-start">
                                <i class="fas fa-chart-line mr-3 text-green-400 mt-1"></i>
                                <div>
                                    <span class="font-semibold">S1 Manajemen</span>
                                    <p class="text-sm text-gray-400">Akreditasi A</p>
                                </div>
                            </li>
                            <li class="text-gray-300 flex items-start">
                                <i class="fas fa-calculator mr-3 text-green-400 mt-1"></i>
                                <div>
                                    <span class="font-semibold">S1 Akuntansi</span>
                                    <p class="text-sm text-gray-400">Akreditasi A</p>
                                </div>
                            </li>
                            <li class="text-gray-300 flex items-start">
                                <i class="fas fa-briefcase mr-3 text-green-400 mt-1"></i>
                                <div>
                                    <span class="font-semibold">D3 Administrasi Perkantoran</span>
                                    <p class="text-sm text-gray-400">Akreditasi B</p>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <a href="#" class="inline-block w-full text-center py-3 bg-green-800/50 text-white rounded-lg hover:bg-green-700 transition hogwarts-font text-sm md:text-base">
                        <i class="fas fa-info-circle mr-2"></i>
                        Detail Fakultas
                    </a>
                </div>
            </div>

            <!-- Fakultas Teknik -->
            <div class="faculty-card rounded-2xl overflow-hidden shadow-2xl hover:shadow-purple-900/50 transition-all duration-300 border border-purple-800/50 group">
                <div class="h-14 md:h-16 faculty-creatures flex items-center justify-center px-4">
                    <h3 class="text-lg md:text-2xl font-bold text-white hogwarts-font text-center">FAKULTAS TEKNIK</h3>
                </div>
                <div class="p-6 md:p-8 bg-gradient-to-b from-hogwarts-light to-hogwarts-dark">
                    <div class="mb-6">
                        <h4 class="text-base md:text-lg font-bold text-hogwarts-gold mb-3">Program Studi:</h4>
                        <ul class="space-y-2">
                            <li class="text-gray-300 flex items-start">
                                <i class="fas fa-flask mr-3 text-purple-400 mt-1"></i>
                                <div>
                                    <span class="font-semibold">S1 Teknik Kimia</span>
                                    <p class="text-sm text-gray-400">Akreditasi A</p>
                                </div>
                            </li>
                            <li class="text-gray-300 flex items-start">
                                <i class="fas fa-industry mr-3 text-purple-400 mt-1"></i>
                                <div>
                                    <span class="font-semibold">S1 Teknik Industri</span>
                                    <p class="text-sm text-gray-400">Akreditasi B</p>
                                </div>
                            </li>
                            <li class="text-gray-300 flex items-start">
                                <i class="fas fa-cogs mr-3 text-purple-400 mt-1"></i>
                                <div>
                                    <span class="font-semibold">S1 Teknik Mesin</span>
                                    <p class="text-sm text-gray-400">Akreditasi B</p>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <a href="#" class="inline-block w-full text-center py-3 bg-purple-800/50 text-white rounded-lg hover:bg-purple-700 transition hogwarts-font text-sm md:text-base">
                        <i class="fas fa-info-circle mr-2"></i>
                        Detail Fakultas
                    </a>
                </div>
            </div>

            <!-- Fakultas Sastra -->
            <div class="faculty-card rounded-2xl overflow-hidden shadow-2xl hover:shadow-blue-900/50 transition-all duration-300 border border-blue-800/50 group">
                <div class="h-14 md:h-16 faculty-defence flex items-center justify-center px-4">
                    <h3 class="text-lg md:text-2xl font-bold text-white hogwarts-font text-center">FAKULTAS SASTRA</h3>
                </div>
                <div class="p-6 md:p-8 bg-gradient-to-b from-hogwarts-light to-hogwarts-dark">
                    <div class="mb-6">
                        <h4 class="text-base md:text-lg font-bold text-hogwarts-gold mb-3">Program Studi:</h4>
                        <ul class="space-y-2">
                            <li class="text-gray-300 flex items-start">
                                <i class="fas fa-book mr-3 text-blue-400 mt-1"></i>
                                <div>
                                    <span class="font-semibold">S1 Sastra Indonesia</span>
                                    <p class="text-sm text-gray-400">Akreditasi A</p>
                                </div>
                            </li>
                            <li class="text-gray-300 flex items-start">
                                <i class="fas fa-language mr-3 text-blue-400 mt-1"></i>
                                <div>
                                    <span class="font-semibold">S1 Sastra Inggris</span>
                                    <p class="text-sm text-gray-400">Akreditasi A</p>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <a href="#" class="inline-block w-full text-center py-3 bg-blue-800/50 text-white rounded-lg hover:bg-blue-700 transition hogwarts-font text-sm md:text-base">
                        <i class="fas fa-info-circle mr-2"></i>
                        Detail Fakultas
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="relative overflow-hidden bg-hogwarts-dark">
    <div class="relative w-full h-48 md:h-64 lg:h-80"
         style="background-image: url('assets/images/horizons_village.png');
                background-size: cover;
                background-position: center;
                background-repeat: no-repeat;
                opacity: 0.4;">
        <div class="absolute inset-0 bg-gradient-to-t from-hogwarts-dark via-transparent to-hogwarts-dark"></div>
    </div>
</section>

<section id="alur" class="py-12 md:py-20 bg-hogwarts-dark">
    <div class="container mx-auto px-4 md:px-6">
        <div class="text-center mb-12 md:mb-16">
            <div class="inline-block">
                <h2 class="text-2xl md:text-3xl font-bold text-white hogwarts-font mb-4">
                    ALUR PENDAFTARAN
                </h2>
                <div class="h-1 bg-hogwarts-gold rounded-full w-full mx-auto"></div>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 md:gap-8">
            <div class="step-card bg-hogwarts-light p-6 md:p-8 rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 border-t-4 border-red-500 group">
                <div class="w-12 h-12 md:w-14 md:h-14 bg-red-900/30 text-hogwarts-gold rounded-full flex items-center justify-center text-lg md:text-xl font-bold mb-4 md:mb-6 mx-auto group-hover:scale-110 transition">
                    1
                </div>
                <h3 class="text-base md:text-lg font-bold text-white mb-3 text-center">Registrasi Akun</h3>
                <p class="text-sm text-gray-300 text-center">Buat akun dengan email dan password melalui portal pendaftaran.</p>
            </div>
            
            <div class="step-card bg-hogwarts-light p-6 md:p-8 rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 border-t-4 border-blue-500 group">
                <div class="w-12 h-12 md:w-14 md:h-14 bg-blue-900/30 text-hogwarts-gold rounded-full flex items-center justify-center text-lg md:text-xl font-bold mb-4 md:mb-6 mx-auto group-hover:scale-110 transition">
                    2
                </div>
                <h3 class="text-base md:text-lg font-bold text-white mb-3 text-center">Isi Formulir</h3>
                <p class="text-sm text-gray-300 text-center">Lengkapi data pribadi, pendidikan, dan pilih program studi.</p>
            </div>

            <div class="step-card bg-hogwarts-light p-6 md:p-8 rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 border-t-4 border-green-500 group">
                <div class="w-12 h-12 md:w-14 md:h-14 bg-green-900/30 text-hogwarts-gold rounded-full flex items-center justify-center text-lg md:text-xl font-bold mb-4 md:mb-6 mx-auto group-hover:scale-110 transition">
                    3
                </div>
                <h3 class="text-base md:text-lg font-bold text-white mb-3 text-center">Upload Dokumen</h3>
                <p class="text-sm text-gray-300 text-center">Unggah berkas persyaratan (ijazah, foto, dll) dalam format PDF.</p>
            </div>

            <div class="step-card bg-hogwarts-light p-6 md:p-8 rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 border-t-4 border-purple-500 group">
                <div class="w-12 h-12 md:w-14 md:h-14 bg-purple-900/30 text-hogwarts-gold rounded-full flex items-center justify-center text-lg md:text-xl font-bold mb-4 md:mb-6 mx-auto group-hover:scale-110 transition">
                    4
                </div>
                <h3 class="text-base md:text-lg font-bold text-white mb-3 text-center">Pembayaran & Seleksi</h3>
                <p class="text-sm text-gray-300 text-center">Bayar biaya pendaftaran dan tunggu hasil seleksi administrasi.</p>
            </div>
        </div>
    </div>
</section>

<footer id="kontak" class="bg-hogwarts-dark text-white py-8 md:py-10">
    <div class="container mx-auto px-4 md:px-6 border-2 border-hogwarts-gold/30 rounded-2xl p-6 md:p-8 bg-gradient-to-b from-hogwarts-light/10 to-hogwarts-dark">
        <!-- Grid utama footer -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 md:gap-12">
            
            <!-- Logo & Deskripsi -->
            <div class="footer-section space-y-4">
                <div class="flex flex-col items-center md:items-start">
                    <div class="w-20 h-20 md:w-24 md:h-24 mb-4 relative group">
                        <div class="absolute inset-0 bg-gradient-to-r from-hogwarts-gold/20 to-purple-500/20 rounded-full blur-md group-hover:blur-lg transition-all duration-300"></div>
                        <div class="relative w-full h-full bg-white rounded-full flex items-center justify-center overflow-hidden border-2 border-hogwarts-gold/50 group-hover:border-hogwarts-gold transition-all duration-300">
                            <img src="data:image/jpeg;base64,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" 
                                 alt="Hogwarts Logo" 
                                 class="w-full h-full object-contain p-2">
                        </div>
                    </div>
                    <div class="text-center md:text-left">
                        <h3 class="text-xl font-bold hogwarts-font glow mb-2">UNIVERSITAS HOGWARTS</h3>
                        <p class="text-sm text-gray-300 font-medium">Mencetak Generasi Unggul dan Berintegritas</p>
                    </div>
                </div>
                <p class="text-gray-400 text-sm leading-relaxed text-center md:text-left">
                    Perguruan tinggi negeri terkemuka yang berkomitmen mencetak generasi berkualitas, 
                    berintegritas, dan siap menghadapi tantangan masa depan.
                </p>
                <!-- Social Media -->
                <div class="flex justify-center md:justify-start gap-3 pt-4">
                    <a href="#" class="w-10 h-10 rounded-full bg-hogwarts-light border border-hogwarts-gold/30 flex items-center justify-center text-hogwarts-gold hover:bg-hogwarts-gold hover:text-hogwarts-dark transition duration-300">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="#" class="w-10 h-10 rounded-full bg-hogwarts-light border border-hogwarts-gold/30 flex items-center justify-center text-hogwarts-gold hover:bg-hogwarts-gold hover:text-hogwarts-dark transition duration-300">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a href="#" class="w-10 h-10 rounded-full bg-hogwarts-light border border-hogwarts-gold/30 flex items-center justify-center text-hogwarts-gold hover:bg-hogwarts-gold hover:text-hogwarts-dark transition duration-300">
                        <i class="fab fa-youtube"></i>
                    </a>
                    <a href="#" class="w-10 h-10 rounded-full bg-hogwarts-light border border-hogwarts-gold/30 flex items-center justify-center text-hogwarts-gold hover:bg-hogwarts-gold hover:text-hogwarts-dark transition duration-300">
                        <i class="fab fa-twitter"></i>
                    </a>
                </div>
            </div>

            <!-- Lokasi Kampus -->
            <div class="footer-section">
                <div class="flex items-center gap-3 mb-4 pb-3 border-b border-hogwarts-gold/20">
                    <div class="w-8 h-8 md:w-10 md:h-10 rounded-lg bg-gradient-to-br from-red-900/30 to-hogwarts-gold/30 flex items-center justify-center">
                        <i class="fas fa-map-marker-alt text-hogwarts-gold text-sm md:text-base"></i>
                    </div>
                    <h4 class="text-base md:text-lg font-bold hogwarts-font text-hogwarts-gold">Lokasi Kampus</h4>
                </div>
                <div class="space-y-0">
                    <div class="flex items-start gap-2 md:gap-3 p-2 md:p-3 rounded-lg hover:bg-hogwarts-light/30 transition duration-300">
                        <i class="fas fa-university text-red-400 mt-1 text-xs md:text-sm"></i>
                        <div class="flex-1 min-w-0">
                            <p class="text-white font-medium text-sm md:text-base truncate">Kampus Pusat Hogwarts</p>
                            <p class="text-gray-400 text-xs md:text-sm truncate">Jl. Pendidikan No. 123, Kota Akademika</p>
                        </div>
                    </div>
                    <div class="flex items-start gap-2 md:gap-3 p-2 md:p-3 rounded-lg hover:bg-hogwarts-light/30 transition duration-300">
                        <i class="fas fa-code text-red-400 mt-1 text-xs md:text-sm"></i>
                        <div class="flex-1 min-w-0">
                            <p class="text-white font-medium text-sm md:text-base truncate">Fakultas Ilmu Komputer</p>
                            <p class="text-gray-400 text-xs md:text-sm truncate">Kampus Teknologi, Jl. Inovasi No. 45</p>
                        </div>
                    </div>
                    <div class="flex items-start gap-2 md:gap-3 p-2 md:p-3 rounded-lg hover:bg-hogwarts-light/30 transition duration-300">
                        <i class="fas fa-chart-line text-green-400 mt-1 text-xs md:text-sm"></i>
                        <div class="flex-1 min-w-0">
                            <p class="text-white font-medium text-sm md:text-base truncate">Fakultas Ekonomi & Bisnis</p>
                            <p class="text-gray-400 text-xs md:text-sm truncate">Kampus Komersial, Jl. Bisnis No. 67</p>
                        </div>
                    </div>
                    <div class="flex items-start gap-2 md:gap-3 p-2 md:p-3 rounded-lg hover:bg-hogwarts-light/30 transition duration-300">
                        <i class="fas fa-cogs text-purple-400 mt-1 text-xs md:text-sm"></i>
                        <div class="flex-1 min-w-0">
                            <p class="text-white font-medium text-sm md:text-base truncate">Fakultas Teknik</p>
                            <p class="text-gray-400 text-xs md:text-sm truncate">Kampus Industri, Jl. Engineering No. 89</p>
                        </div>
                    </div>
                    <div class="flex items-start gap-2 md:gap-3 p-2 md:p-3 rounded-lg hover:bg-hogwarts-light/30 transition duration-300">
                        <i class="fas fa-book text-blue-400 mt-1 text-xs md:text-sm"></i>
                        <div class="flex-1 min-w-0">
                            <p class="text-white font-medium text-sm md:text-base truncate">Fakultas Sastra</p>
                            <p class="text-gray-400 text-xs md:text-sm truncate">Kampus Humaniora, Jl. Pendidikan No. 123</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Kontak & Informasi -->
            <div class="footer-section">
                <div class="flex items-center gap-3 mb-5 pb-3 border-b border-hogwarts-gold/20">
                    <div class="w-10 h-10 rounded-lg bg-gradient-to-br from-blue-900/30 to-hogwarts-gold/30 flex items-center justify-center">
                        <i class="fas fa-address-book text-hogwarts-gold"></i>
                    </div>
                    <h4 class="text-lg font-bold hogwarts-font text-hogwarts-gold">Kontak</h4>
                </div>
                <div class="space-y-3">
                    <div class="flex items-center gap-3 p-3 rounded-lg hover:bg-hogwarts-light/30 transition duration-300 group">
                        <div class="w-8 h-8 rounded-full bg-blue-900/20 flex items-center justify-center group-hover:bg-blue-900/40 transition">
                            <i class="fas fa-phone-alt text-blue-400 text-sm"></i>
                        </div>
                        <div>
                            <p class="text-gray-400 text-xs">Telepon</p>
                            <p class="text-white font-medium group-hover:text-hogwarts-gold transition">+44 1234 567890</p>
                        </div>
                    </div>
                    <div class="flex items-center gap-3 p-3 rounded-lg hover:bg-hogwarts-light/30 transition duration-300 group">
                        <div class="w-8 h-8 rounded-full bg-green-900/20 flex items-center justify-center group-hover:bg-green-900/40 transition">
                            <i class="fas fa-envelope text-green-400 text-sm"></i>
                        </div>
                        <div>
                            <p class="text-gray-400 text-xs">Email</p>
                            <p class="text-white font-medium group-hover:text-hogwarts-gold transition">info@hogwarts.ac.uk</p>
                        </div>
                    </div>
                    <div class="flex items-center gap-3 p-3 rounded-lg hover:bg-hogwarts-light/30 transition duration-300 group">
                        <div class="w-8 h-8 rounded-full bg-purple-900/20 flex items-center justify-center group-hover:bg-purple-900/40 transition">
                            <i class="fas fa-fax text-purple-400 text-sm"></i>
                        </div>
                        <div>
                            <p class="text-gray-400 text-xs">Fax</p>
                            <p class="text-white font-medium group-hover:text-hogwarts-gold transition">+44 1234 567891</p>
                        </div>
                    </div>
                    <div class="flex items-center gap-3 p-3 rounded-lg hover:bg-hogwarts-light/30 transition duration-300 group">
                        <div class="w-8 h-8 rounded-full bg-red-900/20 flex items-center justify-center group-hover:bg-red-900/40 transition">
                            <i class="fas fa-clock text-red-400 text-sm"></i>
                        </div>
                        <div>
                            <p class="text-gray-400 text-xs">Jam Operasional</p>
                            <p class="text-white font-medium group-hover:text-hogwarts-gold transition">Senin-Jumat: 08.00-16.00</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Tautan Cepat -->
            <div class="footer-section">
                <div class="flex items-center gap-3 mb-5 pb-3 border-b border-hogwarts-gold/20">
                    <div class="w-10 h-10 rounded-lg bg-gradient-to-br from-purple-900/30 to-hogwarts-gold/30 flex items-center justify-center">
                        <i class="fas fa-link text-hogwarts-gold"></i>
                    </div>
                    <h4 class="text-lg font-bold hogwarts-font text-hogwarts-gold">Tautan Cepat</h4>
                </div>
                <div class="grid grid-cols-1 gap-2">
                    <a href="#" class="flex items-center gap-3 group py-3 px-3 rounded-lg hover:bg-hogwarts-light/30 transition duration-300">
                        <i class="fas fa-download text-hogwarts-gold group-hover:scale-110 transition"></i>
                        <span class="text-gray-300 group-hover:text-white group-hover:translate-x-1 transition">Download Brosur</span>
                    </a>
                    <a href="#" class="flex items-center gap-3 group py-3 px-3 rounded-lg hover:bg-hogwarts-light/30 transition duration-300">
                        <i class="fas fa-calendar-alt text-hogwarts-gold group-hover:scale-110 transition"></i>
                        <span class="text-gray-300 group-hover:text-white group-hover:translate-x-1 transition">Kalender Akademik</span>
                    </a>
                    <a href="#" class="flex items-center gap-3 group py-3 px-3 rounded-lg hover:bg-hogwarts-light/30 transition duration-300">
                        <i class="fas fa-file-invoice-dollar text-hogwarts-gold group-hover:scale-110 transition"></i>
                        <span class="text-gray-300 group-hover:text-white group-hover:translate-x-1 transition">Biaya Pendidikan</span>
                    </a>
                    <a href="#" class="flex items-center gap-3 group py-3 px-3 rounded-lg hover:bg-hogwarts-light/30 transition duration-300">
                        <i class="fas fa-question-circle text-hogwarts-gold group-hover:scale-110 transition"></i>
                        <span class="text-gray-300 group-hover:text-white group-hover:translate-x-1 transition">FAQ</span>
                    </a>
                    <a href="#" class="flex items-center gap-3 group py-3 px-3 rounded-lg hover:bg-hogwarts-light/30 transition duration-300">
                        <i class="fas fa-user-graduate text-hogwarts-gold group-hover:scale-110 transition"></i>
                        <span class="text-gray-300 group-hover:text-white group-hover:translate-x-1 transition">Portal Alumni</span>
                    </a>
                </div>
            </div>
        </div>

        <!-- Garis pemisah -->
        <div class="my-8 border-t border-hogwarts-gold/20">
        </div>

        <!-- Footer bawah -->
        <div class="flex flex-col md:flex-row justify-between items-center gap-4">
            <!-- Copyright -->
            <div class="text-center md:text-left">
                <p class="text-gray-500 text-sm mb-1">
                    © 2025 Universitas Hogwarts. Hak Cipta Dilindungi.
                </p>
            </div>
            
            <!-- Navigasi tambahan -->
            <div class="flex flex-wrap justify-center gap-4 md:gap-6 text-sm">
                <a href="#" class="text-gray-400 hover:text-hogwarts-gold transition duration-300 border-b border-transparent hover:border-hogwarts-gold pb-1">Kebijakan Privasi</a>
                <a href="#" class="text-gray-400 hover:text-hogwarts-gold transition duration-300 border-b border-transparent hover:border-hogwarts-gold pb-1">Syarat & Ketentuan</a>
                <a href="#" class="text-gray-400 hover:text-hogwarts-gold transition duration-300 border-b border-transparent hover:border-hogwarts-gold pb-1">Peta Situs</a>
                <a href="#" class="text-gray-400 hover:text-hogwarts-gold transition duration-300 border-b border-transparent hover:border-hogwarts-gold pb-1">Aksesibilitas</a>
            </div>
        </div>
    </div>
</footer>

<script>
document.addEventListener('DOMContentLoaded', function() {
    console.log('Document loaded - initializing navigation');
    
    // ============================================
    // 1. MOBILE MENU FUNCTIONALITY
    // ============================================
    const hamburger = document.getElementById('hamburger');
    const mobileNav = document.getElementById('mobileNav');
    
    if (hamburger && mobileNav) {
        hamburger.addEventListener('click', function(e) {
            e.stopPropagation();
            hamburger.classList.toggle('active');
            mobileNav.classList.toggle('active');
            document.body.style.overflow = mobileNav.classList.contains('active') ? 'hidden' : '';
        });
        
        // Close menu when clicking links
        const mobileLinks = mobileNav.querySelectorAll('a');
        mobileLinks.forEach(link => {
            link.addEventListener('click', function() {
                hamburger.classList.remove('active');
                mobileNav.classList.remove('active');
                document.body.style.overflow = '';
            });
        });
        
        // Close when clicking outside
        document.addEventListener('click', function(e) {
            if (mobileNav.classList.contains('active') && 
                !mobileNav.contains(e.target) && 
                !hamburger.contains(e.target)) {
                hamburger.classList.remove('active');
                mobileNav.classList.remove('active');
                document.body.style.overflow = '';
            }
        });
        
        // Close on escape key
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape' && mobileNav.classList.contains('active')) {
                hamburger.classList.remove('active');
                mobileNav.classList.remove('active');
                document.body.style.overflow = '';
            }
        });
    }
    
    // ============================================
    // 2. ACTIVE TAB ON SCROLL
    // ============================================
    
    // Semua section yang ada di navigation
    const sections = [
        { id: 'beranda', element: document.getElementById('beranda') },
        { id: 'alur', element: document.getElementById('alur') },
        { id: 'fakultas', element: document.getElementById('fakultas') },
        { id: 'kontak', element: document.getElementById('kontak') }
    ];
    
    // Semua tab navigation (desktop dan mobile)
    const allNavTabs = document.querySelectorAll('.nav-tab[data-target]');
    
    // Fungsi untuk update active tab berdasarkan scroll position
    function updateActiveTabOnScroll() {
        let currentSection = '';
        const scrollPosition = window.scrollY + 150; // Offset yang pas
        
        // Cari section yang sedang visible
        for (const section of sections) {
            if (section.element) {
                const sectionTop = section.element.offsetTop;
                const sectionHeight = section.element.offsetHeight;
                const sectionBottom = sectionTop + sectionHeight;
                
                // Cek jika scroll position berada dalam range section
                if (scrollPosition >= sectionTop && scrollPosition < sectionBottom) {
                    currentSection = section.id;
                    break;
                }
            }
        }
        
        // Jika tidak ketemu, cari yang paling dekat
        if (!currentSection) {
            let closestSection = sections[0];
            let minDistance = Infinity;
            
            for (const section of sections) {
                if (section.element) {
                    const distance = Math.abs(section.element.offsetTop - scrollPosition);
                    if (distance < minDistance) {
                        minDistance = distance;
                        closestSection = section;
                    }
                }
            }
            currentSection = closestSection.id;
        }
        
        // Update semua tab yang sesuai
        if (currentSection) {
            allNavTabs.forEach(tab => {
                const tabTarget = tab.getAttribute('data-target');
                if (tabTarget === currentSection) {
                    tab.classList.add('active');
                } else {
                    tab.classList.remove('active');
                }
            });
            
            // Update URL hash tanpa scroll
            if (window.location.hash !== `#${currentSection}`) {
                history.replaceState(null, null, `#${currentSection}`);
            }
        }
    }
    
    // Fungsi untuk smooth scroll ke section (dengan offset untuk sticky navbar)
    function scrollToSection(sectionId) {
        const section = document.getElementById(sectionId);
        if (section) {
            // Hitung offset untuk navbar sticky
            const navWrapper = document.querySelector('.nav-wrapper');
            const totalNavHeight = navWrapper.offsetHeight;
            
            const targetPosition = section.offsetTop - totalNavHeight;
            
            window.scrollTo({
                top: targetPosition,
                behavior: 'smooth'
            });
            
            // Update active tab
            allNavTabs.forEach(tab => {
                const tabTarget = tab.getAttribute('data-target');
                if (tabTarget === sectionId) {
                    tab.classList.add('active');
                } else {
                    tab.classList.remove('active');
                }
            });
        }
    }
    
    // Event listener untuk semua tab
    allNavTabs.forEach(tab => {
        tab.addEventListener('click', function(e) {
            e.preventDefault();
            const targetSection = this.getAttribute('data-target');
            scrollToSection(targetSection);
            
            // Close mobile menu jika terbuka
            if (mobileNav && mobileNav.classList.contains('active')) {
                hamburger.classList.remove('active');
                mobileNav.classList.remove('active');
                document.body.style.overflow = '';
            }
        });
    });
    
    // Update active tab saat scroll dengan debounce
    let scrollTimeout;
    window.addEventListener('scroll', function() {
        clearTimeout(scrollTimeout);
        scrollTimeout = setTimeout(updateActiveTabOnScroll, 100);
    });
    
    // Initial update saat page load
    setTimeout(updateActiveTabOnScroll, 300);
    
    // Update saat resize window
    window.addEventListener('resize', function() {
        // Close mobile menu jika resize ke desktop
        if (window.innerWidth > 768 && mobileNav && mobileNav.classList.contains('active')) {
            hamburger.classList.remove('active');
            mobileNav.classList.remove('active');
            document.body.style.overflow = '';
        }
        
        // Update active tab setelah resize
        setTimeout(updateActiveTabOnScroll, 100);
    });
});
</script>

<?php include 'layouts/footer.php'; ?>