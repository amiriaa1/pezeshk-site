<?php

include_once('../main.php');

$test=date("Y-m-d H:i:s");
$sum=date("Y-m-d H:i:s", strtotime($utimestampuserupdatee. ' + 1 minute'));
if($test < $sum){
$Failure=1;
}else{
	
	$tre=rand(999,9999);
	$student = new ManageStudents();
$mobileInfo = $student->autveruserinsert($tre,$uusername);	
	
}
echo'

<br>'.$test.'<br>
<br>'.$sum.'<br>
<br>'.$Failure.'<br>
<br>'.$tre.'<br>
';
?>