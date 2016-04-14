<?php
include('../helper.php');
include('../../rest.php');
$Token = "NDKBLIPYTLCQJYBENG7A";
$apiBase = "https://attendancetracker.mybluemix.net";

$resp;

$headers = array();
$params = array('Token' => $Token);

$resp = json_decode(get($apiBase . "/course/list",$headers,0,$params));

$backurl = htmlspecialchars($_SERVER['HTTP_REFERER']);

//set header
setHeader("Attendance Tracking User Interface - Course List","Course List");

echo '<form class="form-horizontal" role="form">';
echo '  <div class="form-group">';
echo '    <div class="col-sm-offset-2 col-sm-10">';
echo 'cccccccc';
/*echo '    <table>';
$count = 0;
$tableH = "";
$table$ = "";
foreach ($resp as $record) {
	//go through each record
	if ($count == 0) {
		$tableH = "<tr>";
	}
	$tableR = "<tr>";
	foreach ($record as $key => $value) {
		//print each item
		if ($count == 0 ) {
			//save headers
			$tableH += '<th>'.$key.'</th>';
		}
		//save item for table
		$tableR += "<td>".$value."</td>";
	}
	$tableR += "</tr>";
	if ($count == 0) {
		$tableH += "</tr>";
	}
	$count++;
}
echo $tableH . $tableR . "</table>";*/
echo "    </div>";
echo "  </div>";
echo '  <div class="form-group">';
echo '    <div class="col-sm-10">';
//Back Button
echo '      <input class="btn btn-lg btn-primary btn-block" type="button" value="Back" onClick="parent.location='."'".$backurl."'".'">';
echo "    </div>";
echo "  </div>";
echo "</form>";
setFooter();
?>