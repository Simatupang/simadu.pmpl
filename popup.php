<?php
  if ( isset($_SESSION['popupSuccess']) ){
    echo '<script type="text/javascript">';
    echo '$(document).ready(function() { popupSuccess("' . $_SESSION['popupSuccess'] . '"); });';
    echo '</script>';
    unset($_SESSION['popupSuccess']);
  }
  if ( isset($_SESSION['popupError']) ){
    echo '<script type="text/javascript">';
    echo '$(document).ready(function() { popupError("' . $_SESSION['popupError'] . '"); });';
    echo '</script>';
    unset($_SESSION['popupError']);
  }
?>
