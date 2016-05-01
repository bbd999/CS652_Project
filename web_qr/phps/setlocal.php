<?php
  if(!empty($_GET['id'])) {
    $_SESSION['id'] = $_GET['id'];
  }
  if(!empty($_GET['code'])) {
    $_SESSION['code'] = $_GET['code'];
  }
  header($_SERVER['HTTP_REFERER']);
?>
