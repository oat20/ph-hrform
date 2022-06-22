<?php
ob_start();
session_start();
include("../admin/compcode/include/config.php"); 
include "../admin/compcode/include/connect_db.php";
require_once("../admin/compcode/include/function.php");
include("../admin/compcode/check_login.php");

$pro_id=$_POST['pro_id'];

#project_ind
$pro_ind_id=$_POST['pro_ind_id'];
$m6=$_POST['m6'];
$m12=$_POST['m12'];
#print $m6." ".$m12;
#project
$pro_sum2=$_POST['pro_sum2'];
$persent=$_POST['persent'];

#project_log
$per_name=$_POST['per_name'];
$DeID=$_POST['DeID'];
$per_tel=$_POST['per_tel'];
$per_email=$_POST['per_email'];

#if($persent != "" and $per_sum2 != "" and $per_name !="" and $DeID !="" and $per_email !="")
#{
	#for($i=0;$i<=count($pro_ind_id);$i++)
	#{
		#$sql="update project_ind set m6='$m6[$i]',m12='$m12[$i]' 
		#where id='$pro_ind_id[$i]'";
		#$rs=mysql_query($sql);
	#}
	
	$sql5="update project set 
	budget_year = '$_POST[budget_year]',
	names = '$_POST[names]',
	typ_id = '$_POST[typ_id]',
	str_id = '$_POST[str_id]',
	pro_start = '$_POST[startdate]',
	pro_end = '$_POST[enddate]',
	pro_rate = '$persent',
	problem = '$_POST[pro_sum1]',
	pro_sum2 = '$pro_sum2' 
	where pro_id = '$pro_id'";
	$rs5=mysql_query($sql5);
	
	$sql6="insert into project_log (pro_id,per_name,DeID,per_tel,per_email,modified,ip_log,status) values ('$pro_id','$per_name','$DeID','$per_tel','$per_email','$date_create','$remoteip','2')";
	$rs6=mysql_query($sql6);
	
	#header("location: ../phpm/report_pa.php");
	#header("location: ../phpm/pa.php");
	echo"<script language='JavaScript'>";
								echo"alert('บันทึกข้อมูลเรียบร้อย');";
								echo"window.location='".$livesite."phpm/pa.php';";
								echo"</script>";
#}
#else
#{
	#warning2("! ยังกรอกข้อมูลไม่ครบถ้วน",$livesite);
#}

ob_end_flush();
?>