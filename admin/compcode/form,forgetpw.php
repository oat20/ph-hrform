<?php
session_start();
include('include/config.php');
include('include/connect_db.php');
include('include/function.php');
include('../../lib/mailer/mail.php');
?>
<!DOCTYPE HTML>
<?php
if(isset($_POST['action']) and $_POST['action']=='save'){
	
	$sql=mysql_query("select * from $db_eform.personel_muerp
		where per_email='$_POST[email]'");
	$rs=mysql_fetch_assoc($sql);
	$per_password=base64_decode($rs['per_password']);
	
	//sendmail
	$body='<p>รหัสผ่านของคุณคือ</p>
		<p>Username: '.$rs['per_username'].'</p>
		<p>Password: '.$per_password.'</p>
		<p>เข้าระบบ &raquo; <a href="'.$livesite.'phpm/login02.php">'.$livesite.'phpm/login02.php</a></p>';
	smtpmail($rs['per_email'] , 'Notification: แจ้งรหัสผ่าน' , $body );
	
	$message=warning2_linkin('success','<i class="fa fa-check"></i>','ระบบส่งรหัสผ่านไปยังอีเมลของท่านแล้ว', '//webmail.mahidol.ac.th/', 'Mahidol Webmail <i class="fa fa-angle-double-right"></i>', '');

}
?>
<html>
<HEAD>
<meta charset="utf-8">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title><?php echo $titlebar['title'];?></title>
<?php include('../../lib/css-inc.php');?>
</HEAD>
<BODY>
<div class="container">
	<div class="space1"></div>
    <div class="well">
    	<?php echo $message;?>
    	    <FORM method="post" action="<?php echo $_SERVER['PHP_SELF'];?>" id="formForgetpw">
   <TABLE border="0" cellpadding="4" class="table table-bordered">
     <TR>
       <TD bgcolor="#DFDFDF" colspan="2">
	   <a href="../../phpm/login02.php"><B><i class="fa fa-arrow-left"></i> ลืมรหัสผ่าน</B></a>
	   </TD>
     </TR>
     <TR>
       <TD>
	   MU Email:
       </td> 
       <td>
       	<div class="form-group"><INPUT name="email" type="email" size="50" class="form-control" required></div>
       </td>
      </TR>
		<tr>
        <td></td>
        <td>
        	<input type="hidden" name="action" value="save" />
		 <INPUT type="submit" value="ตกลง" class="btn btn-inverse btn-block">
		 <!--<INPUT type="reset" value="ยกเลิก">-->
	  </TD>
     </TR>
   </TABLE>
   		 </FORM>
   </div>
</div>

<?php include('../../lib/js-inc.php');?>
<script>
 $('#formForgetpw').bootstrapValidator({
		 fields: {
			  	email:{
				  validators: {
                    notEmpty: {
                        //message: 'The email address is required and can\'t be empty'
                    },
                    remote: {
						type: 'POST',
                        url: '../../register/forgetpw-validate.php',
                        //message: 'The email is not available'
                    }
                }
			  },
		 }
 });
</script>
</BODY>
</html>
