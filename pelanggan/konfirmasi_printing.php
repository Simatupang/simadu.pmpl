<?php
  session_start();
  if (empty($_SESSION['login_pelanggan'])){
    header('Location: login.php');
  }
  include "../config.php";
  $_SESSION['page'] = '';

  $id_pelanggan = $_SESSION['login_pelanggan'];
  $id_percetakan = $_GET['id_percetakan'];

  if (!isset($_POST['id_buku'])):
    $_SESSION['popupError'] = "Pilihan Kosong";
    header('Location: show_printing.php?id_percetakan='.$id_percetakan);
  else:
    $id_buku = $_POST['id_buku'];

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
      $line = "SELECT * FROM percetakan WHERE id_percetakan=" . $id_percetakan;
      $query = mysqli_query($conn, $line);
      $p = mysqli_fetch_array($query, MYSQLI_ASSOC);
    ?>

    <div class="container">
      <div class="row">
        <div class="col"></div>
        <div class="col-md-8 col-sm-12">
          <h4 class="font-weight-bold">Konfirmasi Percetakan <?php echo $p['nama']; ?></h4>
          <hr>

          <div class="row">
            <div class="col-auto">
              <h6 class="font-weight-bold">Daftar Buku</h6>
            </div>
          </div>
          <hr>

          <form action="proses_printing_book.php?id_percetakan=<?php echo $id_percetakan; ?>" method="post">

          <?php

            $daftar_kertas = array();
            $line = "SELECT * FROM kertas";
            $query = mysqli_query($conn, $line);
            while ($k = mysqli_fetch_array($query, MYSQLI_ASSOC)){
              $daftar_kertas[] = array(
                'id_kertas' => $k['id_kertas'],
                'jenis'     => $k['jenis'],
                'harga'     => $k['harga']
              );
            }

            foreach ($id_buku as $id_buku):
              $line = "SELECT * FROM buku WHERE id_buku=" . $id_buku;
              $query = mysqli_query($conn, $line);
              $p = mysqli_fetch_array($query, MYSQLI_ASSOC);
          ?>
          <input type="number" name="id_buku[]" value="<?php echo $id_buku; ?>" hidden>

          <div class="row">

            <div class="col-md-12 h6">
              <u><?php echo $p['judul']; ?></u> &nbsp;&nbsp;|&nbsp;&nbsp;
              <?php echo $p['jum_hal']; ?> Pages
            </div>

            <label class="col-sm-3 col-form-label">Jenis Kertas Sampul</label>
            <div class="col-sm-9">
              <select class="form-control" name="sampul<?php echo $p['id_buku']; ?>">
                <?php foreach ($daftar_kertas as $dk): ?>
                  <option value="<?php echo $dk['id_kertas']; ?>">
                    <?php echo $dk['jenis'] . ' - Rp ' . number_format($dk['harga']); ?>
                  </option>
                <?php endforeach; ?>
              </select>
            </div>

            <label class="col-sm-3 col-form-label">Jenis Kertas Isi</label>
            <div class="col-sm-9">
              <select class="form-control" name="isi<?php echo $p['id_buku']; ?>">
                <?php foreach ($daftar_kertas as $dk): ?>
                  <option value="<?php echo $dk['id_kertas']; ?>">
                    <?php echo $dk['jenis'] . ' - Rp ' . number_format($dk['harga']); ?>
                  </option>
                <?php endforeach; ?>
              </select>
            </div>

            <label class="col-sm-3 col-form-label">QTY</label>
            <div class="col-sm-9">
              <input type="number" class="form-control" name="qty<?php echo $p['id_buku']; ?>" value="1" required min="1">
            </div>

          </div>
          <hr>

          <?php endforeach; ?>

          <div class="form-group row">
            <div class="col text-right">
              <a href="show_printing.php?id_percetakan=<?php echo $id_percetakan; ?>" class="btn btn-info">Kembali</a>
              <button type="submit" class="btn btn-warning" style="color: white;">Accept</button>
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
<?php endif; ?>
