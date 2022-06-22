<?php
ob_start();
session_start();
include("../admin/compcode/include/config.php"); 
include "../admin/compcode/include/connect_db.php";
require_once("../admin/compcode/include/function.php");

#no. 8
#$reason=$_REQUEST['reason'];
#no. 9
$pro_obj=$_REQUEST['pro_obj'];
#no. 10
#$pro_traget_group=$_REQUEST['pro_traget_group'];
#$pro_area=$_REQUEST['pro_area'];
#no. 11
#$pro_start=$_REQUEST['pro_start'];
#$pro_end=$_REQUEST['pro_end'];

#if($reason != "" and $pro_obj != "" and $pro_target_group != "" and $pro_area != "" and $pro_start != "" and $pro_end != ""){
if($pro_obj != ""){
		$sql="update project set pro_obj='$pro_obj' 
		where pro_id='$_SESSION[Max]'";
		mysql_query($sql);
		header("location: ../phpm/no9.php?f=f10");
}else{
	warning("! ยังกรอกข้อมูลไม่ครบถ้วน");
}

ob_end_flush();
?>