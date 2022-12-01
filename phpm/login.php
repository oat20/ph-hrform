<?php
session_start();

include("../admin/compcode/include/config.php");
require_once '../lib/mysqli.php';
include('../admin/compcode/include/connect_db.php');
include('../admin/compcode/include/function.php');

$du_otp = mysqli_real_escape_string($condb, strtoupper($_POST['captcha']));
?>
<!doctype html>
<html lang="en">
<head>
<title><?php print $titlebar['title'];?></title>
<meta charset="utf-8">
<?php include('../lib/css-inc.php');?>
</head>
<body>
<?php
if($_POST['action'] == 'signin' and $du_otp != '0' and $du_otp != ''){
	
	$sql_01 = mysqli_query($condb, "select * from 
		$db_eform.personel_muerp as t1
		inner join $db_eform.develop_user as t2 on (t1.per_id = t2.per_id)  
					where (t1.per_email = '$_SESSION[ses_peremail]'
					or t1.per_username = '$_SESSION[ses_peremail]')
					and t2.du_otp like '$du_otp'
				");
	$row_01 = mysqli_num_rows($sql_01);
	$ob_01 = mysqli_fetch_assoc($sql_01);
	if($row_01 > 0){
		$sql_02 = mysqli_query($condb, "update $db_eform.develop_user 
			set du_otp = '0',
						du_datestamp = CURRENT_TIMESTAMP()
						where per_id = '$ob_01[per_id]'
					"); //update token

					$_SESSION['ses_du_status'] = $ob_01['du_status'];
		$_SESSION["ses_per_id"] = $ob_01['per_id'];
		$_SESSION["ses_per_dept"] = $ob_01['per_dept'];
		$_SESSION['ses_peremail'] = $ob_01['per_email'];
		$_SESSION['ses_createname']=$ob_01['per_pname'].$ob_01['per_fnamet'].' '.$ob_01['per_lnamet'];
		$_SESSION['ses_isboss']=$ob_01['per_isboss'];
		$_SESSION['ses_isdean']=$ob_01['per_isdean'];
		
		mysqli_query($condb, "insert into $db_eform.personel_muerp_log (per_id, log_status, log_ipstamp) values ('$ob_01[per_id]', 'getlink', '$remoteip')"); //insert log
				
		echo '<meta http-equiv="refresh" content="0; URL=../profile/form_changepw.php">';
		
	}else{
		$msg_alert = warning('danger','<i class="fa fa-exclamation fa-fw"></i>','OTP ไม่ถูกต้อง');
	}
}
?>

<div class="container">

	<div class="row" style="margin-top: 10%;">
    	<div class="col-lg-12">
                        
            <div class="well">
				<h5>
					<a href="./login02.php"><i class="fa fa-arrow-left fa-fw"></i> ตรวจสอบข้อมูลบุคลากร</a>
				</h5>
				<div class="alert alert-success">
					<i class="fa fa-check fa-fw"></i> One Time Password (OTP) ได้ส่งไปยังอีเมล <strong><u><?php echo $_SESSION['ses_peremail'];?></u></strong> กรุณาตรวจสอบอีเมลของท่าน
				</div>

            <form action="<?php print $_SERVER['PHP_SELF'];?>" method="post" id="formSignin">
            	<?php print $msg_alert;?>
                <div class="form-group">
                	<?php //$_SESSION['ses_captcha'] = random_ID('4','2');?>
                	<label class="control-label font-20"><strong id="captchaOperation">Your OTP</strong></label>
                    <input name="captcha" type="text" size="30" class="form-control text-uppercase" required
						data-bv-notempty="true">
                </div>
                <input type="hidden" name="action" value="signin">
                <button type="submit" class="btn btn-inverse btn-block hover-state button">เข้าสู่ระบบ</button>
				<a href="./login02.php" class="btn btn-link btn-block">ขอรหัสอีกครั้ง</a> 
            </form>
            </div><!--well -->
            
        </div><!--col-->
        
    </div><!--row-->
</div><!--container-->

<?php //include('../footer-inc.php');
include('../lib/js-inc.php');?>
<script language="JavaScript" type="text/javascript">
function checkval(form) 
{
  		if (form.user.value == "") 
		{
       			alert("กรอก Username");
          		form.user.focus();
          		return false;
        }
		if (form.pass.value == "") 
		{
       			alert("กรอก Password");
          		form.pass.focus();
          		return false;
        }
}

$(function() {
	$('#formSignin').bootstrapValidator();
});
</script>
</body>
</html>