<?php
session_start();
include '../config/koneksi.php';

// Security Check
if (!isset($_SESSION['status_login']) || $_SESSION['role'] != 'admin') { header("Location: ../login.php"); exit; }

// Ambil Data HANYA yang Diterima (Biasanya laporan butuh data yang lulus aja)
// Kalau mau semua, hapus "WHERE status_pendaftaran = 'diterima'"
$query = "SELECT pendaftaran.*, users.nama_lengkap 
          FROM pendaftaran 
          JOIN users ON pendaftaran.user_id = users.id 
          WHERE status_pendaftaran = 'diterima'
          ORDER BY users.nama_lengkap ASC";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Laporan Kelulusan PMB</title>
    <style>
        body { font-family: sans-serif; padding: 20px; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #000; padding: 8px; text-align: left; font-size: 12px; }
        th { background-color: #f2f2f2; }
        .header { text-align: center; margin-bottom: 30px; }
        .header h1 { margin: 0; font-size: 24px; }
        .header p { margin: 5px 0; }
        
        /* TOMBOL CETAK (Akan hilang pas diprint) */
        .btn-print {
            background-color: #0f172a; color: white; padding: 10px 20px; 
            text-decoration: none; border-radius: 5px; font-weight: bold;
            display: inline-block; margin-bottom: 20px; cursor: pointer; border: none;
        }
        .btn-back {
            background-color: #94a3b8; color: white; padding: 10px 20px; 
            text-decoration: none; border-radius: 5px; font-weight: bold; margin-right: 10px;
        }

        /* LOGIKA PRINT: Sembunyikan tombol saat dicetak */
        @media print {
            .no-print { display: none; }
        }
    </style>
</head>
<body>

    <div class="no-print">
        <a href="dashboard.php" class="btn-back">Kembali</a>
        <button onclick="window.print()" class="btn-print">Cetak Laporan (PDF)</button>
    </div>

    <div class="header">
        <h1>LAPORAN KELULUSAN MAHASISWA BARU</h1>
        <p>TAHUN AKADEMIK 2025/2026</p>
        <p style="font-size: 12px; font-style: italic;">Dicetak pada tanggal: <?php echo date('d-m-Y'); ?></p>
    </div>

    <table>
        <thead>
            <tr>
                <th style="width: 5%">No</th>
                <th style="width: 15%">NISN / ID</th>
                <th style="width: 25%">Nama Lengkap</th>
                <th style="width: 20%">Asal Sekolah</th>
                <th style="width: 20%">Jurusan Diterima</th>
                <th style="width: 15%">No. Telepon</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            $no = 1;
            while($row = mysqli_fetch_assoc($result)): 
            ?>
            <tr>
                <td style="text-align: center;"><?= $no++ ?></td>
                <td>REG-<?= $row['id'] ?></td> <td><?= strtoupper($row['nama_lengkap']) ?></td>
                <td><?= $row['asal_sekolah'] ?></td>
                <td><?= $row['jurusan_pilihan'] ?></td>
                <td><?= $row['no_telepon'] ?></td>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>

    <div style="margin-top: 50px; text-align: right; margin-right: 50px;">
        <p>Jawa Timur, <?php echo date('d F Y'); ?></p>
        <br><br><br>
        <p><strong>Rektor Universitas</strong></p>
    </div>

</body>
</html>