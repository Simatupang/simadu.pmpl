<div class="col-2 navbar fixed-top bg-dark">

  <div class="row link">
    <a href="<?php echo path("/admin"); ?>" class="col-12 logo text-center">
        <img class="img-fluid" src="<?php echo path("/assets/img/logo.png"); ?>" width=40px alt="">
        &nbsp;Chiko Books
    </a>
    <a href="index.php" class="col-12 menu text-center">Home</a>
    <a href="paper.php" class="col-12 menu text-center">Paper</a>
    <a href="printing.php" class="col-12 menu text-center">Printing</a>
    <a href="log.php" class="col-12 menu text-center">Log</a>
    <?php if ($_SESSION['role_admin'] == "superadmin"): ?>
    <a href="admin.php" class="col-12 menu text-center">Admin</a>
    <?php endif; ?>
    <a href="proses_logout.php" class="col-12 menu text-center logout">Log Out</a>
  </div>

</div>

<?php include "../popup.php"; ?>
