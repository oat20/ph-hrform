<?php
session_start();
include('include/config.php');
//include('check_login.php');
include('include/connect_db.php');
include('include/function.php');

$tb = 'ph_hr_eform.country';

if($_POST['action'] == 'insert'){
	
	//$ct_id = maxid($tb, 'ct_id');
	
	$sql="insert into $tb (ct_id,
	ct_name) 
	values ('".strtoupper(random_password('2'))."',
	'$_POST[ct_name]')";
	mysql_query($sql);
	
}else if($_POST['action'] == 'update'){
	
	$sql="update $tb set
	ct_name = '$_POST[ct_name]'
	where ct_id = '$_POST[ct_id]'";
	mysql_query($sql);
	
}else if($_GET['action'] == 'remove'){
	
	$sql="delete from $tb where ct_id='$_GET[ct_id]'";
	mysql_query($sql);
	
}

header('location: country.php');
?>