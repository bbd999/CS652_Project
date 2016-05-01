<?php

function setHeader($title, $header) {
	echo "<!DOCTYPE html>";
	echo "<html>";
	echo "<head>"	;
	echo "<title>".$title."</title>";
	echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8">';
	//echo '<link rel="stylesheet" href="../style.css" />';
	//Bootstrap
	echo '<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">';
    echo '<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>';
    echo '<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>';
	echo "</head>";
	echo "<body>";
    echo '<div class="container">';
	echo '  <div class="col-sm-offset-2 col-sm-10">';
   	echo "	  <h2>".$header."</h2>";
   	echo "  </div>";
}

function setFooter($backurl) {
	echo '<form id="backfrm" class="form-horizontal" role="form">';
	echo '<div class="form-group">';
	echo '<div class="col-sm-offset-2 col-sm-10">';
	//Back Button
	echo '<input class="btn btn-lg btn-primary btn-block" type="button" value="Back" onClick="window.history.back()">';//parent.location='."'".$backurl."'".'">';
        echo "</div>";
        echo "</div>";
        echo "</form>";

	echo "</div>";
	echo "</body>";
	echo "</html>";
}


abstract class lilBits
{
	const APIurl = 'https://attendancetracker.mybluemix.net';
	const APItoken = "NDKBLIPYTLCQJYBENG7A";
	const UIname = "Attendance Tracking User Interface";
}

function getModuleActions($module) {
	$actionArray = array();
	switch ($module) {
		case "course":
			$actionArray = array("Find","Add","Update","Delete", "Roster_For");
			break;
		default:
	}
	return $actionArray;
}/**/
?>
