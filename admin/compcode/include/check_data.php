<? ob_start();
session_start();
/*function check_valid_user()
{
global $valid_user;
if(session_is_registered("valid_user"))
		$str = "<tr><td colspan=\"3\"><font face = \"MS Sans Serif\" color=\"#000000\" size=\"3\"> ยินดีต้อนรับคุณ $valid_user</font></td></tr>";
else
		$str = "<center>คุณไม่ได้ล็อกอิน</center><br>";
		return $str;
}*/
//=============================================================================
/*function filled_out($form_vars)
{
	foreach($form_vars as $key=>$value);
	{
		if(!isset($key)||($value==""))
			return false;
	}
	return true;
}*/
//==========================================================================
function check_admin($authuser)
{
// global $authuser;
$con=connect_db("ph_web");
if(!$con)
return "ไม่สามารถติดต่อกับฐานข้อมูลได้ กรุณาพยายามอีกครั้ง";
$sql="select   *  from  user  where  username='$authuser'" ;
$exec = mysql_query($sql);
$Status = mysql_fetch_array ($exec);
$status_user=$Status[status_user];
//$ministry=$Status[ministry_id];



  if ($status_user=='1')
  {
	
	  return true;
  }
  else
  {
  	
	 return false;
     exit;
  }  
}
//========================================================================
function valid_email($add)
{
//ตรวจสอบอีเมล์
if(ereg("^[a-zA-Z0-9_]+@[a-zA-Z0-9\-]+\.[a-zA-Z0-9\-\.]",$add))
	return true;
else
	return false;
}
//==================================================================================
function chack_menu($authuser)
{
global  $status_user;
global  $ministry;

$con=connect_db("db_news");
if(!$con)
	return "ไม่สามารถติดต่อกับฐานข้อมูลได้ กรุณาพยายามอีกครั้ง";
$sql="select   *  from  user  where  username='$authuser'" ;
$exec = mysql_query($sql);
$Status = mysql_fetch_array ($exec);
$status_user=$Status[status_user];
$ministry=$Status[ministry_id];
if($status_user=='1')
{
$status_user=$status_user;
$ministry=$ministry;

// header_admin();

session_register("status_user");
session_register("ministry");
echo"";

}
else
{
$status_user=$status_user;
$ministry=$ministry;
//header_adminsystem();

session_register("status_user");
session_register("ministry");

}

}
?>