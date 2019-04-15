<?php
  $line = "SELECT * FROM percetakan WHERE id_percetakan=" . $_SESSION['login_percetakan'];
  $query = mysqli_query($conn, $line);
  if ($query){
    $akun = mysqli_fetch_array($query);
  }else{
    echo "Gagal get akun";
  }
?>
