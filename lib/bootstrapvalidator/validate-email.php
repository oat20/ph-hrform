<?php
// This is a sample PHP script which demonstrates the 'remote' validator
// To make it work, point the web server to root Bootstrap Validate directory
// and open the remote.html file:
// http://domain.com/demo/remote.html

//sleep(5);
include("../../../compcode/conn.php");

$valid = true;

$sql="select email from tb_user 
where email='$_POST[email]'
and type='Administrator'";
$rs=mysql_query($sql);
$row=mysql_num_rows($rs);
if($row != "0"){
	$valid = true;
    //$message = 'The username is not available';
}else{
	$valid   = false;
}

echo json_encode(array(
    'valid' => $valid,
));