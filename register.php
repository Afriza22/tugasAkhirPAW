<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Babysteps</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
  </head>
  <body>

  <div class="bg-primary d-flex justify-content-center align-items-center" style="height:100vh">
    <div class="bg-light py-5 px-3 rounded shadow position-relative" style="width:300px">
        <h1 class="text-center text-primary fw-bold mb-5">REGISTER</h1>
        <form action="auth.php" method="post">
            <div class="position-relative">
                <label for="" class="text-secondary bg-light position-absolute" style="top:-6px;left:12px;font-size:10px;">Email</label>
                <input name="email" type="text" class="form-control" placeholder="Enter Your Email here">
            </div>
            <div class="position-relative">
                <label for="" class="text-secondary bg-light position-absolute" style="top:-6px;left:12px;font-size:10px;">Password</label>
                <input name="password" type="password" class="form-control mt-3" placeholder="Enter Your Password here">
            </div>
            <div class="position-relative">
                <label for="" class="text-secondary bg-light position-absolute" style="top:-6px;left:12px;font-size:10px;">Reenter Password</label>
                <input name="reenter password" type="password" class="form-control mt-3" placeholder="Enter Your Password here">
            </div>
            <div class="d-flex justify-content-center align-items-center">
                <button type="submit" class="btn btn-primary mt-4">REGISTER</button>
            </div>
            <p class="text-secondary text-center mt-4" style="font-size: 10px;">Already have an account ? <a href="login.php">Login now</a></p>
        </form>
        <img src="img/img-login.svg" class="position-absolute" style="width:190px;bottom:-50px;left:-90px;" alt="Image">
    </div>
  </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
  </body>
</html>