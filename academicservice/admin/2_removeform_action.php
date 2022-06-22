<?php 
session_start();

include("../../admin/compcode/include/config.php");
include('../../admin/compcode/check_login.php'); 
include "../../admin/compcode/include/connect_db.php";
include('../../admin/compcode/include/function.php');

//mysql_query("update $db_eform.develop set dev_remove='yes', dev_cancel='yes' where dev_id='$_GET[getDevid]'");
mysql_query("delete from $db_eform.develop where dev_id='$_GET[getDevid]'");
mysql_query("delete from $db_eform.develop_course_personel where dev_id='$_GET[getDevid]'");
mysql_query("delete from $db_eform.develop_form_budget where dev_id='$_GET[getDevid]'");
mysql_query("delete from $db_eform.develop_form_cost where dev_id='$_GET[getDevid]'");
mysql_query("delete from $db_eform.develop_cancel where dev_id='$_GET[getDevid]'");

mysql_query("insert into $db_eform.develop_log (dl_id, 
					dev_id, 
					per_id, 
					dl_status, 
					dl_ipstamp) 
					values ('".strtoupper(random_password('6'))."', 
					'$_GET[getDevid]', 
					'$_SESSION[ses_per_id]', 
					'Remove', 
					'".$_SERVER['REMOTE_ADDR']."')");

header('location: 2_allform.php');
?>