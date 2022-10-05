<?php
session_start();

include("../admin/compcode/include/config.php");
require_once '../lib/mysqli.php';
include('../admin/compcode/include/connect_db.php');
include('../admin/compcode/include/function.php');
require_once '../lib/mailer/mail.php';
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
if($_POST['action'] == 'signin' and isset($_POST['user']) and isset($_POST['pass'])){
	
	$sql_01 = mysqli_query($condb, "select * from $db_eform.personel_muerp as t1
		inner join $db_eform.personel_status as t2 on (t1.per_status = t2.ps_id)
		inner join $db_eform.develop_user as t3 on(t1.per_id=t3.per_id)  
					where (t1.per_email = '$_POST[user]'
					or t1.per_username = '$_POST[user]')
					and t1.per_password='".base64_encode($_POST['pass'])."'
					and t2.ps_flag = '1'");
	$row_01 = mysqli_num_rows($sql_01);
	$ob_01 = mysqli_fetch_assoc($sql_01);
	if($row_01 > 0){
		
		$_SESSION['ses_du_status'] = $ob_01['du_status'];
		$_SESSION["ses_per_id"] = $ob_01['per_id'];
		$_SESSION["ses_per_dept"] = $ob_01['per_dept'];
		$_SESSION['ses_peremail'] = $ob_01['per_email'];
		$_SESSION['ses_createname']=$ob_01['per_pname'].$ob_01['per_fnamet'].' '.$ob_01['per_lnamet'];
		
		mysqli_query($condb, "insert into $db_eform.personel_muerp_log (per_id, log_status, log_ipstamp) 
			values ('$ob_01[per_id]', 'signin', '$remoteip')"); //insert log
		
		//sendmail notify
		/*$body='<p>สวัสดี คุณ '.$ob_01['per_fnamet'].' '.$ob_01['per_lnamet'].'</p>
			<p>มีการใช้อีเมล '.$ob_01['per_email'].' เข้าระบบ</p>
			<p>จาก IP Address '.$remoteip.'</p>
			<p>เมื่อเวลา '.dateFormat_02($date_create).'</p>';
		@smtpmail( $ob_01['per_email'] , 'Notification: '.$titlebar['title'].' แจ้งเข้าระบบล่าสุด' , $body );*/
		
		echo '<meta http-equiv="refresh" content="0;URL=../profile/form_changepw.php">';
		
	}else{
		$msg_alert = warning('danger','<i class="fa fa-exclamation"></i>','Username หรือ Password ไม่ถูกต้อง หรือท่านไม่ได้สิทธิ์เข้าใช้ส่วนนี้');
	}

}else if($_POST['action'] == 'genOTP' and isset($_POST['mumail'])){

	$sql_01 = mysqli_query($condb, "select * from $db_eform.personel_muerp as t1
					where t1.per_email = '$_POST[mumail]'
					or t1.per_username = '$_POST[mumail]'");
	$row_01 = mysqli_num_rows($sql_01);
	$ob_01 = mysqli_fetch_assoc($sql_01);
	if($row_01 > 0){		
		$otp = strtoupper(random_password(2));
		$_SESSION['ses_peremail'] = $ob_01['per_email'];

		$sql_02 = mysqli_query($condb, "select du_id from $db_eform.develop_user where per_id = '$ob_01[per_id]'");
		if(mysqli_num_rows($sql_02) > 0){
			mysqli_query($condb, "update $db_eform.develop_user set 
			du_otp='$otp',
			du_datestamp = CURRENT_TIMESTAMP()
			where per_id='$ob_01[per_id]'
		");
		}else{
			mysqli_query($condb, "insert into $db_eform.develop_user (per_id, du_otp, du_datestamp, du_status)
			values ('$ob_01[per_id]', '$otp', CURRENT_TIMESTAMP(), '3')");
		}

		//$strSubject = "=?UTF-8?B?".base64_encode("ส่ง OTP เข้าระบบ [".$otp."]")."?=";
		$strSubject="ส่ง OTP เข้าระบบ [".$otp."]";
		$strHeader = "MIME-Version: 1.0' . \r\n";
		$strHeader .= "Content-type: text/html; charset=utf-8\r\n"; 
		$strHeader .= "From: ".strtoupper($_SERVER['HTTP_HOST'])."<noreply@".$_SERVER['HTTP_HOST'].">\r\n";
		$body='<p>สวัสดี คุณ '.$ob_01['per_fnamet'].' '.$ob_01['per_lnamet'].'</p>';
		$body.='<p>รหัส OTP ของท่านคือ</p>';
		$body .= '<h1>'.$otp.'</h1>';
		$body.='<p>กรุณากรอกรหัส OTP ด้านล่างเพื่อยืนยันการเข้าระบบ</p>';
		$body .= '<p>* ข้อความนี้ส่งจากระบบอัตโนมัติไม่สามารถตอบกลับได้</p>';
		//@mail($ob_01['per_email'], $strSubject, $body, $strHeader);
		smtpGmail($ob_01['per_email'], $strSubject, $body);

		header("location: ./login.php");
	}else{

		$otp = strtoupper(random_password(2));
		$_SESSION['ses_peremail'] = $_POST['mumail'];
		$per_id = random_password(4);

		mysqli_query($condb, "insert into $db_eform.personel_muerp (per_id, per_email, created, per_modify) 
			values ('$per_id', '$_POST[mumail]', CURRENT_TIMESTAMP(), CURRENT_TIMESTAMP())
		"); //insert log

		mysqli_query($condb, "insert into $db_eform.develop_user (per_id, du_status, du_otp, du_datestamp)
			values ('$per_id', '3', '$otp', CURRENT_TIMESTAMP())
		");

		//$strSubject = "=?UTF-8?B?".base64_encode("ส่ง OTP เข้าระบบ [".$otp."]")."?=";
		$strSubject="ส่ง OTP เข้าระบบ [".$otp."]";
		$strHeader = "MIME-Version: 1.0' . \r\n";
		$strHeader .= "Content-type: text/html; charset=utf-8\r\n"; 
		$strHeader .= "From: ".strtoupper($_SERVER['HTTP_HOST'])."<noreply@".$_SERVER['HTTP_HOST'].">\r\n";
		$body='<p>สวัสดี คุณ '.$ob_01['per_fnamet'].' '.$ob_01['per_lnamet'].'</p>';
		$body.='<p>รหัส OTP ของท่านคือ</p>';
		$body .= '<h1>'.$otp.'</h1>';
		$body.='<p>กรุณากรอกรหัส OTP ด้านล่างเพื่อยืนยันการเข้าระบบ</p>';
		$body .= '<p>* ข้อความนี้ส่งจากระบบอัตโนมัติไม่สามารถตอบกลับได้</p>';
		//@mail($_POST['mumail'], $strSubject, $body, $strHeader);
		smtpGmail($_POST['mumail'], $strSubject, $body);

		header("location: ./login.php");
		
	}

}
?>
<nav class="navbar navbar-inverse navbar-static-top navbar-lg navbar-embossed">
	<div class="container-fluid">
		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header">
		<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
			<span class="sr-only">Toggle navigation</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		</button>
		<a class="navbar-brand" href="#"><i class="fa fa-connectdevelop fa-fw" aria-hidden="true"></i> <?php echo $titlebar['shorttitle'];?></a>
		</div>
	</div>
</nav>

<div class="container-fluid">

	<div class="row">
    
    	<div class="col-xs-12 col-sm-12 col-md-6 visible-md visible-lg">
			<?php //include('../header-inc.php');?>
            <div class="panel panel-primary">
            	<div class="panel-heading">
                	<h3 class="panel-title font-18"><i class="fa fa-bars fa-fw"></i> <?php print $titlebar['label_02'];?></h3>
                </div>
                <div class="panel-body">
               		<img src="<?php echo $livesite;?>img/PH_logo_web.png" class="img-responsive center-block">
                    <div class="space5"></div>
                    
                    	<!--แบบฟอร์ม-->
                        <div class="row">
                        <?php
                        $sql_01 = mysqli_query($condb, "select * from $db_eform.develop_main_type where dm_use = 'yes' order by dm_id asc");
                        while($ob_01 = mysqli_fetch_assoc($sql_01)){
                            print '<div class="col-sm-12">
                                <div class="well well-sm">
									<div class="clearfix">
										<div class="pull-left">
											<a href="'.$livesite.$ob_01['dm_url'].'?dm_id='.$ob_01['dm_id'].'&dm_title='.$ob_01['dm_title'].'">
												<i class="fa fa-file-text"></i> แบบฟอร์มบันทึกขออนุมัติปฏิบัติงาน'.$ob_01['dm_title'].'
											</a>
										</div><!--left-->
										<div class="pull-right">
											<div class="dropdown">
											  <a href="#" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" class="dropdown-toggle"><i class="fa fa-ellipsis-v"></i></a>
											  <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenu1">
												<li><a href="profile/_showmyproject.php"><i class="glyphicon glyphicon-link"></i> ประวัติการขออนุมัติ</a></li>
												<!--<li role="separator" class="divider"></li>
												<li><a href="profile/_showmyproject_join.php?dev_maintype='.$ob_01['dm_id'].'"><i class="glyphicon glyphicon-link"></i> ประวัติการปฎิบัติงาน</a></li>-->
											  </ul>
											</div>
										</div><!--right-->
									</div><!--clearfix-->
                                </div><!--blog-content-->
                            </div><!--col-->';
                        }
                        ?>
                        
                        <div class="col-sm-12">
                            <div class="well well-sm">
                            	<div class="clearfix">
                                	<div class="pull-left">
                                    	<a href="leave/form.php"><i class="fa fa-file-text"></i> แบบฟอร์มบันทึกอนุมัติลาประชุม ดูงาน ฝึกอบรม (ต่างประเทศ)</a>
                                    </div>
                                    <div class="pull-right">
                                    	<div class="dropdown">
                                          <a href="#" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" class="dropdown-toggle"><i class="fa fa-ellipsis-v"></i></a>
                                          <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenu1">
                                            <li><a href="leave/_showmyproject.php">ประวัติการขออนุมัติ</a></li>
                                          </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="well well-sm">
                            	<a href="../img/manual.pdf" target="_blank"><i class="fa fa-file-text"></i> คู่มือการใช้งาน</a>
                            </div>
                        </div><!--col-->
                        
                    </div><!--row-->
                    <!--แบบฟอร์ม-->
                
                </div><!--body-->
            </div><!--panel-->
            
        </div><!--col-->
        
    	<div class="col-xs-12 col-sm-12 col-md-6">
                        
            <!-- <div class="well">
            <form action="<?php //print $_SERVER['PHP_SELF'];?>" method="post" id="formSignin">
            	<legend>Step 1. ตรวจสอบข้อมูลที่ลงทะเบียนไว้</legend>
            	<?php //print $msg_alert;?>
            	<div class="form-group">
                	<label class="control-label">อีเมลที่ลงทะเบียนไว้:</label>
                    <input name="user" type="text" size="30" class="form-control forminput2" value="<?php //print $_POST['user'];?>" required>
                </div>
                <div class="form-group">
                	<label class="control-label">รหัสผ่าน:</label>
                    <input type="password" name="pass" class="form-control" required>
                </div>
                <input type="hidden" name="action" value="signin">
                <input type="submit" value="ถัดไป" class="btn btn-inverse btn-wide">
                <a href="../admin/compcode/form,forgetpw.php" class="btn btn-link">ลืมรหัสผ่าน <i class="fa fa-question"></i></a> 
            </form>
            	<hr>
                <a href="../admin/compcode/register.php" class="btn btn-warning btn-block"><i class="fa fa-location-arrow"></i> ยังไม่มีรหัสผ่านสำหรับใช้งานระบบคลิกที่นี่</a>
            </div> -->
			<!--well -->

			<div class="well">
				<h6>Step 1. ตรวจสอบข้อมูลที่ลงทะเบียนไว้</h6>
				<form id="formSignin2" method="POST" action="<?php print $_SERVER['PHP_SELF'];?>" >
					<div class="form-group">
						<label>MU Email</label>
						<input type="email" name="mumail" class="form-control" id="exampleInputEmail1" placeholder="name.sur@mahidol.ac.th"
							data-bv-notempty="true"
							data-bv-emailaddress="true"
							data-bv-remote="true"
							data-bv-remote-url="../lib/bootstrapvalidator/mu-emailformat.php">
					</div>
					<input type="hidden" name="action" value="genOTP">
					<button type="submit" class="btn btn-inverse btn-block">ถัดไป <i class="fa fa-arrow-right fa-fw"></i></button>
				</form>
			</div>
            
        </div><!--col-->
        
    </div><!--row-->
</div><!--container-->

<!--survey-->
<!--<div class="modal fade" tabindex="-1" role="dialog" id="modalSurvey">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span> ปิด</button>
        <h4 class="modal-title">แบบประเมินความพึงพอใจของผู้ใช้ระบบสารสนเทศ คณะสาธารณสุขศาสตร์ ม.มหิดล</h4>
      </div>
      <div class="modal-body">
         <iframe src="https://docs.google.com/forms/d/1juOQjr_-4rTc8r1pvRUGbq40mD_yB9hqX9eyPkla03s/viewform?edit_requested=true" width="100%" height="700"></iframe> 
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary btn-wide" data-dismiss="modal"><i class="fa fa-times fa-fw"></i> ปิด</button>
      </div>
    </div>
  </div>
</div>-->

<?php include('../lib/js-inc.php');?>
<script>
$(document).ready(function(e) {
    
	$('#formSignin').bootstrapValidator({
	});

	$('#formSignin2').bootstrapValidator();
	
	//$('#modalSurvey').modal('show');

});
</script>
</body>
</html>