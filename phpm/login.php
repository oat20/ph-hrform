<?php
session_start();

include("../admin/compcode/include/config.php");
include('../admin/compcode/include/connect_db.php');
include('../admin/compcode/include/function.php');
include('../lib/mailer/mail.php');
?>
<!doctype html>
<html>
<head>
<title><?php print $titlebar['title'];?></title>
<meta charset="utf-8">
<?php include('../lib/css-inc.php');?>
<!--<style>body{ padding-bottom:70px; }</style>-->
</head>
<body>
<?php
if($_POST['action'] == 'signin' and isset($_POST['user'])){
	
	$sql_01 = mysql_query("select * from 
		$db_eform.personel_muerp as t1
		inner join $db_eform.personel_status as t2 on (t1.per_status = t2.ps_id)  
					where (t1.per_email = '$_POST[user]'
					or t1.per_username = '$_POST[user]')
					and t2.ps_flag = '1'");
	$row_01 = mysql_num_rows($sql_01);
	$ob_01 = mysql_fetch_assoc($sql_01);
	if($row_01 > 0){
		//$per_password = session_id().random_password('4');
		$per_password=base64_encode(random_ID('2','2'));
		$sql_02 = mysql_query("update $db_eform.personel_muerp set per_password = '$per_password',
						per_modify = '$date_create'
						where per_id = '$ob_01[per_id]'"); //update token
		//$msg_alert = warning('success','<i class="fa fa-check"></i>','Success');
		
		mysql_query("insert into $db_eform.personel_muerp_log (per_id, log_status, log_ipstamp) values ('$ob_01[per_id]', 'getlink', '$remoteip')"); //insert log
		
		//senmail
		/*$body = '<p><img src="'.$livesite.'img/PH_logo_web.png"></p>
					<p>สวัสดี คุณ '.$ob_01['per_fnamet'].' '.$ob_01['per_lnamet'].'</p>
					<p><strong>เข้าระบบคลิกที่นี่</strong> <a href="'.$livesite.'admin/compcode/admin.php?muacc='.$ob_01['per_email'].'&token='.$per_password.'">'.$livesite.'admin/compcode/admin.php?muacc='.$ob_01['per_email'].'&token='.$per_password.'</a></p>';
		smtpmail( $ob_01['per_email'] , 'Link เข้าระบบ'.$titlebar['label_02'] , $body );*/
		$body='<p>สวัสดี คุณ '.$ob_01['per_fnamet'].' '.$ob_01['per_lnamet'].'</p>
			<p>มีการใช้อีเมล '.$ob_01['per_email'].' เข้าระบบ</p>
			<p>จาก IP Address '.$remoteip.'</p>
			<p>เมื่อเวลา '.dateFormat_02($date_create).'</p>';
		@smtpmail( $ob_01['per_email'] , 'Notification: '.$titlebar['title'].' แจ้งเข้าระบบล่าสุด' , $body );
		
		//header('location: ../admin/compcode/admin.php?muacc='.$ob_01['per_email'].'&token='.$per_password);
		echo '<meta http-equiv="refresh" content="0; URL=../admin/compcode/admin.php?muacc='.$ob_01['per_email'].'&token='.$per_password.'">';

		/*$msg_alert = warning2_linkin('success', '<i class="fa fa-check"></i>', 'ระบบได้ส่ง Link เข้าระบบไปยังอีเมลของท่านแล้ว', 'http://webmail.mahidol.ac.th/', 'Mahidol Webmail <i class="fa fa-angle-double-right" aria-hidden="true"></i>');*/
		
	}else{
		$msg_alert = warning('danger','<i class="fa fa-exclamation"></i>','ไม่พบอีเมลนี้ในระบบ');
	}
}
?>

<div class="container-fluid">
	<div class="space10"></div>

	<div class="row">
    	<div class="col-lg-8 col-lg-offset-2">
			<?php include('../header-inc.php');?>
                        
            <div class="well">
            <form action="<?php print $_SERVER['PHP_SELF'];?>" method="post" id="formSignin">
            	<legend>Step 1. ตรวจสอบข้อมูลบุคลากร</legend>
            	<?php print $msg_alert;?>
            	<div class="form-group form-group-sm">
                	<label class="control-label"><strong>MU Mail:</strong></label>
                    <input name="user" type="text" size="30" class="form-control forminput2" value="<?php print $_POST['user'];?>" required>
                    <span class="help-block">ใช้ข้อมูลจากระบบนามานุกรมออนไลน์ (PH-Directories)</span>
                </div>
                <div class="form-group form-group-sm">
                	<?php $_SESSION['ses_captcha'] = random_ID('4','2');?>
                	<label class="control-label font-20"><strong id="captchaOperation"><?php echo $_SESSION['ses_captcha'];?></strong></label>
                    <input name="captcha" type="text" size="30" class="form-control forminput2" required>
                    <span class="help-block">กรอกรหัส 6 หลักที่เห็นทางด้านบน</span>
                </div>
                <input type="hidden" name="action" value="signin">
                <input type="submit" value="ถัดไป" class="btn btn-block hover-state button"> 
            </form>
            </div><!--well -->
            
            <!--<p>&nbsp;</p>
            <div class="alert alert-info">
            	<h4>ข่าวประกาศ</h4>
            </div>-->
        </div><!--col-->
        
        <!--<div class="col-lg-6">
        </div>--><!--col-->
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
</script>

<script>
$(document).ready(function(e) {
    
	$('#formSignin').bootstrapValidator({
		 fields: {
			 user: {
                validators: {
                    notEmpty: {
                        //message: 'The first name is required and cannot be empty'
                    }
                }
            },
			captcha:{
				validators:{
					callback: {
						//message: 'Wrong answer',
						callback: function(value, validator) {
							var items = $('#captchaOperation').html();
							return value == items;
						}
					},
				}
			},
		 }
	});

});
</script>
</body>
</html>