<?php 
session_start();

include("../admin/compcode/include/config.php");
include('../admin/compcode/check_login.php'); 
include "../admin/compcode/include/connect_db.php";
include('../admin/compcode/include/function.php');

mysql_query("update phper2.develop set dev_remove='yes' where dev_id='$_GET[getDevid]'");

mysql_query("insert into phper2.develop_log (dl_id, 
					dev_id, 
					per_id, 
					dl_status, 
					dl_ipstamp) 
					values ('".strtoupper(random_password('6'))."', 
					'$_GET[getDevid]', 
					'$_SESSION[ses_per_id]', 
					'Remove', 
					'".$_SERVER['REMOTE_ADDR']."')");

header('location: ../profile/_showmyproject.php');
?>