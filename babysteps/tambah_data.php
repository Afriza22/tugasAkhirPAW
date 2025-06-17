<?php
session_start();
if (!isset($_SESSION['email'])) {
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tambah Data Anak</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        .btn-back {
            position: absolute;
            top: 20px;
            left: 20px;
            background-color: #D6E4F0;
            color: #1D4E89;
            padding: 6px 10px;
            border-radius: 10px;
            text-decoration: none;
            font-weight: bold;
            transition: background-color 0.3s ease;
        }
        .btn-back:hover {
            background-color: #c3d7eb;
        }
    </style>
</head>
<body class="bg-light">

    <!-- Tombol kembali -->
    <a href="dashboard.php" class="btn-back">← Kembali</a>

    <div class="container py-5">
        <h3 class="mb-4 text-center">Input Data Pertumbuhan Anak</h3>
        <form action="proses/simpan_data.php" method="POST" class="mx-auto" style="max-width: 500px;">
            <div class="mb-3">
                <label>Nama Anak</label>
                <input type="text" name="nama" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Umur Anak (dalam tahun)</label>
                <input type="number" name="umur" class="form-control" step="1" required>
            </div>

            <div class="mb-3">
                <label>Tinggi Badan (cm)</label>
                <input type="number" name="tinggi" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Berat Badan (kg)</label>
                <input type="number" name="berat" step="0.1" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Tanggal Pengukuran</label>
                <input type="date" name="tanggal" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-primary w-100">Simpan</button>
        </form>
    </div>
</body>
</html>