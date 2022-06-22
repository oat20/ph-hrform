<?php
session_start();
include('include/config.php');
//include('check_login.php');
include('include/connect_db.php');
include('include/function.php');

$tb = 'ph_hr_eform.develop_level';

if($_POST['action'] == 'insert'){
	
	$sql="insert into $tb (le_id, le_title, le_use)
	values ('".strtoupper(random_id('2','0'))."', '$_POST[le_title]', '$_POST[le_use]')";
	mysql_query($sql);
	
}else if($_POST['action'] == 'update'){
	
	$sql="update $tb set
	le_title = '$_POST[le_title]',
	le_use = '$_POST[le_use]'
	where le_id = '$_POST[le_id]'";
	mysql_query($sql);
	
}else if($_GET['action'] == 'remove'){
	
	$sql="delete from $tb where le_id = '$_GET[le_id]'";
	mysql_query($sql);
	
}
	header('location: _show_level.php');
?>