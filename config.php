<?php
  $conn = mysqli_connect("localhost", "root", "", "db_chiko");
  if (mysqli_connect_errno()) {
    die("Disconnect. ".mysqli_connect_error());
  }
  function path($path){
    return 'http://localhost/chikobooks' . $path;
  }
?>
