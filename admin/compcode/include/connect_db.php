<?php
function connect_db()
{
	//ติดต่อกับฐานข้อมูล
	$host = "localhost";
	
	if($_SERVER['HTTP_HOST']=='localhost' or $_SERVER['HTTP_HOST']=='127.0.0.1'){
		$username = "root";
		//$password = "root";
		 $password = "12345678";
	}else{
		//$username = "project";
		 //$password = "lkTkiIl6-Lkl9iN";
		 $username = "chakkapan";
		 $password = "shk,g-hk";
	}
	
	 //$database ="tmps";
	$result = mysql_connect($host,$username,$password);
	//mysql_select_db($database,$result);
	mysql_query("SET NAMES utf8"); 
	if(!$result)
		return false;
//if(!mysql_select_db($database))
	//return false;
return $result;
}

$db_phonebook = 'phper2'; $db_eform = 'ph_hr_eform';
connect_db();
?>