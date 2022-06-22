<? ob_start();
session_start(); 
include "include/connect.php";
require_once("include/function.php");
$conn = connect_db("db_news");
if(!$conn)
echo "เกิดความผิดพลาดไม่สามารถติดต่อกับฐานข้อมูลได้";

?>
<body bgcolor="#5c7094" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
<?
   if (!empty ($statususer_name) &&( $status_userlevel) )
   {		
   		//	echo"if (!empty ($user_name) &&( $status_userlevel) )";
			$sql_a="UPDATE user  SET status_user ='$status_userlevel' WHERE   username ='$statususer_name'"; 
			$exec_a=mysql_query($sql_a); 
			echo"$exec_a=mysql_query($sql_a)";
			
   }
  


header("location: ../default,show_alluser.php");

?>
<!--<meta http-equiv="refresh" content="0;URL=show_alluser.php"> 
 -->

