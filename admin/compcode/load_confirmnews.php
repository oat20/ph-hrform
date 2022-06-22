<? ob_start();
session_start(); 
include "include/config.php";
$conn = connect_db("db_news");
if(!$conn)
echo "เกิดความผิดพลาดไม่สามารถติดต่อกับฐานข้อมูลได้";



foreach ($key as $key3 => $value) 
	{
			
						
									$sql_h="UPDATE detail_news  SET show_news  ='y'  WHERE   id_detail ='$value '"; 
									$exec_h=mysql_query($sql_h); 
									//echo"$exec_h=mysql_query($sql_h);";
					
	 }

echo"<br>";

			 echo"*********   $value2[1]   $key3[1]***************";


//$result = array_diff_assoc($id_detail, $number);
header("location: ../default,show_allnews.php");
//echo"$result";
?>