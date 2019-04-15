<?php
  include "../config.php";
  session_start();
  if (isset($_SESSION['login_pelanggan'])){
    header('Location: index.php');
  }
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
    <link href="<?php echo path("/assets/css/index.css"); ?>" rel="stylesheet">
    <link href="<?php echo path("/assets/css/footer.css"); ?>" rel="stylesheet">
    <link href="assets/css/login.css" rel="stylesheet">
  </head>

  <body id="page-top">
    <?php
      include "../popup.php";
      if (isset($_SESSION['log_pel'])){
        $av = $_SESSION['log_pel'];
      }
    ?>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
      <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="<?php echo path("/"); ?>">
          <img class="img-fluid" src="<?php echo path("/assets/img/logo.png"); ?>" width=40px alt="">
          &nbsp;Chiko Books
        </a>
      </div>
    </nav>

     <!-- Portfolio Grid -->
    <section id="portfolio">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 text-center">
            <h2 class="section-heading text-uppercase">Sign In!</h2>
          </div>
        </div>
      </div>
      <!-- Login -->
      <form action="proses_login.php" class="col-12 text-center" method="post">
        <div class="form-group">
          <input type="email" class="btn js-scroll-trigger" id="email" placeholder="Email" name="email" value="<?php if(isset($av)){echo $av;} ?>" required>
        </div>
        <div class="form-group">
          <input type="password" class="btn js-scroll-trigger" id="pwd" placeholder="Password" name="password" required>
        </div>
        <!-- Tombol Registrasi -->
        <button type="submit" class="btn btn-pelanggan text-uppercase js-scroll-trigger">&nbsp;Sign In&nbsp;</button>
        <!-- Link untuk yang belum memiliki akun -->
        <p>
          <br>Don't have an account?
          <a href="registrasi.php" class="">Sign Up</a><br>
        </p>
      </form>
    </section>

    <?php include "../footer.php"; ?>

    <!-- Pemanggilan Javascript  -->
    <script src="<?php echo path("/assets/js/navbar.js"); ?>"></script>

  </body>
</html>
