<?php
// This is a sample PHP script which demonstrates the 'remote' validator
// To make it work, point the web server to root Bootstrap Validate directory
// and open the remote.html file:
// http://domain.com/demo/remote.html

//sleep(5);

$valid = true;

$email=split("@",$_POST["mumail"]);

//if($email["1"] == "mahidol.ac.th" or $email["1"] == "mahidol.edu"){
	if($email["1"] == "mahidol.ac.th"){
	$valid   = true;
    //$message = 'The username is not available';
}else{
	$valid   = false;
	$message = "อีเมลนี้ไม่ใช่อีเมลของทางมหาวิทยาลัยฯ (@mahidol.ac.th)";
}

/*echo json_encode(array(
    'valid' => $valid,
));*/
echo json_encode(
    $valid ? array('valid' => $valid) : array('valid' => $valid, 'message' => $message)
);
