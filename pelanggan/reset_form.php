<?php
  session_start();
  if (isset($_SESSION['reg_pel'])){
    unset($_SESSION['reg_pel']);
  }
  header('Location: registrasi.php');
?>
