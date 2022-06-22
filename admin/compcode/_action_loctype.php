<?php
session_start();
include('include/config.php');
//include('check_login.php');
include('include/connect_db.php');
include('include/function.php');

if($_POST['action'] == 'insert'){
	
	$sql="insert into $db_eform.develop_location_type
	values ('".date('Y').'-'.random_password('2')."',
	'$_POST[lt_title]',
	'$_POST[lt_use]',
	'".maxid($db_eform.'.develop_location_type','lt_order')."',
	'".date('Y-m-d H:i:s')."',
	'".$_SERVER['REMOTE_ADDR']."')";
	mysql_query($sql);
	
	header('location: _show_loctype.php');
	
}else if($_POST['action'] == 'update'){
	
	$sql="update $db_eform.develop_location_type set
	lt_title = '$_POST[lt_title]',
	lt_use = '$_POST[lt_use]',
	lt_datestamp = '".date('Y-m-d H:i:s')."',
	lt_ipstamp = '".$_SERVER['REMOTE_ADDR']."'
	where lt_id = '$_POST[lt_id]'";
	mysql_query($sql);
	header('location: _show_loctype.php');
	
}else if($_GET['action'] == 'remove'){
	
	$sql="delete from $db_eform.develop_location_type where lt_id = '$_GET[lt_id]'";
	mysql_query($sql);
	header('location: _show_loctype.php');
	
}
?>