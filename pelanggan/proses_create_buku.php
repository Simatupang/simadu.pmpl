<?php
  session_start();
  include "../config.php";
  $id_pelanggan = $_SESSION['login_pelanggan'];

  // File Sampul
  $file_sampul = $id_pelanggan . '_sampul_' . $_FILES["file_sampul"]["name"];
  $target_dir = "uploads/sampul/";
  $target_file = $target_dir . basename($file_sampul);
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
  } else {
      if (move_uploaded_file($_FILES["file_sampul"]["tmp_name"], $target_file)) {
          $_SESSION['popupSuccess'] = "Data buku berhasil ditambah.";
      } else {
          $_SESSION['popupError'] = "Sorry, there was an error uploading your cover file.";
          header('Location: books.php');
      }
  }

  // File Buku
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
  } else {
      if (move_uploaded_file($_FILES["file_buku"]["tmp_name"], $target_file)) {
          $_SESSION['popupSuccess'] = "Data buku berhasil ditambah.";
      } else {
          $_SESSION['popupError'] = "Sorry, there was an error uploading your file.";
          header('Location: books.php');
      }
  }

  if ($uploadOk != 0) {
    $judul = $_POST['judul'];
    $sinopsis = $_POST['sinopsis'];
    $jum_hal = $_POST['jum_hal'];

    $line = "INSERT INTO buku (id_pelanggan,judul,sinopsis,jum_hal,file_buku,file_sampul) VALUES (";
    $line .= $id_pelanggan . ", ";
    $line .= "'" . $judul . "', ";
    $line .= "'" . $sinopsis . "', ";
    $line .= $jum_hal . ", ";
    $line .= "'" . $file_buku . "', ";
    $line .= "'" . $file_sampul . "'";
    $line .= ")";
    $query = mysqli_query($conn, $line);
    if ($query){
      $_SESSION['popupSuccess'] = "Data buku berhasil ditambah.";
      header('Location: books.php');
    }
    else{
      echo "Data gagal diinput";
    }
  }


?>
