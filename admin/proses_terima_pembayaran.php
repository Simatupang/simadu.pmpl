<?php
  session_start();
  include "../config.php";

  $id_pembayaran = $_GET['id_pembayaran'];
  $status = "Pembayaran Diterima";
  $line = "UPDATE pembayaran SET";
  $line .= " status='" . $status . "'";
  $line .= " WHERE id_pembayaran=" . $id_pembayaran;
  $query_pembayaran = mysqli_query($conn, $line);
  if (!$query_pembayaran) echo "Gagal query terima pembayaran";

  $id_admin = $_SESSION['login_admin'];
  date_default_timezone_set('Asia/Jakarta');
  $tgl_olah = date("Y-m-d H:i:s");
  $line = "INSERT INTO diolah (id_pembayaran,id_admin,tgl) VALUES(";
  $line .= $id_pembayaran . ", ";
  $line .= $id_admin . ", ";
  $line .= "'" . $tgl_olah . "'";
  $line .= ")";
  $query_diolah = mysqli_query($conn, $line);
  if (!$query_diolah) echo "Gagal query insert diolah";

  $status_dicetak = "Dalam Proses Percetakan";
  $line = "SELECT * FROM pembayaran WHERE id_pembayaran=" . $id_pembayaran;
  $query = mysqli_query($conn, $line);
  $pembayaran = mysqli_fetch_array($query, MYSQLI_ASSOC);
  $line = "UPDATE dicetak SET";
  $line .= " status='" . $status_dicetak . "'";
  $line .= " WHERE id_dicetak=" . $pembayaran['id_dicetak'];
  $query_pembayaran = mysqli_query($conn, $line);
  if (!$query_pembayaran) echo "Gagal query update dicetak";

  $_SESSION['popupSuccess'] = "Menerima Pembayaran";
  header('Location: index.php');
?>
