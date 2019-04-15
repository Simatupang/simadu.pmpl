<?php
  session_start();
  if (isset($_SESSION['reg_per'])){
    unset($_SESSION['reg_per']);
  }
  header('Location: registrasi.php');
?>
