<?php
  session_start();
  include "../config.php";
  $email = $_POST['email'];
  $password = $_POST['password'];
  $line = "SELECT * FROM pelanggan WHERE email='" . $email . "'";
  $query = mysqli_query($conn, $line);

  $_SESSION['log_pel'] = $email;

  if (mysqli_num_rows($query)==1){
    $data = mysqli_fetch_array($query, MYSQLI_ASSOC);
    if ($data['password'] == $password){
      unset($_SESSION['log_pel']);
      $_SESSION['login_pelanggan'] = $data['id_pelanggan'];
      header('Location: index.php');
    }else{
      $_SESSION['popupError'] = "Password Salah";
      header('Location: login.php');
    }
  }else{
    $_SESSION['popupError'] = "Email Tidak Terdaftar";
    header('Location: login.php');
  }
?>
