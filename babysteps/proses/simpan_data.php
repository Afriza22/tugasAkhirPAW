<?php
session_start();
require '../includes/db.php';

if (!isset($_SESSION['email'])) {
    header("Location: ../login.php");
    exit;
}

// Ambil ID user
$email = $_SESSION['email'];
$userQuery = mysqli_query($conn, "SELECT id FROM users WHERE email = '$email'");
$user = mysqli_fetch_assoc($userQuery);
$user_id = $user['id'];

// Ambil data POST dari form
$tinggi = $_POST['tinggi'];
$berat = $_POST['berat'];
$tanggal = $_POST['tanggal'];
$umur = $_POST['umur']; // jika masih pakai input umur
$nama = $_POST['nama'];

// Simpan ke tabel anak
$query = "INSERT INTO anak (user_id, nama, tinggi, berat, tanggal, umur)
          VALUES ('$user_id', '$nama', '$tinggi', '$berat', '$tanggal', '$umur')";

$result = mysqli_query($conn, $query);

// Redirect ke dashboard
if ($result) {
    header("Location: ../dashboard.php");
} else {
    echo "Gagal menyimpan data: " . mysqli_error($conn);
}
