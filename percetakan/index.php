<?php
  session_start();
  if (empty($_SESSION['login_percetakan'])){
    header('Location: login.php');
  }
  include "../config.php";
  $_SESSION['page_r'] = 'home';
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
    <link href="assets/css/index.css" rel="stylesheet">
  </head>

  <body>

    <?php include "navbar.php"; ?>

    <div class="container">

      <div class="row">
        <div class="col-12">
          <h6>Daftar Pengajuan Percetakan</h6>
        </div>
      </div>
      <hr>

      <div class="row">
      <?php
        $id_percetakan = $_SESSION['login_percetakan'];
        $line = "SELECT * FROM dicetak WHERE id_percetakan=" . $id_percetakan;
        $line .= " ORDER BY id_dicetak DESC";
        $query_percetakan = mysqli_query($conn, $line);
        if (!$query_percetakan) echo "Gagal query percetakan";
        while ($dicetak = mysqli_fetch_array($query_percetakan, MYSQLI_ASSOC)):
      ?>
        <div class="col-md-12 border rounded text-secondary tulisan">

          <div class="row">

            <span class="col-md-12">
              <b>ID Dicetak:</b> <?php echo $dicetak['id_dicetak']; ?>
            </span>

            <span class="col-md-12">
              <b>Status Percetakan:</b> <?php echo $dicetak['status']; ?>
            </span>

            <span class="col-md-12">
              <b>Reject Message:</b> <?php echo $dicetak['pesan']; ?>
            </span>

            <span class="col-md-12">
              <b>Last Edited:</b> <?php echo $dicetak['tgl_perubahan']; ?>
            </span>

            <span class="col-md-12"><b>Pesanan:</b></span>
            <?php
              $price = 0;
              $line = "SELECT * FROM detail_dicetak WHERE id_dicetak=" . $dicetak['id_dicetak'];
              $query_dicetak = mysqli_query($conn, $line);
              if (!$query_dicetak) echo "Gagal query percetakan";
              while ($detail_dicetak = mysqli_fetch_array($query_dicetak, MYSQLI_ASSOC)):
                $line = "SELECT * FROM kertas WHERE id_kertas=" . $detail_dicetak['id_kertas_isi'];
                $query_isi = mysqli_query($conn, $line);
                $kertas_isi = mysqli_fetch_array($query_isi, MYSQLI_ASSOC);

                $line = "SELECT * FROM kertas WHERE id_kertas=" . $detail_dicetak['id_kertas_sampul'];
                $query_sampul = mysqli_query($conn, $line);
                $kertas_sampul = mysqli_fetch_array($query_sampul, MYSQLI_ASSOC);

                $line = "SELECT * FROM buku WHERE id_buku=" . $detail_dicetak['id_buku'];
                $query_buku = mysqli_query($conn, $line);
                $buku = mysqli_fetch_array($query_buku, MYSQLI_ASSOC);

                $subprice = 0;
            ?>
              <hr>
              <div class="col-md-4 col-sm-12">
                <div class="border buku bg-light" data-toggle="modal" data-target="#modal-detail<?php echo $buku['id_buku']; ?>">
                  <div class="row">
                    <span class="col-12"><u><?php echo $buku['judul']; ?></u></span>
                    <span class="col-12">
                      Pages: <?php echo $buku['jum_hal']; ?>,
                      QTY:  <?php echo $detail_dicetak['qty']; ?>
                    </span>
                    <span class="col-12">
                      Cover Paper: <?php echo $kertas_sampul['jenis']; ?>,
                      Price: Rp <?php echo number_format($kertas_sampul['harga']); ?>
                      <?php $subprice += $kertas_sampul['harga'] * $detail_dicetak['qty']; ?>
                    </span>
                    <span class="col-12">
                      Content Paper: <?php echo $kertas_isi['jenis']; ?>,
                      Price: Rp <?php echo number_format($kertas_isi['harga']); ?>
                      <?php $subprice += $kertas_isi['harga'] * $buku['jum_hal'] * $detail_dicetak['qty']; ?>
                    </span>
                    <span class="col-12">Subtotal Price: Rp <?php echo number_format($subprice); ?></span>
                  </div>
                </div>
              </div>
            <?php $price += $subprice; ?>
            <?php include "books_detail.php"; ?>
            <?php endwhile; ?>

            <div class="col-md-4"></div>

            <span class="col-md-12"><b>Total:</b> Rp <?php echo number_format($price); ?></span>

            <?php if ($dicetak['status']=="Menunggu Konfirmasi Percetakan"): ?>
              <span class="col-md-12 text-right tombol">
                <a onclick="terima('<?php echo $dicetak['id_dicetak']; ?>');" class="btn btn-sm btn-info">
                  Terima
                </a>
                <a onclick="tolak('<?php echo $dicetak['id_dicetak']; ?>');" class="btn btn-sm btn-danger">
                  Tolak
                </a>
              </span>
            <?php endif; ?>

          </div>
        </div>
      <?php endwhile; ?>
      </div>

    </div>

    <?php include "../footer.php"; ?>

    <!-- Pemanggilan Javascript  -->
    <script src="assets/js/index.js"></script>
  </body>
</html>
