<?php
  session_start();
  include "../config.php";
  $id_pembayaran = $_GET['id_pembayaran'];
  date_default_timezone_set('Asia/Jakarta');
  $tgl_pembayaran = date("Y-m-d H:i:s");
  $status = "Menunggu Verifikasi Bukti Pembayaran";
  $metode_pembayaran = $_POST['metode_pembayaran'];

  $line = "SELECT * FROM pembayaran WHERE id_pembayaran=" . $id_pembayaran;
  $query_pembayaran = mysqli_query($conn, $line);
  $pembayaran = mysqli_fetch_array($query_pembayaran, MYSQLI_ASSOC);

  // Update file buku
  $file_bukti = $pembayaran['id_dicetak'] . '_idd_' . $pembayaran['id_pelanggan'] . '_idp_' . $_FILES["file_bukti"]["name"];
  $target_dir = "uploads/bukti/";
  $target_file = $target_dir . basename($file_bukti);
  $uploadOk = 1;
  $fileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
  // Allow certain file formats
  if( $fileType != "jpg" && $fileType != "png" && $fileType != "jpeg" && $fileType != "gif" ) {
      $_SESSION['popupError'] = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
      $uploadOk = 0;
  }
  // Check if file already exists
  if (file_exists($target_file)) {
    $_SESSION['popupError'] = "Sorry, image file already exists";
    $uploadOk = 0;
  }
  // Check if $uploadOk is set to 0 by an error
  if ($uploadOk == 0) {
    header('Location: payments.php');
    // if everything is ok, try to upload file
  }else{
    if (move_uploaded_file($_FILES["file_bukti"]["tmp_name"], $target_file)) {
      unlink('uploads/bukti/'.$pembayaran['file_bukti']);
      $line = "UPDATE pembayaran SET ";
      $line .= "tgl_pembayaran='" . $tgl_pembayaran . "', ";
      $line .= "status='" . $status . "', ";
      $line .= "metode_pembayaran='" . $metode_pembayaran . "', ";
      $line .= "file_bukti='" . $file_bukti . "' ";
      $line .= "WHERE id_pembayaran=" . $id_pembayaran;
      $query = mysqli_query($conn, $line);

      if (!$query) echo "Data pembayaran gagal diupdate";
      $_SESSION['popupSuccess'] = "File bukti pembayaran berhasil di update";
      header('Location: payments.php');

    } else {
      $_SESSION['popupError'] = "Sorry, there was an error uploading your file.";
      header('Location: payments.php');
    }
  }


?>
