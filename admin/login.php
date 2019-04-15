<?php
  include "../config.php";
  session_start();
  if (isset($_SESSION['login_admin'])){
    header('Location: index.php');
  }
?>
<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Chiko Books - Admin</title>
    <?php include "../cdn.php"; ?>

    <link href="../assets/img/logo.png" rel="shortcut icon">
    <link href="../assets/css/primary.css" rel="stylesheet">
    <link href="assets/css/login.css" rel="stylesheet">
  </head>

  <body>

    <?php include "../popup.php"; ?>

    <div class="row">

      <div class="col-12 text-center header">
        Chiko Books
      </div>

      <form action="proses_login.php" class="col-12 text-center" method="post">
        <div class="form-group">
          <input type="email" class="btn btn-outline-secondary" placeholder="Email" name="email" required>
        </div>
        <div class="form-group">
          <input type="password" class="btn btn-outline-secondary" placeholder="Password" name="password" required>
        </div>
        <br>
        <!-- Tombol Registrasi -->
        <button type="submit" class="btn btn-secondary">&nbsp;Sign In&nbsp;</button>
      </form>

    </div>

    <!-- Pemanggilan Javascript  -->
    <script src=""></script>
  </body>
</html>
