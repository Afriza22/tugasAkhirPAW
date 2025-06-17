<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Login - BabySteps</title>
  <link rel="stylesheet" href="assets/css/style.css">
  <link href="https://fonts.googleapis.com/css2?family=Baloo+Bhaijaan+2&display=swap" rel="stylesheet">
</head>
<body class="login-page">
  <div class="auth-wrapper">
    <div class="auth-container">
      <h1>LOGIN</h1>
      <form action="proses/login_process.php" method="POST">
        <label>Email</label>
        <input type="email" name="email" placeholder="Enter Your Email here" required>

        <label>Password</label>
        <input type="password" name="password" placeholder="Please Enter Your Password here" required>

        <button type="submit" class="btn-auth">Login</button>
      </form>
      <p class="link-auth">Belum punya akun? <a href="register.php">Register Now</a></p>
    </div>
  </div>
</body>
</html>
