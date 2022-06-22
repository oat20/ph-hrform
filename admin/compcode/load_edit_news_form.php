<? ob_start();
 session_start(); 
 //include "include/connect.php";
require_once("include/function.php");
$conn = connect_db("db_news");
if(!$conn)
echo "เกิดความผิดพลาดไม่สามารถติดต่อกับฐานข้อมูลได้";
	
?>
<meta http-equiv="Content-Type" content="text/html; charset=tis-620">
<?

// ำฟัง์ชั่ Ramdom password 


$today = date("H:i:s");  
$date_t=date("Y-m-d");
$date_1="$y_1"."-"."$m_1"."-"."$d_1";
$date_2="$y_2"."-"."$m_2"."-"."$d_2";
 $uploadDir = './photo/' ;
$thumbDir = './thumb/' ;

			$sql_1="update  detail_news  set     title_detail ='$title_pic' where id_detail='$id_detail'";
			$exec_1=mysql_query($sql_1);
			$sql_2="update  detail_news set   date_1='$date_1' where id_detail='$id_detail'";
			$exec_2=mysql_query($sql_2);
			$sql_3="update  detail_news set   date_2='$date_2' where id_detail='$id_detail'";
			$exec_3=mysql_query($sql_3);
			$sql_4="update  detail_news set   descriptiondetail='$detaile_pic1'   where id_detail='$id_detail'";
			$exec_4=mysql_query($sql_4);
			$sql_5="update  detail_news  set   description_detail ='$detaile_pic' where id_detail='$id_detail'";
			$exec_5=mysql_query($sql_5);
			$sql_6="update  detail_news  set    status_news='0' where id_detail='$id_detail'";
			$exec_6=mysql_query($sql_6);
			$sql_7="update  detail_news  set    id_person='$id_person' where id_detail='$id_detail'";
			$exec_7=mysql_query($sql_7);






		    header("location: ../default,show_selectnews.php");





 ?>

