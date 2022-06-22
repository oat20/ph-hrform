<? session_start(); 

?>



<meta http-equiv="Content-Type" content="text/html; charset=tis-620">
<link href="tool/css_text.css" rel="stylesheet" type="text/css">
<style type="text/css">

</style>
<script type="text/javascript" language="javascript"> 
var freeItemCount=0 
var maxFreeItems=2

function setItems(item)
{ 
  if(item.checked)
  {freeItemCount=freeItemCount+1}

else
 {freeItemCount=freeItemCount-1} 

if (freeItemCount>maxFreeItems)
  {item.checked=false 
  freeItemCount=freeItemCount-1 
  alert('สามารถเลือกข่าวได้ '+maxFreeItems+' ข่าวค่ะ..ไม่สามารถเลือกข่าวได้เกิน '+maxFreeItems+' ข่าวน่ะค่ขอบคุณค่ะ ') 
  } 
} 
</script>

<body bgcolor="#5c7094" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">

<br>
<form name="checkoutLimited" method="post" action="compcode/load.php">

<table width="780" border="0" align="center" cellpadding="0" cellspacing="0">
<tr><td colspan="4" background="compcode/picture/bar_null.jpg"><div align="center" class="boldWhite_13">เลือกภาพข่าวกิจกรรม 2 ข่าว</span></div></td>
</tr>
<tr><td>


<table width="100%"border="1" align="center" cellpadding="0" cellspacing="0" bordercolorlight="#9999cc" bordercolordark="White">
<tr bgcolor="#E0E3CE">
    <td width="10"><img src="compcode/Img/icons_new.gif"></td>
    <td width="290" class="headline"><div align="center" class="boldBlack_12">ข่าว</div></td>
	<td width="82" class="headline"><div align="center" class="boldBlack_12">วันที่</div></td>
	<td  width="134">&nbsp;<span class="boldBlack_12">เลือกข่าว </span></td>

  </tr>
 





<?
 //echo"$pagetop"; 

	



$items = 10 ;
//$mysql ="select  *   from type_news";
$sql = "select * from detail_news  where cate_detail='1'  and  show_news  like  '%y%' ORDER BY id_detail  DESC limit 0,$items ";
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
  <tr bgcolor=<? echo "$color"; ?>  ><input type='hidden' name='id_detail[]' value='<? echo"$id_detail"; ?>'>

    <td width="28"  class="boldBlack_13"><span class="style1"><? echo"$num."; ?></span></td>
    <td width=""  class="regBlack_13"><span class="style1"><? echo"	$title_detail  ";  ?></span></td>
	<td width=""  class="regBlack_13"><span class="style1"><? echo"	$date_detail ";  ?></span></td>
  <td width=""    class="regBlack_13"><input name=number[]  type=checkbox  value='<? echo"$id_detail"; ?>'  onclick="setItems(this)"></td>
	<!-- <td  width="" ><span class="style1">
	  <select name="number[]">
	    <option value=0>news</option>
	    <option value=1>hotnews1</option>
	    <option value=2>hotnews2</option>
	    <option value=3>hotnews3</option>
	    <option value=4>hotnews4</option>
	    <option value=5>hotnews5</option>
	    </select>
	  </span> </td> -->
  </tr>
  
    
  <?
$num++;
}
?>
<tr align="right"   bgcolor=#E0E3CE>
    <td colspan="5" bgcolor="#E0E3CE">
	<input class=button type="submit" name="submit" value="ตกลง">
    <input class=button type="reset" name="submit2" value="เคลียร์"></td>
    </tr>

 		  
		   </table>

</td></tr>
 <tr> 
 <td colspan="5"><img src="compcode/picture/bar08.jpg" width="780"  height="6"></td>
 </tr>

</table>
</form><script type="text/javascript">
    //กำหนดค่าที่จะให้สามารถเลือก Checkbox ได้เท่าไหร่ ในที่นี้ผมได้กำหนดไว้ให้เลือกได้ 2 Checkbox ครับ 
    checkboxlimit(document.forms.article_test.number, 2)
</script> 



</body>
</html>
