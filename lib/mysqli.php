<?php
if($_SERVER['HTTP_HOST']=='localhost' or $_SERVER['HTTP_HOST']=='127.0.0.1'){
		$username = "root";
		 $password = "12345678";
	}else{
		 $username = "chakkapan";
		 $password = "shk,g-hk";
	}
$condb = mysqli_connect("localhost", $username, $password);
mysqli_query($condb, "SET SESSION sql_mode=''");
mysqli_set_charset($condb, "utf8");
?>