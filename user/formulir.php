<?php
session_start();
include '../config/koneksi.php';

if (!isset($_SESSION['status_login'])) {
    header("Location: ../auth/login.php");
    exit;
}

$id_user = $_SESSION['id_user'];

// --- QUERY TETAP (JANGAN UBAH) ---
$query = mysqli_query($conn, "SELECT users.nama_lengkap, users.email, pendaftaran.* FROM users 
                              LEFT JOIN pendaftaran ON users.id = pendaftaran.user_id 
                              WHERE users.id = '$id_user'");

$data = mysqli_fetch_assoc($query);

include '../layouts/header.php';
?>

<div class="min-h-screen bg-gray-100 py-10 px-4">
    <div class="max-w-4xl mx-auto bg-white rounded-xl shadow-lg overflow-hidden">
        
        <div class="bg-jatim-blue p-6 text-white flex justify-between items-center">
            <div>
                <h2 class="text-2xl font-bold">Formulir Pendaftaran</h2>
                <p class="text-blue-200 text-sm mt-1">Lengkapi Biodata, Foto, dan Bukti Pembayaran.</p>
            </div>
            <a href="dashboard.php" class="text-sm bg-white/20 hover:bg-white/30 px-3 py-1 rounded transition">
                &larr; Kembali
            </a>
        </div>

        <form action="proses_formulir.php" method="POST" enctype="multipart/form-data" class="p-8 space-y-8">
            <input type="hidden" name="id_pendaftaran" value="<?= $data['id'] ?? '' ?>">

            <div>
                <h3 class="text-lg font-bold text-gray-800 border-b-2 border-jatim-gold inline-block pb-1 mb-6">A. Data Pribadi</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-1">Nama Lengkap</label>
                        <input type="text" value="<?= $data['nama_lengkap'] ?>" disabled 
                            class="w-full bg-gray-200 border border-gray-300 rounded-lg px-4 py-2 text-gray-600 font-bold cursor-not-allowed">
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-1">Email</label>
                        <input type="text" value="<?= $data['email'] ?>" disabled 
                            class="w-full bg-gray-200 border border-gray-300 rounded-lg px-4 py-2 text-gray-600 cursor-not-allowed">
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-1">Jenis Kelamin</label>
                        <select name="jenis_kelamin" required class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-jatim-blue">
                            <option value="">-- Pilih --</option>
                            <option value="L" <?= (isset($data['jenis_kelamin']) && $data['jenis_kelamin'] == 'L') ? 'selected' : '' ?>>Laki-laki</option>
                            <option value="P" <?= (isset($data['jenis_kelamin']) && $data['jenis_kelamin'] == 'P') ? 'selected' : '' ?>>Perempuan</option>
                        </select>
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-1">Agama</label>
                        <select name="agama" required class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-jatim-blue">
                            <option value="">-- Pilih --</option>
                            <?php 
                            $agamas = ['Islam', 'Kristen', 'Katolik', 'Hindu', 'Buddha', 'Konghucu'];
                            foreach($agamas as $a) {
                                $selected = (isset($data['agama']) && $data['agama'] == $a) ? 'selected' : '';
                                echo "<option value='$a' $selected>$a</option>";
                            }
                            ?>
                        </select>
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-1">No. Telepon / WA</label>
                        <input type="number" name="no_telepon" value="<?= $data['no_telepon'] ?? '' ?>" required placeholder="08xxxx"
                            class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-jatim-blue">
                    </div>

                    <div class="md:col-span-2">
                        <label class="block text-sm font-semibold text-gray-700 mb-1">Alamat Lengkap</label>
                        <textarea name="alamat" rows="2" required class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-jatim-blue"><?= $data['alamat'] ?? '' ?></textarea>
                    </div>
                </div>
            </div>

            <div>
                <h3 class="text-lg font-bold text-gray-800 border-b-2 border-jatim-gold inline-block pb-1 mb-6">B. Data Akademik</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-1">Asal Sekolah</label>
                        <input type="text" name="asal_sekolah" value="<?= $data['asal_sekolah'] ?? '' ?>" required placeholder="Nama SMA/SMK"
                            class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-jatim-blue">
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-1">Nilai Rata-Rata Rapor</label>
                        <input type="number" step="0.01" name="nilai_rata_rata" value="<?= $data['nilai_rata_rata'] ?? '' ?>" required placeholder="Contoh: 85.50"
                            class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-jatim-blue">
                    </div>

                    <div class="md:col-span-2">
                        <label class="block text-sm font-semibold text-gray-700 mb-1">Jurusan Pilihan</label>
                        <select name="jurusan_pilihan" required class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-jatim-blue">
                            <option value="">-- Pilih Jurusan --</option>
                            <?php
                            $jurusans = ["Teknik Informatika", "Sistem Informasi", "Manajemen", "Akuntansi"];
                            foreach ($jurusans as $j) {
                                $selected = (isset($data['jurusan_pilihan']) && $data['jurusan_pilihan'] == $j) ? 'selected' : '';
                                echo "<option value='$j' $selected>$j</option>";
                            }
                            ?>
                        </select>
                    </div>
                </div>
            </div>

            <div>
                <h3 class="text-lg font-bold text-gray-800 border-b-2 border-jatim-gold inline-block pb-1 mb-6">C. Foto & Pembayaran</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                    <div class="border p-4 rounded-lg bg-gray-50 hover:bg-white transition shadow-sm">
                        <label class="block text-sm font-bold text-gray-700 mb-2">1. Pass Foto Formal (3x4) *</label>
                        
                        <?php if(!empty($data['pass_foto'])): ?>
                            <div class="flex items-center gap-3 mb-3 bg-green-100 p-2 rounded border border-green-200">
                                <img src="../uploads/<?= $data['pass_foto'] ?>" class="h-10 w-8 object-cover rounded">
                                <span class="text-xs text-green-700 font-semibold">Foto tersimpan</span>
                            </div>
                        <?php endif; ?>

                        <input type="file" name="pass_foto" accept=".jpg,.jpeg,.png"
                            class="block w-full text-sm text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-blue-600 file:text-white hover:file:bg-blue-700 transition"
                            <?= empty($data['pass_foto']) ? 'required' : '' ?>>
                    </div>

                    <div class="border p-4 rounded-lg bg-gray-50 hover:bg-white transition shadow-sm">
                        <label class="block text-sm font-bold text-gray-700 mb-2">2. Bukti Pembayaran *</label>
                        
                        <?php if(!empty($data['file_bukti'])): ?>
                            <div class="flex items-center gap-3 mb-3 bg-green-100 p-2 rounded border border-green-200">
                                <i class='bx bxs-file-image text-green-600 text-2xl'></i>
                                <span class="text-xs text-green-700 font-semibold">Bukti tersimpan</span>
                                <a href="../uploads/<?= $data['file_bukti'] ?>" target="_blank" class="text-xs text-blue-600 underline ml-auto">Lihat</a>
                            </div>
                        <?php endif; ?>

                        <input type="file" name="file_bukti" accept=".jpg,.jpeg,.png,.pdf"
                            class="block w-full text-sm text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-yellow-500 file:text-white hover:file:bg-yellow-600 transition"
                            <?= empty($data['file_bukti']) ? 'required' : '' ?>>
                    </div>

                </div>
                <p class="text-xs text-gray-500 mt-4 italic">* Dokumen lain (Ijazah, KK, Rapor) dapat diupload pada menu <b>Upload Berkas</b> setelah formulir ini disimpan.</p>
            </div>

            <div class="flex justify-end pt-6 border-t mt-6">
                <button type="submit" name="simpan" 
                    class="px-8 py-3 bg-jatim-gold text-jatim-blue rounded-lg font-bold hover:bg-yellow-400 shadow-lg transition transform hover:-translate-y-1">
                    Simpan & Lanjut Upload
                </button>
            </div>

        </form>
    </div>
</div>

<?php include '../layouts/footer.php'; ?>
