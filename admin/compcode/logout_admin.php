<?php 
ob_start();
session_start();
include"include/config.php";
include("check_login.php");
include("include/connect_db.php");

mysql_query("insert into $db_eform.personel_muerp_log (per_id, log_status, log_ipstamp) values ('$_SESSION[ses_per_id]', 'signout', '$remoteip')");

if (!empty($per_id)) $old_admin = $per_id;
//$result_unreg = session_unregister("per_id");
//$result_unreg2 = session_unregister("per_dept");
$result_dest = session_destroy();
#include("index.php");
#header("location: ".$livesite."default.html");
header("location: ../../profile/profile.php");
if(empty($authuser))
	if(!$result_unreg && !$result_dest)
		echo "????????????????????";
		ob_end_flush();
?>