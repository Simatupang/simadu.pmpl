<?php
  session_start();
  if (empty($_SESSION['login_pelanggan'])){
    header('Location: login.php');
  }
  include "../config.php";
  $_SESSION['page'] = '';
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
    <link href="assets/css/show_printing.css" rel="stylesheet">
  </head>

  <body>

    <?php
      include "navbar.php";
      $id_percetakan = $_GET['id_percetakan'];
      $line = "SELECT * FROM percetakan WHERE id_percetakan=" . $id_percetakan;
      $query = mysqli_query($conn, $line);
      $p = mysqli_fetch_array($query, MYSQLI_ASSOC);
    ?>

    <div class="container">

      <div class="row">
        <div class="col-md"></div>
        <div class="col-md-4">

          <div class="row">

            <div class="col-md-12">
              <?php if ($p['file_profil']==NULL): ?>
                <img src="<?php echo path("/percetakan/assets/img/default.png"); ?>" alt="foto default" class="mx-auto d-block img-fluid" style="width:100px;">
              <?php else: ?>
                <img src="<?php echo path("/percetakan/uploads/profil/".$p['file_profil']); ?>" alt="foto" class="mx-auto d-block img-fluid" style="width:100px;">
              <?php endif; ?>
              <br>
            </div>
            <div class="col-md-12 text-center"><h5 class="font-weight-bold"><?php echo $p['nama']; ?><h5></div>
            <hr>
            <div class="col-md-12 text-center font-weight-bold">Alamat</div>
            <div class="col-md-12 text-center"><?php echo $p['alamat'].' - '.$p['kode_pos']; ?></div>
            <br>
            <div class="col-md-12 text-center font-weight-bold">Kota/Provinsi</div>
            <div class="col-md-12 text-center"><?php echo $p['kota'].' - '.$p['provinsi']; ?></div>
            <br>
            <div class="col-md-12 text-center font-weight-bold">Kontak</div>
            <div class="col-md-12 text-center"><?php echo $p['email']; ?></div>
            <div class="col-md-12 text-center"><?php echo $p['no_hp']; ?></div>
            <br>
            <div class="col-md-12 text-center font-weight-bold">History</div>
            <div class="col-md-12 text-center">Printing <?php echo $p['jum_buku']; ?> Books</div>

          </div>

          <hr>
          <div class="row">
            <div class="col-md-12 text-center">
              <h6 class="font-weight-bold">My Books</h6>
            </div>
          </div>

          <form action="konfirmasi_printing.php?id_percetakan=<?php echo $p['id_percetakan']; ?>" method="post">
          <div class="row">

              <?php
                $id_pelanggan = $_SESSION['login_pelanggan'];
                $line = "SELECT * FROM buku WHERE id_pelanggan=" . $id_pelanggan;
                $query = mysqli_query($conn, $line);
              ?>

              <?php while ($b = mysqli_fetch_array($query, MYSQLI_ASSOC)): ?>
              <div class="col-md-12">
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" name="id_buku[]" value="<?php echo $b['id_buku']; ?>">
                  <label class="form-check-label" for="">
                    <?php echo $b['judul']; ?>
                  </label>
                </div>
              </div>
              <?php endwhile; ?>

              </div>

              <br>
              <div class="form-group row">
                <div class="col text-center">
                  <button type="submit" class="btn btn-dark">Print</button>
                </div>
              </div>
          </form>
          <hr>

        </div>
        <div class="col-md"></div>
      </div>

    </div>

    <?php include "../footer.php"; ?>

    <!-- Pemanggilan Javascript  -->
    <script src=""></script>
  </body>
</html>
