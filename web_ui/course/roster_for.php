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
if (empty($_GET['code'])) {
echo '<form method="GET" action="'. basename(__FILE__, '.php') .'.php" class="form-horizontal" role="form">';
echo '  <div class="form-group">';
//echo '    <input type="text" id="code" placeholder="Course Code" name="code">';
//echo '    <input type="text" id="state" placeholder="XXX" name="state">
//submit and clear buttons
echo '    <div class="col-sm-offset-2 col-sm-10">';
echo '    <input type="text" class = "form-control" id="code" placeholder="Course Code" name="code"><br/>';
echo '      <input class="btn btn-lg btn-primary btn-block" type="submit" value="Submit">';
	//echo '" onClick="parent.location='."'/ui/".strtolower($module)."/get.php?code='".'" >';
	//echo $moduleActions[$x]." ".$title.'" onClick="parent.location='."'/ui/".strtolower($module)."/?action=".$moduleActions[$x]."'".'" >';
echo '      <input class="btn btn-lg btn-primary btn-block" type="reset" value="Clear" >';
//	echo $moduleActions[$x]." ".$title.'" onClick="parent.location='."'/ui/".strtolower($module)."/".strtolower($moduleActions[$x]).".php'".'" >';
echo '    </div>';
echo '  </div>';
echo '</form>';
}
else {
//	echo "hello get";
echo '<form class="form-horizontal" role="form">';
echo '  <div class="form-group">';
echo '    <div class="col-sm-offset-2 col-sm-10">';
$request = lilBits::APIurl."/".$module."/roster?Token=".lilBits::APItoken."&code=".$_GET['code'];
$response = file_get_contents($request);
//var_dump($response);
$json = json_decode($response,true);
echo '<table class="table table-striped"><tr><th>Student Photo</th><th>Student ID</th><th>Firstname</th><th>Lastname</th><th>Username</th><th>Attendance</th></tr>';
foreach ($json as $keys => $values)
{
  echo "<tr>";
  foreach($values as $key => $value)
  {
    if (strcmp($key,"ATVSTUD_ID") == 0) {
      //display picture
      echo '<td><image src="../../images/'.$value.'.jpg" alt="'.$value.'" height="42" width="42"></td>';
    }
    echo "<td>".$value."</td>";
  }
  echo "</tr>";
}
echo  "</table>";
echo '    </div>';
echo '  </div>';
echo '</form>';
}

setFooter($backurl);
/**/
//echo " world";
?>
