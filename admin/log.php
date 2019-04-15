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
          <h3>Log Page</h3>
          <hr>

          <table id="example" class="table table-striped table-bordered" style="width:100%">
            <thead>
              <tr>
                <th>ID Diolah</th>
                <th>ID Pembayaran</th>
                <th>Admin</th>
                <th>Tanggal</th>
                <th>Role</th>
              </tr>
            </thead>
            <tbody>
              <?php
                $line = "SELECT * FROM diolah JOIN admin using (id_admin)";
                $line .= " ORDER BY id_diolah DESC";
                $query = mysqli_query($conn, $line);
                while ($diolah = mysqli_fetch_array($query, MYSQLI_ASSOC)):
              ?>
                <tr>
                  <td><?php echo $diolah['id_diolah']; ?></td>
                  <td><?php echo $diolah['id_pembayaran']; ?></td>
                  <td><?php echo $diolah['email']; ?></td>
                  <td><?php echo $diolah['tgl']; ?></td>
                  <td><?php echo $diolah['role']; ?></td>
                </tr>
              <?php endwhile; ?>
            </tbody>
            <tfoot>
              <tr>
                <th>ID Diolah</th>
                <th>ID Pembayaran</th>
                <th>Admin</th>
                <th>Tanggal</th>
                <th>Role</th>
              </tr>
            </tfoot>
          </table>

        </div>
      </div>

    </div>

    <!-- Pemanggilan Javascript  -->
    <script src="assets/js/log.js"></script>
  </body>
</html>
