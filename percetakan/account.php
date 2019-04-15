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
          <h2 class="font-weight-bold">Account Settings</h2>
          <hr>

          <div class="row">
            <div class="col-auto">
              <h6 class="font-weight-bold">Foto Profil</h6>
            </div>
            <div class="col text-right">
              <a href="#" data-toggle="modal" data-target="#modal-profil">Ubah</a>
              <?php include "account_profil.php"; ?>
            </div>
          </div>
          <hr>

          <div class="row">
            <div class="col-12 text-center">
              <?php if ($akun['file_profil']==NULL): ?>
                <img src="assets/img/default.png" alt="foto default" class="img-fluid img-thumbnail" style="width:150px;">
              <?php else: ?>
                <img src="uploads/profil/<?php echo $akun['file_profil']; ?>" alt="foto default" class="img-fluid img-thumbnail" style="width:150px;">
              <?php endif; ?>
            </div>
          </div>
          <hr>

          <div class="row">
            <div class="col-auto">
              <h6 class="font-weight-bold">Informasi Umum</h6>
            </div>
            <div class="col text-right">
              <a href="account_edit_informasi.php">Ubah</a>
            </div>
          </div>
          <hr>

          <div class="row">
            <div class="col-3 text-right font-weight-bold">
              Nama
            </div>
            <div class="col text-left">
              <?php echo  $akun['nama'];?>
            </div>
          </div>
          <hr>

          <div class="row">
            <div class="col-3 text-right font-weight-bold">
              No. HP
            </div>
            <div class="col text-left">
              <?php echo  $akun['no_hp'];?>
            </div>
          </div>
          <hr>

          <div class="row">
            <div class="col-3 text-right font-weight-bold">
              Alamat
            </div>
            <div class="col text-left">
              <?php echo  $akun['alamat'];?>
            </div>
          </div>
          <hr>

          <div class="row">
            <div class="col-3 text-right font-weight-bold">
              Kota
            </div>
            <div class="col text-left">
              <?php echo  $akun['kota'];?>
            </div>
          </div>
          <hr>

          <div class="row">
            <div class="col-3 text-right font-weight-bold">
              Provinsi
            </div>
            <div class="col text-left">
              <?php echo  $akun['provinsi'];?>
            </div>
          </div>
          <hr>

          <div class="row">
            <div class="col-3 text-right font-weight-bold">
              Kode Pos
            </div>
            <div class="col text-left">
              <?php echo  $akun['kode_pos'];?>
            </div>
          </div>
          <hr>

          <div class="row">
            <div class="col-auto">
              <h6 class="font-weight-bold">Login Required</h6>
            </div>
            <div class="col text-right">
              <a href="account_edit_login.php">Ubah</a>
            </div>
          </div>
          <hr>

          <div class="row">
            <div class="col-3 text-right font-weight-bold">
              E-Mail
            </div>
            <div class="col text-left">
              <?php echo  $akun['email'];?>
            </div>
          </div>
          <hr>

          <div class="row">
            <div class="col-3 text-right font-weight-bold">
              Password
            </div>
            <div class="col text-left">
              - - - - - - - - - - -
            </div>
          </div>
          <hr>

        </div>
        <div class="col"></div>
      </div>
    </div>

    <?php include "../footer.php"; ?>

    <!-- Pemanggilan Javascript  -->
    <script src=""></script>
  </body>
</html>
