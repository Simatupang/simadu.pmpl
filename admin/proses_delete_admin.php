<?php
  session_start();
  include "../config.php";
  $id_admin = $_GET['id_admin'];

  $line = "DELETE from admin WHERE id_admin=" . $id_admin;
  $query = mysqli_query($conn, $line);
  if ($query){
    $_SESSION['popupSuccess'] = "Your data has been deleted.";
    header('Location: admin.php');
  }else{
    echo "Gagal delete admin";
  }
?>
