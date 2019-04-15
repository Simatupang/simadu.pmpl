<?php
    include "../config.php";
    session_start();
    if (isset($_SESSION['login_percetakan'])){
      header('Location: index.php');
    }
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
    <link href="<?php echo path("/assets/css/index.css"); ?>" rel="stylesheet">
    <link href="<?php echo path("/assets/css/footer.css"); ?>" rel="stylesheet">
    <link href="assets/css/login.css" rel="stylesheet">
  </head>

  <body id="page-top">
    <?php
      include "../popup.php";
      if (isset($_SESSION['reg_per'])){
        $av = $_SESSION['reg_per'];
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
            <h2 class="section-heading text-uppercase">Sign Up!</h2>
          </div>
        </div>
      </div>
      <!-- Registrasi -->
      <form action="proses_registrasi.php" class="col-12 text-center" method="post" id="form">
        <div class="form-group">
          <input type="text" class="btn js-scroll-trigger" id="nama" placeholder="Nama Percetakan" name="nama" value="<?php if(isset($av)){echo $av['nama'];} ?>" required maxlength="40">
        </div>
        <div class="form-group">
          <input type="email" class="btn js-scroll-trigger" id="email" placeholder="Email" name="email" value="<?php if(isset($av)){echo $av['email'];} ?>" required maxlength="30">
        </div>
        <div class="form-group">
          <input type="password" class="btn js-scroll-trigger" id="pwd" placeholder="Password" name="password" value="<?php if(isset($av)){echo $av['password'];} ?>" required minlength="8" maxlength="30">
        </div>
        <div class="form-group">
          <input type="text" class="btn js-scroll-trigger" id="noHP" placeholder="Nomor HP" name="no_hp" value="<?php if(isset($av)){echo $av['no_hp'];} ?>" required pattern="[0-9]+" minlength="10" maxlength="20">
        </div>
        <div class="form-group">
          <input type="text" class="btn js-scroll-trigger" id="alamat" placeholder="Alamat" name="alamat" value="<?php if(isset($av)){echo $av['alamat'];} ?>" required maxlength="50">
        </div>
        <div class="form-group">
          <input type="text" class="btn js-scroll-trigger" id="kota" placeholder="Kota" name="kota" value="<?php if(isset($av)){echo $av['kota'];} ?>" required maxlength="40">
        </div>
        <div class="form-group">
          <input type="text" class="btn js-scroll-trigger" id="provinsi" placeholder="Provinsi" name="provinsi" value="<?php if(isset($av)){echo $av['provinsi'];} ?>" required maxlength="40">
        </div>
        <div class="form-group">
          <input type="text" class="btn js-scroll-trigger" id="kodepos" placeholder="Kode Pos" name="kode_pos" value="<?php if(isset($av)){echo $av['kode_pos'];} ?>" required pattern="[0-9]+" minlength="5" maxlength="5">
        </div>
        <div class="form-group">
          <div class="form-check">
						<label class="form-check-label col-5">
							<input class="form-check-input" type="checkbox" name="agree" required> I agree to the Terms of Use and concert to the processing of my data as describe in the Privacy Policy
						</label>
					</div>
        </div>
        <!-- Tombol Registrasi -->
        <button type="submit" class="btn btn-pelanggan text-uppercase js-scroll-trigger">&nbsp;Sign Up&nbsp;</button>
        <br>
        <a href="reset_form.php" id="resetBtn">Reset</a>

        <!-- Link untuk yang belum memiliki akun -->
        <p>
          <br>
          Already have an account?
          <a href="login.php" class="">Sign In</a>
        </p>
      </form>
    </section>

    <?php include "../footer.php"; ?>

    <!-- Pemanggilan Javascript  -->
    <script src="<?php echo path("/assets/js/navbar.js"); ?>"></script>

  </body>
</html>
