<?php
  session_start();
  if (empty($_SESSION['login_pelanggan'])){
    header('Location: login.php');
  }
  include "../config.php";
  $_SESSION['page'] = 'account';
?>
<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Chiko Books - Pelanggan</title>
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
          <h2 class="font-weight-bold">Informasi Umum</h2>
          <hr>

          <form action="proses_edit_informasi_akun.php" method="post">

            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Nama</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" name="nama" value="<?php echo $akun['nama']; ?>" required maxlength="40">
              </div>
            </div>

            <div class="form-group row">
              <label class="col-sm-3 col-form-label">No. HP</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" name="no_hp" value="<?php echo $akun['no_hp']; ?>" required pattern="[0-9]+" minlength="10" maxlength="20">
              </div>
            </div>

            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Alamat</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" name="alamat" value="<?php echo $akun['alamat']; ?>" required maxlength="50">
              </div>
            </div>

            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Kota</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" name="kota" value="<?php echo $akun['kota']; ?>" required maxlength="40">
              </div>
            </div>

            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Provinsi</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" name="provinsi" value="<?php echo $akun['provinsi']; ?>" required maxlength="40">
              </div>
            </div>

            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Kode Pos</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" name="kode_pos" value="<?php echo $akun['kode_pos']; ?>" required pattern="[0-9]+" minlength="5" maxlength="5">
              </div>
            </div>

            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Jenis Kelamin</label>
              <div class="col-sm-9">
                <div class="form-check-inline">
                  <label class="form-check-label">
                    <input type="radio" class="form-check-input" name="jk" value="L" <?php if($akun['jk']=='L'){echo 'checked';} ?> required>Laki-Laki
                  </label>
                </div>
                <div class="form-check-inline">
                  <label class="form-check-label">
                    <input type="radio" class="form-check-input" name="jk" value="P" <?php if($akun['jk']=='P'){echo 'checked';} ?>>Perempuan
                  </label>
                </div>
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
