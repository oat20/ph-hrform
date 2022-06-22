<? session_start(); 
?>


<meta http-equiv="Content-Type" content="text/html; charset=tis-620">
<!-- <link href="tool/css_text.css" rel="stylesheet" type="text/css">
 --><body bgcolor="#5c7094" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">

<br>
<form name="form1" method="post" action="compcode/load_selecthotnews.php">

<table width="775" border="0" align="center" cellpadding="0" cellspacing="0">
<tr><td  background="compcode/picture/bar_null.jpg"><div align="center" class="boldWhite_13">เลือกข่าว hotnews
   1 อันดับ </span></div></td>
<tr> 
            <td>
<table width=100% border="1" align="center" cellpadding="0" cellspacing="0" bordercolorlight="#9999cc" bordercolordark="White">
<tr bgcolor="#E0E3CE">
    <td width="50" ><div align="center" class="boldBlack_12">ลำดับที่</div></td>
    <td width="150"><div align="center" class="boldBlack_12">ข่าว</div></td>
	<td width="82"><div align="center" class="boldBlack_12">วันที่</div></td>
	<td  width="50">&nbsp;<span class="boldBlack_12" align="center">เลือกข่าว </span></td>

  </tr>
 





<?
 //echo"$pagetop"; 

	



$items = 10 ;
//$mysql ="select  *   from type_news";
$sql = "select * from detail_news  where id_type='1001'  and show_news  like  '%y%'ORDER BY id_detail  DESC limit 0,$items ";
$exec=mysql_query($sql);
$swap=1;
$num=1;
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
    <td width="10"   align="center" class="regBlack_13" ><? echo"$num. "; ?></td>
    <td width=""        class="regBlack_13"><? echo"	$title_detail  ";  ?></td>
	<td width="82"    class="regBlack_13"><? echo"	$date_detail ";  ?></td>
    <td width="35"    class="regBlack_13" align="center"><input name="num_key" type="radio" value='<? echo"$id_detail"; ?>'/></td>
  </tr>
					  		  
  <?
$num++;
}
?>
<tr align="right"   bgcolor=#E0E3CE>
    <td colspan="5" >
	<input class=button type="submit" name="submit" value="ตกลง">
    <input class=button type="reset" name="submit2" value="เคลียร์">
	<!-- <input type="button"  class="buttonn" value="&nbsp;&nbsp;เพิ่มงานบริการ&nbsp;&nbsp;" onClick="location.href='default,addservice.php'"> --></td>
    </tr>
		  
		   
</table>
</td>
    </tr>
 <tr> 
	 <td colspan="5"><img src="compcode/picture/bar08.jpg" width="775"  height="6"></td>
 </tr>
</table>
</form>
</body>
</html>
