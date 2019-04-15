<?php
  session_start();
  include "../config.php";
  $id_pelanggan = $_SESSION['login_pelanggan'];
  $id_percetakan = $_GET['id_percetakan'];
  $status = "Menunggu Konfirmasi Percetakan";
  date_default_timezone_set('Asia/Jakarta');
  $tgl_perubahan = date("Y-m-d H:i:s");

  $line = "INSERT INTO dicetak (id_percetakan,status,tgl_perubahan) VALUES (";
  $line .= $id_percetakan . ",";
  $line .= "'" . $status . "',";
  $line .= "'" . $tgl_perubahan . "'";
  $line .= ")";

  $query = mysqli_query($conn, $line);
  if ($query){
    $last_id = mysqli_insert_id($conn);
    $array_id_buku = $_POST['id_buku'];
    $jum_buku = 0;
    foreach ($array_id_buku as $id_buku) {
      $jum_buku++;
      $id_kertas_isi = $_POST['isi'.$id_buku];
      $id_kertas_sampul = $_POST['sampul'.$id_buku];
      $qty = $_POST['qty'.$id_buku];
      $line = "INSERT INTO detail_dicetak (id_dicetak,id_buku,id_kertas_isi,id_kertas_sampul,qty) VALUES (";
      $line .= $last_id . ",";
      $line .= $id_buku . ",";
      $line .= $id_kertas_isi . ",";
      $line .= $id_kertas_sampul . ",";
      $line .= $qty;
      $line .= ")";
      $query = mysqli_query($conn, $line);
      if (!$query) echo "Data detail cetak gagal diinput";
    }
    $line = "UPDATE percetakan SET jum_buku=jum_buku+". $jum_buku . " WHERE id_percetakan=" . $id_percetakan;
    $query = mysqli_query($conn, $line);
    if (!$query) echo "Data jum buku gagal diupdate";
    $_SESSION['popupSuccess'] = "Berhasil Mengajukan Print Buku";
    header('Location: payments.php');
  }
  else{
    echo "Data dicetak gagal diinput";
  }

?>
