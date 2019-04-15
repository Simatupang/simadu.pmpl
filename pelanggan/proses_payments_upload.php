<?php
  session_start();
  include "../config.php";
  $id_dicetak = $_GET['id_dicetak'];
  $id_pelanggan = $_SESSION['login_pelanggan'];
  date_default_timezone_set('Asia/Jakarta');
  $tgl_pembayaran = date("Y-m-d H:i:s");
  $status = "Menunggu Verifikasi Bukti Pembayaran";
  $metode_pembayaran = $_POST['metode_pembayaran'];
  $total = $_POST['total'];

  // Update file buku
  $file_bukti = $id_dicetak . '_idd_' . $id_pelanggan . '_idp_' . $_FILES["file_bukti"]["name"];
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
      $line = "INSERT INTO pembayaran (id_dicetak,id_pelanggan,tgl_pembayaran,status,metode_pembayaran,total,file_bukti) VALUES (";
      $line .= $id_dicetak . ", ";
      $line .= $id_pelanggan . ", ";
      $line .= "'" . $tgl_pembayaran . "', ";
      $line .= "'" . $status . "', ";
      $line .= "'" . $metode_pembayaran . "', ";
      $line .= $total . ", ";
      $line .= "'" . $file_bukti . "'";
      $line .= ")";
      $query = mysqli_query($conn, $line);

      if (!$query) echo "Data pembayaran gagal diinsert";
      $_SESSION['popupSuccess'] = "File bukti pembayaran berhasil di submit";
      header('Location: payments.php');

    } else {
      $_SESSION['popupError'] = "Sorry, there was an error uploading your file.";
      header('Location: payments.php');
    }
  }

?>
