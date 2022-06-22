<?php
ob_start();
session_start();

include("include/config.php");
 include "include/connect_db.php";
  include("check_login.php");
  include("include/function.php");
  
if($_POST["action"]=="save")
{
	$att_name=$_FILES['attach']['name'];
	$att_type=$_FILES['attach']['type'];
	$att_size=$_FILES['attach']['size'];
	$id=random_ID("5","2");

	copy($attach,"../../phpm/attachment/".$att_name) or die( "ไม่สามารถ Copy ได้" );
	
	$sql="insert into project_att (id,pro_id,display,attach,att_type,att_size,days)
	values ('$id','$_POST[pro_id]','$_POST[display_name]','$att_name','$att_type','$att_size','$date_create')";
	mysql_query($sql);
	
	header("location: ".$livesite."phpm/attach.php?pro_id=".$_POST["pro_id"]);
}

ob_end_flush();
?>
