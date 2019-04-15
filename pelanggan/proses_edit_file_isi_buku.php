<?php
  session_start();
  include "../config.php";
  $id_pelanggan = $_SESSION['login_pelanggan'];
  $id_buku = $_GET['id_buku'];

  // Get data buku
  $line = "SELECT * FROM buku WHERE id_buku=" . $id_buku . " AND id_pelanggan=" . $id_pelanggan;
  $query = mysqli_query($conn, $line);
  if (!$query) echo "Gagal get data buku";
  $buku = mysqli_fetch_array($query);

  // Update file buku
  $file_buku = $id_pelanggan . '_buku_' . $_FILES["file_buku"]["name"];
  $target_dir = "uploads/buku/";
  $target_file = $target_dir . basename($file_buku);
  $uploadOk = 1;
  $fileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
  // Allow certain file formats
  if( $fileType != "pdf" ) {
    $_SESSION['popupError'] = "Sorry only PDF files are allowed.";
    $uploadOk = 0;
  }
  // Check if file already exists
  if (file_exists($target_file)) {
    $_SESSION['popupError'] = "Sorry, book file already exists";
    $uploadOk = 0;
  }
  // Check if $uploadOk is set to 0 by an error
  if ($uploadOk == 0) {
    header('Location: books.php');
    // if everything is ok, try to upload file
  }else{
    if (move_uploaded_file($_FILES["file_buku"]["tmp_name"], $target_file)) {
      $line = "UPDATE buku SET file_buku='" . $file_buku . "' WHERE id_buku=" . $id_buku;
      $query = mysqli_query($conn, $line);
      unlink('uploads/buku/'.$buku['file_buku']);
      if (!$query) echo "Data file buku gagal diupdate";
      $_SESSION['popupSuccess'] = "File isi buku berhasil diubah.";
      header('Location: books.php');

    } else {
      $_SESSION['popupError'] = "Sorry, there was an error uploading your file.";
      header('Location: books.php');
    }
  }

?>
