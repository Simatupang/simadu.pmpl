<?php
  session_start();
  include "../config.php";
  $id_pelanggan = $_SESSION['login_pelanggan'];
  $id_buku = $_GET['id_buku'];
  $judul = $_POST['judul'];
  $sinopsis = $_POST['sinopsis'];
  $jum_hal = $_POST['jum_hal'];

  $line = "UPDATE buku SET ";
  $line .= "judul='" . $judul . "', ";
  $line .= "sinopsis='" . $sinopsis . "', ";
  $line .= "jum_hal=" . $jum_hal . " ";
  $line .= "WHERE id_buku=" . $id_buku;
  $query = mysqli_query($conn, $line);
  if ($query){
    $_SESSION['popupSuccess'] = "Data buku berhasil diubah.";
    header('Location: books.php');
  }else{
    echo "Data gagal diedit";
  }

?>
