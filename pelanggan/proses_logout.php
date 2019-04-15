<?php
  session_start();
  unset($_SESSION['login_pelanggan']);
  header('Location: login.php');
?>
