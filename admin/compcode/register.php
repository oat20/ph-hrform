<?php
session_start();

include('include/config.php');
include('include/connect_db.php');
include('include/function.php');
?>
<!DOCTYPE HTML>
 <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
 <title><?php echo $titlebar['title'];?></title>
<?php include('../../lib/css-inc.php');?>
<body>
<div class="container">
	<div class="space1"></div>
	<div class="well">
<form action="../../register/load_adduser.php" method="post" id="formRegister">
	<legend><a href="../../phpm/login02.php"><i class="fa fa-arrow-left"></i> ลงทะเบียนใช้งานระบบ</a></legend>
<table cellpadding="0" cellspacing="0" class="table table-bordered">
	<tbody>
<tr >
  <td align="right" background="compcode/picture/bar07.jpg"  class="formcoltitle" valign="top">MU Email:</td>
  <td  background="compcode/picture/bar07.jpg" class="formcol2"><div class="form-group"><input name="email" type="email" size="80" maxlength="255" class="form-control"><span class="help-block">หมายเหตุ: กรุณาใช้ Email ที่ท่านใช้งานจริงและเป็น Email ของทางมหาวิทยาลัย (@mahidol.ac.th)</span></div></td>
</tr>
  <tr>
            <td background="compcode/picture/bar07.jpg" colspan="2" class="tdpadding">
                <input class="btn btn-primary btn-wide" type="submit" value="ลงทะเบียน">
                <a href="form,forgetpw.php" class="btn btn-link">ลืมรหัสผ่าน <i class="fa fa-question"></i></a>
    </tr>
	</tbody>
</table>
</form>
		
		<div class="alert alert-info">
			<i class="fa fa-info fa-fw"></i> ข้อมูลในการลงทะเบียนระบบจะซิงค์ข้อมูลมาจาก <a href="http://ns2.ph.mahidol.ac.th/phonebook" target="_blank" class="alert-link">ระบบนามานุกรมออนไลน์</a> ถ้าไม่สามารถลงทะเบียนได้กรุณาแจ้ง งานบริหารทรัพยากรบุคคล
		</div>
	</div><!--well-->
    
</div>

<?php include('../../lib/js-inc.php');?>
<script>
 $('#formRegister').bootstrapValidator({
		 fields: {
			  	email:{
				  validators: {
                    notEmpty: {
                        //message: 'The email address is required and can\'t be empty'
                    },
                    remote: {
						type: 'POST',
                        url: '../../register/repeat-username.php',
                        //message: 'The email is not available'
                    }
                }
			  },
		 }
 });
</script>