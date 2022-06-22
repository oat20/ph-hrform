<?php
if($_SERVER['HTTP_HOST']=='localhost' or $_SERVER['HTTP_HOST']=='127.0.0.1'){
	$condb=mysqli_connect('localhost','root','12345678');
}else{
	$condb=mysqli_connect('localhost','chakkapan','shk,g-hk');
}

mysqli_query($condb,'set names utf8');
?>