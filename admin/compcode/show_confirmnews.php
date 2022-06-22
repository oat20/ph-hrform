<? session_start(); ?>


<meta http-equiv="Content-Type" content="text/html; charset=tis-620">
<link href="tool/css_text.css" rel="stylesheet" type="text/css">
<SCRIPT LANGUAGE="JavaScript">


<!-- 	
// by Nannette Thacker
// http://www.shiningstar.net
// This script checks and unchecks boxes on a form
// Checks and unchecks unlimited number in the group...
// Pass the Checkbox group name...
// call buttons as so:
// <input type=button name="CheckAll"   value="Check All"
	//onClick="checkAll(document.myform.list)">
// <input type=button name="UnCheckAll" value="Uncheck All"
	//onClick="uncheckAll(document.myform.list)">
// -->

<!-- Begin
function checkAll(field)
{
for (i = 0; i < field.length; i++)
	field[i].checked = true ;
}

function uncheckAll(field)
{
for (i = 0; i < field.length; i++)
	field[i].checked = false ;
}
//  End -->

</script>


<body bgcolor="#5c7094" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">

<br>
<?
$items = 10 ;
$sql = "select * from detail_news    where   show_news NOT LIKE  '%y%'  ORDER BY id_detail  DESC limit 0,$items ";
$exec=mysql_query($sql);
$number =mysql_num_rows($exec);

if($number)
{
?>
<form name="myform" method="post" action="compcode/load_confirmnews.php">

<table width="600" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr><td  background="compcode/picture/bar_null.jpg"><div align="center" class="boldWhite_13">ยืนยันก่อนข่าวขึ้น show </span></div></td>
</tr>
 <tr> 
            <td >
<table width=100% border="1" align="center" cellpadding="0" cellspacing="0" bordercolorlight="#9999cc" bordercolordark="White">
<tr   bgcolor="#E0E3CE">
    <td width="10"><div align="center" class="boldBlack_12">เลือกข่าว</div></td>
    <td width="560" class="headline"><div align="center" class="boldBlack_12">ข่าว</div></td>
	<td width="10" class="headline"><div align="center" class="boldBlack_12">วันที่</div></td>
	<td width="10" class="boldBlack_12">เวลา</td>

  </tr>
 





<?


	




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

    <td width=""    class="regBlack_13"><input name=key[]  type=checkbox  value='<? echo"$id_detail"; ?>'  checked/></td>
    <td width=""        class="regBlack_13"><? echo"$title_detail";  ?></td>
	<td width=""    class="regBlack_13"><? echo"$date_detail ";  ?></td>
	<td width=""   class="regBlack_13"><? echo"$time_detail";  ?></td>
  </tr>
					  		  
  <?
$num++;
}
?>
<tr align="right"   bgcolor=#E0E3CE>
    <td colspan="5" bgcolor="#E0E3CE">
	<input   class=button  type=button value="เลือกทั้งหมด" onClick="checkAll(document.myform)">
	<input class=buttonn   type=buttonn value="ไม่เลือกทั้งหมด" onClick="uncheckAll(document.myform)">
	<input class=button type="submit" name="submit" value="ตกลง">
	</td>
</tr>
  		  
		   
</table>

</td>
    </tr>
	 <tr> 
            <td colspan="5"><img src="compcode/picture/bar08.jpg" width="775"  height="6"></td>
          </tr>

</table>
</form>

<?
}
else
{
warning("ไม่มีข่าวให้ยืนยันก่อนขึ้นโชว์");
}
?>
</body>
</html>
