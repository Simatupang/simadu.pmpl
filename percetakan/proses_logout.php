<?php
  session_start();
  unset($_SESSION['login_percetakan']);
  header('Location: login.php');
?>
