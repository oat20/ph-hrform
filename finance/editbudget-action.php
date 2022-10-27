<?php
session_start();

include('../admin/compcode/include/config.php');
include('../admin/compcode/check_login.php');
require_once '../lib/mysqli.php';
include('../admin/compcode/include/connect_db.php');
include('../admin/compcode/include/function.php');

foreach($_POST['db_id'] as $value){
	$sql=mysqli_query($condb,"update $db_eform.department_budget set
			db_budget='".$_POST["db_budget".$value]."',
			db_year='$_POST[budget_year]',
			db_datestamp='".date('Y-m-d H:i:s')."',
			db_userstamp='$_SESSION[ses_per_id]'
			where db_id='$value'");
}

foreach($_POST['db_id02'] as $value){
	$sql=mysqli_query($condb,"update $db_eform.department_budget set
			db_budget='".$_POST["db_budget02".$value]."',
			db_year='$_POST[budget_year]',
			db_datestamp='".date('Y-m-d H:i:s')."',
			db_userstamp='$_SESSION[ses_per_id]'
			where db_id='$value'");
}

header('location: index.php');
?>