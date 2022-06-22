<? session_start(); 
 include "include/connect.php";
require_once("include/function.php");
$conn = connect_db("db_news");
if(!$conn)
echo "เกิดความผิดพลาดไม่สามารถติดต่อกับฐานข้อมูลได้";



?>
<meta http-equiv="Content-Type" content="text/html; charset=tis-620">
<?
status_chack($user);

if($Submit=='ตรวจสอบ')
{
status_constant($user);
for ($i=0;$i<count($id_type);$i++) { 
$id_type1 = $id_type[$i];

if(!empty($id_type1)){
$st='1';
}else  
{
$st='0';
}
if ($id_type1==1001)
	{
		
		$sql_a="UPDATE status_admin  SET   org='$st'  WHERE  username='$user'  "; 
		$exe_a=mysql_query($sql_a); 
	 }

if ($id_type1==1002)
	{
		
		$sql_b="UPDATE status_admin  SET  train='$st'  WHERE  username='$user' "; 
		$exec_b=mysql_query($sql_b); 
    }
	
if ($id_type1==1003)
	{	
	
		$sql_c="UPDATE status_admin  SET  Img_activity ='$st'  WHERE  username='$user' "; 
		$exec_c=mysql_query($sql_c); 
	}
	
if ($id_type1==1004)
	{	
	
		$sql_d="UPDATE status_admin  SET  job='$st'  WHERE  username='$user' "; 
		$exec_b=mysql_query($sql_d); 
		}

if ($id_type1==1005)
	{	
		
		$sql_e="UPDATE status_admin  SET  procure='$st'  WHERE  username='$user' "; 
		$exec_e=mysql_query($sql_e); 
	}
	
if ($id_type1==1006)
	{
	
		$sql_f="UPDATE status_admin  SET  newpaper='$st'  WHERE  username='$user' "; 
		$exec_f=mysql_query($sql_f); 
	}
	
if ($id_type1==1007)
	{
	
		$sql_g="UPDATE status_admin  SET  government ='$st'  WHERE  username='$user'  "; 
		$exec_g=mysql_query($sql_g); 
	}

}

}

header("location: show_alluser.php");

?>
</body>
</html>
