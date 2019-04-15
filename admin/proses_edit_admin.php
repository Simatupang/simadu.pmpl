<?php
  session_start();
  include "../config.php";
  $id_admin = $_GET['id_admin'];
  $email = $_POST['email'];
  $password = $_POST['password'];

  $line = "UPDATE admin SET ";
  $line .= "email='" . $email . "', ";
  $line .= "password='" . $password . "' ";
  $line .= "WHERE id_admin=" . $id_admin;
  $query = mysqli_query($conn, $line);
  if ($query){
    $_SESSION['popupSuccess'] = "Data admin berhasil diubah.";
    header('Location: admin.php');
  }
  else{
    echo "Data gagal di edit";
  }
?>
