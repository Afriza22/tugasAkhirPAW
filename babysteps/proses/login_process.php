<?php
session_start();
require '../includes/db.php';

$email = $_POST['email'];
$password = $_POST['password'];

if (empty($email) || empty($password)) {
    echo "Email dan password wajib diisi.";
    exit;
}

$result = mysqli_query($conn, "SELECT * FROM users WHERE email='$email'");

if (mysqli_num_rows($result) > 0) {
    $user = mysqli_fetch_assoc($result);
    if (password_verify($password, $user['password'])) {
        $_SESSION['email'] = $user['email'];
        header("Location: ../dashboard.php");
    } else {
        echo "Password salah.";
    }
} else {
    echo "Email tidak ditemukan.";
}
?>
