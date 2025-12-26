<?php include 'layouts/header.php'; ?>

<div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-blue-100 to-blue-300 py-12 px-4 sm:px-6 lg:px-8">
    
    <div class="bg-white p-8 rounded-xl shadow-2xl w-full max-w-xl border border-gray-100">
        
        <div class="text-center mb-8">
            <h2 class="text-3xl font-extrabold text-kampus">Buat Akun Baru</h2>
            <p class="text-gray-500 text-sm mt-2">Isi data diri untuk memulai pendaftaran PMB</p>
        </div>

        <form action="proses_register.php" method="POST" class="space-y-6">
            
            <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
                
                <div>
                    <label for="nama_lengkap" class="block text-sm font-medium text-gray-700">Nama Lengkap</label>
                    <input type="text" name="nama_lengkap" id="nama_lengkap" required 
                        class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-kampus focus:border-kampus sm:text-sm"
                        placeholder="Cth: Budi Santoso">
                </div>

                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700">Alamat Email</label>
                    <input type="email" name="email" id="email" required 
                        class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-kampus focus:border-kampus sm:text-sm"
                        placeholder="budi@gmail.com">
                </div>
            </div>

            <div>
                <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                <input type="password" name="password" id="password" required 
                    class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-kampus focus:border-kampus sm:text-sm"
                    placeholder="Minimal 8 karakter">
                <p class="text-xs text-gray-400 mt-1">*Gunakan kombinasi huruf dan angka.</p>
            </div>

            <div>
                <label for="konfirmasi_password" class="block text-sm font-medium text-gray-700">Ulangi Password</label>
                <input type="password" name="konfirmasi_password" id="konfirmasi_password" required 
                    class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-kampus focus:border-kampus sm:text-sm"
                    placeholder="Ketik ulang password tadi">
            </div>

            <div>
                <button type="submit" name="register"
                    class="w-full flex justify-center py-3 px-4 border border-transparent rounded-lg shadow-sm text-sm font-bold text-white bg-kampus hover:bg-blue-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-kampus transition duration-300 transform hover:-translate-y-1">
                    Daftar Sekarang
                </button>
            </div>
        </form>

        <div class="mt-6 text-center">
            <p class="text-sm text-gray-600">
                Sudah punya akun? 
                <a href="login.php" class="font-medium text-kampus hover:text-blue-800 hover:underline">
                    Login disini
                </a>
            </p>
        </div>

    </div>
</div>

<?php include 'layouts/footer.php'; ?>