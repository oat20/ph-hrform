<?php
session_start();
include('include/config.php');
//include('check_login.php');
include('include/connect_db.php');
include('include/function.php');

if($_POST['action'] == 'insert'){
	
	$sql="insert into $db_eform.develop_type
	values ('".maxid($db_eform.'.develop_type','dvt_id')."',
	'$_POST[dvt_name]',
	'$_POST[dvt_status]',
	'$_POST[dm_id]')";
	mysql_query($sql);
	header('location: _show_devtype.php');
	
}else if($_POST['action'] == 'update'){
	
	$sql="update $db_eform.develop_type set
	dvt_name = '$_POST[dvt_name]',
	dvt_status = '$_POST[dvt_status]',
	dm_id = '$_POST[dm_id]'
	where dvt_id = '$_POST[dvt_id]'";
	mysql_query($sql);
	header('location: _show_devtype.php');
	
}else if($_GET['action'] == 'remove'){
	
	$sql="delete from $db_eform.develop_type where dvt_id = '$_GET[dvt_id]'";
	mysql_query($sql);
	header('location: _show_devtype.php');
	
}
?>