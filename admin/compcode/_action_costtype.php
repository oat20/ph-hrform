<?php
session_start();
include('include/config.php');
//include('check_login.php');
include('include/connect_db.php');
include('include/function.php');

$tb = 'ph_hr_eform.develop_cost_type';

if($_POST['action'] == 'insert'){
	
	$sql="insert into $tb (ct_id, ct_title, ct_use, ct_ipstamp) 
	values ('".maxid($tb,'ct_id')."',
	'$_POST[ct_title]',
	'$_POST[ct_use]',
	'".$_SERVER['REMOTE_ADDR']."')";
	mysql_query($sql);
	
}else if($_POST['action'] == 'update'){
	
	$sql="update $tb set
	ct_title = '$_POST[ct_title]',
	ct_use = '$_POST[ct_use]',
	ct_ipstamp = '".$_SERVER['REMOTE_ADDR']."'
	where ct_id = '$_POST[ct_id]'";
	mysql_query($sql);
	
}else if($_GET['action'] == 'remove'){
	
	$sql="delete from $tb where ct_id = '$_GET[ct_id]'";
	mysql_query($sql);
	
}

header('location: _show_costtype.php');
?>