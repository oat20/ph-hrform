<?php
session_start();

include("../admin/compcode/include/config.php");
require_once '../lib/mysqli.php'; 
include "../admin/compcode/include/connect_db.php";
require_once("../admin/compcode/include/function.php");
include("../admin/compcode/check_login.php");

$ja_name = mysqli_real_escape_string($condb, $_POST['ja_name']);
$sql_ja = mysqli_query($condb, "select ja_id from $db_eform.job_academic where ja_name like '%$ja_name%' order by rand() limit 1");
$row_ja = mysqli_fetch_assoc($sql_ja);
if($row_ja['ja_id'] != ''){
	$ja_id2 = $row_ja['ja_id'];
}else{
	$ja_id = date('YmdHis').random_ID('2', '0');
	mysqli_query($condb, "insert into $db_eform.job_academic (ja_id, ja_name) values ('$ja_id', '$ja_name')");
	$ja_id2 = $ja_id;
}

		if($_POST['action'] == "save")
		{
			$per_order = maxid($con, $db_eform.'.personel_muerp', 'per_order');
			$gen_perid = date('Y').'-0'.$per_order;
			$per_username=explode('@',$_POST['mumail']);
			if($_POST['per_flag']==''){ $per_flag='1'; }else if($_POST['per_flag'] == '0'){ $per_flag=$_POST['per_flag']; }
			
			#insert data personel
			$sql1= "INSERT INTO  $db_eform.personel_muerp (per_id,
			per_pname,
			per_fnamet, 
			per_lnamet,
			per_pname2,
			per_fnamee, 
			per_lnamee,
			per_dept,
			job_id,
			jobs_id,
			per_type,
			per_group,    
			per_sex,
			per_bhd,
			per_adddate,			
			per_status,
			created,
			created_by, 
			per_modify, 
			modify_by,
			per_yearin,
			per_order,
			per_createdfrom,
			per_modifyfrom,
			per_email,
			per_username,
			per_no,
			ja_id) 
			VALUES ('$gen_perid',
			'$_POST[per_pname]',
			'$_POST[per_fnamet]', 
			'$_POST[per_lnamet]',
			'$_POST[per_pname2]',
			'$_POST[per_fnamee]', 
			'$_POST[per_lnamee]', 
			'$_POST[per_dept]', 
			'$_POST[job_id]',
			'$_POST[jobs_id]',
			'$_POST[per_type]', 
			'$_POST[per_group]', 
			'$_POST[per_sex]',
			'$_POST[per_bhd]',
			'$_POST[per_adddate]', 
			'$_POST[per_status]', 
			'".date('Y-m-d H:i:s')."', 
			'".$_SESSION['ses_per_id']."', 
			'".date('Y-m-d H:i:s')."', 
			'".$_SESSION['ses_per_id']."',
			'".budgetyear_02($_POST['per_adddate'])."',
			'$per_order',
			'$_SERVER[REMOTE_ADDR]',
			'$_SERVER[REMOTE_ADDR]',
			'$_POST[mumail]',
			'$per_username',
			'".base64_encode($_POST['per_no'])."',
			'$ja_id2')";
			$exec1=mysqli_query($condb, $sql1);
							#insert data personel
							
							#insert education
			$sql2= "INSERT INTO  $db_eform.education (ed_id, 
				ed_perid, 
				ed_dgid, 
				ed_edu, 
				ed_institute, 
				ed_modify, 
				ses_id, 
				ed_country, 
				ed_ipstamp) 
				VALUES ('".random_ID('4','2')."', 
				'$gen_perid', 
				'$_POST[dg_id]', 
				'$_POST[ed_edu]', 
				'$_POST[ed_institute]', 
				'$date_create', 
				'".session_id()."', 
				'$_POST[ed_country]', 
				'".$_SERVER['REMOTE_ADDR']."')";
			$exec2=mysqli_query($condb, $sql2);
							#insert education

							mysqli_query($condb, "insert into $db_eform.develop_user (per_id, du_status) 
							values ('$gen_perid', '3')");

							mysqli_query($condb, "insert into $db_eform.personel_muerp_log (per_id, log_status, log_ipstamp) values ('$gen_perid', 'insert', '$remoteip')");
																					
			header('location: show_allpersonel.php');
		}
		else if($_POST['action'] == "edit")
		{
			$per_username=explode('@',$_POST['mumail']);
			if($_POST['per_flag']==''){ $per_flag='1'; }else if($_POST['per_flag'] == '0'){ $per_flag=$_POST['per_flag']; }
			
			$sql1= "update $db_eform.personel_muerp set
			per_pname='$_POST[per_pname]', 
			per_fnamet='$_POST[per_fnamet]', 
			per_lnamet='$_POST[per_lnamet]',
			per_pname2='$_POST[per_pname2]', 
			per_fnamee='$_POST[per_fnamee]', 
			per_lnamee='$_POST[per_lnamee]', 
			per_sex='$_POST[per_sex]', 
			per_modify='".date('Y-m-d H:i:s')."', 
			modify_by='$_SESSION[ses_per_id]', 
			job_id='$_POST[job_id]', 
			jobs_id='$_POST[jobs_id]', 
			per_group='$_POST[per_group]', 
			per_dept='$_POST[per_dept]',
			per_sex='$_POST[per_sex]',
			per_type='$_POST[per_type]',
			per_status='$_POST[per_status]',
			per_bhd = '$_POST[per_bhd]',
			per_adddate='$_POST[per_adddate]',
			per_yearin = '".budgetyear_02($_POST['per_adddate'])."',
			per_modifyfrom = '$_SERVER[REMOTE_ADDR]',
			per_email='$_POST[mumail]',
			per_username='$per_username',
			per_no='".base64_encode($_POST['per_no'])."',
			ja_id = '$ja_id2',
			per_flag = '$per_flag'
			where per_id='$_POST[per_id]'";
			mysqli_query($condb, $sql1);
			
			mysqli_query($condb, "delete from $db_eform.education 
				where ed_perid = '$_POST[per_id]'
				and ed_id='$_POST[ed_id]'
			");
			$sql2= "INSERT INTO  $db_eform.education (ed_id, 
				ed_perid, 
				ed_dgid, 
				ed_edu, 
				ed_institute, 
				ed_modify, 
				ses_id, 
				ed_country, 
				ed_ipstamp) 
				VALUES ('".random_ID('4','2')."', 
				'$_POST[per_id]', 
				'$_POST[dg_id]', 
				'$_POST[ed_edu]', 
				'$_POST[ed_institute]', 
				'$date_create', 
				'".session_id()."', 
				'$_POST[ed_country]', 
				'".$_SERVER['REMOTE_ADDR']."')";
				$exec2=mysqli_query($condb, $sql2);

				mysqli_query($condb, "update $db_eform.develop_user set du_status = '' where per_id = '$_POST[per_id]'");
				
				mysqli_query($condb, "insert into $db_eform.personel_muerp_log (per_id, log_status, log_ipstamp) values ('$_POST[per_id]', 'update', '$_SERVER[REMOTE_ADDR]')");
			
			header('location: show_allpersonel.php');
			
		}else if($_GET['action'] == "remove"){
			
			mysqli_query($condb, "delete from $db_eform.personel_muerp where per_id='$_GET[per_id]'");
			mysqli_query($condb, "delete from $db_eform.education where ed_id='$_GET[ed_id]'");
			header('location: show_allpersonel.php');
}else{
	exit();
}
 ?>

