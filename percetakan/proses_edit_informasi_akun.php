<?php
  session_start();
  include "../config.php";
  $id_percetakan = $_SESSION['login_percetakan'];
  $nama = $_POST['nama'];
  $no_hp = $_POST['no_hp'];
  $alamat = $_POST['alamat'];
  $kota = $_POST['kota'];
  $provinsi = $_POST['provinsi'];
  $kode_pos= $_POST['kode_pos'];

  $line = "UPDATE percetakan SET ";
  $line .= "nama='" . $nama . "', ";
  $line .= "no_hp='" . $no_hp . "', ";
  $line .= "alamat='" . $alamat . "', ";
  $line .= "kota='" . $kota . "', ";
  $line .= "provinsi='" . $provinsi . "', ";
  $line .= "kode_pos='" . $kode_pos . "' ";
  $line .= "WHERE id_percetakan=" . $id_percetakan;
  $query = mysqli_query($conn, $line);
  if ($query){
    $_SESSION['popupSuccess'] = "Informasi Umum Berhasil Diubah";
    header('Location: account.php');
  }
  else{
    echo "Data Gagal Diupdate";
  }
?>
