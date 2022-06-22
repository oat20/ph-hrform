<?php
ob_start();
session_start();
include("../admin/compcode/include/config.php"); 
include "../admin/compcode/include/connect_db.php";
require_once("../admin/compcode/include/function.php");

#no. 11
$reason2=$_REQUEST['reason2'];
	$sql="update project set reason2='$reason2'
	where pro_id='$_SESSION[Max]'";
	mysql_query($sql);
	header("location: ../phpm/no9.php?f=f14");

ob_end_flush();
?>