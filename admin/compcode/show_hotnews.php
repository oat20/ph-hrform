<? session_start(); ?>
<link href="tool/css_text.css" rel="stylesheet" type="text/css">
<body bgcolor="#5c7094" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
<br>

<table width="600" border="0" align="center" cellpadding="0" cellspacing="0" >
  <tr><td  background="compcode/picture/bar_null.jpg"><div align="center" class="boldWhite_13">ข่าวที่เลือก 2 อันดับ </div></td>
</tr>
 <tr> 
            <td valign="top"   >
<table width="100%"  border="1" align="center" cellpadding="0" cellspacing="0" bordercolorlight="#9999cc" bordercolordark="White">
<tr   bgcolor="#E0E3CE">
    <td width="10"><img src="compcode/Img/icons_new.gif"></td>
    <td width="75%" ><div align="center" class="boldBlack_12">ข่าว</div></td>
	<td width="" ><div align="center" class="boldBlack_12">วันที่</div></td>
	<td width="20" class="boldBlack_12">เวลา</td>

  </tr>
 

<?
$sql_hot = "select * from imghot    ";
$exec_hot=mysql_query($sql_hot);


$swap=1;
$num=1;
while($rs=mysql_fetch_array($exec_hot))
			{
			$id_detail=$rs[id_detail];



			$sql = "select * from detail_news    where   id_detail  LIKE  '$id_detail'  ";
			$exec=mysql_query($sql);
			$number =mysql_num_rows($exec);


?>





<?
 //echo"$pagetop"; 

	






while($rs=mysql_fetch_array($exec))
			{
			$id_detail=$rs[id_detail];
			$title_detail=$rs[title_detail];
			$date=$rs[date_detail];
			$date_detail=dateThai($date);

			$time_detail=$rs[time_detail];



//กำหนดค่าสลับการสีแถว
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
	<td width=""   class="regBlack_13"><? echo"$time_detail";  ?></td>
  </tr>
					  		  
  <?
}
?>
<!--<tr >
  <td colspan="5" align="center" background="compcode/picture/bar07.jpg" height="10">&nbsp;  </td>
</tr> -->
  		  

<?
	$num++;
}
?>
	   
</table>

</td>
  </tr>
	 <tr> 
            <td colspan="5"><img src="compcode/picture/bar08.jpg" width="775"  height="6"></td>
          </tr>

</table>


</body>
</html>
