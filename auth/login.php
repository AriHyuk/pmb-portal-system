<?php include '../layouts/header.php'; ?>

<style>
    /* Input Autofill fix for dark mode */
    input:-webkit-autofill,
    input:-webkit-autofill:hover, 
    input:-webkit-autofill:focus, 
    input:-webkit-autofill:active{
        -webkit-box-shadow: 0 0 0 30px #1e293b inset !important;
        -webkit-text-fill-color: white !important;
        transition: background-color 5000s ease-in-out 0s;
    }
</style>

<nav class="absolute top-0 w-full z-20 py-6">
    <div class="container mx-auto px-6">
        <a href="../index.php" class="flex items-center gap-3 w-fit group">
            <div class="w-10 h-10 rounded-full bg-hogwarts-gold/10 border border-hogwarts-gold/50 flex items-center justify-center group-hover:bg-hogwarts-gold transition duration-300">
                <i class="fas fa-arrow-left text-hogwarts-gold group-hover:text-hogwarts-dark"></i>
            </div>
            <span class="text-hogwarts-gold font-bold hogwarts-font tracking-wider group-hover:text-white transition shadow-black drop-shadow-md">KEMBALI KE BERANDA</span>
        </a>
    </div>
</nav>

<div class="min-h-screen flex items-center justify-center p-4 bg-hogwarts-dark relative overflow-hidden">
    
    <div class="absolute inset-0 z-0">
        <img src="https://wallpapercat.com/w/full/b/1/f/15784-1920x1080-desktop-full-hd-hogwarts-legacy-wallpaper-photo.jpg" 
             alt="Background" class="w-full h-full object-cover opacity-30">
        <div class="absolute inset-0 bg-gradient-to-t from-hogwarts-dark via-hogwarts-dark/80 to-hogwarts-dark/60"></div>
    </div>

    <div class="absolute top-20 right-20 animate-pulse hidden md:block">
        <i class="fas fa-star text-hogwarts-gold/30 text-4xl"></i>
    </div>
    <div class="absolute bottom-20 left-20 animate-pulse hidden md:block" style="animation-delay: 1s;">
        <i class="fas fa-star text-hogwarts-gold/20 text-2xl"></i>
    </div>

    <div class="relative z-10 w-full max-w-4xl bg-hogwarts-light/90 backdrop-blur-sm rounded-2xl shadow-2xl border border-hogwarts-gold/30 overflow-hidden flex flex-col md:flex-row">
        
        <div class="hidden md:flex md:w-1/2 bg-hogwarts-dark p-8 flex-col justify-center items-center text-center relative border-r border-hogwarts-gold/20 group">
            <div class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/stardust.png')] opacity-20"></div>
            
            <div class="relative z-10 mb-6 transform group-hover:scale-105 transition duration-500">
                <div class="w-24 h-24 rounded-full bg-gradient-to-br from-hogwarts-gold to-yellow-600 p-1 shadow-[0_0_20px_rgba(212,175,55,0.3)]">
                    <div class="w-full h-full rounded-full bg-hogwarts-dark flex items-center justify-center border-2 border-hogwarts-gold">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/6/6e/Harry_Potter_wordmark.svg/1200px-Harry_Potter_wordmark.svg.png" 
                             alt="Logo" class="w-16 opacity-80 invert">
                    </div>
                </div>
            </div>

            <h3 class="text-2xl font-bold text-white hogwarts-font mb-3 glow">PORTAL AKADEMIK</h3>
            <p class="text-gray-400 text-sm leading-relaxed px-4">
                "Hogwarts akan selalu ada bagi mereka yang layak menerimanya."
            </p>
            <div class="mt-8 w-16 h-1 bg-gradient-to-r from-transparent via-hogwarts-gold to-transparent opacity-50"></div>
        </div>

        <div class="w-full md:w-1/2 p-8 md:p-12 relative">
            <div class="text-center mb-8">
                <h2 class="text-3xl font-bold text-white hogwarts-font tracking-wide">LOGIN CALON MAHASISWA</h2>
                <div class="h-1 w-24 bg-gradient-to-r from-transparent via-hogwarts-gold to-transparent mx-auto mt-3"></div>
            </div>

            <?php if(isset($_GET['pesan']) && $_GET['pesan'] == 'gagal'): ?>
                <div class="bg-red-900/30 border border-red-500/50 text-red-200 p-4 rounded-lg mb-6 flex items-start gap-3 shadow-lg" role="alert">
                    <i class="fas fa-exclamation-circle mt-1 text-red-400"></i>
                    <div>
                        <p class="font-bold text-sm">Akses Ditolak</p>
                        <p class="text-xs opacity-80">Email atau kata sandi tidak ditemukan dalam database.</p>
                    </div>
                </div>
            <?php endif; ?>

            <form action="proses_login.php" method="POST" class="space-y-5">
                <div class="group">
                    <label class="block text-xs font-bold text-hogwarts-gold uppercase tracking-wider mb-2 ml-1">Alamat Email</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i class="fas fa-envelope text-gray-500 group-focus-within:text-hogwarts-gold transition"></i>
                        </div>
                        <input type="email" name="email" required 
                               class="w-full pl-10 pr-4 py-3 bg-slate-800/50 border border-gray-600 text-white rounded-lg focus:border-hogwarts-gold focus:ring-1 focus:ring-hogwarts-gold focus:bg-slate-800 transition outline-none placeholder-gray-500"
                               placeholder="nama@email.com">
                    </div>
                </div>

                <div class="group">
                    <label class="block text-xs font-bold text-hogwarts-gold uppercase tracking-wider mb-2 ml-1">Kata Sandi</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i class="fas fa-lock text-gray-500 group-focus-within:text-hogwarts-gold transition"></i>
                        </div>
                        <input type="password" name="password" required 
                               class="w-full pl-10 pr-4 py-3 bg-slate-800/50 border border-gray-600 text-white rounded-lg focus:border-hogwarts-gold focus:ring-1 focus:ring-hogwarts-gold focus:bg-slate-800 transition outline-none placeholder-gray-500"
                               placeholder="••••••••">
                    </div>
                </div>
                
                <div class="flex items-center justify-between text-sm mt-2">
                    <label class="flex items-center cursor-pointer group">
                        <input type="checkbox" class="form-checkbox text-hogwarts-gold rounded border-gray-600 bg-slate-800 focus:ring-hogwarts-gold focus:ring-offset-0">
                        <span class="ml-2 text-gray-400 group-hover:text-white transition">Ingat Kata Sandi</span>
                    </label>
                    <a href="#" class="text-hogwarts-gold/80 hover:text-hogwarts-gold hover:underline transition text-xs uppercase font-bold tracking-wide">Lupa Sandi?</a>
                </div>

                <button type="submit" name="login" 
                        class="w-full bg-hogwarts-gold text-hogwarts-dark font-bold py-3.5 rounded-lg shadow-[0_0_15px_rgba(212,175,55,0.3)] hover:bg-yellow-400 hover:shadow-[0_0_25px_rgba(212,175,55,0.6)] transition duration-300 transform hover:-translate-y-1 hogwarts-font tracking-wider text-lg mt-4 flex items-center justify-center gap-2 group">
                    <span>Login</span>
                    <i class="fas fa-key text-hogwarts-dark/70 group-hover:rotate-45 transition duration-300"></i>
                </button>
            </form>

            <div class="mt-8 text-center">
                <p class="text-gray-400 text-sm">Belum terdaftar sebagai calon mahasiswa?</p>
                <a href="register.php" class="inline-block mt-2 text-hogwarts-gold font-bold hover:text-white transition border-b border-hogwarts-gold/30 hover:border-white pb-0.5">
                    Ajukan Pendaftaran Sekarang
                </a>
            </div>
        </div>

    </div>
    
    <div class="absolute bottom-4 text-center w-full text-gray-600 text-xs">
        &copy; 2025 Universitas Hogwarts. Hak Cipta Dilindungi.
    </div>
</div>

<?php include '../layouts/footer.php'; ?>