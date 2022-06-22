<?session_start(); 
 include "include/connect.php";
require_once("include/function.php");
$conn = connect_db("db_news");
if(!$conn)
echo "เกิดความผิดพลาดไม่สามารถติดต่อกับฐานข้อมูลได้";


//echo"$date1 ";
//echo"$date2 ";

/*$sql="insert into  tb_date (id_date,date_value1,date_value2) values('','$date1','$date1')";
 $query=mysql_query($sql);
 echo" $query=mysql_query($sql);";*/

$sql_update="Update  tb_date  Set date_value1='$date1' Where id_date=1 ";
 $query_update=mysql_query($sql_update);

$sql_update_a="Update  tb_date  Set date_value2='$date2' Where id_date=1 ";
 $query_update_a=mysql_query($sql_update_a);

 header("location: ../default,show_sqlsearch.php");

 
/* if($query)
{
	echo" insert เรียบร้อยค่ะ";
}
else
{
	echo"error";
}*/
?>