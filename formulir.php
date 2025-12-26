<?php
session_start();
include 'config/koneksi.php';

if (!isset($_SESSION['status_login'])) {
    header("Location: login.php");
    exit;
}

$id_user = $_SESSION['id_user'];

// --- UPGRADE QUERY ---
// Kita ambil data User (Nama/Email) SEKALIGUS data Pendaftaran (Alamat/Telp)
// Pakai LEFT JOIN: Supaya kalau belum daftar, data User (Nama) tetap keambil.
$query = mysqli_query($conn, "SELECT users.nama_lengkap, users.email, pendaftaran.* FROM users 
                              LEFT JOIN pendaftaran ON users.id = pendaftaran.user_id 
                              WHERE users.id = '$id_user'");

$data = mysqli_fetch_assoc($query);
// Sekarang $data isinya LENGKAP: nama_lengkap, email, alamat, no_telepon, dll.

include 'layouts/header.php';
?>

<div class="min-h-screen bg-gray-100 py-10 px-4">
    <div class="max-w-3xl mx-auto bg-white rounded-xl shadow-lg overflow-hidden">
        
        <div class="bg-jatim-blue p-6 text-white flex justify-between items-center">
            <div>
                <h2 class="text-2xl font-bold">Formulir Biodata</h2>
                <p class="text-blue-200 text-sm mt-1">Pastikan data yang Anda masukkan valid.</p>
            </div>
            <?php if(!empty($data['id'])): ?> 
                <span class="bg-green-500 text-white px-3 py-1 rounded-full text-xs font-bold shadow-sm">
                    <i class='bx bxs-check-circle'></i> Data Tersimpan
                </span>
            <?php else: ?>
                 <span class="bg-yellow-500 text-white px-3 py-1 rounded-full text-xs font-bold shadow-sm">
                    <i class='bx bxs-edit'></i> Belum Mengisi
                </span>
            <?php endif; ?>
        </div>

        <form action="proses_formulir.php" method="POST" enctype="multipart/form-data" class="p-8 space-y-6">
            
            <div>
                <h3 class="text-lg font-bold text-gray-700 border-b pb-2 mb-4">A. Data Pribadi</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Nama Lengkap</label>
                        <input type="text" value="<?= $data['nama_lengkap'] ?>" disabled 
                            class="w-full bg-gray-200 border border-gray-300 rounded-lg px-4 py-2 text-gray-600 font-bold cursor-not-allowed">
                        <p class="text-[10px] text-gray-400 mt-1">*Nama sesuai akun pendaftaran</p>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Email Terdaftar</label>
                        <input type="text" value="<?= $data['email'] ?>" disabled 
                            class="w-full bg-gray-200 border border-gray-300 rounded-lg px-4 py-2 text-gray-600 cursor-not-allowed">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Nomor Telepon / WA</label>
                        <input type="number" name="no_telepon" required placeholder="08123xxxx"
                            value="<?= $data['no_telepon'] ?? '' ?>"
                            class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-jatim-blue transition">
                    </div>

                    <div class="md:col-span-2">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Alamat Lengkap</label>
                        <textarea name="alamat" rows="3" required placeholder="Jalan, RT/RW, Kelurahan, Kecamatan..."
                            class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-jatim-blue transition"><?= $data['alamat'] ?? '' ?></textarea>
                    </div>
                </div>
            </div>

            <div>
                <h3 class="text-lg font-bold text-gray-700 border-b pb-2 mb-4">B. Data Akademik</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Asal Sekolah</label>
                        <input type="text" name="asal_sekolah" required placeholder="SMA/SMK..."
                            value="<?= $data['asal_sekolah'] ?? '' ?>"
                            class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-jatim-blue transition">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Jurusan Pilihan</label>
                        <select name="jurusan" required class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-jatim-blue bg-white">
                            <option value="">-- Pilih Jurusan --</option>
                            <?php
                                $listJurusan = ["Teknik Informatika", "Sistem Informasi", "Manajemen", "Akuntansi"];
                                foreach ($listJurusan as $j) {
                                    // Kalau data di DB == Jurusan di list, tambahkan atribut 'selected'
                                    $selected = (isset($data['jurusan_pilihan']) && $data['jurusan_pilihan'] == $j) ? 'selected' : '';
                                    echo "<option value='$j' $selected>$j</option>";
                                }
                            ?>
                        </select>
                    </div>
                </div>
            </div>

            <div>
                <h3 class="text-lg font-bold text-gray-700 border-b pb-2 mb-4">C. Pas Foto</h3>
                
                <?php if(!empty($data['foto_bukti_bayar'])): ?>
                    <div class="flex items-start gap-4 mb-4 bg-blue-50 p-4 rounded-lg border border-blue-200">
                        <img src="uploads/<?= $data['foto_bukti_bayar'] ?>" class="w-20 h-24 object-cover rounded shadow-sm bg-white">
                        <div>
                            <p class="text-sm font-bold text-blue-900">Foto Saat Ini</p>
                            <p class="text-xs text-gray-500 mt-1">Biarkan kosong jika tidak ingin mengubah foto.</p>
                        </div>
                    </div>
                <?php endif; ?>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Upload Foto Baru</label>
                    <input type="file" name="foto" accept=".jpg,.jpeg,.png"
                        <?= (!empty($data['foto_bukti_bayar'])) ? '' : 'required' ?>
                        class="block w-full text-sm text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-blue-600 file:text-white hover:file:bg-blue-700 transition">
                </div>
            </div>

            <div class="flex justify-end gap-3 pt-6 border-t">
                <a href="dashboard.php" class="px-6 py-2 rounded-lg text-gray-600 hover:bg-gray-100 font-medium transition">Batal</a>
                <button type="submit" name="simpan" 
                    class="px-6 py-2 bg-jatim-gold text-jatim-blue rounded-lg font-bold hover:bg-yellow-400 shadow-md transition transform hover:-translate-y-0.5">
                    <?= (!empty($data['id'])) ? 'Simpan Perubahan' : 'Kirim Pendaftaran' ?>
                </button>
            </div>

        </form>
    </div>
</div>

<?php include 'layouts/footer.php'; ?>