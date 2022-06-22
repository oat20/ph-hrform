<?php 
session_start();
include('../admin/compcode/include/config.php');
include('../admin/compcode/include/connect_db.php');
include('../admin/compcode/include/function.php');
include('../lib/mailer/mail.php'); 
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<?php
$sql01=mysql_query("select * from $db_eform.personel_muerp
	where per_email='$_POST[email]'");
$ob01=mysql_fetch_assoc($sql01);
$per_username=explode('@',$ob01['per_email']);
$per_password=random_ID('2', '2');

//update personel_muerp
$sql02=mysql_query("update $db_eform.personel_muerp set
	per_username='".$per_username['0']."',
	per_password='".base64_encode($per_password)."'
	where per_id='$ob01[per_id]'");

//insert develop_user
$du_id=maxid($db_eform.'.develop_user', 'du_id');
$sql03=mysql_query("insert into $db_eform.develop_user (du_id,
	per_id,
	du_status,
	du_ipstamp)
	values ('$du_id',
	'$ob01[per_id]',
	'3',
	'$remoteip')");

if($sql02 and $sql03){
	
	$body='<p>รหัสผ่านของคุณคือ</p>
		<p>Username: '.$per_username['0'].'</p>
		<p>Password: '.$per_password.'</p>
		<p>เข้าระบบ &raquo; <a href="'.$livesite.'phpm/login02.php">'.$livesite.'phpm/login02.php</a></p>';
	smtpmail($ob01['per_email'] , 'Notification: แจ้งรหัสผ่าน' , $body );
	
	echo warning2_linkin('success', '<i class="fa fa-check"></i>', 'ระบบได้ส่งรหัสผ่านไปยังอีเมลของท่านแล้ว', '//webmail.mahidol.ac.th', 'Mahidol Webmail <i class="fa fa-angle-right"></i>', '');
	
}else{
	echo warning('danger','<i class="fa fa-exclamation"></i> Warning', 'ไม่สามารถลงทะเบียนได้');
}
?>