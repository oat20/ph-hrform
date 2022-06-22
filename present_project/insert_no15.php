<?php
ob_start();
session_start();
include("../admin/compcode/include/config.php"); 
include "../admin/compcode/include/connect_db.php";
require_once("../admin/compcode/include/function.php");

#no. 11
$act_id=$_REQUEST['act_id'];

if($act_id != ""){
	$sql="update project set act_id='$act_id'
	where pro_id='$_SESSION[Max]'";
	mysql_query($sql);
	header("location: ../phpm/no19.php");
}else{
	warning("! ยังกรอกข้อมูลไม่ครบถ้วน");
}
ob_end_flush();
?>