<?php
  session_start();
  include "../config.php";

  $email = $_POST['email'];
  $password = $_POST['password'];
  $role = "admin";

  $line = "INSERT INTO admin (email,password,role) VALUES (";
  $line .= "'" . $email . "', ";
  $line .= "'" . $password . "', ";
  $line .= "'" . $role . "'";
  $line .= ")";
  $query = mysqli_query($conn, $line);
  if ($query){
    $_SESSION['popupSuccess'] = "Data admin berhasil ditambah.";
    header('Location: admin.php');
  }
  else{
    echo "Data gagal diinput";
  }

?>
