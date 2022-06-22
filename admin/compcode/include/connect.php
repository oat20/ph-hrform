<?
	  $host = "localhost";
	  $username_con = "root";
	  $password_con = "";
	  $dbname = "ph_web";
	  $link =mysql_connect($host,$username_con,$password_con);
	  mysql_select_db($dbname,$link);
	  mysql_query("SET NAMES TIS620"); 
?>