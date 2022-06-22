<? session_start(); 
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

$photoDir = 'admin/compcode/photo/' ;
$thumbDir = "admin/compcode/thumb/";
?>


<link href="tool/css_text.css" rel="stylesheet" type="text/css">
<body bgcolor="#5c7094" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
<br>

<table width="600" border="0" align="center" cellpadding="0" cellspacing="0" >
  <tr><td  background="compcode/picture/bar_null.jpg"><div align="center" class="boldWhite_13">ข่าวสุดสัปดาห์ระหว่างวันที่  <? echo"$date1";?>     ถึงวันที่   <?echo"$date2";?>
</div></td>
</tr>
 <tr> 
            <td valign="top"   >
<table width="100%"  border="1" align="center" cellpadding="0" cellspacing="0" bordercolorlight="#9999cc" bordercolordark="White">
<tr   bgcolor="#E0E3CE">
    <td width="10"><img src="compcode/Img/icons_new.gif"></td>
    <td width="75%" ><div align="center" class="boldBlack_12">ข่าว</div></td>
	<td width="" ><div align="center" class="boldBlack_12">วันที่</div></td>


  </tr>




<?
   /*echo" <tr><td valign=baseline  bgcolor=#FFFFFF class=boldBlack_16   ><DIV class=entryposter><strong><img src="admin/compcode/img/arrow.down.gif/$date1</strong>&nbsp;</DIV><DIV class=commentcontent></DIV></td>
        </tr>";*/
    
while($rs_date=mysql_fetch_array($execrs))
{	
	//	echo"123";
		$key1=$rs_date[id_detail];
		$title_detail=$rs_date[title_detail];
		$description_detail=$rs_date[description_detail];
		$date=$rs_date[date_detail];
		$date_detail=dateThai($date);
	//	echo"**$title_detail";




  	
		
			if ( $swap ==  "1" )
			{
					$color = "#99CEF9";
					$swap = "2";
			}
			else
			{
					$color = "#EEEEEE";
					$swap = "1";
			}
			//กำหนดค่าสลับการสีแถว
?>
  <tr   bgcolor=<? echo "$color"; ?>>
    <td width="10"  class="boldBlack_13"><span class="style1"><? echo"$num."; ?></span></td>
    <td width=""        class="regBlack_13"><? echo"$title_detail";  ?></td>
	<td width=""    class="regBlack_13"><? echo"$date_detail ";  ?></td>

  </tr>
					  		  
  <?
  $num++;
}
?>
<!--<tr >
  <td colspan="5" align="center" background="compcode/picture/bar07.jpg" height="10">&nbsp;  </td>
</tr> -->
  		  

<?
	

?>
	   
</table>

</td>
  </tr>
	 <tr> 
            <td colspan="5"><img src="compcode/picture/bar08.jpg" width="775"  height="6"></td>
          </tr>

</table>
