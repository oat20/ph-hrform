<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link href="tool/css_text.css" rel="stylesheet" type="text/css">
<body bgcolor="#5c7094" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">

<table border="0" cellpadding="0" cellspacing="0" bordercolorlight="#9999cc" bordercolordark="White">
<tr   bgcolor="#E0E3CE">
    <td  class="boldBlack_12">&nbsp;</td>
    <td class="boldBlack_12">&nbsp;</td>
	<td class="boldBlack_12">ลักษณะโครงการ</td>
	<td class="boldBlack_12">รายละเอียดเพิ่มเติม</td>
  </tr>







<?
 //echo"$pagetop"; 

$sql_1= "SELECT * 
from type_section
order by typ_id asc";
$result_1=mysql_query($sql_1);
$num_rows =mysql_num_rows($result_1);

		For ($i=0; $i < $num_rows; $i++){
				$rs=mysql_fetch_array($result_1);
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
    <td class="regBlack_13"><a href="projecttype.php?typ_id=<?php print $rs["typ_id"]; ?>" title="แก้ไข"><img src="<?php print $img_path; ?>botton_edit.gif" /></a></td>
    <td class="regBlack_13"><a href="#" title="ลบ"><img src="<?php print $img_path; ?>botton_delete.gif" /></a></td>
	<td class="regBlack_13"><? echo $rs["type_s"];  ?></td>
	<td class="regBlack_13"><? echo $rs["comment"];  ?></td>
  </tr>
  
  
  <?

}
?>
</table>
</body>
</html>
