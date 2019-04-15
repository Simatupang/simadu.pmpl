<?php
  session_start();
  include "../config.php";
  $id_pelanggan = $_SESSION['login_pelanggan'];
  $nama = $_POST['nama'];
  $no_hp = $_POST['no_hp'];
  $alamat = $_POST['alamat'];
  $kota = $_POST['kota'];
  $provinsi = $_POST['provinsi'];
  $kode_pos= $_POST['kode_pos'];
  $jk = $_POST['jk'];

  $line = "UPDATE pelanggan SET ";
  $line .= "nama='" . $nama . "', ";
  $line .= "no_hp='" . $no_hp . "', ";
  $line .= "alamat='" . $alamat . "', ";
  $line .= "kota='" . $kota . "', ";
  $line .= "provinsi='" . $provinsi . "', ";
  $line .= "kode_pos='" . $kode_pos . "', ";
  $line .= "jk='" . $jk . "' ";
  $line .= "WHERE id_pelanggan=" . $id_pelanggan;
  $query = mysqli_query($conn, $line);
  if ($query){
    $_SESSION['popupSuccess'] = "Informasi Umum Berhasil Diubah";
    header('Location: account.php');
  }
  else{
    echo "Data Gagal Diupdate";
  }
?>
