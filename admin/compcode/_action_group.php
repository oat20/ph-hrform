<?php
session_start();
include('include/config.php');
include('include/connect_db.php');
include('include/function.php');

if($_POST['action'] == 'insert'){
	
	//$gr_id = '0'.maxid($db_eform.'.personel_group','gr_order');
	$sql="insert into $db_eform.personel_group (gr_id,
	gr_title,
	gr_use,
	gr_created,
	gr_createdfrom,
	gr_datestamp,
	gr_ipstamp)
	values (
	'".strtoupper(random_password('2'))."',
	'$_POST[gr_title]',
	'yes',
	'".date('Y-m-d H:i:s')."',
	'".$_SERVER['REMOTE_ADDR']."',
	'".date('Y-m-d H:i:s')."',
	'".$_SERVER['REMOTE_ADDR']."')";
	mysql_query($sql);
	header('location: _show_group.php');
	
}else if($_POST['action'] == 'update'){
	
	$sql="update $db_eform.personel_group set
	gr_title='$_POST[gr_title]',
	gr_datestamp='".date('Y-m-d H:i:s')."',
	gr_ipstamp='".$_SERVER['REMOTE_ADDR']."'
	where gr_id='$_POST[gr_id]'";
	mysql_query($sql);
	header('location: _show_group.php');
	
}else if($_GET['action'] == 'remove'){
	
	//$sql="delete from $db_eform.personel_group where gr_id='$_GET[gr_id]'";
	$sql = "update $db_eform.personel_group set gr_use = 'no' where gr_id='$_GET[gr_id]'";
	mysql_query($sql);
	header('location: _show_group.php');
	
}
?>