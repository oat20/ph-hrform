<?php
session_start();
include('include/config.php');
//include('check_login.php');
include('include/connect_db.php');
include('include/function.php');

$tb = $db_eform.'.degree';

if($_POST['action'] == 'insert'){
	
	$dg_id = strtoupper(random_password('2'));
	
	$sql="insert into $tb (dg_id,
	dg_name, 
	dg_status,
	modify_from) 
	values ('$dg_id',
	'$_POST[dg_name]',
	'1',
	'$remoteip')";
	mysql_query($sql);
	
}else if($_POST['action'] == 'update'){
	
	$sql="update $tb set
	dg_name = '$_POST[dg_name]',
	modify_from = '$remoteip'
	where dg_id = '$_POST[dg_id]'";
	mysql_query($sql);
	
}else if($_GET['action'] == 'remove'){
	
	$sql="update $db_eform.degree set 
		dg_status='0',
		modify_from = '$remoteip'
			where dg_id='$_GET[dg_id]'";
	//$sql = "delete from $tb where dg_id='$_GET[dg_id]'";
	mysql_query($sql);
	
}

header('location: _show_degree.php');
?>