<!DOCTYPE html>
<html>

<head>
  <title>QR Reader App</title>
  <link rel="stylesheet" href="stylesheets/style.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.2/jquery.js"></script>
</head>
<body>

<?php
// Set session variables
if (empty($_GET['code'])) {
  //session_start();
  //$_SESSION["code"] = $_GET['code'];
  //$_SESSION["Token"] = "NDKBLIPYTLCQJYBENG7A";
 //header( 'Location: '.htmlspecialchars($_SERVER['HTTP_REFERER']).'qr.php' ) ;

echo "<h1 id=list>-</h1>";
ehco '<script src="javascripts/getlocal.js"></script>';
}
?>
</body>
</html>
