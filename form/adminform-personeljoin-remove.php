<?php 
session_start();

include("../admin/compcode/include/config.php"); 
include "../admin/compcode/include/connect_db.php";
require_once("../admin/compcode/include/function.php");

mysql_query("delete from $db_eform.develop_course_personel
	where cp_id='$_GET[cp_id]'");

//insert table develop_log
$sql2="insert into $db_eform.develop_log (dl_id, 
			dev_id, 
			per_id, 
			dl_status, 
			dl_ipstamp) 
			values ('".strtoupper(random_password('6'))."', 
			'$dev_id', 
			'$_SESSION[ses_per_id]', 
			'Edit', 
			'".$_SERVER['REMOTE_ADDR']."')";
mysql_query($sql2);

header("location: editform_2.php?getTrackid=".$_GET['getTrackid']);
?>