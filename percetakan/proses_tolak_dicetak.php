<?php
  session_start();
  include "../config.php";
  $id_dicetak = $_GET['id_dicetak'];
  $pesan = $_GET['pesan'];
  $status = "Ditolak Percetakan";
  date_default_timezone_set('Asia/Jakarta');
  $tgl_perubahan = date("Y-m-d H:i:s");
  $line = "UPDATE dicetak SET";
  $line .= " status='" . $status . "',";
  $line .= " pesan='" . $pesan . "',";
  $line .= " tgl_perubahan='" . $tgl_perubahan . "'";
  $line .= " WHERE id_dicetak=" . $id_dicetak;
  $query = mysqli_query($conn, $line);
  if (!$query) echo "Gagal query terima dicetak";
  $_SESSION['popupSuccess'] = "Menolak Pesanan";
  header('Location: index.php');
?>
