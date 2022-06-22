<? ob_start();
session_start(); 
include "include/config.php";
$conn = connect_db("db_news");
if(!$conn)
echo "เกิดความผิดพลาดไม่สามารถติดต่อกับฐานข้อมูลได้";

//reset($number);
while (list($key1, $value1) = each($number)) {
   echo "Key: $key1; Value: $value<br />\n";

foreach ($id_detail as $key => $value) {
//	echo "Key: $key1; Value: $value1<br />\n";
//   echo "Key: $key; Value=: $value<br />\n";
   if($key1==0&&$key==0)
   {
			$sql_a="UPDATE detail_news  SET status_hotnews ='$value1'  WHERE   id_detail ='$value '"; 
			$exec_a=mysql_query($sql_a,$link); 
   }
   if($key1==1&&$key==1)
   {
			$sql_b="UPDATE detail_news  SET status_hotnews ='$value1'  WHERE   id_detail ='$value '"; 
			$exec_b=mysql_query($sql_b,$link); 
   }
   if($key1==2&&$key==2)
   {
			$sql_c="UPDATE detail_news  SET status_hotnews ='$value1'  WHERE   id_detail ='$value '"; 
			$exec_c=mysql_query($sql_c,$link); 
   }
   if($key1==3&&$key==3)
   {
			$sql_d="UPDATE detail_news  SET status_hotnews ='$value1'  WHERE   id_detail ='$value '"; 
			$exec_d=mysql_query($sql_d,$link); 
   }
   if($key1==4&&$key==4)
   {
			$sql_e="UPDATE detail_news  SET status_hotnews ='$value1'  WHERE   id_detail ='$value '"; 
			$exec_e=mysql_query($sql_e,$link); 
   }
    if($key1==5&&$key==5)
   {
			$sql_f="UPDATE detail_news  SET status_hotnews ='$value1'  WHERE   id_detail ='$value '"; 
			$exec_f=mysql_query($sql_f,$link); 
   }
    if($key1==6&&$key==6)
   {
			$sql_g="UPDATE detail_news  SET status_hotnews ='$value1'  WHERE   id_detail ='$value '"; 
			$exec_g=mysql_query($sql_g,$link); 
   }
    if($key1==6&&$key==6)
   {
			$sql_h="UPDATE detail_news  SET status_hotnews ='$value1'  WHERE   id_detail ='$value '"; 
			$exec_h=mysql_query($sql_h,$link); 
   }
    if($key1==7&&$key==7)
   {
			$sql_i="UPDATE detail_news  SET status_hotnews ='$value1'  WHERE   id_detail ='$value '"; 
			$exec_i=mysql_query($sql_i,$link); 
   }
    if($key1==8&&$key==8)
   {
			$sql_j="UPDATE detail_news  SET status_hotnews ='$value1'  WHERE   id_detail ='$value '"; 
			$exec_j=mysql_query($sql_j,$link); 
   }
   if($key1==9&&$key==9)
   {
			$sql_k="UPDATE detail_news  SET status_hotnews ='$value1'  WHERE   id_detail ='$value '"; 
			$exec_k=mysql_query($sql_k,$link); 
   }
   if($key1==10&&$key==10)
   {
			$sql_l="UPDATE detail_news  SET status_hotnews ='$value1'  WHERE   id_detail ='$value '"; 
			$exec_l=mysql_query($sql_l,$link); 
   }
   
}

}


//header("location: show_allnewsimg.php");

?>
<!-- <meta http-equiv="refresh" content="0;URL=show_alluser.php"> -->

</body>
</html>
