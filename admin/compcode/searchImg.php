<?php ob_start(); 
//require_once("doc/include/header.php");
include("include/config.php");
//include("News/include/function.php");
//clude("News/admin/include/connect_db.php");
//require_once("News/admin/include/function.php");
$conn = connect_db("db_news");
if(!$conn)
echo "เกิดความผิดพลาดไม่สามารถติดต่อกับฐานข้อมูลได้";
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-874" />
<title>Untitled Document</title>
</head>

<body>
<?
if(!empty($search_1))
{
$sql_exe = ("SELECT * from detail_news   where file_detail ='$search_1'  ");
$result_exe = mysql_query( $sql_exe);
$rs_exe= mysql_fetch_array($result_exe);
				if($rs_exe)
				{     echo"มีรูป";}
				else
				{     echo"ไม่มีรูป";
				echo"$result_exe = mysql_query( $sql_exe);";
				echo"$search1";
				}

}
else
{
$sql_img= ("SELECT * from image   where name_Imgtop ='$search ' ");
$result_img = mysql_query( $sql_img);
$rs_img= mysql_fetch_array($result_img);

	if($rs_img)
				{     echo"มีรูป";}
				else
				{     echo"ไม่มีรูป";
				
				echo"$result_img = mysql_query( $sql_img);";
				
				echo"$search";
				
				
				}

}
?>

<form id="form1" name="form1" method="post" action="searchImg.php">
  <label>ค้นหารูปตารางdetail
  <input type="text" name="search_1" />
  </label>
   <label>ค้นหารูปตารางimage
   <input type="text" name="search" />
</label>
  <input type="submit" name="Submit" value="Submit" />
  <label></label>
  <p>&nbsp;</p>
</form>
</body>
</html>
