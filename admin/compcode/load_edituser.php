<? 
ob_start();
session_start(); ?>
<meta http-equiv="Content-Type" content="text/html; charset=tis-620">
<style type="text/css">
<!--
a {
	font-family: Tahoma;
	color: #ffffff;
}
a:link {
	text-decoration: none;
}
a:visited {
	text-decoration: none;
}
a:hover {
	text-decoration: none;
}
a:active {
	text-decoration: none;
}
-->
</style>
<?
include "include/config.php";
$conn = connect_db("db_news");
if(!$conn)
echo "เกิดความผิดพลาดไม่สามารถติดต่อกับฐานข้อมูลได้";

		$sql = "select * from user where username ='$user_n' ";
		$table = mysql_query($sql);
		//$numrow = mysql_fetch_array($table);

		$rs= mysql_fetch_array ($table);
		$id_user=$rs[id_user];
//รหัสผ่านไม่ตรงกัน
if($password1 != $password2)
{	
	 warning ("password  ที่กรอกมาไม่ตรงกันค่ะ");
}
else
{

edit_admin($id_user,$user_n,$password1,$names,$ministry_id,$username_user);
//echo"edit_admin($user_n,$password1,$names,$ministry_id,$username_user);";
header("location: ../default,show_alluser.php");

}
?>
