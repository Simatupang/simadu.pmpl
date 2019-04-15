<?php
  session_start();
  include "../config.php";
  $id_kertas = $_GET['id_kertas'];
  $jenis = $_POST['jenis'];
  $harga = $_POST['harga'];

  $line = "UPDATE kertas SET ";
  $line .= "jenis='" . $jenis . "', ";
  $line .= "harga=" . $harga . " ";
  $line .= "WHERE id_kertas=" . $id_kertas;
  $query = mysqli_query($conn, $line);
  if ($query){
    $_SESSION['popupSuccess'] = "Data kertas berhasil diubah.";
    header('Location: paper.php');
  }
  else{
    echo "Data gagal di edit";
  }
?>
