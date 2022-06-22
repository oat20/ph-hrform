<?php
session_start();
include('include/config.php');
//include('check_login.php');
include('include/connect_db.php');
include('include/function.php');

$tb = 'ph_hr_eform.develop_payfrom';

if($_POST['action'] == 'insert'){
	
	$sql="insert into $tb (pf_id, pf_title, pf_use, pf_ipstamp) 
	values ('".maxid($tb,'pf_id')."',
	'$_POST[pf_title]',
	'$_POST[pf_use]',
	'".$_SERVER['REMOTE_ADDR']."')";
	mysql_query($sql);
	
}else if($_POST['action'] == 'update'){
	
	$sql="update $tb set
	pf_title = '$_POST[pf_title]',
	pf_use = '$_POST[pf_use]',
	pf_ipstamp = '".$_SERVER['REMOTE_ADDR']."'
	where pf_id = '$_POST[pf_id]'";
	mysql_query($sql);
	
}else if($_GET['action'] == 'remove'){
	
	$sql="delete from $tb where pf_id = '$_GET[pf_id]'";
	mysql_query($sql);
	
}

header('location: _show_payfrom.php');
?>