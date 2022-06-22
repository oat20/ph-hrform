<?php
session_start();
include('include/config.php');
include('check_login.php');
include('include/connect_db.php');
include('include/function.php');

if($_POST['action'] == 'insert'){
	
	$sql="insert into $db_eform.job_special (jobs_id,
	jobs_name,
	jobs_status,
	jobs_created,
	jobs_createdfrom,
	jobs_modify,
	jobs_modifyfrom)
	values ('".strtoupper(random_ID('6','0'))."',
	'$_POST[jobs_name]',
	'1',
	'$date_create',
	'$remoteip',
	'$date_create',
	'$remoteip')";
	mysql_query($sql);
	header('location: _show_jobspecial.php');
	
}else if($_POST['action'] == 'update'){
	
	$sql="update $db_eform.job_special set
	jobs_name = '$_POST[jobs_name]',
	jobs_modifyfrom = '$remoteip'
	where jobs_id = '$_POST[jobs_id]'";
	mysql_query($sql);
	header('location: _show_jobspecial.php');
	
}else if($_GET['action'] == 'remove'){
	
	//$sql="delete from phper2.job_special where jobs_id='$_GET[jobs_id]'";
	$sql="update $db_eform.job_special set
		jobs_status = '0',
		jobs_modifyfrom = '$remoteip'
		where jobs_id='$_GET[jobs_id]'";
	mysql_query($sql);
	header('location: _show_jobspecial.php');
	
}
?>