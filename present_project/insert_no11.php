<?php
ob_start();
session_start();
include("../admin/compcode/include/config.php"); 
include "../admin/compcode/include/connect_db.php";
require_once("../admin/compcode/include/function.php");

#no. 11
$pro_start=$_REQUEST['startdate'];
$pro_end=$_REQUEST['enddate'];
if($pro_start != "" and $pro_end != ""){
	$sql="update project set pro_start='$pro_start', pro_end='$pro_end'
	where pro_id='$_SESSION[Max]'";
	mysql_query($sql);
	header("location: ../phpm/no9.php?f=f12");
}else{
	warning("! ยังกรอกข้อมูลไม่ครบถ้วน");
}

ob_end_flush();
?>