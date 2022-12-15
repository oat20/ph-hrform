<?php
if($_SERVER['HTTP_HOST']=='localhost' or $_SERVER['HTTP_HOST']=='127.0.0.1'){
	$condb=mysqli_connect('localhost','root','12345678','ph_hr_outbound');
}else{
	$condb=mysqli_connect('localhost','chakkapan','shk,g-hk','ph_hr_outbound');
}
mysqli_query($condb,'SET SESSION sql_mode=""');
mysqli_set_charset($condb, 'utf8');
?>