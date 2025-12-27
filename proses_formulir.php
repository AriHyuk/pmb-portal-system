<?php
session_start();
include 'config/koneksi.php';

if (!isset($_SESSION['status_login'])) {
    header("Location: login.php");
    exit;
}

if (isset($_POST['simpan'])) {
    $id_user = $_SESSION['id_user'];
    
    // 1. Ambil Data Form
    $alamat          = mysqli_real_escape_string($conn, $_POST['alamat']);
    $no_telepon      = mysqli_real_escape_string($conn, $_POST['no_telepon']);
    $jenis_kelamin   = mysqli_real_escape_string($conn, $_POST['jenis_kelamin']);
    $agama           = mysqli_real_escape_string($conn, $_POST['agama']);
    $asal_sekolah    = mysqli_real_escape_string($conn, $_POST['asal_sekolah']);
    $jurusan_pilihan = mysqli_real_escape_string($conn, $_POST['jurusan_pilihan']);
    $nilai_rata_rata = mysqli_real_escape_string($conn, $_POST['nilai_rata_rata']);

    // Cek apakah data user ini sudah ada di tabel pendaftaran?
    $cek = mysqli_query($conn, "SELECT * FROM pendaftaran WHERE user_id = '$id_user'");
    $ada = mysqli_num_rows($cek) > 0;

    // --- LOGIKA UPLOAD FOTO & BUKTI ---
    $folder = "uploads/";
    
    // Siapkan variabel update/insert string
    // Kita set default file query kosong, nanti diisi kalau user upload file baru
    $query_file_foto = "";
    $query_file_bukti = "";

    // A. Handle Pass Foto
    if (!empty($_FILES['pass_foto']['name'])) {
        $foto_name = time() . '_FOTO_' . $_FILES['pass_foto']['name'];
        move_uploaded_file($_FILES['pass_foto']['tmp_name'], $folder . $foto_name);
        $query_file_foto = ", pass_foto = '$foto_name'"; 
    }

    // B. Handle Bukti Bayar
    if (!empty($_FILES['file_bukti']['name'])) {
        $bukti_name = time() . '_BUKTI_' . $_FILES['file_bukti']['name'];
        move_uploaded_file($_FILES['file_bukti']['tmp_name'], $folder . $bukti_name);
        $query_file_bukti = ", file_bukti = '$bukti_name'";
    }

    if ($ada) {
        // --- UPDATE DATA ---
        // Perhatikan tanda koma dan kutip
        $query = "UPDATE pendaftaran SET 
                  alamat = '$alamat',
                  no_telepon = '$no_telepon',
                  jenis_kelamin = '$jenis_kelamin',
                  agama = '$agama',
                  asal_sekolah = '$asal_sekolah',
                  jurusan_pilihan = '$jurusan_pilihan',
                  nilai_rata_rata = '$nilai_rata_rata'
                  $query_file_foto
                  $query_file_bukti
                  WHERE user_id = '$id_user'";
    } else {
        // --- INSERT DATA BARU ---
        // Jika insert, kita butuh nama file (kalau kosong kasi NULL atau string kosong)
        $foto_val  = !empty($foto_name) ? $foto_name : '';
        $bukti_val = !empty($bukti_name) ? $bukti_name : '';

        $query = "INSERT INTO pendaftaran 
                  (user_id, alamat, no_telepon, jenis_kelamin, agama, asal_sekolah, jurusan_pilihan, nilai_rata_rata, pass_foto, file_bukti, status_pendaftaran)
                  VALUES 
                  ('$id_user', '$alamat', '$no_telepon', '$jenis_kelamin', '$agama', '$asal_sekolah', '$jurusan_pilihan', '$nilai_rata_rata', '$foto_val', '$bukti_val', 'pending')";
    }

    if (mysqli_query($conn, $query)) {
        echo "<script>alert('Data berhasil disimpan!'); window.location='dashboard.php';</script>";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>

<?php
session_start();
include 'config/koneksi.php';

// Cek Login (Sama seperti sebelumnya)
if (!isset($_SESSION['status_login'])) { header("Location: login.php"); exit; }
$id_user = $_SESSION['id_user'];

// Ambil Data
$data = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM pendaftaran WHERE user_id = '$id_user'"));
if (!$data) { echo "<script>window.location='formulir.php';</script>"; exit; }

// --- FUNGSI UPLOAD (Logic Tetap Sama) ---
function prosesUpload($inputName, $columnName, $conn, $id_user) {
    global $data;
    if (isset($_FILES[$inputName]) && $_FILES[$inputName]['error'] == 0) {
        $file_name = $_FILES[$inputName]['name'];
        $file_tmp = $_FILES[$inputName]['tmp_name'];
        $file_size = $_FILES[$inputName]['size'];
        
        $ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
        if (!in_array($ext, ['pdf','jpg','jpeg','png'])) {
            echo "<script>alert('Format Salah! Hanya PDF/JPG/PNG.');</script>"; return false;
        }
        if ($file_size > 5000000) {
            echo "<script>alert('File terlalu besar (Max 5MB).');</script>"; return false;
        }

        $newName = strtoupper($inputName) . "_" . uniqid() . "." . $ext;
        if(move_uploaded_file($file_tmp, 'uploads/' . $newName)) {
            if(!empty($data[$columnName]) && file_exists('uploads/'.$data[$columnName])){
                unlink('uploads/'.$data[$columnName]);
            }
            mysqli_query($conn, "UPDATE pendaftaran SET $columnName = '$newName' WHERE user_id = '$id_user'");
            return true;
        }
    }
    return false;
}

// Logic Handler
if (isset($_POST['upload_ijazah'])) { if(prosesUpload('ijazah', 'file_ijazah', $conn, $id_user)) header("Refresh:0"); }
if (isset($_POST['upload_kk'])) { if(prosesUpload('kk', 'file_kk', $conn, $id_user)) header("Refresh:0"); }
if (isset($_POST['upload_rapor'])) { if(prosesUpload('rapor', 'file_rapor', $conn, $id_user)) header("Refresh:0"); }

?>