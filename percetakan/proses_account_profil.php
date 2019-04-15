<?php
  session_start();
  include "../config.php";
  $id_percetakan = $_SESSION['login_percetakan'];

  include "proses_get_akun.php";

  // File Profil
  $file_profil = $id_percetakan . '_profil_' . $_FILES["file_profil"]["name"];
  $target_dir = "uploads/profil/";
  $target_file = $target_dir . basename($file_profil);
  $uploadOk = 1;
  $fileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
  // Allow certain file formats
  if( $fileType != "jpg" && $fileType != "png" && $fileType != "jpeg" && $fileType != "gif" ) {
      $_SESSION['popupError'] = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
      $uploadOk = 0;
  }
  // Check if $uploadOk is set to 0 by an error
  if ($uploadOk == 0) {
    header('Location: account.php');
  // if everything is ok, try to upload file
  } else {
      if (move_uploaded_file($_FILES["file_profil"]["tmp_name"], $target_file)) {
          if (isset($akun['file_profil'])){
            unlink('uploads/profil/'.$akun['file_profil']);
          }
          $_SESSION['popupSuccess'] = "Foto profil berhasil diubah.";

          $line = "UPDATE percetakan SET file_profil='" . $file_profil . "' WHERE id_percetakan=" . $id_percetakan;
          $query = mysqli_query($conn, $line);
          if (!$query){
            echo "Data file profil gagal diupdate";
          }

          header('Location: account.php');
      } else {
          $_SESSION['popupError'] = "Sorry, there was an error uploading your cover file.";
          header('Location: account.php');
      }
  }
?>
