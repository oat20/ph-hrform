<?session_start(); 
// include "admin/compcode/include/connect_db.php";
  include "admin/compcode/include/function.php";

//require_once("include/function.php");
$conn = connect_db("db_news");
if(!$conn)
echo "เกิดความผิดพลาดไม่สามารถติดต่อกับฐานข้อมูลได้";
$sql="Select * from tb_date";
$exec=mysql_query($sql);
$rs=mysql_fetch_array($exec);
$date_value1=$rs[date_value1];
$date_value2=$rs[date_value2];
$date1=dateThai($date_value1);
$date2=dateThai($date_value2);

$sql_date="select  *  from  detail_news  where  id_type like'1009' and  date_detail Between '$date_value1' and '$date_value2' ";
$execrs=mysql_query($sql_date);

$swap=1;
$num=1;
$items = 2;
$column =2;
$ic=1;
$dir = opendir($photoDir);
$num=mysql_num_rows($execrs);

$photoDir = 'admin/compcode/photo/' ;
$thumbDir = "admin/compcode/thumb/";
echo"";
?><table width="100%" cellSpacing=0 cellPadding=0>
<tr><td  colspan="2"><strong>ข่าวสุดสัปดาห์ระหว่างวันที่  <? echo"$date1";?>     ถึงวันที่   <?echo"$date2";?></strong> <hr />
<td>
</tr>

<?

    
while($rs_date=mysql_fetch_array($execrs))
{	
	//	echo"123";
		$key1=$rs_date[id_detail];
		$title_detail=$rs_date[title_detail];
		$description_detail=$rs_date[description_detail];
		$date=$rs_date[date_detail];
		$date_detail=dateThai($date);
	//	echo"**$title_detail";



	$sql1 = "SELECT  * From  image  Where id_detail='$key1' ";
	$exec1= mysql_query($sql1);
	$result2=mysql_num_rows($exec1);
	//echo"$result2";
  	
		
		
		if ($ic  == 1)
	 {  echo "<tr align=>";  }
		echo "<td width='50%'  valign=top  ><br><div  class=boldBlack_14>  $title_detail </div>$date_detail <br>";
		echo "<br>";
	 While($result1=mysql_fetch_array($exec1))
	{
		$id_Img =$result1[id_Img];
		$name_Imgtop =$result1[name_Imgtop];
echo "<a href='$thumbDir$name_Imgtop' ><img src='$thumbDir$name_Imgtop'  border=0 width=60 height=60></a><br>";
		
	}


							echo "<font size='2' face='ms sans serif'>$description_detail</font></td>";
							$ic++; 
							if ($ic  > $column )
							 {  
								echo "</tr> \n"; 
								$ic = 1;
							}
}


?>
</table>