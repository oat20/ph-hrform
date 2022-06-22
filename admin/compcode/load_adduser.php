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
//include "include/config.php";
$conn = connect_db("ph_web");
if(!$conn)
echo "เกิดความผิดพลาดไม่สามารถติดต่อกับฐานข้อมูลได้";

$sql = "select * from admin where username ='$user_n'";
$table = mysql_query($sql);
$numrow = mysql_fetch_array($table);

$sql2 = "select * from admin where email='$email'";
$table2 = mysql_query($sql2);
$numrow2 = mysql_fetch_array($table2);

if($numrow!=0) 
{

 $msg=$msg."<font color=red size=2>มีคนใช่ user นี้อยู่แล้วค่ะกรุณาใช่ชื่ออื่นค่ะ</font>";

}

//รหัสผ่านไม่ตรงกัน
elseif($password1 != $password2)
{	
	 $msg=$msg."<font color=red size=2>password  ที่กรอกมาไม่ตรงกันค่ะ</font>";
}
else if($numrow2!=0){
	$msg=$msg."<font color=red size=2>Email นี้มีสมาชิกใช้อยู่แล้ว</font>";
}else
{

$status_user=user;
$sql = "SELECT Max(u_id) AS M FROM admin";
$exec = mysql_query( $sql );
$Max = mysql_result($exec,"M");
$max = $Max + 1;
		
		$regdate=date("Y-m-d H:i:s");
		
adduser($max,$user_n,$password1,$names,$email, $regdate);
#adduserstatus($user_n);

/*$sql_user="select * user where  username='user_n' " ;
$exec_user= mysql_query($sql_user);
$rs_user=mysql_fetch_array($exec_user);
$id_user=$rs_user[id_user];*/


#$sql_type="select *  from  type_news  ";
#$exec_type= mysql_query($sql_type);
#While($rs_type=mysql_fetch_array($exec_type) )
#{		

		#$status=0;
		#$id_type=$rs_type[id_type];
		#$sql_fix="insert into  fixtypenews_admin(id_fix,id_user,id_type,fix_status) values('','$max','$id_type','$status')";
		#$exec_fix= mysql_query($sql_fix);

#}
header("location:admin.php");

}
?>
