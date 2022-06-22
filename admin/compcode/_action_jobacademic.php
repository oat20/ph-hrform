<?php
session_start();
include('include/config.php');
include('check_login.php');
include('include/connect_db.php');
include('include/function.php');

if($_POST['action'] == 'insert'){
	
	$ja_id = '0'.maxid($db_eform.'.job_academic','ja_order');
	
	$sql="insert into $db_eform.job_academic (ja_id,
	ja_name,
	ja_date,
	ja_use,
	ja_order) 
	values (
	'$ja_id',
	'$_POST[ja_name]',
	'".date('Y-m-d H:i:s')."',
	'$_POST[ja_use]',
	'".maxid($db_eform.'.job_academic','ja_order')."'
	)";
	mysql_query($sql);
	header('location: _show_jobacademic.php');
	
}else if($_POST['action'] == 'update'){
	
	$sql="update $db_eform.job_academic set
	ja_name = '$_POST[ja_name]',
	ja_date = '".date('Y-m-d H:i:s')."',
	ja_use = '$_POST[ja_use]'
	where ja_id = '$_POST[ja_id]'";
	mysql_query($sql);
	header('location: _show_jobacademic.php');
	
}else if($_GET['action'] == 'remove'){
	
	$sql="delete from $db_eform.job_academic where ja_id='$_GET[ja_id]'";
	mysql_query($sql);
	header('location: _show_jobacademic.php');
	
}
?>