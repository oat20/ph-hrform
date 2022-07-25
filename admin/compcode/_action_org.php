<?php
session_start();
include('include/config.php');
include('check_login.php');
require_once '../../lib/mysqli.php';
include('include/connect_db.php');
include('include/function.php');

if($_POST['action'] == 'insert'){
	
	$dp_id = maxid($condb, $db_eform.'.tb_orgnew','dp_id');
	
	$sql="insert into $db_eform.tb_orgnew (dp_id,
	dp_name,
	typ_id,
	dp_code) 
	values ('$dp_id',
	'$_POST[dp_name]',
	'$_POST[typ_id]',
	'".strtoupper($_POST['dp_code'])."')";
	mysqli_query($condb, $sql);
	
	$sql_02 = mysqli_query($condb, "insert into $db_eform.per_boss (per_id,
					dp_id,
					pb_datestamp,
					pb_updateby)
					values ('$_POST[per_id]',
					'$dp_id',
					'".date('Y-m-d H:i:s')."',
					'".$_SESSION['ses_peremail']."')");
	mysqli_query($condb, "update $db_eform.personel_muerp set
		per_isboss=1
		where per_id='$_POST[per_id]'");
	
	mysqli_query($condb, "insert into $db_eform.per_dean (de_id,
		per_id,
		dp_id)
		values ('".random_ID('4', '2')."',
		'$_POST[dean]',
		'$dp_id')");
	
	header('location: _show_dep.php');
	
}else if($_POST['action'] == 'update'){
	
	$sql="update $db_eform.tb_orgnew set
	dp_name = '$_POST[dp_name]',
	typ_id = '$_POST[typ_id]',
	dp_code='".strtoupper($_POST['dp_code'])."'
	where dp_id = '$_POST[dp_id]'";
	mysqli_query($condb, $sql);
	
	//update boss
	$sql02=mysqli_query($condb, "select per_id from $db_eform.per_boss where dp_id='$_POST[dp_id]'");
	$ob02=mysqli_fetch_assoc($sql02);
	mysqli_query($condb, "update $db_eform.personel_muerp set per_isboss=0 where per_id='$ob02[per_id]'");
	mysqli_query($condb, "delete from $db_eform.per_boss where dp_id = '$_POST[dp_id]'");
	mysqli_query($condb, "insert into $db_eform.per_boss (pb_id,
					per_id,
					dp_id,
					pb_datestamp,
					pb_updateby)
					values ('".date('Y').random_ID('4', '2')."',
					'$_POST[per_id]',
					'$_POST[dp_id]',
					'".date('Y-m-d H:i:s')."',
					'".$_SESSION['ses_peremail']."')");
	mysqli_query($condb, "update $db_eform.personel_muerp set
		per_isboss=1
		where per_id='$_POST[per_id]'");
	//update boss
					
	mysqli_query($condb, "delete from $db_eform.per_dean where dp_id = '$_POST[dp_id]'");
	mysqli_query($condb, "insert into $db_eform.per_dean (de_id,
		per_id,
		dp_id)
					values ('".random_ID('4', '2')."',
					'$_POST[dean]',
					'$_POST[dp_id]'
					)");
	
	header('location: _show_dep.php');
	
}else if($_GET['action'] == 'remove'){
	
	$sql="delete from $db_eform.tb_orgnew where dp_id='$_GET[dp_id]'";
	mysqli_query($condb, $sql);
	mysqli_query($condb, "delete from $db_eform.per_boss where dp_id='$_GET[dp_id]'");
	mysqli_query($condb, "delete from $db_eform.per_dean where dp_id='$_GET[dp_id]'");

	mysqli_query($condb, "update $db_eform.personel_muerp set
		per_isboss = '0'
		where per_dept = '$_GET[dp_id]'
	");
	
	//mysql_query("delete from phper2.per_boss where dp_id = '$_GET[dp_id]'");
	header('location: _show_dep.php');
	
}
?>