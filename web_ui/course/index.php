<?php
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
$title = ucfirst($module);

//navigation
$backurl = htmlspecialchars($_SERVER['HTTP_REFERER']);

//rest call setup
$response;
$headers = array();
$params = array();

/*if (!empty($_GET['action'])) {
	//switch on action
	$modAction = $_GET['action'];
	switch ($modAction) {
		case "Get":
			//set header
			setHeader(lilBits::UIname . " - " . $modAction . $title, $modAction . " " . $title);
			echo '<form class="form-horizontal" role="form">';
			
			echo '</form>';
			setFooter($backurl);
			break;
		default:
	}
}
else {*/
	//display module menu
	//module action setup
	$moduleActions = getModuleActions($module);//array("Get", "Add", "List");
	$numActions = count($moduleActions);
	//set header
	setHeader("Attendance Tracking User Interface - ".$title,$title." Menu");
	echo '<form class="form-horizontal" role="form">';
	for($x=0; $x < $numActions; $x++) {
		echo '  <div class="form-group">';
		echo '    <div class="col-sm-offset-2 col-sm-10">';
		echo '      <input class="btn btn-lg btn-primary btn-block" type="button" value="';
		echo str_replace("_"," ",$moduleActions[$x])." ".$title.'" onClick="parent.location='."'/ui/".strtolower($module)."/".strtolower($moduleActions[$x]).".php'".'" >';
		//echo $moduleActions[$x]." ".$title.'" onClick="parent.location='."'/ui/".strtolower($module)."/?action=".$moduleActions[$x]."'".'" >';
		echo '    </div>';
		echo '  </div>';
	}
	echo '</form>';

	setFooter($backurl);
//}
/**/
//echo " world";
?>
