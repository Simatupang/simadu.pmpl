<?php
  session_start();
  if (empty($_SESSION['login_percetakan'])){
    header('Location: login.php');
  }
  include "../config.php";
  $_SESSION['page_r'] = 'paper';
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

    <?php include "navbar.php"; ?>

    <div class="container">

      <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
          <tr>
            <th>ID Kertas</th>
            <th>Jenis</th>
            <th>Harga</th>
          </tr>
        </thead>
        <tbody>
          <?php
            $line = "SELECT * FROM kertas";
            $query = mysqli_query($conn, $line);
            while ($kertas = mysqli_fetch_array($query, MYSQLI_ASSOC)):
          ?>
            <tr>
              <td><?php echo $kertas['id_kertas']; ?></td>
              <td><?php echo $kertas['jenis']; ?></td>
              <td>Rp <?php echo number_format($kertas['harga']); ?></td>
            </tr>
          <?php endwhile; ?>
        </tbody>
        <tfoot>
          <tr>
            <th>ID Kertas</th>
            <th>Jenis</th>
            <th>Harga</th>
          </tr>
        </tfoot>
      </table>

    </div>

    <?php include "../footer.php"; ?>

    <!-- Pemanggilan Javascript  -->
    <script src="assets/js/paper.js"></script>
  </body>
</html>
