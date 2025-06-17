<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Register - BabySteps</title>
  <link rel="stylesheet" href="assets/css/style.css">
  <link href="https://fonts.googleapis.com/css2?family=Baloo+Bhaijaan+2&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

</head>
<body class="register-page">
  <div class="auth-wrapper">
    <div class="auth-container">
      <h1>REGISTER</h1>
      <form action="proses/register_process.php" method="POST">
        <label>Email</label>
        <input type="email" name="email" placeholder="Enter Your Email here" required>

        <label>Password</label>
        <input type="password" name="password" placeholder="Please Enter Your Password here" required>

        <label>Reenter Password</label>
        <input type="password" name="re_password" placeholder="Please Re-enter Your Password" required>

        <button type="submit" class="btn-auth">Register</button>
      </form>
      <p class="link-auth">Sudah punya akun? <a href="login.php">Login Now</a></p>
    </div>
  </div>
</body>
</html>
