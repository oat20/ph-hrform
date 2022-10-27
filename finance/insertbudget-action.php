<?php
ob_start();
session_start();

include('../admin/compcode/include/config.php');
include('../admin/compcode/check_login.php');
require_once '../lib/mysqli.php';
include('../admin/compcode/include/connect_db.php');
include('../admin/compcode/include/function.php');

foreach($_POST['dp_id'] as $value){
	//echo $_POST['budget_year'].', '.$_POST['db_budget'.$value].', '.$_POST['db_staff'.$value].', '.$value.'<br>';
	$sql=mysqli_query($condb,"insert into $db_eform.department_budget (db_id,
			db_year,
			dp_id,
			db_staff,
			db_budget,
			db_datestamp,
			db_userstamp)
			values ('".maxid($condb,$db_eform.'.department_budget', 'db_id')."',
			'$_POST[budget_year]',
			'$value',
			'".$_POST["db_staff".$value]."',
			'".$_POST["db_budget".$value]."',
			'".date('Y-m-d H:i:s')."',
			'$_SESSION[ses_per_id]')");
}
foreach($_POST['dp_id2'] as $value){
	//echo $_POST['budget_year'].', '.$_POST['db_budget02'.$value].', '.$_POST['db_staff02'.$value].', '.$value.'<br>';
	$sql=mysqli_query($condb,"insert into $db_eform.department_budget (db_id,
			db_year,
			dp_id,
			db_staff,
			db_budget,
			db_datestamp,
			db_userstamp)
			values ('".maxid($condb,$db_eform.'.department_budget', 'db_id')."',
			'$_POST[budget_year]',
			'$value',
			'".$_POST["db_staff02".$value]."',
			'".$_POST["db_budget02".$value]."',
			'".date('Y-m-d H:i:s')."',
			'$_SESSION[ses_per_id]')");
}

header('location: index.php');
?>