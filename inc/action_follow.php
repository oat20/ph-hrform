<?php
ob_start();
session_start();
include("../admin/compcode/include/config.php"); 
include "../admin/compcode/include/connect_db.php";
require_once("../admin/compcode/include/function.php");

$pro_id=$_POST['pro_id'];

#project_ind
$pro_ind_id=$_POST['pro_ind_id'];
$result=$_POST['result'];

#project_pay
$q11=$_POST['q11'];
$q22=$_POST['q22'];
$q33=$_POST['q22'];
$q44=$_POST['q22'];

#project_step
$result_bud=$_POST['result_bud'];
$result_step=$_POST['result_step'];
$persent=$_POST['persent'];
$pro_step_id=$_POST['pro_step_id'];

#project_suc
$suc_id=$_POST['suc_id'];

#project
$sum1=$_POST['sum1'];

#project_att
$att=$_FILES['att']['name'];

#project_log
$per_name=$_POST['per_name'];
$DeID=$_POST['DeID'];
$per_tel=$_POST['per_tel'];
$per_email=$_POST['per_email'];

#if($result != "" and $q11 != "" and $q22!="" and $q33!="" and $q44!="" and $result_bud!="" and $result_step!="" and $persent!="" and $suc_id!="" and $sum1!="" and $per_name!="" and $DeID!="" and $per_email!="")
#{
	#for($i=0;$i<=count($pro_ind_id);$i++)
	#{
		#$sql="update project_ind set result='$result[$i]' where id='$pro_ind_id[$i]'";
		#$rs=mysql_query($sql);
	#}
	
	#$sql2="update project_pay set q11='$q11', q22='$q22', q33='$q33', q44='$q44'
	#where pro_id='$pro_id'";
	#$rs2=mysql_query($sql2);
	
	#for($j=0;$j<=count($pro_step_id);$j++)
	#{
		#$sql3="update project_step set result_bug='$result_bud[$j]', result_step='$result_step[$j]', result_persent='$persent[$j]'
		#where id='$pro_step_id[$j]'";
		#$rs3=mysql_query($sql3);
	#}
	
	#foreach($suc_id as $k=>$v)
	#{
		#$sql4="insert into project_suc (pro_id,suc_id) values ('$pro_id','$v')";
		#$rs4=mysql_query($sql4);
	#}
	
	$sql5="update project set 
	budget_year = '$_POST[budget_year]',
	names = '$_POST[names]',
	DeID_main = '$_POST[DeID_main]',
	sec_id = '$_POST[sec_id]',
	typ_id = '$_POST[typ_id]',
	str_id = '$_POST[str_id]',
	obj_id = '$_POST[obj_id]',
	reason = '$_POST[reason]',
	pro_obj = '$_POST[pro_obj]',
	pro_start = '$_POST[startdate]',
	pro_end = '$_POST[enddate]',
	act_id = '$_POST[act_id]',
	pro_sum1 = '$_POST[sum1]'
	where pro_id = '$pro_id'";
	$rs5=mysql_query($sql5);
	
	$sql6="insert into project_log (pro_id,per_name,DeID,per_tel,per_email,modified,ip_log,status) values ('$pro_id','$per_name','$DeID','$per_tel','$per_email','$date_create','$remoteip','1')";
	$rs6=mysql_query($sql6);
	
	header("location: ../phpm/follow.php");
#}
#else
#{
	#warning2("! ยังกรอกข้อมูลไม่ครบถ้วน",$livesite);
#}

ob_end_flush();
?>