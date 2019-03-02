<?php
  session_start();
  ini_set("display_errors", "1");
  session_unset();
  session_destroy();
  header('Location: ../index.php');
?>
