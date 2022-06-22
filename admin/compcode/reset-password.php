<?php
session_start();

include('include/config.php');
//include('check_login.php');
include('include/connect_db.php');
include('include/function.php');
include('../../lib/mailer/mail.php');
?>
<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<?php include('../../lib/css-inc.php');?>
</head>

<body>
<div class="container-fluid">
	<div class="space1"></div>
    
    <?php
	$sql=mysql_query("select * from $db_eform.personel_muerp
		where per_id='$_GET[per_id]'");
	$ob=mysql_fetch_assoc($sql);
	?>
    <div class="alert alert-warning">
    	<p>
        	<i class="fa fa-info"></i> ยืนยันการตั้งรหัสผ่านใหม่ของ <strong><?php print $ob['per_fnamet'].' '.$ob['per_lnamet'];?></strong>
            <a href="<?php print $_SERVER['PHP_SELF'];?>?confirm=yes&per_id=<?php print $ob['per_id'];?>" class="alert-link"><i class="fa fa-check fa-fw"></i> Yes</a>
            <a href="<?php print $_SERVER['PHP_SELF'];?>?confirm=no&per_id=<?php print $ob['per_id'];?>" class="alert-link"><i class="fa fa-close fa-fw"></i> No</a>
        </p>
    </div>
    
    <?php	
	if($_GET['confirm']=='yes'){
		
		$per_password=random_ID('2', '2');
		$sql=mysql_query("update $db_eform.personel_muerp set
			per_password='".base64_encode($per_password)."'
			where per_id='$ob[per_id]'");
		
		$body='<p>Username: '.$ob['per_username'].'</p>
					<p>Password: '.$per_password.'</p>
					<p><a href="'.$livesite.'" target="_blank">'.$livesite.'</a></p>';
		@smtpGmail($ob['per_email'], $titlebar['title'].' แจ้งรหัสผ่าน', $body );
		print warning2_linkin('success','<i class="fa fa-check"></i>', 'รีเชตรหัสผ่านเรียบร้อย', '_show_alluser.php', '<i class="fa fa-angle-double-left"></i> Back', '');
		print '<meta http-equiv="refresh" content="5;URL=_show_alluser.php">';
			
	}else if($_GET['confirm']=='no'){
		print '<meta http-equiv="refresh" content="0;URL=_show_alluser.php">';
	}
	?>
</div><!--container-->

<?php include('../../lib/js-inc.php');?>
</body>
</html>