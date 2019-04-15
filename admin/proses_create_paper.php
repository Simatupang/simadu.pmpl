<?php
  session_start();
  include "../config.php";

  $jenis = $_POST['jenis'];
  $harga = $_POST['harga'];

  $line = "INSERT INTO kertas (jenis,harga) VALUES (";
  $line .= "'" . $jenis . "',";
  $line .= $harga . ")";
  $query = mysqli_query($conn, $line);
  if ($query){
    $_SESSION['popupSuccess'] = "Data kertas berhasil ditambah.";
    header('Location: paper.php');
  }
  else{
    echo "Data gagal diinput";
  }

?>
