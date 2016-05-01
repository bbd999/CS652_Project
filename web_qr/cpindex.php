<?php
  //start session
  session_start();
  include('phps/rest.php');
 // header("Access-Control-Allow-Origin: *");
?>
<!DOCTYPE html>
<html>

<head>
  <title>QR Reader App</title>
  //<link rel="stylesheet" href="stylesheets/style.css">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.2/jquery.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<?php 
  if (!empty($_SESSION["action"]) && strcmp($_SESSION["action"],"scanning") == 0) {
    echo '<script src="javascripts/html5_qrcode.min.js"></script>';
    echo '<script src="javascripts/main.js"></script>';
  }
?>

<script type="text/JavaScript">
<!--
redirectTime = "5000";
redirectURL = window.location.href; //"http://www.natural-environment.com";
function timedRedirect() {
	setTimeout("location.href = redirectURL;",redirectTime);
}
//   -->
</script>

</head>
<body>

<?php
// Set session variables
if (empty($_GET['code']) && empty($_SESSION['action'])) {
  
  echo "<h1 id=list>-</h1>";
  echo '<script src="javascripts/getlocal.js"></script>';
}
elseif (empty($_SESSION['action'])) {
  $_SESSION["code"] = $_GET['code'];
  $_SESSION["Token"] = "NDKBLIPYTLCQJYBENG7A";
  $_SESSION["action"] = "scanning";
  echo '<script>window.location.replace("'.htmlspecialchars($_SERVER['HTTP_REFERER']).'"); </script>';
}
else {
  if (!empty($_GET['id'])) { 
    $_SESSION['id'] = $_GET['id'];
    $_SESSION['action'] = "processing"; 
    echo '<script>window.location.replace("'.htmlspecialchars($_SERVER['HTTP_REFERER']).'"); </script>';
}
  //echo $_SESSION["code"];
 // echo "<br>" . $_SESSION["action"];
  $nowDoing = $_SESSION["action"];
  echo '<div class="container">';
  echo '  <div class="col-sm-offset-2 col-sm-10">';
  echo "    <h2>".$nowDoing."</h2>";
  echo "  </div>";
  switch(0) {
    case strcmp($nowDoing,"scanning"): 
      //scan code 
      echo ' <div id="main_content_wrap" class="outer"></div>';
      echo ' <section id="main_content" class="inner center">';
      echo '     <h3 class="center">QR code Reader Demo</h3>';
      echo '     <div id="reader" style="width:300px;height:250px;" class="center"></div>';
      echo '      <h6 class="center">Result</h6><span id="read" class="center"></span>';
      echo '      <br>';
      echo '      <h6 class="center">Read Error (Debug only)</h6><span class="center">Will constantly show a message, can be ignored</span><span id="read_error" class="center"></span>';
      echo '      <br>';
      echo '      <h6 class="center">Video Error</h6><span id="vid_error" class="center"></span>';
      echo '      <br>';
      echo '      <br>';
      echo '      <br>';
      echo '    </section>';
      echo ' <input type=hidden id="devCode" name="deviceID" value="'.$_SESSION['code'].'"/>';
      echo ' <input type=hidden id="tokenCode" name="tokenID" value="'.$_SESSION['Token'].'"/>';
      echo '<div id="dv">';
	if (!empty($_SESSION['resp'])) {
		include('phps/result.php');
	} else { 
		echo "Here will be displayed the response.";
	}
      echo '</div>';
      $_SESSION['id'] = "";
      break;
    case strcmp($nowDoing,"processing"):
      $_SESSION['action'] = "scanning";
      //get the results
	// Get cURL resource
	$curl = curl_init();
	// Set some options - we are passing in a useragent too here
	curl_setopt_array($curl, array(
	    CURLOPT_RETURNTRANSFER => 1,
	    CURLOPT_URL => 'https://savesapi.mybluemix.net/attend?Token='.$_SESSION['Token'].'&code='.$_SESSION['code'].'&id='. $_SESSION['id']
	    //CURLOPT_USERAGENT => 'Codular Sample cURL Request'
	));
	// Send the request & save response to $resp
	$resp = curl_exec($curl);
	// Close request to clear up some resources
	curl_close($curl);
	$_SESSION['resp'] = $resp;
	//print_r($resp);
	//echo $_SESSION['code'];
        echo "\n <script>";
	//echo "\n window.setTimeout(function() {";
	//echo "\n window.location.href = window.location.href;";
        //echo "\n },5000);";
        echo "\n ";
	echo "\n </script>";
        //$_SESSION['id'] = "";
	break;
      default:
        echo "boo"; 
 }
  echo "</div>";
  
}
?>
</body>
</html>
