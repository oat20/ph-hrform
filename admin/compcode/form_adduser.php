<?php
session_start();

include('include/config.php');
//include('check_login.php');
include('include/connect_db.php');
include('include/function.php');
include('../../lib/mailer/mail.php');

include('../../lib/css-inc.php');
?> 
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
 <body>
<?php 
//include('../../inc/navbar02-inc.php');

if($_POST['action'] == 'insert' and isset($_POST['email']) and isset($_POST['du_status']) and isset($_POST['per_id'])){
		
	$sql=mysql_query("select user_id from phper2.user where user_perid = '$_POST[per_id]'");
	$ob=mysql_fetch_assoc($sql);
	if(empty($ob['user_id'])){
		
		//send email
		$password = random_ID('2','2');
		$username = split("@",$_POST["email"]);

		$body = '<p>Account Name ของคุณคือ <strong>'.$username[0].' หรือ '.$_POST['email'].'</strong></p>
			<p>Password ของคุณคือ <strong>'.$password.'</strong></p>
			<p>*ใช้งานผ่าน <a href="https://www.google.com/intl/th/chrome/browser/desktop/" target="_blank">Google Chrome</a> หรือ <a href="https://www.mozilla.org/th/firefox/new/" target="_blank">Firefox</a> เพื่อการแสดงผลที่สมบูรณ์</p>';
		$send = @smtpmail( $_POST['email'] , 'Notification : แจ้งรหัสผ่าน' , $body );
	
		if($send){
			
			//insert data
			$sql_01 = mysql_query("insert into phper2.user (user_id, user_perid, username, password, registerdate, user_email) 
				values ('".maxid('phper2.user','user_id')."', '$_POST[per_id]', '".$username[0]."', '$password', '".date('Y-m-d H:i:s')."', '$_POST[email]')");
				
			$sql_02 = mysql_query("insert into $db_eform.develop_user (du_id, per_id, du_status, du_ipstamp) 
				values ('".maxid($db_eform.'.develop_user','du_id')."', '$_POST[per_id]', '$_POST[du_status]', '".$_SERVER['REMOTE_ADDR']."')");
			
			$sql_03=mysql_query("update $db_eform.personel_muerp set
				per_password='".base64_encode($password)."',
				per_username='$username[0]'
				where per_id='$_POST[per_id]'");
		//insert data
				
			/*$insert_msg = warning('success', '<i class="fa fa-check"></i> Success', 'ระบบได้ส่งรหัสผ่านไปยังอีเมล '.$_POST['email'].' นี้แล้ว').'<meta http-equiv="refresh" content="2; URL=../../phpm/login.php">
	';*/
			$insert_msg = warning('success', '<i class="fa fa-check"></i> Success', 'ระบบได้ส่งรหัสผ่านไปยังอีเมล '.$_POST['email'].' นี้แล้ว').'<meta http-equiv="refresh" content="2; URL=_show_alluser.php">';
		
		}else if(!$send){
			$insert_msg = warning('warning', '<i class="fa fa-exclamation"></i> Warning', 'ไม่สามารถส่งรหัสผ่านไปยังอีเมล '.$_POST['email'].' นี้ได้ เนื่องจากไม่มีในระบบ MU Email หรือท่านอาจสะกดผิดโปรดตรวจสอบ');
		}
		//send email
		
	}else{
		
		$sql = mysql_query("select du_id from $db_eform.develop_user where per_id = '$_POST[per_id]'");
		$ob = mysql_fetch_assoc($sql);
		if(empty($ob['du_id'])){
			
			$sql_02 = mysql_query("insert into $db_eform.develop_user (du_id, per_id, du_status, du_ipstamp) 
				values ('".maxid($db_eform.'.develop_user','du_id')."', '$_POST[per_id]', '$_POST[du_status]', '".$_SERVER['REMOTE_ADDR']."')");
			
			$sql_03=mysql_query("update $db_eform.personel_muerp set
				per_password='".base64_encode($password)."',
				per_username='$username[0]'
				where per_id='$_POST[per_id]'");
		
		}else{
			
			$insert_msg = warning('info', '<i class="fa fa-info"></i>', 'User นี้มีในระบบแล้ว');
			
		}
	}
	
}
?>

<div class="container">
	<div class="space1"></div>

	<div class="panel panel-default">
    	<div class="panel-heading">
        	<h3 class="panel-title"><a href="_show_alluser.php"><i class="fa fa-arrow-left"></i> Add User</a></h3>
        </div>
    	<div class="panel-body">
        	<?php
			$rs = mysql_query("select * from $db_eform.personel_muerp
			inner join $db_eform.tb_orgnew on (personel_muerp.per_dept = tb_orgnew.dp_id)
			where per_id = '$_GET[per_id]'");
			$ob = mysql_fetch_assoc($rs);
			
			print $insert_msg;
			?>
            <form name="adduser" action="<?php print $_SERVER['PHP_SELF'];?>" method="post" id="defaultForm">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label class="control-label">ชื่อ:</label>
                            <p class="form-control-static"><?php print $ob['per_pname'].$ob['per_fnamet'].' '.$ob['per_lnamet'];?></p>
                        </div>
                    </div>
                    
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label class="control-label">ส่วนงาน:</label>
                            <p class="form-control-static"><?php print $ob['dp_name'];?></p>
                        </div>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label class="control-label">MU Email:</label>
                            <input name="email" type="text" size="50" maxlength="255" class="form-control" value="<?php print $ob['per_email'];?>">
                            <span class="help-block">โปรดใช้อีเมลของทางมหาวิทยาลัยฯ (@mahidol.ac.th)</span>
                        </div>
                    </div>
                    
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label class="control-label">Permission:</label>
                            <select class="form-control select select-primary" data-toggle="select" name="du_status">
                                <option value="">&raquo; เลือกรายการ</option>
                                <?php
                                foreach($admin_status as $k=>$v){
                                    print '<option value="'.$k.'">&raquo; '.$v['label'].'</option>';
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                </div>
                
                <input name="per_id" type="hidden" value="<?php print $ob['per_id'];?>">
                <input name="action" type="hidden" value="insert">
                <input class="button btn btn-block text-uppercase" type="submit" value="Insert">
            </form>

		</div><!--body-->
	</div><!--panel-->

</div><!--container-->

<?php include('../../lib/js-inc.php');?>
<script>
$(document).ready(function(e) {
    $('#defaultForm').bootstrapValidator({
		 fields: {
			 email: {
                validators: {
                    notEmpty: {
                        //message: 'The username is required and can\'t be empty'
                    },
                    remote: {
						type: 'POST',
                        url: '../../lib/bootstrapvalidator/mu-emailformat02.php',
                        //message: 'The username is not available'
                    }
                }
            },
			du_status: {
                validators: {
                    notEmpty: {
                        //message: 'The first name is required and cannot be empty'
                    }
                }
            }
		 }
	});
});
</script>