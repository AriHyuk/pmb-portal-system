<?php include 'layouts/header.php'; ?>

<nav class="bg-jatim-blue text-white py-4 shadow-lg border-b-4 border-jatim-gold">
    <div class="container mx-auto px-6 flex justify-between items-center">
        <div class="flex items-center gap-3">
            <div class="w-10 h-10 bg-white rounded-full flex items-center justify-center text-jatim-blue font-bold text-xl">
                U
            </div>
            <div>
                <h1 class="text-lg font-bold tracking-wide">PMB KAMPUS 2025</h1>
                <p class="text-xs text-gray-400">Sistem Penerimaan Mahasiswa Baru</p>
            </div>
        </div>
        <div class="hidden md:flex gap-6 text-sm font-medium">
            <a href="index.php" class="hover:text-jatim-gold transition">Beranda</a>
            <a href="#" class="hover:text-jatim-gold transition">Jadwal</a>
            <a href="#" class="hover:text-jatim-gold transition">Panduan</a>
        </div>
    </div>
</nav>

<div class="min-h-[85vh] flex items-center justify-center p-4 bg-[url('https://www.transparenttextures.com/patterns/cubes.png')]">
    
    <div class="w-full max-w-4xl bg-white rounded-2xl shadow-2xl overflow-hidden flex flex-col md:flex-row">
        
        <div class="hidden md:flex md:w-1/2 bg-slate-100 p-8 flex-col justify-center items-center text-center relative">
            <div class="absolute inset-0 bg-jatim-blue opacity-5 pattern-grid-lg"></div>
            <img src="https://img.freepik.com/free-vector/college-students-concept-illustration_114360-10202.jpg?t=st=1710000000" 
                 alt="Ilustrasi Kampus" class="w-3/4 mb-6 mix-blend-multiply">
            <h3 class="text-xl font-bold text-jatim-blue mb-2">Selamat Datang Calon Mahasiswa!</h3>
            <p class="text-sm text-gray-500">Silakan masuk untuk mengakses dashboard pendaftaran, upload berkas, dan cek status kelulusan.</p>
        </div>

        <div class="w-full md:w-1/2 p-8 md:p-12">
            <div class="text-center mb-8">
                <h2 class="text-2xl font-bold text-slate-800">Login Peserta</h2>
                <div class="h-1 w-20 bg-jatim-gold mx-auto mt-2 rounded-full"></div>
            </div>

            <?php if(isset($_GET['pesan']) && $_GET['pesan'] == 'gagal'): ?>
                <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-3 mb-4 text-sm" role="alert">
                    <p>Email atau Password salah!</p>
                </div>
            <?php endif; ?>

            <form action="proses_login.php" method="POST" class="space-y-5">
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">Email</label>
                    <input type="email" name="email" required 
                           class="w-full px-4 py-3 bg-gray-50 border border-gray-300 rounded-lg focus:ring-2 focus:ring-jatim-blue focus:border-jatim-blue transition outline-none"
                           placeholder="nama@email.com">
                </div>
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">Password</label>
                    <input type="password" name="password" required 
                           class="w-full px-4 py-3 bg-gray-50 border border-gray-300 rounded-lg focus:ring-2 focus:ring-jatim-blue focus:border-jatim-blue transition outline-none"
                           placeholder="********">
                </div>
                
                <div class="flex items-center justify-between text-sm">
                    <label class="flex items-center">
                        <input type="checkbox" class="form-checkbox text-jatim-blue rounded">
                        <span class="ml-2 text-gray-600">Ingat Saya</span>
                    </label>
                    <a href="#" class="text-jatim-blue font-semibold hover:underline">Lupa Password?</a>
                </div>

                <button type="submit" name="login" 
                        class="w-full bg-jatim-blue text-white font-bold py-3 rounded-lg hover:bg-slate-800 hover:shadow-lg transition transform active:scale-95">
                    MASUK SISTEM
                </button>
            </form>

            <div class="mt-8 text-center text-sm text-gray-600">
                Belum punya akun? <br>
                <a href="register.php" class="text-jatim-blue font-bold hover:text-jatim-gold transition">Daftar Akun Baru</a>
            </div>
        </div>

    </div>
</div>

<?php include 'layouts/footer.php'; ?>