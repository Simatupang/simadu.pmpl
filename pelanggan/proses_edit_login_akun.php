<?php
  session_start();
  include "../config.php";
  $id_pelanggan = $_SESSION['login_pelanggan'];
  $old = $_POST['old_password'];
  $new = $_POST['new_password'];
  $renew = $_POST['renew_password'];

  $line = "SELECT * FROM pelanggan WHERE id_pelanggan=" . $id_pelanggan . " AND password='" . $old . "'";
  $query = mysqli_query($conn, $line);

  if (mysqli_num_rows($query)==1){
    if ($new != $renew){
      $_SESSION['popupError'] = "New Password Tidak Sama Dengan Retype New Password";
      header('Location: account_edit_login.php');
    }else{
      $line = "UPDATE pelanggan SET ";
      $line .= "password='" . $new . "' ";
      $line .= "WHERE id_pelanggan=" . $id_pelanggan;
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
