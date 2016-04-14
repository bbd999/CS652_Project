<?php
include('../rest.php');
$Token = "NDKBLIPYTLCQJYBENG7A";
$apiBase = "https://attendancetracker.mybluemix.net";

$resp;

$headers = array();
$params = array('Token' => $Token);


echo "<!DOCTYPE html>";
echo "<html>";
echo "<head>";
	echo "<title>Attendance Tracking User Interface</title>";
	echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8">';
	//echo '<link rel="stylesheet" href="../style.css" />';
	//Bootstrap
	echo '<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">';
    echo '<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>';
    echo '<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>';
echo "</head>";
echo "<body>";
    echo '<div class="container">';
    	echo "<h2>Student Menu</h2>";
        echo '<form class="form-horizontal" role="form">';
        	echo '<div class="form-group">';
            	echo '<div class="col-sm-offset-2 col-sm-10">';
                	echo '<input class="btn btn-lg btn-primary btn-block" type="button" value="Course" onClick="parent.location='."'/ui/course'".'">';
                echo "</div>";
            echo "</div>";
            echo '<div class="form-group">';
                echo '<div class="col-sm-offset-2 col-sm-10">';
                    echo '<input class="btn btn-lg btn-primary btn-block" type="button" value="Add Student" onClick="parent.location='."/ui/student/add'".'">';
                echo "</div>";
            echo "</div>";
    	echo "</form>";
    echo "</div><br>";
/*
	$resp = json_decode(get($urlBase . "/device/list",$headers,0,$params));

	echo "<p>Token: " . $Token . "</p>";
	echo "<p>URL: " . $urlBase . "</p>";
	echo "<p>Token: ";
	print_r($params);
	echo "</p>";
	echo "<p>Token: ";
	print_r($resp);
	echo "</p>";
*/
echo "</body>";
echo "</html>";
?>