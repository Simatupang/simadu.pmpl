<?php
  session_start();
  include "../config.php";
  $nama = $_POST['nama'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $no_hp = $_POST['no_hp'];
  $alamat = $_POST['alamat'];
  $kota = $_POST['kota'];
  $provinsi = $_POST['provinsi'];
  $kode_pos= $_POST['kode_pos'];
  $jk = $_POST['jk'];

  $data_array = array(
    'nama' => $nama,
    'email' => $email,
    'password' => $password,
    'no_hp' => $no_hp,
    'alamat' => $alamat,
    'kota' => $kota,
    'provinsi' => $provinsi,
    'kode_pos' => $kode_pos,
    'jk' => $jk,
  );
  $_SESSION['reg_pel'] = $data_array;

  $line = "SELECT email FROM pelanggan WHERE email='" . $email . "'";
  $query = mysqli_query($conn, $line);

  if (mysqli_num_rows($query)!=0){
    $_SESSION['popupError'] = "Email Sudah Terdaftar";
    header('Location: registrasi.php');
  }else{
    $line = "INSERT INTO pelanggan (email,password,nama,provinsi,kota,alamat,kode_pos,no_hp,jk) VALUES (";
    $line .= "'" . $email . "',";
    $line .= "'" . $password . "',";
    $line .= "'" . $nama . "',";
    $line .= "'" . $provinsi . "',";
    $line .= "'" . $kota . "',";
    $line .= "'" . $alamat . "',";
    $line .= "'" . $kode_pos . "',";
    $line .= "'" . $no_hp . "',";
    $line .= "'" . $jk . "'";
    $line .= ")";
    $query = mysqli_query($conn, $line);
    if ($query){
      unset($_SESSION['reg_pel']);
      $_SESSION['popupSuccess'] = "Registrasi Berhasil";
      header('Location: login.php');
    }
    else{
      echo "Data gagal diinput";
    }
  }

?>
