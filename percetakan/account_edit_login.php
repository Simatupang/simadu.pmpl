<?php
  session_start();
  if (empty($_SESSION['login_percetakan'])){
    header('Location: login.php');
  }
  include "../config.php";
  $_SESSION['page_r'] = 'account';
?>
<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Chiko Books - Percetakan</title>
    <?php include "../cdn.php"; ?>

    <link href="<?php echo path("/assets/img/logo.png"); ?>" rel="shortcut icon">
    <link href="<?php echo path("/assets/css/primary.css"); ?>" rel="stylesheet">
    <link href="<?php echo path("/assets/css/footer.css"); ?>" rel="stylesheet">
    <link href="assets/css/navbar.css" rel="stylesheet">
  </head>

  <body>

    <?php
      include "navbar.php";
      include "proses_get_akun.php";
    ?>

    <div class="container">
      <div class="row">
        <div class="col"></div>
        <div class="col-md-8 col-sm-12">
          <h2 class="font-weight-bold">Login Required</h2>
          <hr>

          <form action="proses_edit_login_akun.php" method="post">

            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Email</label>
              <div class="col-sm-9">
                <input type="email" class="form-control" name="email" value="<?php echo $akun['email']; ?>" disabled>
              </div>
            </div>

            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Old Password</label>
              <div class="col-sm-9">
                <input type="password" class="form-control" name="old_password" required minlength="8" maxlength="30">
              </div>
            </div>

            <div class="form-group row">
              <label class="col-sm-3 col-form-label">New Password</label>
              <div class="col-sm-9">
                <input type="password" class="form-control" name="new_password" required minlength="8" maxlength="30">
              </div>
            </div>

            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Retype New Password</label>
              <div class="col-sm-9">
                <input type="password" class="form-control" name="renew_password" required minlength="8" maxlength="30">
              </div>
            </div>

            <div class="form-group row">
              <div class="col text-right">
                <a href="account.php" class="btn btn-info">Kembali</a>
                <button type="submit" class="btn btn-warning" style="color: white;">Update</button>
              </div>
            </div>

          </form>

        </div>
        <div class="col"></div>
      </div>
    </div>

    <?php include "../footer.php"; ?>

    <!-- Pemanggilan Javascript  -->
    <script src=""></script>
  </body>
</html>
