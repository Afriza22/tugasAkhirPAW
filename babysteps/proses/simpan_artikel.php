<?php
require '../includes/db.php';

$judul = $_POST['judul'];
$konten = $_POST['konten'];

if (empty($judul) || empty($konten)) {
    echo "Judul dan konten wajib diisi.";
    exit;
}

mysqli_query($conn, "INSERT INTO artikel (judul, konten) VALUES ('$judul', '$konten')");
header("Location: ../artikel.php");
?>