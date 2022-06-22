<? ob_start();
session_start(); 
 include "include/config.php";
//require_once("compcode/include/function.php");
$conn = connect_db("db_news");
if(!$conn)
echo "เกิดความผิดพลาดไม่สามารถติดต่อกับฐานข้อมูลได้";



foreach ($number as $key3 => $value) 
	{
			
									//echo"$value";
									$sql_h="UPDATE departmenthot  SET id_detail  ='$value'  WHERE   statushot ='$key3 '"; 
									$exec_h=mysql_query($sql_h); 
									//echo"$exec_h=mysql_query($sql_h);";
					
	 }

echo"<br>";
//$result = array_diff_assoc($id_detail, $number)
header("location: ../default,show_departmentnews.php");
//echo"$result";
?>