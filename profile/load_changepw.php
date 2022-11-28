<?php
session_start();
include "../admin/compcode/include/config.php"; 
include('../admin/compcode/check_login.php');
require_once '../lib/mysqli.php';
include('../admin/compcode/include/connect_db.php');
include('../admin/compcode/include/function.php');
?>
<!doctype html>
<html lang="en">
	<head>
<meta charset="utf-8">
<?php include('../lib/css-inc.php');?>
</head>
<body>
<?php
print '<div class="container-fluid">';
	print '<div class="space1"></div>';
//==========================================================
mysqli_autocommit($condb, false);

if($_POST['action'] == 'update'){
	
	if(isset($_POST['per_pname']) and isset($_POST['per_fnamet']) and isset($_POST['per_lnamet']) and isset($_POST['per_dept']) and isset($_POST['mumail'])){

		$job_name = mysqli_real_escape_string($condb, $_POST['job_id']);
		$ja_name = mysqli_real_escape_string($condb, $_POST['ja_id']);

		//tb_orgnew
		$per_dept=mysqli_real_escape_string($condb, $_POST['per_dept']);
		/*$sql_orgnew=mysqli_query($condb, "select dp_id from tb_orgnew where dp_name like '%$dp_name%' order by rand() limit 1");
		$rs_orgnew=mysqli_fetch_assoc($sql_orgnew);
		if($rs_orgnew['dp_id'] != ''){
			$per_dept=$rs_orgnew['dp_id'];
		}else{
			mysqli_query($condb, "insert into tb_orgnew (dp_name) values ('$dp_name')");
			$per_dept=mysqli_insert_id($condb);
		}*/
	
		//job
	$sql_job = mysqli_query($condb, "select job_id from $db_eform.job where job_name like '$job_name' order by rand() limit 1");
	$row_job = mysqli_fetch_array($sql_job);
	if($row_job['job_id'] != ''){
		$job_id2 = $row_job['job_id'];
	}else{
		$job_id = date('YmdHis').random_password(2);
		mysqli_query($condb, "insert into $db_eform.job (job_id, job_name) values ('$job_id', '$job_name')");
		$job_id2 = $job_id;
	}

	//job_academic
	$sql_ja = mysqli_query($condb, "select ja_id from $db_eform.job_academic where ja_name like '$ja_name' order by rand() limit 1");
	$row_ja = mysqli_fetch_array($sql_ja);
	if($row_ja['ja_id'] != ''){
		$ja_id2 = $row_ja['ja_id'];
	}else{
		$ja_id = date('YmdHis').random_password(2);
		mysqli_query($condb, "insert into $db_eform.job_academic (ja_id, ja_name) values ('$ja_id', '$ja_name')");
		$ja_id2 = $ja_id;
	}
	
	$sql="update $db_eform.personel_muerp set 
		per_pname = '$_POST[per_pname]',
		per_fnamet='$_POST[per_fnamet]', 
		per_lnamet='$_POST[per_lnamet]',
		per_pname2='$_POST[per_pname2]',
		per_fnamee = '$_POST[per_fnamee]',
		per_lnamee = '$_POST[per_lnamee]',
		per_dept='$per_dept',
		per_email='$_POST[mumail]', 
		per_modify = '".date('Y-m-d H:i:s')."',
		modify_by = '".$_SESSION['ses_per_id']."',
		per_modifyfrom = '$_SERVER[REMOTE_ADDR]',
		per_telin='$_POST[per_telin]',
		per_tel='$_POST[per_tel]',
		per_no='".base64_encode($_POST['per_no'])."',
		job_id = '$job_id2',
		ja_id = '$ja_id2'
		where per_id = '$_POST[per_id]'";
	$rs = mysqli_query($condb, $sql);
	
	//update phper2.personel
	$updatePhper2=mysqli_query($condb, "update $db_phonebook.personel set
		per_pname = '$_POST[per_pname]',
		per_fnamet='$_POST[per_fnamet]', 
		per_lnamet='$_POST[per_lnamet]',
		per_pname2='$_POST[per_pname2]',
		per_fnamee = '$_POST[per_fnamee]',
		per_lnamee = '$_POST[per_lnamee]',
		per_dept='$per_dept',
		per_email='$_POST[mumail]', 
		per_modify = '".date('Y-m-d H:i:s')."',
		modify_from = '$_SERVER[REMOTE_ADDR]',
		per_telin='$_POST[per_telin]',
		per_tel='$_POST[per_tel]'
		where per_id = '$_POST[per_id]'");
	//update phper2.personel
				
		mysqli_query($condb, "insert into $db_eform.personel_muerp_log (per_id, log_status, log_ipstamp)
			values ('$_POST[per_id]', 'edit', '$remoteip')");
		
		if($rs and mysqli_commit($condb)){
		#$msg=$msg."แก้ไขข้อมูลเรียบร้อย";
			echo"<script language='JavaScript'>";
									echo"alert('แก้ไขข้อมูลเรียบร้อย');";
									echo"window.location='form_changepw.php';";
									echo"</script>";
		}else{
			print warning3_linkin('danger', '<i class="fa fa-exclamation"></i> Warning', 'ไม่สามารถบันทึกข้อมูลได้', $livesite.'profile/form_changepw.php', '<i class="fa fa-angle-double-left"></i> Go Back', 'text-left');
			print '<meta http-equiv="refresh" content="3; URL=form_changepw.php">';
		}
	
	}else{
		//print warning('danger','<i class="fa fa-exclamation"></i> Warning','ไม่สามารถบันทึกข้อมูลได้');
		//print '<p><a href="form_changepw.php" class="btn btn-link btn-lg"><i class="fa fa-angle-double-left"></i> Go Back</a></p>';
		print warning3_linkin('warning', '<i class="fa fa-exclamation"></i> Warning', 'ข้อมูลยังไม่ครบถ้วน โปรดตรวจสอบ', $livesite.'profile/form_changepw.php', '<i class="fa fa-angle-double-left"></i> Go Back', 'text-left');
		print '<meta http-equiv="refresh" content="3; URL=form_changepw.php">';
	
	}
	
}else if($_POST['action']=='changepass'){

	$newpass=base64_encode($_POST['newPass']);
	$sql="update $db_eform.personel_muerp 
		set per_password='$newpass' 
		where per_id='$_SESSION[ses_per_id]'";
	$result=mysqli_query($condb, $sql);
	if($result and mysqli_commit($condb)){		
		print warning2_linkin('success', '<i class="fa fa-check"></i>', 'เปลี่ยนรหัสผ่านใหม่เรียบร้อย', $livesite.'profile/profile.php', '<i class="fa fa-angle-double-left"></i> Go Back', '');
		print '<meta http-equiv="refresh" content="3; URL=profile.php">';  		
	}
		
}

mysqli_rollback($condb);
mysqli_close($condb);

print '</div>';

include('../lib/js-inc.php');
?>
</body>
</html>