<?php
session_start();
include "../admin/compcode/include/config.php"; 
?>
<!doctype html>
<html lang="en">
	<head>
<?php 
include('../admin/compcode/check_login.php');
require_once '../lib/mysqli.php';
include('../admin/compcode/include/connect_db.php');
include('../admin/compcode/include/function.php');
?>
<body bgcolor="#5c7094" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
<meta charset="utf-8">
<?php
include('../lib/css-inc.php');
?>
</head>
<body>
<?php
print '<div class="container-fluid">';
	print '<div class="space1"></div>';
//==========================================================
mysqli_autocommit($condb, false);

if($_POST['action'] == 'update'){
	
	if(isset($_POST['per_pname']) and isset($_POST['per_fnamet']) and isset($_POST['per_lnamet']) and isset($_POST['per_dept']) and isset($_POST['mumail'])){
	
	//$per_username = explode('@',$_POST["mumail"]);
	
	$sql="update $db_eform.personel_muerp set 
		per_pname = '$_POST[per_pname]',
		per_fnamet='$_POST[per_fnamet]', 
		per_lnamet='$_POST[per_lnamet]',
		per_pname2='$_POST[per_pname2]',
		per_fnamee = '$_POST[per_fnamee]',
		per_lnamee = '$_POST[per_lnamee]',
		per_dept='$_POST[per_dept]',
		per_email='$_POST[mumail]', 
		per_modify = '".date('Y-m-d H:i:s')."',
		modify_by = '".$_SESSION['ses_per_id']."',
		per_modifyfrom = '$_SERVER[REMOTE_ADDR]',
		per_telin='$_POST[per_telin]',
		per_tel='$_POST[per_tel]',
		per_no='".base64_encode($_POST['per_no'])."'
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
		per_dept='$_POST[per_dept]',
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
	if($result and mysqli_connect($condb)){		
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