<?php
ob_start();
session_start();
include("../admin/compcode/include/config.php"); 
include "../admin/compcode/include/connect_db.php";
require_once("../admin/compcode/include/function.php");

#no. 12_16
$ind_name=$_REQUEST['ind_name'];
$ind_id=$_REQUEST['ind_id'];
$ind_type_id=$_REQUEST['ind_type_id'];
$plan=$_REQUEST['plan'];
$count=$_REQUEST['count'];

if($ind_name != "" and $ind_id != "" and $ind_type_id != "" and $plan != "" and $count != ""){
	$sql="insert into project_ind (pro_id, ind_name, ind_id, ind_type_id, plan, count) values ('$_SESSION[Max]', '$ind_name', '$ind_id', '$ind_type_id', '$plan', '$count')";
	mysql_query($sql);
	header("location: ../phpm/no9.php?f=f14");
}else{
	warning("! ยังกรอกข้อมูลไม่ครบถ้วน");
}

ob_end_flush();
?>