<?php include "config.php"; ?>
<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Chiko Books</title>
    <?php include "cdn.php"; ?>

		<link href="<?php echo path("/assets/img/logo.png"); ?>" rel="shortcut icon">
    <link href="<?php echo path("/assets/css/primary.css"); ?>" rel="stylesheet">
    <link href="<?php echo path("/assets/css/index.css"); ?>" rel="stylesheet">
    <link href="<?php echo path("/assets/css/footer.css"); ?>" rel="stylesheet">
  </head>

  <body>

    <!-- Header -->
    <header class="masthead">
      <div class="container">
        <div class="row">
            <div class="intro-text col-md-6">
							<a class="btn btn-xl text-uppercase js-scroll-trigger" style="background:#212529" href="percetakan/login.php">Percetakan</a>
            </div>
            <div class="intro-text col-md-6">
              <!-- <a class="btn btn-primary btn-xl text-uppercase js-scroll-trigger" href="pelanggan/">Pelanggan</a> -->
              <a class="btn btn-primary btn-xl text-uppercase js-scroll-trigger" href="pelanggan/login.php">Pelanggan</a>
            </div>
         </div>
         <br><br><br>
      </div>
    </header>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
      <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="<?php echo path("/"); ?>">
          <img class="img-fluid" src="<?php echo path("/assets/img/logo.png"); ?>" width=40px alt="">
          &nbsp;Chiko Books
        </a>
      </div>
    </nav>

    <!-- Footer -->
    <?php include "footer.php"; ?>

    <!-- Pemanggilan Javascript  -->
    <script src="assets/js/navbar.js"></script>

  </body>
</html>
