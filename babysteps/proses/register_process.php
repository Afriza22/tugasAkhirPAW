<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require '../includes/db.php';

    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    if (empty($email) || empty($_POST['password'])) {
        echo "Email dan password wajib diisi.";
        exit;
    }

    $cek = mysqli_query($conn, "SELECT * FROM users WHERE email='$email'");
    if (mysqli_num_rows($cek) > 0) {
        echo "Email sudah terdaftar.";
    } else {
        mysqli_query($conn, "INSERT INTO users (email, password) VALUES ('$email', '$password')");
        header("Location: ../login.php");
    }
}
?>