<?php
session_start();
include('include/config.php');
include('check_login.php');
include('include/connect_db.php');
include('include/function.php');

if($_POST['action'] == 'insert'){
	
	$sql="insert into $db_eform.strategic_faculty (sf_id,
	sf_name,
	sf_use,
	modified)
	values ('".maxid($db_eform.'.strategic_faculty','sf_id')."',
	'$_POST[sf_name]',
	'$_POST[sf_use]',
	'".date('Y-m-d H:i:s')."')";
	mysql_query($sql);
	header('location: _show_strfac.php');
	
}else if($_POST['action'] == 'update'){
	
	$sql="update $db_eform.strategic_faculty set
	sf_name = '$_POST[sf_name]',
	sf_use = '$_POST[sf_use]',
	modified = '".date('Y-m-d H:i:s')."'
	where sf_id = '$_POST[sf_id]'";
	mysql_query($sql);
	header('location: _show_strfac.php');
	
}else if($_GET['action'] == 'remove'){
	
	$sql="delete from $db_eform.strategic_faculty where sf_id = '$_GET[sf_id]'";
	mysql_query($sql);
	header('location: _show_strfac.php');
	
}
?>