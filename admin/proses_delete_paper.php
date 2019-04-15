<?php
  session_start();
  include "../config.php";
  $id_kertas = $_GET['id_kertas'];

  $line = "DELETE from kertas WHERE id_kertas=" . $id_kertas;
  $query = mysqli_query($conn, $line);
  if ($query){
    $_SESSION['popupSuccess'] = "Your data has been deleted.";
    header('Location: paper.php');
  }else{
    echo "Gagal delete kertas";
  }
?>
