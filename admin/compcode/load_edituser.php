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
echo "�Դ�����Դ��Ҵ�������ö�Դ��͡Ѻ�ҹ��������";

		$sql = "select * from user where username ='$user_n' ";
		$table = mysql_query($sql);
		//$numrow = mysql_fetch_array($table);

		$rs= mysql_fetch_array ($table);
		$id_user=$rs[id_user];
//���ʼ�ҹ���ç�ѹ
if($password1 != $password2)
{	
	 warning ("password  ����͡�����ç�ѹ���");
}
else
{

edit_admin($id_user,$user_n,$password1,$names,$ministry_id,$username_user);
//echo"edit_admin($user_n,$password1,$names,$ministry_id,$username_user);";
header("location: ../default,show_alluser.php");

}
?>
