<?php include '../layouts/header.php'; ?>

<nav class="absolute top-0 w-full z-20 py-6">
    <div class="container mx-auto px-6">
        <a href="index.php" class="flex items-center gap-3 w-fit group">
            <div class="w-10 h-10 rounded-full bg-hogwarts-gold/10 border border-hogwarts-gold/50 flex items-center justify-center group-hover:bg-hogwarts-gold transition duration-300">
                <i class="fas fa-arrow-left text-hogwarts-gold group-hover:text-hogwarts-dark"></i>
            </div>
            <span class="text-hogwarts-gold font-bold hogwarts-font tracking-wider group-hover:text-white transition shadow-black drop-shadow-md">KEMBALI KE BERANDA</span>
        </a>
    </div>
</nav>

<div class="min-h-screen flex items-center justify-center p-4 bg-hogwarts-dark relative overflow-hidden py-24">
    
    <div class="absolute inset-0 z-0">
        <img src="https://wallpapercat.com/w/full/b/1/f/15784-1920x1080-desktop-full-hd-hogwarts-legacy-wallpaper-photo.jpg" 
             alt="Background" class="w-full h-full object-cover opacity-30">
        <div class="absolute inset-0 bg-gradient-to-t from-hogwarts-dark via-hogwarts-dark/80 to-hogwarts-dark/60"></div>
    </div>

    <div class="absolute top-32 left-10 animate-pulse hidden lg:block">
        <i class="fas fa-hat-wizard text-hogwarts-gold/20 text-5xl transform -rotate-12"></i>
    </div>
    <div class="absolute bottom-20 right-20 animate-pulse hidden lg:block" style="animation-delay: 2s;">
        <i class="fas fa-scroll text-hogwarts-gold/20 text-4xl transform rotate-12"></i>
    </div>

    <div class="relative z-10 w-full max-w-5xl bg-hogwarts-light/90 backdrop-blur-sm rounded-2xl shadow-2xl border border-hogwarts-gold/30 overflow-hidden flex flex-col md:flex-row">
        
        <div class="hidden md:flex md:w-2/5 bg-hogwarts-dark p-8 flex-col justify-center items-center text-center relative border-r border-hogwarts-gold/20 group">
            <div class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/stardust.png')] opacity-20"></div>
            
            <div class="relative z-10 mb-8 transform group-hover:scale-105 transition duration-500">
                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/6/6e/Harry_Potter_wordmark.svg/1200px-Harry_Potter_wordmark.svg.png" 
                     alt="Logo" class="w-32 opacity-90 invert drop-shadow-[0_0_10px_rgba(212,175,55,0.5)]">
            </div>

            <h3 class="text-xl font-bold text-white hogwarts-font mb-4 glow">PENDAFTARAN SISWA BARU</h3>
            <p class="text-gray-400 text-sm leading-relaxed px-4 italic">
                "Pena bulu sudah siap. Tuliskan namamu dan mulailah perjalanan sihirmu hari ini."
            </p>
            
            <div class="mt-8 text-left space-y-3">
                <div class="flex items-center gap-3 text-sm text-gray-300">
                    <i class="fas fa-check-circle text-hogwarts-gold"></i>
                    <span>Akses Fasilitas Eksklusif</span>
                </div>
                <div class="flex items-center gap-3 text-sm text-gray-300">
                    <i class="fas fa-check-circle text-hogwarts-gold"></i>
                    <span>Pendidikan dan Tenaga Pendidik Terbaik</span>
                </div>
                <div class="flex items-center gap-3 text-sm text-gray-300">
                    <i class="fas fa-check-circle text-hogwarts-gold"></i>
                    <span>Fasilitas Belajar Lengkap</span>
                </div>
            </div>
        </div>

        <div class="w-full md:w-3/5 p-8 md:p-12 relative bg-gradient-to-br from-hogwarts-light to-slate-900">
            <div class="text-center mb-8">
                <h2 class="text-2xl md:text-3xl font-bold text-white hogwarts-font tracking-wide">BUAT AKUN BARU</h2>
                <div class="h-1 w-24 bg-gradient-to-r from-transparent via-hogwarts-gold to-transparent mx-auto mt-3"></div>
                <p class="text-gray-400 text-sm mt-3">Isi data diri untuk memulai seleksi masuk.</p>
            </div>

            <form action="proses_register.php" method="POST" class="space-y-5">
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                    <div class="group">
                        <label class="block text-xs font-bold text-hogwarts-gold uppercase tracking-wider mb-2 ml-1">Nama Lengkap</label>
                        <input type="text" name="nama_lengkap" id="nama_lengkap" required 
                            class="w-full px-4 py-3 bg-slate-800/50 border border-gray-600 text-white rounded-lg focus:border-hogwarts-gold focus:ring-1 focus:ring-hogwarts-gold focus:bg-slate-800 transition outline-none placeholder-gray-500"
                            placeholder="Cth: Harry Potter">
                    </div>

                    <div class="group">
                        <label class="block text-xs font-bold text-hogwarts-gold uppercase tracking-wider mb-2 ml-1">Alamat Email</label>
                        <input type="email" name="email" id="email" required 
                            class="w-full px-4 py-3 bg-slate-800/50 border border-gray-600 text-white rounded-lg focus:border-hogwarts-gold focus:ring-1 focus:ring-hogwarts-gold focus:bg-slate-800 transition outline-none placeholder-gray-500"
                            placeholder="harry@hogwarts.ac.uk">
                    </div>
                </div>

                <div class="group">
                    <label class="block text-xs font-bold text-hogwarts-gold uppercase tracking-wider mb-2 ml-1">Kata Sandi</label>
                    <div class="relative">
                        <input type="password" name="password" id="password" required 
                            class="w-full px-4 py-3 bg-slate-800/50 border border-gray-600 text-white rounded-lg focus:border-hogwarts-gold focus:ring-1 focus:ring-hogwarts-gold focus:bg-slate-800 transition outline-none placeholder-gray-500"
                            placeholder="Minimal 8 karakter">
                        <div class="absolute inset-y-0 right-0 pr-3 flex items-center">
                            <i class="fas fa-lock text-gray-500 text-sm"></i>
                        </div>
                    </div>
                    <p class="text-[10px] text-gray-500 mt-1 ml-1 flex items-center gap-1">
                        <i class="fas fa-info-circle"></i> Gunakan kombinasi huruf, angka, dan simbol untuk keamanan maksimal.
                    </p>
                </div>

                <div class="group">
                    <label class="block text-xs font-bold text-hogwarts-gold uppercase tracking-wider mb-2 ml-1">Ulangi Kata Sandi</label>
                    <div class="relative">
                        <input type="password" name="konfirmasi_password" id="konfirmasi_password" required 
                            class="w-full px-4 py-3 bg-slate-800/50 border border-gray-600 text-white rounded-lg focus:border-hogwarts-gold focus:ring-1 focus:ring-hogwarts-gold focus:bg-slate-800 transition outline-none placeholder-gray-500"
                            placeholder="Konfirmasi password Anda">
                        <div class="absolute inset-y-0 right-0 pr-3 flex items-center">
                            <i class="fas fa-check-double text-gray-500 text-sm"></i>
                        </div>
                    </div>
                </div>

                <button type="submit" name="register"
                    class="w-full bg-hogwarts-gold text-hogwarts-dark font-bold py-3.5 rounded-lg shadow-[0_0_15px_rgba(212,175,55,0.3)] hover:bg-yellow-400 hover:shadow-[0_0_25px_rgba(212,175,55,0.6)] transition duration-300 transform hover:-translate-y-1 hogwarts-font tracking-wider text-lg mt-6 flex items-center justify-center gap-2 group">
                    <span>Submit</span>
                    <i class="fas fa-feather-alt text-hogwarts-dark/70 group-hover:rotate-12 transition duration-300"></i>
                </button>
            </form>

            <div class="mt-8 text-center border-t border-gray-700 pt-6">
                <p class="text-sm text-gray-400">
                    Sudah memiliki akun? 
                    <a href="login.php" class="text-hogwarts-gold font-bold hover:text-white transition hover:underline ml-1">
                        Masuk disini
                    </a>
                </p>
            </div>
        </div>

    </div>
    
    <div class="absolute bottom-4 text-center w-full text-gray-600 text-xs hidden md:block">
        &copy; 2025 Universitas Hogwarts. Hak Cipta Dilindungi.
    </div>
</div>

<?php include '../layouts/footer.php'; ?>