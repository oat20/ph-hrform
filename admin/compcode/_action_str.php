<?php
session_start();
include('include/config.php');
//include('check_login.php');
include('include/connect_db.php');
include('include/function.php');

if($_POST['action'] == 'insert'){
	
	$sql="insert into $db_eform.sub_strategic (id,
	nameth,
	modified,
	ss_use)
	values ('".maxid($db_eform.'.sub_strategic','id')."',
	'$_POST[nameth]',
	'".date('Y-m-d H:i:s')."',
	'$_POST[ss_use]')";
	mysql_query($sql);
	header('location: _show_substr.php');
	
}else if($_POST['action'] == 'update'){
	
	$sql="update $db_eform.sub_strategic set
	nameth = '$_POST[nameth]',
	modified = '".date('Y-m-d H:i:s')."',
	ss_use = '$_POST[ss_use]'
	where id = '$_POST[id]'";
	mysql_query($sql);
	header('location: _show_substr.php');
	
}else if($_GET['action'] == 'remove'){
	
	$sql="delete from $db_eform.sub_strategic where id = '$_GET[id]'";
	mysql_query($sql);
	header('location: _show_substr.php');
	
}
?>