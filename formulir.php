<?php
session_start();
// Cek login
if (!isset($_SESSION['status_login'])) {
    header("Location: login.php");
    exit;
}
include 'layouts/header.php';
?>

<div class="min-h-screen bg-gray-100 py-10 px-4">
    <div class="max-w-3xl mx-auto bg-white rounded-xl shadow-lg overflow-hidden">
        
        <div class="bg-jatim-blue p-6 text-white">
            <h2 class="text-2xl font-bold">Formulir Biodata Mahasiswa</h2>
            <p class="text-blue-200 text-sm mt-1">Lengkapi data diri dan upload berkas persyaratan.</p>
        </div>

        <form action="proses_formulir.php" method="POST" enctype="multipart/form-data" class="p-8 space-y-6">
            
            <div>
                <h3 class="text-lg font-bold text-gray-700 border-b pb-2 mb-4">A. Data Pribadi</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Nama Lengkap</label>
                        <input type="text" value="<?php echo $_SESSION['nama']; ?>" disabled 
                            class="w-full bg-gray-100 border border-gray-300 rounded-lg px-4 py-2 text-gray-500 cursor-not-allowed">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Nomor Telepon / WA</label>
                        <input type="number" name="no_telepon" required placeholder="08123xxxx"
                            class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-jatim-blue focus:outline-none">
                    </div>
                    <div class="md:col-span-2">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Alamat Lengkap</label>
                        <textarea name="alamat" rows="3" required placeholder="Jl. Mawar No. 12..."
                            class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-jatim-blue focus:outline-none"></textarea>
                    </div>
                </div>
            </div>

            <div>
                <h3 class="text-lg font-bold text-gray-700 border-b pb-2 mb-4">B. Data Akademik</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Asal Sekolah</label>
                        <input type="text" name="asal_sekolah" required placeholder="SMA Negeri 1..."
                            class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-jatim-blue focus:outline-none">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Jurusan Pilihan</label>
                        <select name="jurusan" required class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-jatim-blue bg-white">
                            <option value="">-- Pilih Jurusan --</option>
                            <option value="Teknik Informatika">Teknik Informatika</option>
                            <option value="Sistem Informasi">Sistem Informasi</option>
                            <option value="Manajemen">Manajemen</option>
                            <option value="Akuntansi">Akuntansi</option>
                        </select>
                    </div>
                </div>
            </div>

            <div>
                <h3 class="text-lg font-bold text-gray-700 border-b pb-2 mb-4">C. Upload Berkas</h3>
                <div class="bg-yellow-50 border-l-4 border-yellow-400 p-4 mb-4">
                    <p class="text-xs text-yellow-700">
                        <strong>Perhatian:</strong> Upload foto bukti pembayaran atau pas foto formal. 
                        Format: JPG/PNG. Maksimal 2MB.
                    </p>
                </div>
                
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Bukti Foto / Pas Foto</label>
                    <input type="file" name="foto" required accept=".jpg,.jpeg,.png"
                        class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100 transition">
                </div>
            </div>

            <div class="flex justify-end gap-3 pt-6">
                <a href="dashboard.php" class="px-6 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 font-medium">Batal</a>
                <button type="submit" name="simpan" 
                    class="px-6 py-2 bg-jatim-gold text-jatim-blue rounded-lg font-bold hover:bg-yellow-400 shadow-md transition transform hover:-translate-y-1">
                    Simpan Formulir
                </button>
            </div>

        </form>
    </div>
</div>

<?php include 'layouts/footer.php'; ?>