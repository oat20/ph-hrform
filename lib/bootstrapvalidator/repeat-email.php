<?php
// This is a sample PHP script which demonstrates the 'remote' validator
// To make it work, point the web server to root Bootstrap Validate directory
// and open the remote.html file:
// http://domain.com/demo/remote.html

//sleep(5);
include("../../../compcode/conn.php");

$valid = true;

$email=split("@",$_POST["email"]);

$sql="select email from tb_user 
where email = '$_POST[email]'";
$rs=mysql_query($sql);
$row=mysql_num_rows($rs);

if($email["1"] == "mahidol.ac.th"){
	
	$valid   = true;
	//$message="รูปแบบอีเมลต้องเป็น @mahidol.ac.th หรือ @mahidol.edu";
	if($row == "0"){
		$valid = true;
    	//$message = 'มีอีเมลนี้ในระบบแล้ว';
	}else{
		$valid = false;
    	$message = 'มีอีเมลนี้ในระบบแล้ว';
	}

}else{
	
	$valid = false;
    //$message = 'มีอีเมลนี้ในระบบแล้ว';
	$message="รูปแบบอีเมลต้องเป็น @mahidol.ac.th";

}
/*if($row != "0"){
	$valid = false;
    $message = 'มีอีเมลนี้ในระบบแล้ว';
}*/


/*echo json_encode(array(
    'valid' => $valid,
));*/
echo json_encode(
    $valid ? array('valid' => $valid) : array('valid' => $valid, 'message' => $message)
);