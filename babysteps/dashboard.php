<?php
session_start();
if (!isset($_SESSION['email'])) {
    header("Location: login.php");
    exit;
}

require 'includes/db.php';

$email = $_SESSION['email'];
$userQuery = mysqli_query($conn, "SELECT id FROM users WHERE email = '$email'");
$user = mysqli_fetch_assoc($userQuery);
$user_id = $user['id'];

$dataQuery = mysqli_query($conn, "SELECT * FROM anak WHERE user_id = $user_id ORDER BY tanggal DESC LIMIT 1");
$data = mysqli_fetch_assoc($dataQuery);

$namaAnak = '-';
$tinggi = '-';
$berat = '-';
$tanggalLahir = null;
$umurAnak = '-';
$usia = '-';
$kondisi = '-';

if ($data) {
    $namaAnak = $data['nama'] ?? '-';
    $tinggi = isset($data['tinggi']) ? $data['tinggi'] . ' cm' : '-';
    $berat = isset($data['berat']) ? $data['berat'] . ' Kg' : '-';
    $tanggalLahir = $data['tanggal'] ?? null;
    $umurAnak = isset($data['umur']) ? $data['umur'] . ' Tahun' : '-';

    if ($tanggalLahir) {
        $lahir = new DateTime($tanggalLahir);
        $hariIni = new DateTime();
        $interval = $lahir->diff($hariIni);
        $usia = $interval->y . ' Tahun';
    }

    if (isset($data['tinggi']) && isset($data['berat'])) {
        if ($data['tinggi'] >= 85 && $data['berat'] >= 12) {
            $kondisi = 'Normal';
        } else {
            $kondisi = 'Perlu Perhatian';
        }
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Beranda - BabySteps</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body {
            margin: 0;
            font-family: 'Inter', sans-serif;
            background-color: #f6fbff;
        }
        .navbar {
            background-color: #ffffff;
            padding: 20px 50px;
            display: flex;
            justify-content: space-between;
            box-shadow: 0 2px 4px rgba(0,0,0,0.05);
        }
        .navbar .brand {
            font-weight: bold;
            color: #2b6cb0;
            font-size: 20px;
        }
        .navbar nav a {
            margin: 0 15px;
            text-decoration: none;
            color: #333;
        }
        .container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 50px 100px;
        }
        .profile-img {
            width: 200px;
            height: 260px;
            border-radius: 50%;
            background: url('assets/images/fotobuatdashboard.png') center/cover no-repeat;
            background-color: #e0e0e0;
        }
        .profile-info {
            flex: 1;
            margin-left: 40px;
        }
        .profile-info h1 {
            font-size: 28px;
            margin: 10px 0;
        }
        .profile-info .details {
            font-size: 18px;
            margin-bottom: 20px;
        }
        .stat {
            display: inline-block;
            background-color: #d9f2dd;
            color: #2b6cb0;
            border-radius: 20px;
            padding: 8px 16px;
            margin-right: 10px;
            font-weight: bold;
        }
        .actions {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }
        .actions a {
            background-color: #e1effe;
            color: #2b6cb0;
            text-decoration: none;
            padding: 12px 20px;
            border-radius: 10px;
            font-weight: bold;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .actions a:hover {
            background-color: #c9e4fd;
        }
    </style>
</head>
<body>
    <div class="navbar">
        <div class="brand">BabySteps</div>
        <nav>
            <a href="#">Home</a>
            <a href="grafik.php">Grafik Pertumbuhan</a>
            <a href="artikel.php">Artikel Edukasi</a>
            <a href="logout.php" class="logout-link">Logout</a>
        </nav>
    </div>

    <div class="container">
        <div class="profile-img"></div>
        <div class="profile-info">
            <h1><?= htmlspecialchars($namaAnak) ?></h1>
            <div class="details">Umur: <?= $umurAnak ?> &nbsp;&nbsp;&nbsp; Status: <?= $kondisi ?></div>

            <div>
                <span class="stat">Tinggi: <?= $tinggi ?></span>
                <span class="stat">Berat: <?= $berat ?></span>
            </div>
        </div>
        <div class="actions">
            <a href="tambah_data.php">+ Tambah Data</a>
            <a href="grafik.php">+ Lihat Grafik</a>
            <a href="artikel.php">+ Artikel Edukasi</a>
        </div>
    </div>
</body>
</html>