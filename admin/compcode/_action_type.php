<?php
session_start();
include('include/config.php');
include('include/connect_db.php');
include('include/function.php');

if($_POST['action'] == 'insert'){
	
	$pert_order = maxid($db_eform.'.personel_type','pert_order');
	$pert_id = '0'.$pert_order;
	
	$sql="insert into $db_eform.personel_type (pert_id,
	pert_name,
	pert_status,
	ipstamp,
	pert_order,
	pert_created,
	pert_createdfrom) 
	values (
	'$pert_id',
	'$_POST[pert_name]',
	'1',
	'".$_SERVER['REMOTE_ADDR']."',
	'$pert_order',
	'$date_create',
	'$remoteip')";
	mysql_query($sql);
	
	header('location: _show_type.php');
	
}else if($_POST['action'] == 'update'){
	
	$sql="update $db_eform.personel_type set
	pert_name='$_POST[pert_name]',
	ipstamp = '".$_SERVER['REMOTE_ADDR']."'
	where pert_id='$_POST[pert_id]'";
	mysql_query($sql);
	
	header('location: _show_type.php');
	
}else if($_GET['action'] == 'remove'){
	
	//$sql="delete from $db_eform.personel_type where pert_id='$_GET[pert_id]'";
	$sql="update $db_eform.personel_type set pert_status='0' where pert_id = '$_GET[pert_id]'";
	mysql_query($sql);
	header('location: _show_type.php');
	
}
?>