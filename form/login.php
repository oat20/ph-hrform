<?php
ob_start();
session_start();

include("../admin/compcode/include/config.php");
include('../admin/compcode/include/connect_db.php');
include('../admin/compcode/include/function.php');
?>
<!doctype html>
<html>
<head>
<title><?php print $titlebar['title'];?></title>
<meta charset="utf-8">
<?php include('../lib/css-inc.php');?>
</head>
<body>
<?php
if($_POST['action'] == 'signin' and isset($_POST['user'])){
	
	$sql_01 = mysql_query("select * from phper2.personel
					where per_email = '$_POST[user]'
					or per_username = '$_POST[user]'");
	$row_01 = mysql_num_rows($sql_01);
	$ob_01 = mysql_fetch_assoc($sql_01);
	if($row_01 > 0){
		$per_password = session_id().random_password('6');
		$sql_02 = mysql_query("update phper2.personel set per_password = '$per_password',
						per_modify = '$date_create'
						where per_id = '$ob_01[per_id]'");
		//$msg_alert = warning('success','<i class="fa fa-check"></i>','Success');
		header('location: ../admin/compcode/admin.php?muacc='.$ob_01['per_email'].'&token='.$per_password);
	}else{
		$msg_alert = warning('danger','<i class="fa fa-exclamation"></i>','ไม่พบอีเมลนี้ในระบบ');
	}
}
?>

<div class="container">
	<div class="row">
    	<div class="col-lg-8 col-lg-offset-2">
        	<div class="page-header">
        		<h3><?php print $titlebar['icon'].' '.$titlebar['title'];?></h3>
                <h6><?php print $titlebar['label'];?></h6>
            </div>
            
            <form action="<?php print $_SERVER['PHP_SELF'];?>" method="post" id="formSignin">
            	<?php print $msg_alert;?>
            	<div class="form-group form-group-lg">
                	<label class="control-panel"><strong>MU Mail:</strong></label>
                    <input name="user" type="text" size="30" class="form-control forminput2" value="<?php print $_POST['user'];?>" required>
                </div>
                <input type="hidden" name="action" value="signin">
                <input type="submit" value="เข้าสู่ระบบ" class="btn btn-block hover-state button"> 
            </form>
            
            <!--<p>&nbsp;</p>
            <div class="alert alert-info">
            	<h4>ข่าวประกาศ</h4>
            </div>-->
        </div><!--col-->
        
        <!--<div class="col-lg-6">
        </div>--><!--col-->
    </div><!--row-->
</div><!--container-->

<?php include('../lib/js-inc.php');?>
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
            }
		 }
	});
});
</script>
</body>
</html>