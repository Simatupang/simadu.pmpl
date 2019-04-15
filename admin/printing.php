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
  </head>

  <body>

    <div class="row">

      <?php include "navbar.php"; ?>

      <div class="col-10">
        <br>
        <div class="container">
          <h3>Printing Page</h3>
          <hr>

          <table id="example" class="table table-striped table-bordered" style="width:100%">
            <thead>
              <tr>
                <th>ID Dicetak</th>
                <th>Percetakan</th>
                <th>Status</th>
                <th>Tgl Perubahan</th>
              </tr>
            </thead>
            <tbody>
              <?php
                $line = "SELECT * FROM dicetak JOIN percetakan using (id_percetakan)";
                $query = mysqli_query($conn, $line);
                while ($dicetak = mysqli_fetch_array($query, MYSQLI_ASSOC)):
              ?>
                <tr>
                  <td><?php echo $dicetak['id_dicetak']; ?></td>
                  <td><?php echo $dicetak['nama']; ?></td>
                  <td><?php echo $dicetak['status']; ?></td>
                  <td><?php echo $dicetak['tgl_perubahan']; ?></td>
                </tr>
              <?php endwhile; ?>
            </tbody>
            <tfoot>
              <tr>
                <th>ID Dicetak</th>
                <th>Percetakan</th>
                <th>Status</th>
                <th>Tgl Perubahan</th>
              </tr>
            </tfoot>
          </table>

        </div>
      </div>

    </div>

    <!-- Pemanggilan Javascript  -->
    <script src="assets/js/printing.js"></script>
  </body>
</html>
