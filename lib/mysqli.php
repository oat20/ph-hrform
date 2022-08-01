<?php
if($_SERVER['HTTP_HOST']=='localhost' or $_SERVER['HTTP_HOST']=='127.0.0.1'){
		$username = "root";
		 $password = "12345678";
		 $db = "ph_hr_eform";
	}else{
		 $username = "chakkapan";
		 $password = "shk,g-hk";
		 $db = "ph_hr_eform";
	}
$condb = mysqli_connect("localhost", $username, $password, $db);
mysqli_query($condb, "SET SESSION sql_mode=''");
mysqli_set_charset($condb, "utf8");
?>