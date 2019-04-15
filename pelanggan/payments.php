<?php
  session_start();
  if (empty($_SESSION['login_pelanggan'])){
    header('Location: login.php');
  }
  include "../config.php";
  $_SESSION['page'] = 'payments';
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
    <link href="assets/css/payments.css" rel="stylesheet">
  </head>

  <body>

    <?php include "navbar.php"; ?>

    <div class="container-fluid">

      <div class="row">

          <div class="col-md-8 col-sm-12">

            <div class="row">
              <div class="col-md-12">
                <h6>My Payments</h6>
              </div>
            </div>
            <hr>

            <div class="row">
              <?php
                $id_pelanggan = $_SESSION['login_pelanggan'];
                $line = "SELECT * FROM detail_dicetak";
                $line .= " JOIN buku USING (id_buku)";
                $line .= " WHERE id_pelanggan=" . $id_pelanggan;
                $line .= " ORDER BY id_dicetak DESC";
                $query_pelanggan = mysqli_query($conn, $line);
                $array_id_dicetak = array();
                while ($dt = mysqli_fetch_array($query_pelanggan, MYSQLI_ASSOC)){
                  if (!in_array($dt['id_dicetak'], $array_id_dicetak)) $array_id_dicetak[] = $dt['id_dicetak'];
                }
                if (empty($array_id_dicetak)):
              ?>

              <div class="col-md-12">
                <p class="tulisan text-secondary">You don't have payments</p>
              </div>

              <?php
                else:
                  foreach ($array_id_dicetak as $id_dicetak):
                    $line = "SELECT * FROM dicetak WHERE id_dicetak=" . $id_dicetak;
                    $query_dicetak = mysqli_query($conn, $line);
                    $dicetak = mysqli_fetch_array($query_dicetak, MYSQLI_ASSOC);

                    $line = "SELECT * FROM percetakan WHERE id_percetakan=" . $dicetak['id_percetakan'];
                    $query_percetakan = mysqli_query($conn, $line);
                    $percetakan = mysqli_fetch_array($query_percetakan, MYSQLI_ASSOC);
              ?>
                  <div class="col-md-12 margin-bawah">
                    <div class="border rounded text-secondary tulisan">
                      <div class="row">

                        <span class="col-md-12">
                          <b>Percetakan:</b> <?php echo $percetakan['nama']; ?>
                        </span>

                        <span class="col-md-12">
                          <b>Status Percetakan:</b> <?php echo $dicetak['status']; ?> &nbsp;&nbsp;|&nbsp;&nbsp;
                          <b>Reject Message:</b> <?php echo $dicetak['pesan']; ?>
                        </span>

                        <span class="col-md-12">
                          <b>Last Edited:</b> <?php echo $dicetak['tgl_perubahan']; ?>
                        </span>

                        <span class="col-md-12"><b>My Books:</b></span>

                        <?php
                        $price = 0;
                        $line = "SELECT * FROM detail_dicetak WHERE id_dicetak=" . $dicetak['id_dicetak'];
                        $query = mysqli_query($conn, $line);
                        while ($detail_dicetak = mysqli_fetch_array($query, MYSQLI_ASSOC)):
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
                        <div class="col-md-6 col-sm-12">
                          <div class="border buku bg-light">
                            <div class="row">
                              <span class="col-md-12"><u><?php echo $buku['judul']; ?></u></span>
                              <span class="col-md-12">
                                Pages: <?php echo $buku['jum_hal']; ?>,
                                QTY:  <?php echo $detail_dicetak['qty']; ?>
                              </span>
                              <span class="col-md-12">
                                Cover Paper: <?php echo $kertas_sampul['jenis']; ?>,
                                Price: Rp <?php echo number_format($kertas_sampul['harga']); ?>
                                <?php $subprice += $kertas_sampul['harga'] * $detail_dicetak['qty']; ?>
                              </span>
                              <span class="col-md-12">
                                Content Paper: <?php echo $kertas_isi['jenis']; ?>,
                                Price: Rp <?php echo number_format($kertas_isi['harga']); ?>
                                <?php $subprice += $kertas_isi['harga'] * $buku['jum_hal'] * $detail_dicetak['qty']; ?>
                              </span>
                              <span class="col-md-12">Subtotal Price: Rp <?php echo number_format($subprice); ?></span>
                            </div>
                          </div>
                        </div>
                        <?php $price += $subprice; ?>
                      <?php endwhile; ?>

                      <span class="col-md-12"><b>Total:</b> Rp <?php echo number_format($price); ?></span>

                      <?php if ($dicetak['status']=="Menunggu Konfirmasi Percetakan"): ?>
                        <span class="col-md-12 text-right">
                          <a onclick="del('<?php echo $id_dicetak; ?>');" class="btn btn-sm btn-danger">
                            <i class="fa fa-trash act"></i>
                          </a>
                        </span>
                      <?php endif; ?>

                      <?php
                        $line = "SELECT * FROM pembayaran WHERE id_dicetak=" . $id_dicetak;
                        $query_pembayaran = mysqli_query($conn, $line);
                        $pembayaran = mysqli_fetch_array($query_pembayaran, MYSQLI_ASSOC);
                      ?>

                      <?php if ($dicetak['status']=="Menunggu Pembayaran" && empty($pembayaran)): ?>
                        <span class="col-md-12 text-right">
                          <a href="#" data-toggle="modal" data-target="#modal-payments<?php echo $id_dicetak; ?>" class="btn btn-sm btn-info">
                            Upload Payment
                          </a>
                          <?php include "payments_upload.php"; ?>
                        </span>
                      <?php endif; ?>

                      <?php if (!empty($pembayaran)): ?>
                        <hr>
                        <span class="col-md-12"><b>Tanggal Pembayaran:</b> <?php echo $pembayaran['tgl_pembayaran']; ?></span>
                        <span class="col-md-12"><b>Status Pembayaran:</b> <?php echo $pembayaran['status']; ?></span>
                        <span class="col-md-12"><b>Metode Pembayaran:</b> <?php echo $pembayaran['metode_pembayaran']; ?></span>
                        <span class="col-md-12"><b>Total Pembayaran:</b> Rp <?php echo number_format($pembayaran['total']); ?></span>
                        <span class="col-md-12">
                          <b>File Bukti Pembayaran:</b> <?php echo $pembayaran['file_bukti']; ?> &nbsp;&nbsp;
                          <?php if ($pembayaran['status'] == "Menunggu Verifikasi Bukti Pembayaran"): ?>
                            <a  href="#" data-toggle="modal" data-target="#modal-payments-edit<?php echo $id_dicetak; ?>">Edit</a>
                            <?php include "payments_upload_edit.php"; ?>
                          <?php endif; ?>
                        </span>

                      <?php endif; ?>

                    </div>
                  </div>
                </div>
              <?php endforeach; ?>
            <?php endif; ?>
          </div>

          </div>

          <div class="col-md-4 col-sm-12">

            <div class="row">
              <div class="col-12">
                <h6>Payment Method</h6>
              </div>
            </div>
            <hr>

            <div class="row text-secondary tulisan">
              <div class="col-12">
                <p>Silahkan melakukan pembayaran melalui salah satu rekening bank dibawah ini:</p>
              </div>

              <div class="col-md-6 col-sm-12 margin-bawah">
                <u>BNI (Bank Negara Indonesia)</u> <br>
                No. Rek: 023 827 2088 <br>
                a.n Chiko Books
              </div>

              <div class="col-md-6 col-sm-12 margin-bawah">
                <u>BRI (Bank Rakyat Indonesia)</u> <br>
                No. Rek: 023 827 2082 <br>
                a.n Chiko Books
              </div>

              <div class="col-md-6 col-sm-12 margin-bawah">
                <u>Bank Mandiri</u> <br>
                No. Rek: 023 827 2083 <br>
                a.n Chiko Books
              </div>

              <div class="col-md-6 col-sm-12 margin-bawah">
                <u>BCA (Bank Central Asia)</u> <br>
                No. Rek: 023 827 2084 <br>
                a.n Chiko Books
              </div>

            </div>

            <div class="row">
              <div class="col-12">
                <h6>Keterangan</h6>
              </div>
            </div>
            <hr>

            <div class="row tulisan text-secondary">
              <div class="col-12">Status Percetakan:</div>
              <div class="col-12">
                - <b>Menunggu Konfirmasi Percetakan: </b> percetakan belum memberi konfirmasi <br>
                - <b>Menunggu Pembayaran: </b> percetakan menunggu proses pembayaran selesai <br>
                - <b>Ditolak Percetakan: </b> percetakan menolak permintaan cetak buku <br>
                - <b>Dalam Proses Percetakan: </b> percetakan sedang mencetak buku <br>
                - <b>Pesanan Telah Selesai: </b> percetakan telah menyelesaikan proses percetakan <br>
              </div>
              <div class="col-12"><br>Status Pembayaran:</div>
              <div class="col-12">
                - <b>Menunggu Verifikasi Bukti Pembayaran: </b> admin belum memberi konfirmasi <br>
                - <b>Pembayaran Diterima: </b> admin menerima pembayaran <br>
                - <b>Pembayaran Ditolak: </b> admin menolak pembayaran <br>
              </div>
            </div>

          </div>

      </div>



    </div>

    <?php include "../footer.php"; ?>

    <!-- Pemanggilan Javascript  -->
    <script src="assets/js/payments.js"></script>
  </body>
</html>
