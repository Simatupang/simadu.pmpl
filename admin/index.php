<?php
  session_start();
  if (empty($_SESSION['login_admin'])){
    header('Location: login.php');
  }
  include "../config.php";
  // $_SESSION['page'] = 'home';
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
    <link href="assets/css/navbar.css" rel="stylesheet">
    <link href="assets/css/index.css" rel="stylesheet">
  </head>

  <body>

    <div class="row">

      <?php include "navbar.php"; ?>

      <div class="col-10">
        <br>
        <div class="container">
          <h3>Home Page - Payments</h3>
          <hr>

          <table id="example" class="table table-striped table-bordered" style="width:100%">
            <thead>
              <tr class="tulisan">
          			<th>IDP</th>
                <th>IDD</th>
                <th>Email</th>
                <th>Tanggal</th>
                <th>Status</th>
                <th>Metode</th>
                <th>Total</th>
                <th>File</th>
                <th>Action</th>
              </tr>
            </thead>
          	<tbody>
          		<?php
                $line = "SELECT * FROM pembayaran";
                $query_pembayaran = mysqli_query($conn, $line);
                while ($pembayaran = mysqli_fetch_array($query_pembayaran, MYSQLI_ASSOC)):
                  $line = "SELECT * FROM pelanggan WHERE id_pelanggan=" . $pembayaran['id_pelanggan'];
                  $query_pelanggan = mysqli_query($conn, $line);
                  $pelanggan = mysqli_fetch_array($query_pelanggan, MYSQLI_ASSOC);
              ?>
          			<tr class="tulisan">
          				<td><?php echo $pembayaran['id_pembayaran']; ?></td>
          				<td><?php echo $pembayaran['id_dicetak']; ?></td>
          				<td><?php echo $pelanggan['email']; ?></td>
                  <td><?php echo $pembayaran['tgl_pembayaran']; ?></td>
                  <td><?php echo $pembayaran['status']; ?></td>
                  <td><?php echo $pembayaran['metode_pembayaran']; ?></td>
          				<td>Rp <?php echo number_format($pembayaran['total']); ?></td>
                  <td>
                    <a href="../pelanggan/uploads/bukti/<?php echo $pembayaran['file_bukti']; ?>" class="download">
                      Download
                    </a>
                  </td>
          				<td>
                  <?php if ($pembayaran['status']=="Menunggu Verifikasi Bukti Pembayaran"): ?>
                    <a href="#" class="tulisan btn btn-sm btn-info margin-tombol" onclick="terima('<?php echo $pembayaran['id_pembayaran']; ?>');">
                      Terima
                    </a>
                    <a href="#" class="tulisan btn btn-sm btn-danger" onclick="tolak('<?php echo $pembayaran['id_pembayaran']; ?>');">
                      Tolak
                    </a>
                  <?php endif; ?>

          				</td>
          			</tr>
              <?php endwhile; ?>
          	</tbody>
          	<tfoot>
              <tr class="tulisan">
                <th>IDP</th>
                <th>IDD</th>
                <th>Email</th>
                <th>Tanggal</th>
                <th>Status</th>
                <th>Metode</th>
                <th>Total</th>
                <th>File</th>
                <th>Action</th>
              </tr>
            </tfoot>
          </table>

        </div>
      </div>

    </div>

    <!-- Pemanggilan Javascript  -->
    <script src="assets/js/index.js"></script>
  </body>
</html>
