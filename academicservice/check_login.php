<?php
$per_id = $_SESSION["ses_per_id"];
//$per_dept = $_SESSION["per_dept"];

if(empty($per_id)){
	header("location: ".$livesite."form/");
}else{
	$userlog="insert into user_log (per_id,dates,ip,event) values ('$per_id','$date_create','$remoteip','$_SERVER[REQUEST_URI]')";
	mysql_query($userlog);
}
?>