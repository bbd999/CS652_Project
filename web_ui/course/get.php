<?php
//get.php
//echo "hello ";
//includes
include(__DIR__.'/../resources/helper.php');
include(__DIR__.'/../resources/rest.php');

//get module and actions from path
$pathing = explode('/',__DIR__);
$countPathing = count($pathing);
$module = trim($pathing[$countPathing-1]);
//$modActions = getModuleActions($module);
//$numAct = count($modActions);
$title = "Find " . ucfirst($module);

//navigation
$backurl = htmlspecialchars($_SERVER['HTTP_REFERER']);

//rest call setup
$response;
$headers = array();
$params = array();

//set header
setHeader("Attendance Tracking User Interface - ".$title,$title." Menu");
echo '<form method="GET" target="parent" action="get.php" class="form-horizontal" role="form">';
echo '  <div class="form-group">';
echo '    <input type="text" id="code" placeholder="Course Code" name="code">';
//echo '    <input type="text" id="state" placeholder="XXX" name="state">
//submit and clear buttons
echo '    <div class="col-sm-offset-2 col-sm-10">';
echo '      <input class="btn btn-lg btn-primary btn-block" type="submit" value="Submit">';
	//echo '" onClick="parent.location='."'/ui/".strtolower($module)."/get.php?code='".'" >';
	//echo $moduleActions[$x]." ".$title.'" onClick="parent.location='."'/ui/".strtolower($module)."/?action=".$moduleActions[$x]."'".'" >';
echo '      <input class="btn btn-lg btn-primary btn-block" type="reset" value="Clear" >';
//	echo $moduleActions[$x]." ".$title.'" onClick="parent.location='."'/ui/".strtolower($module)."/".strtolower($moduleActions[$x]).".php'".'" >';
echo '    </div>';
echo '  </div>';
echo '</form>';
if (!empty($_GET['code'])) {
	echo "hello get";
}

setFooter($backurl);
/**/
//echo " world";
?>
