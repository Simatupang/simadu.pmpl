<?php
  session_start();
  if (empty($_SESSION['login_pelanggan'])){
    header('Location: login.php');
  }
  include "../config.php";
  $_SESSION['page'] = 'home';
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
    <link href="assets/css/index.css" rel="stylesheet">
  </head>

  <body>

    <?php include "navbar.php"; ?>

    <div class="container">

      <div class="row">
        <div class="col-12">
          <h6>Daftar Percetakan</h6>
        </div>
      </div>
      <hr>

      <div class="row">
        <?php
          $line = "SELECT * FROM percetakan";
          $line .= " ORDER BY jum_buku DESC";
          $query = mysqli_query($conn, $line);
          while ($p = mysqli_fetch_array($query, MYSQLI_ASSOC)):
        ?>
        <a href="show_printing.php?id_percetakan=<?php echo $p['id_percetakan']; ?>">
          <div class="col-md-4 col-sm-12 jarak">
            <div class="border rounded item">
              <div class="row h-100 py-3">
                <div class="col-4 border-right d-flex align-items-center">
                  <?php if ($p['file_profil']==NULL): ?>
                    <img src="<?php echo path("/percetakan/assets/img/default.png"); ?>" alt="foto default" class="mx-auto d-block img-fluid" style="width:70px;">
                  <?php else: ?>
                    <img src="<?php echo path("/percetakan/uploads/profil/".$p['file_profil']); ?>" alt="foto" class="mx-auto d-block img-fluid" style="width:70px;">
                  <?php endif; ?>
                </div>
                <div class="col-8 konten text-secondary">
                  <b><?php echo $p['nama']; ?></b> <br>
                  <?php echo $p['alamat']; ?> <br>
                  <?php echo $p['kota'] . " - " . $p['provinsi']; ?> <br>
                  Printing <?php echo $p['jum_buku']; ?> Books <br>
                </div>
              </div>
            </div>
        </a>
        </div>
        <?php endwhile; ?>
      </div>

    </div>

    <?php include "../footer.php"; ?>

    <!-- Pemanggilan Javascript  -->
    <script src=""></script>
  </body>
</html>
