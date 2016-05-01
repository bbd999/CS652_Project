<?php
  $student_Name;
  $student_ID;
  //if(strpos($_SESSION['resp'],$_SESSION['id']
  //if student id exists then pull back thier record
/*  if(!empty($_SESSION['id'])) {
    // Get cURL student record
    $curl = curl_init();
    // Set some options - we are passing in a useragent too here
    curl_setopt_array($curl, array(
    CURLOPT_RETURNTRANSFER => 1,
    CURLOPT_URL => 'https://savesapi.mybluemix.net/student?Token='.$_SESSION['Token'].'&id='. $_SESSION['id']
    //CURLOPT_USERAGENT => 'Codular Sample cURL Request'
    ));
    // Send the request & save response to $resp
    $jsonData = $json_decode(curl_exec($curl),true);
    // Close request to clear up some resources
    curl_close($curl);
*/    
  }
?>
<div style="background-color:green;color:white;width:480px;height:180px;padding: 10px;">
<div width="100%" style="color:white;font-weight:bold;padding: 5px;"><?php echo $_SESSION['resp']; ?></div>
<div id=image style="float:left;width:80px; height:80px; border: 1px solid black;"><img src="../images/<?php echo $_SESSION['id']; ?>.jpg" height=80 width=80></div>
<div id=student style"float:left;width:400px;">
  <br>
  <span style="padding:10px;">Student Name:</span>
    <span style="padding:5px;"><?php echo $student_Name; ?></span>
  <br><br>
  <span style="padding:10px;">Student ID:</span>
    <span style="padding:5px;"><?php echo $_SESSION['id']; ?></span>
</div>
</div>
