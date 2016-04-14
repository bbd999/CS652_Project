<?php
// Includes
include(__DIR__.'/resources/helper.php');
include(__DIR__.'/resources/rest.php');

$resp;

//Modules
$modules = array("Student", "Course", "Building", "Device", "Attendance");
$numModules = count($modules);


$backurl = htmlspecialchars($_SERVER['HTTP_REFERER']);

//set header
setHeader(lilBits::UIname,"Main Tracking Menu");

echo '<form class="form-horizontal" role="form">';

for ($x=0; $x < $numModules; $x++) {
    echo '  <div class="form-group">';
    echo '    <div class="col-sm-offset-2 col-sm-10">';
    echo '      <input class="btn btn-lg btn-primary btn-block" type="button" value="'.$modules[$x].'" onClick="parent.location='."'/ui/".strtolower($modules[$x])."'".'">';
    echo "    </div>";
    echo "  </div>";
}

//echo '<div class="form-group">';
//echo '<div class="col-sm-offset-2 col-sm-10">';
//Back Button
//echo '<input class="btn btn-lg btn-primary btn-block" type="button" value="Back" onClick="parent.location='."'".$backurl."'".'">';
//                echo "</div>";
//            echo "</div>";
    	echo "</form>";

setFooter();/**/
?>
