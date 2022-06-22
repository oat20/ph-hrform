<?php
ob_start();
session_start();
include("../admin/compcode/include/config.php"); 
include "../admin/compcode/include/connect_db.php";
require_once("../admin/compcode/include/function.php");

#no. 19
$pro_resource=$_REQUEST['pro_resource'];
$pro_resource_from=$_REQUEST['pro_resource_from'];

if($pro_resource != "" and $pro_resource_from != ""){
	$sql="update project set pro_resource='$pro_resource', pro_resource_from='$pro_resource_from'
	where pro_id='$_SESSION[Max]'";
	mysql_query($sql);
	header("location: ../phpm/no20.php");
}else{
	warning("! ยังกรอกข้อมูลไม่ครบถ้วน");
}

ob_end_flush();
?>