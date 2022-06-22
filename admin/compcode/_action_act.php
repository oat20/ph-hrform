<?php
session_start();
include('include/config.php');
include('check_login.php');
include('include/connect_db.php');
include('include/function.php');

if($_POST['action'] == 'insert'){
	
	$sql="insert into $db_eform.activity
	values ('".maxid($db_eform.'.activity','act_id')."',
	'$_POST[activity]',
	'$_POST[act_use]',
	'".maxid($db_eform.'.activity','act_order')."',
	'".date('Y-m-d H:i:s')."',
	'".$_SERVER['REMOTE_ADDR']."')";
	mysql_query($sql);
	
	header('location: _show_act.php');
	
}else if($_POST['action'] == 'update'){
	
	$sql="update $db_eform.activity set
	activity = '$_POST[activity]',
	act_use = '$_POST[act_use]',
	act_datestamp = '".date('Y-m-d H:i:s')."',
	act_ipstamp = '".$_SERVER['REMOTE_ADDR']."'
	where act_id = '$_POST[act_id]'";
	mysql_query($sql);
	
	header('location: _show_act.php');
	
}else if($_GET['action'] == 'remove'){
	
	$sql="delete from $db_eform.activity where act_id = '$_GET[act_id]'";
	mysql_query($sql);
	
	header('location: _show_act.php');
	
}
?>