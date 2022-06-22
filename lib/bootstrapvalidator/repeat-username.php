<?php
// This is a sample PHP script which demonstrates the 'remote' validator
// To make it work, point the web server to root Bootstrap Validate directory
// and open the remote.html file:
// http://domain.com/demo/remote.html

//sleep(5);
include("../../admin/compcode/include/connect_db.php");

$valid = true;

$email=split("@",$_POST["email"]);

if($email["1"] != "mahidol.ac.th"){
	
	$valid   = false;
	$message="ไม่ใช่อีเมลของทางมหาวิทยาลัยฯ (ต้องเป็น @mahidol.ac.th เท่านั้น)";

}else{
	
	$valid = true;
	
	$sql="select * from jos_users
	where email='$_POST[email]'";
	$rs=mysql_query($sql);
	$row=mysql_num_rows($rs);
	if($row == 0){
		$valid = true;
	}else{
		$valid = false;
		$message = 'มีอีเมลนี้ในระบบแล้ว';
	}

}


/*echo json_encode(array(
    'valid' => $valid,
));*/
echo json_encode(
    $valid ? array('valid' => $valid) : array('valid' => $valid, 'message' => $message)
);