<?php
  session_start();
  include "../config.php";
  $id_dicetak = $_GET['id_dicetak'];

  $line = "DELETE from dicetak WHERE id_dicetak=" . $id_dicetak;
  $query = mysqli_query($conn, $line);
  if ($query){
    $_SESSION['popupSuccess'] = "Your file has been deleted.";
    header('Location: payments.php');
  }else{
    echo "Gagal delete dicetak";
  }

?>
