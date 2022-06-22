<? ob_start();
session_start(); 
?>
<link href="tool/css_text.css" rel="stylesheet" type="text/css">
<body bgcolor="#5c7094" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">

<?
 include "include/config.php";
require_once("include/function.php");
$conn = connect_db("db_news");


if(!$conn)
echo "เกิดความผิดพลาดไม่สามารถติดต่อกับฐานข้อมูลได้";
if($submit=='ตกลง')
{
		
		
		
		$sql_a="select id_detail from detail_news  WHERE  status_hotnews='1'"; 
		$exe_a=mysql_query($sql_a);
		$result_a = mysql_fetch_array($exe_a);
    	$id_detail =$result_a[id_detail ];
		
		$numrow=mysql_num_rows($exe_a);
		
		if($id_detail!=$num_key)
			{
			$sql_old="UPDATE detail_news  SET   status_hotnews='0'  WHERE  id_detail='$id_detail'  "; 
			$exe_old=mysql_query($sql_old);
			$sql_news="UPDATE detail_news  SET   status_hotnews='1'  WHERE  id_detail='$num_key'  "; 
			$exe_news=mysql_query($sql_news);
			}
		else
			{
			$sql_news="UPDATE detail_news  SET   status_hotnews='1'  WHERE  id_detail='$num_key'  "; 
			$exe_news=mysql_query($sql_news);
			}
			


}

echo"<br>";



header("location: ../default,show_allnews.php");
//echo"$result";
?>