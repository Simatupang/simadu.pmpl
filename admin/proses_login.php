<?php
  session_start();
  include "../config.php";
  $email = $_POST['email'];
  $password = $_POST['password'];
  $line = "SELECT * FROM admin WHERE email='" . $email . "'";
  $query = mysqli_query($conn, $line);

  if (mysqli_num_rows($query)==1){
    $data = mysqli_fetch_array($query, MYSQLI_ASSOC);
    if ($data['password'] == $password){
      unset($_SESSION['log_pel']);
      $_SESSION['login_admin'] = $data['id_admin'];
      $_SESSION['role_admin'] = $data['role'];
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
