<?php
session_start();
include('include/config.php');
include('check_login.php');
include('include/connect_db.php');
include('include/function.php');

if($_POST['action'] == 'insert'){
	
	$sql="insert into $db_eform.job (job_id,
	job_name,
	job_status,
	job_modify,
	job_modifyfrom,
	job_created,
	job_createdfrom) 
	values (
	'".date('Y').'-'.random_password('2')."',
	'$_POST[job_name]',
	'1',
	'".date('Y-m-d H:i:s')."',
	'$remoteip',
	'".date('Y-m-d H:i:s')."',
	'$remoteip')";
	mysql_query($sql);
	header('location: _show_job.php');
	
}else if($_POST['action'] == 'update'){
	
	$sql="update $db_eform.job set
	job_name='$_POST[job_name]',
	job_modify='".date('Y-m-d H:i:s')."',
	job_modifyfrom = '$remoteip'
	where job_id='$_POST[job_id]'";
	mysql_query($sql);
	header('location: _show_job.php');
	
}else if($_GET['action'] == 'remove'){
	
	//$sql="delete from phper2.job where job_id='$_GET[job_id]'";
	$sql="update $db_eform.job set job_status = '0' where job_id='$_GET[job_id]'";
	mysql_query($sql);
	header('location: _show_job.php');
	
}
?>