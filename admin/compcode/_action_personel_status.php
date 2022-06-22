<?php
session_start();
include('include/config.php');
include('include/connect_db.php');
include('include/function.php');

if($_POST['action'] == 'insert'){
	
	//$ps_order = maxid($db_eform.'.personel_status', 'ps_order');
	//$ps_id = '0'.$ps_order;
	
	$sql="insert into $db_eform.personel_status (ps_id, 
	ps_title, 
	ps_use, 
	ps_flag, 
	ps_order)
	values ('".strtoupper(random_password('2'))."',
	'$_POST[ps_title]',
	'yes',
	'$_POST[ps_flag]',
	'$ps_order')";
	mysql_query($sql);
	
}else if($_POST['action'] == 'update'){
	
	$sql="update $db_eform.personel_status set
	ps_title = '$_POST[ps_title]',
	ps_flag = '$_POST[ps_flag]'
	where ps_id='$_POST[ps_id]'";
	mysql_query($sql);
	
}else if($_GET['action'] == 'remove'){
	
	//$sql="delete from $db_eform.personel_status where ps_id='$_GET[ps_id]'";
	$sql="update $db_eform.personel_status set ps_use = 'no' where ps_id='$_GET[ps_id]'";
	mysql_query($sql);
	
}

header('location: _show_personel_status.php');
?>