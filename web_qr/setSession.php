<?php
  if(!empty($_GET['id'])) {
    $_SESSION['id'] = $_GET['id'];
    $_SESSION['action'] = "processing";
  }
  if(!empty($_GET['code'])) {
    $_SESSION['code'] = $_GET['code'];
    $_SESSION['action'] = "scanning";
  }
  $url = preg_replace('/\?.*/', '', $_SERVER['HTTP_REFERER']);
  echo '<script>window.location.replace("'.htmlspecialchars($url).'"); </script>';
?>
