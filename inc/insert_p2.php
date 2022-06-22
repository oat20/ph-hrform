<?php
ob_start();
session_start();
include("../admin/compcode/include/config.php"); 
include "../admin/compcode/include/connect_db.php";
require_once("../admin/compcode/include/function.php");

$sub_id=$_POST['sub_id'];
$submit=$_POST['submit'];
if($submit=='ถัดไป >'){
	if($sub_id != ""){
		$sql="update project set sub_id='$sub_id' where pro_id='$_SESSION[Max]'";
		mysql_query($sql);
		header("location: ../phpm/present_project_p3.php");
	}else{
		warning("ยังไม่ได้เลือกข้อมูล");
	}
}

ob_end_flush();
?>