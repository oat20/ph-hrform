<?php
ob_start();
session_start();
include("../admin/compcode/include/config.php"); 
include "../admin/compcode/include/connect_db.php";
require_once("../admin/compcode/include/function.php");

#no. 12_16
$date_step=$_REQUEST['date_step'];
$step=$_REQUEST['step'];
$act_step=$_REQUEST['act_step'];
$persent=$_REQUEST['persent'];
$bug_step=$_REQUEST['bug_step'];

if($date_step != "" and $step != "" and $act_step != ""){
	$sql="insert into project_step (pro_id, date_step, step, act_step,plan_step,bug_step) values ('$_SESSION[Max]', '$date_step', '$step', '$act_step','$persent','$bug_step')";
	mysql_query($sql);
	header("location: ../phpm/no9.php?f=f12");
}else{
	warning("! ยังกรอกข้อมูลไม่ครบถ้วน");
}

ob_end_flush();
?>