<?php
if($_SERVER['HTTP_HOST']=='localhost' or $_SERVER['HTTP_HOST']=='127.0.0.1'){
	$condb=mysqli_connect('localhost','root','12345678','ph_hr_eform');
}else{
	$condb=mysqli_connect('localhost','chakkapan','shk,g-hk','ph_hr_eform');
}
mysqli_query($condb,'set session sql_mode=""');
mysqli_set_charset($condb, 'utf8');
?>