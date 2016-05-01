<?php
  //start session
  session_start();
  include('rest.php');
  goto A:
//if (!empty($_SESSION['action'])) && strcmp($_SESSION['action'],"processing") == 0) {
//  header("Location: ".htmlspecialchars($_SERVER['HTTP_REFERER'])."/test.html");
//  exit;
//}
  //header("Access-Control-Allow-Origin: *");
?>
<!DOCTYPE html>
<html>

<head>
  <title>QR Reader App</title>
  <link rel="stylesheet" href="stylesheets/style.css">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.2/jquery.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<?php 
  if (!empty($_SESSION["action"])) {
    if (strcmp($_SESSION["action"],"scanning") === 0) {
      echo "\n".'<script src="javascripts/html5_qrcode.min.js"></script>';
      echo "\n".'<script src="javascripts/main.js"></script>';
    } elseif (strcmp($_SESSION['action'],"processing") === 0) {
      echo "\n".'<meta http-equiv="refresh" content="10;url='.htmlspecialchars($_SERVER['HTTP_REFERER']).'" />';
    }
  }
?>
</head>
<body>

<?php
// Set session variables
if (empty($_GET['code']) && empty($_SESSION['action'])) {
  
  echo "\n"."<h1 id=list>-</h1>";
  echo "\n".'<script src="javascripts/getlocal.js"></script>';
}
elseif (empty($_SESSION['action'])) {
  $_SESSION["code"] = $_GET['code'];
  $_SESSION["Token"] = "NDKBLIPYTLCQJYBENG7A";
  $_SESSION["action"] = "scanning";
  echo "\n".'<script>window.location.replace("'.htmlspecialchars($_SERVER['HTTP_REFERER']).'"); </script>';
}
else {
  if (!empty($_GET['id'])) { $_SESSION['action'] = "processing"; }
  //echo $_SESSION["code"];
 // echo "<br>" . $_SESSION["action"];
  $nowDoing = $_SESSION["action"];
  echo "\n".'<div class="container">';
  echo "\n".'  <div class="col-sm-offset-2 col-sm-10">';
  echo "\n"."    <h2>".$nowDoing."</h2>";
  echo "\n"."  </div>";
  switch(0) {
    case strcmp($nowDoing,"scanning"): 
      //scan code 
      echo "\n".' <div id="main_content_wrap" class="outer"></div>';
      echo "\n".' <section id="main_content" class="inner center">';
      echo "\n".'     <h3 class="center">QR code Reader Demo</h3>';
      echo "\n".'     <div id="reader" style="width:300px;height:250px;" class="center"></div>';
      echo "\n".'      <h6 class="center">Result</h6><span id="read" class="center"></span>';
      echo "\n".'      <br>';
      echo "\n".'      <h6 class="center">Read Error (Debug only)</h6><span class="center">Will constantly show a message, can be ignored</span><span id="read_error" class="center"></span>';
      echo "\n".'      <br>';
      echo "\n".'      <h6 class="center">Video Error</h6><span id="vid_error" class="center"></span>';
      echo "\n".'      <br>';
      echo "\n".'      <br>';
      echo "\n".'      <br>';
      echo "\n".'    </section>';
      echo "\n".' <input type=hidden id="devCode" name="deviceID" value="'.$_SESSION['code'].'"/>';
      echo "\n".' <input type=hidden id="tokenCode" name="tokenID" value="'.$_SESSION['Token'].'"/>';
      echo "\n".'<div id="dv">Here will be displayed the response.</div>';
      break;
    case strcmp($nowDoing,"processing"):
      //update action to scanning for redirect
      $_SESSION['action'] = "scanning";
      //get the results
	// Get cURL resource
	$curl = curl_init();
	// Set some options - we are passing in a useragent too here
	curl_setopt_array($curl, array(
	    CURLOPT_RETURNTRANSFER => 1,
	    CURLOPT_URL => 'https://savesapi.mybluemix.net/attend?Token='.$_SESSION['TOKEN'].'&code='.$_SESSION['code'].'&id='. $_GET['id']
	    //CURLOPT_USERAGENT => 'Codular Sample cURL Request'
	));
	// Send the request & save response to $resp
	$resp = curl_exec($curl);
	// Close request to clear up some resources
	curl_close($curl);
	//$json = $json_decode($resp,true);
	//foreach($json as $records => $row) {
	//  echo "Record=" . $records . ", Row=" .$row;
	//  echo "\n"."<br>";
        //}
	print_r($resp);
	echo "\n<br>code=".$_SESSION['code'];
	echo "\n<br>action=".$_SESSION['action'];
// echo "\n".'<form name="redirect">';
// echo '\n<center>';
// echo '\n<font face="Arial"><b>You will be redirected to the script in<br><br>';
// echo '\n<form>';
// echo '\n<input type="text" size="3" name="redirect2">';
// echo '\n</form>';
// echo '\nseconds</b></font>';
// echo '\n</center>';
// echo "\n<script>";
 //echo "\n<!--";

// echo "\n/*";
// echo "\nCount down then redirect script";
// echo "\nBy JavaScript Kit (http://javascriptkit.com)";
// echo "\nOver 400+ free scripts here!";
// echo "\n*/";

// echo "\n//change below target URL to your own";
// echo '\nvar targetURL="'.htmlspecialchars($_SERVER['HTTP_REFERER']).'"';
// echo "\n//change the second to start counting down from";
// echo "\nvar countdownfrom=10";


// echo "\nvar currentsecond=document.redirect.redirect2.value=countdownfrom+1";
// echo "\nfunction countredirect(){";
// echo "\nif (currentsecond!=1){";
// echo "\ncurrentsecond-=1";
// echo "\ndocument.redirect.redirect2.value=currentsecond";
// echo "\n}";
// echo "\nelse{";
// echo "\nwindow.location=targetURL";
// echo "\nreturn";
// echo "\n}";
// echo '\nsetTimeout("countredirect()",1000)';
// echo "\n}";
//
// echo "\ncountredirect()";
// //echo "\n//-->";
// echo "\n</script>";

	break;
      default:
        echo "boo"; 
 }
  echo "\n"."</div>";
  
}
A: echo "Works";
?>
</body>
</html>
