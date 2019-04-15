<?php
  session_start();
  include "../config.php";
  $id_percetakan = $_SESSION['login_percetakan'];
  $old = $_POST['old_password'];
  $new = $_POST['new_password'];
  $renew = $_POST['renew_password'];

  $line = "SELECT * FROM percetakan WHERE id_percetakan=" . $id_percetakan . " AND password='" . $old . "'";
  $query = mysqli_query($conn, $line);

  if (mysqli_num_rows($query)==1){
    if ($new != $renew){
      $_SESSION['popupError'] = "New Password Tidak Sama Dengan Retype New Password";
      header('Location: account_edit_login.php');
    }else{
      $line = "UPDATE percetakan SET ";
      $line .= "password='" . $new . "' ";
      $line .= "WHERE id_percetakan=" . $id_percetakan;
      $query = mysqli_query($conn, $line);
      if ($query){
        $_SESSION['popupSuccess'] = "Password Berhasil Diubah";
        header('Location: account.php');
      }
      else{
        echo "Data Gagal Diupdate";
      }
    }
  }else{
    $_SESSION['popupError'] = "Password Salah";
    header('Location: account_edit_login.php');
  }

?>
