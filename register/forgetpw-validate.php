<?php
// This is a sample PHP script which demonstrates the 'remote' validator
// To make it work, point the web server to root Bootstrap Validate directory
// and open the remote.html file:
// http://domain.com/demo/remote.html

//sleep(5);
include("../admin/compcode/include/connect_db.php");

$valid = true;

//$email=split("@",$_POST["email"]);
$sql=mysql_query("select * from $db_eform.personel_muerp as t1
	inner join $db_eform.develop_user as t2 on (t1.per_id=t2.per_id)
	where t1.per_email = '$_POST[email]'");
if(mysql_num_rows($sql) > 0){
	$valid   = true;
}else{
	$valid=false;
	$message = 'ไม่พบอีเมลนี้ในระบบ หรืออีเมลนี้ยังไม่ได้ลงทะเบียนใช้งาน';
}

/*echo json_encode(array(
    'valid' => $valid,
));*/
echo json_encode(
    $valid ? array('valid' => $valid) : array('valid' => $valid, 'message' => $message)
);