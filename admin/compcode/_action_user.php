<?php
session_start();

include('include/config.php');
include('check_login.php');
include('include/connect_db.php');
include('include/function.php');

if($_GET['action'] == 'remove'){
	
	$sql="delete from $db_eform.develop_user where du_id = '$_GET[du_id]'";
	mysql_query($sql);

}else if($_POST['action'] == 'update'){
	
	$sql = mysql_query("update $db_eform.develop_user set
		du_status = '$_POST[du_status]',
		du_ipstamp = '".$_SERVER['REMOTE_ADDR']."'
		where per_id = '$_POST[per_id]'");
	
}

header("location: _show_alluser.php");
?>