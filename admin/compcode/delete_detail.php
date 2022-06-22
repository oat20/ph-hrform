<?php
ob_start();
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-874" />
<title>Untitled Document</title>
</head>

<body>
<?
include("include/config.php");
 include "include/connect_db.php";
require_once("include/function.php");

$pro_id=$_GET[pro_id];

$sql_e="select pro_att 
from  project 
where pro_id='$pro_id'";
			$exec_e=mysql_query($sql_e);
			$rs1= mysql_fetch_array($exec_e);
					$name_x=$rs1[pro_att];
					unlink("../../phpm/attachment/".$name_x);

			$sql="delete from project where pro_id='$pro_id'";
			mysql_query($sql);
			
			$sql2="delete from project_budtype where pro_id='$pro_id'";
			mysql_query($sql2);
			
			$sql3="delete from project_ind where pro_id='$pro_id'";
			mysql_query($sql3);
			
			$sql4="delete from project_pol where pro_id='$pro_id'";
			mysql_query($sql4);
			
			$sql5="delete from project_res where pro_id='$pro_id'";
			mysql_query($sql5);
			
			$sql6="delete from project_resource where pro_id='$pro_id'";
			mysql_query($sql6);
			
			$sql7="delete from project_step where pro_id='$pro_id'";
			mysql_query($sql7);
			
			$sql8="delete from project_str_fac where pro_id='$pro_id'";
			mysql_query($sql8);
			
			$sql9="delete from project_suc where pro_id='pro_id'";
			mysql_query($sql9);
			
header("location: ../../phpm/myProject.php");
?>
</body>
</html>
<?php
ob_end_flush();
?>