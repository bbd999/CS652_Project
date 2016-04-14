<?php
include('../helper.php');
include('../../rest.php');
$Token = "NDKBLIPYTLCQJYBENG7A";
$apiBase = "https://attendancetracker.mybluemix.net";
$backurl = htmlspecialchars($_SERVER['HTTP_REFERER']);
$resp;

$headers = array();
$params = array('Token' => $Token);

//set header
setHeader("Attendance Tracking User Interface","Main Tracking Menu");

echo '<form class="form-horizontal" role="form">';
echo '  <div class="form-group">';
echo '    <div class="col-sm-10">';
echo '      <input class="btn btn-lg btn-primary btn-block" type="button" value="Get Student" onClick="parent.location='."'/ui/student/get.php'".'" >';
echo '    </div>';
echo '  </div>';
echo '  <div class="form-group">';
echo '    <div class="col-sm-10">';
echo '      <input class="btn btn-lg btn-primary btn-block" type="button" value="Add Student" onClick="parent.location='."'/ui/student/add.php'".'">';
echo '    </div>';
echo '  </div>';
echo '  <div class="form-group">';
echo '    <div class="col-sm-10">';
//Back Button
echo '      <input class="btn btn-lg btn-primary btn-block" type="button" value="Back" onClick="parent.location='."'".$backurl."'".'">';
echo "    </div>";
echo "  </div>";
echo '</form>';

setFooter();
?>