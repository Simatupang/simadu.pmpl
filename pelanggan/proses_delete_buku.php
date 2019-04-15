<?php
  session_start();
  include "../config.php";
  $id_buku = $_GET['id_buku'];
  $id_pelanggan = $_SESSION['login_pelanggan'];

  $line = "SELECT * FROM buku WHERE id_buku=" . $id_buku . " AND id_pelanggan=" . $id_pelanggan;
  $query = mysqli_query($conn, $line);
  if ($query) {
    $buku = mysqli_fetch_array($query);
  }else{
    echo "Gagal get data buku";
  }

  $line = "DELETE from buku WHERE id_buku=" . $id_buku . " AND id_pelanggan=" . $id_pelanggan;
  $query = mysqli_query($conn, $line);
  if ($query){
    unlink('uploads/sampul/'.$buku['file_sampul']);
    unlink('uploads/buku/'.$buku['file_buku']);
    $_SESSION['popupSuccess'] = "Your file has been deleted.";
    header('Location: books.php');
  }else{
    echo "Gagal delete buku";
  }

?>
