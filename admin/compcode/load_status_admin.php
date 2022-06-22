<? ob_start();
session_start(); 
include "include/connect.php";
require_once("include/function.php");

$user=$_POST["user"];
$m_id=$_POST["m_id"];

if($Submit=="เพิ่มสิทธิ์")
{


#for ($i=0;$i<count($m_id);$i++)
foreach($m_id as $key => $key2) 
{ 
		#$st='1';
		#$id_type1 = $id_type[$i];
		#$sql_a="UPDATE admin_status  SET   fix_status='$st'  
		#WHERE  id_user='$id_user' and  id_type='$id_type1'"; 
		$sql_a="insert into admin_status(username, m_id)
		values('$user', '$key2')";
		$exe_a=mysql_query($sql_a); 
		#echo"$exe_a=mysql_query($sql_a,$link); ";

}
header("location:  admin.php");

}





?>


