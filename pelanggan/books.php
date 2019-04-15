<?php
  session_start();
  if (empty($_SESSION['login_pelanggan'])){
    header('Location: login.php');
  }
  include "../config.php";
  $_SESSION['page'] = 'books';
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
    <link href="assets/css/books.css" rel="stylesheet">
  </head>

  <body>

    <?php include "navbar.php"; ?>

    <div class="container">

      <div class="row">
        <div class="col-12">
          <h6>Tambah Buku</h6>
          <hr>
          <button type="button" class="btn btn-outline-dark tambah" data-toggle="modal" data-target="#modal-create">
            <i class="fa fa-plus"></i>
          </button>
          <?php include "books_create.php"; ?>
        </div>
      </div>

      <br>
      <div class="row">
        <div class="col-12">
          <h6>Daftar Buku</h6>
          <hr>
        </div>

        <?php
          $line = "SELECT * FROM buku WHERE id_pelanggan=" . $_SESSION['login_pelanggan'];
          $query = mysqli_query($conn, $line);
          while ($buku = mysqli_fetch_array($query, MYSQLI_ASSOC)):
        ?>
        <div class="col-md-4 col-sm-12">
          <div class="card border-secondary mb-3" style="max-width: 18rem;">

            <div data-toggle="modal" data-target="#modal-detail<?php echo $buku['id_buku']; ?>">
              <div class="card-header"><?php echo $buku['judul']; ?></div>

              <div class="card-body text-secondary">
                <!-- <h5 class="card-title"></h5> -->
                <p class="card-text text-justify"><?php echo substr($buku['sinopsis'], 0, 100); ?>....</p>
                <p><?php echo $buku['jum_hal']; ?> Pages</p>
              </div>
            </div>

            <div class="card-footer bg-transparent border-secondary">
              <?php
                $line = "SELECT * FROM dicetak JOIN detail_dicetak USING (id_dicetak)";
                $query_dicetak = mysqli_query($conn, $line);
                $cek = false;
                while ($dicetak = mysqli_fetch_array($query_dicetak, MYSQLI_ASSOC)){
                  if ($dicetak['id_buku'] == $buku['id_buku'] && ($dicetak['status'] == "Menunggu Pembayaran" || $dicetak['status'] == "Dalam Proses Percetakan")) {
                    $cek = true;
                  }
                }
              ?>
              <div class="col text-right">
                <?php if (!$cek): ?>
                <a href="#" class="btn btn-sm btn-info" data-toggle="modal" data-target="#modal-edit<?php echo $buku['id_buku']; ?>">
                  <i class="fa fa-edit act"></i>
                </a>
                <a onclick="del('<?php echo $buku['id_buku']; ?>');" class="btn btn-sm btn-danger">
                  <i class="fa fa-trash act"></i>
                </a>
                <?php endif; ?>
              </div>
            </div>

          </div>
        </div>
        <?php
          include "books_detail.php";
          include "books_edit.php";
          endwhile;
        ?>

      </div>

    </div>

    <?php include "../footer.php"; ?>

    <!-- Pemanggilan Javascript  -->
    <script src="assets/js/books.js"></script>
  </body>
</html>
