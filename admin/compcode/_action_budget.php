<?php
session_start();
include('include/config.php');
//include('check_login.php');
include('include/connect_db.php');
include('include/function.php');

if($_POST['action'] == 'insert'){
	
	$sql="insert into $db_eform.budtype (bt_id,
	bt_name,
	bt_flag,
	bt_ipstamp)
	values ('".maxid($db_eform.'.budtype','bt_id')."',
	'$_POST[bt_name]',
	'$_POST[bt_flag]',
	'".$_SERVER['REMOTE_ADDR']."')";
	mysql_query($sql);
	header('location: _show_budget.php');
	
}else if($_POST['action'] == 'update'){
	
	$sql="update $db_eform.budtype set
	bt_name = '$_POST[bt_name]',
	bt_flag = '$_POST[bt_flag]',
	bt_ipstamp = '".$_SERVER['REMOTE_ADDR']."'
	where bt_id = '$_POST[bt_id]'";
	mysql_query($sql);
	header('location: _show_budget.php');
	
}else if($_GET['action'] == 'remove'){
	
	$sql="delete from $db_eform.budtype where bt_id = '$_GET[bt_id]'";
	mysql_query($sql);
	header('location: _show_budget.php');
	
}
?>