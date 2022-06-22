<? #session_start(); 
/*include "include/config.php";
$conn = connect_db("db_news");
if(!$conn)
echo "เกิดความผิดพลาดไม่สามารถติดต่อกับฐานข้อมูลได้";*/
?>


<?  //  header_admin("ประเภทข่าวทั้งหมด");?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link href="tool/css_text.css" rel="stylesheet" type="text/css">
<body bgcolor="#5c7094" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
<table border="0" align="center" cellpadding="0" cellspacing="0" bordercolorlight="#9999cc" bordercolordark="White">
<tr   bgcolor="#E0E3CE">
<td class="boldBlack_12">&nbsp;</th>
    <td class="boldBlack_12">&nbsp;</th>
    <td class="boldBlack_12">ID</th>
	<td class="boldBlack_12">เป้าประสงค์</td>
    </tr>
<?
$sql="select * from objective
order by obj_id asc";
#$exec = show_data(person_most,id_person);
$exec=mysql_query($sql);
$swap=1;
while($rs=mysql_fetch_array($exec))
			{
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
  <td class="regBlack_13"><? echo"<A HREF=default,editperson.php?id_person=$id_person&&edit='edit'>"?><img src="<?php print $img_path; ?>botton_edit.gif"  border="0"  width="20" height="20"></a></td> 
        <td class="regBlack_13"><A HREF="compcode/delete.php?id_person=<? echo $id_person; ?>&&initial<? echo $initial; ?>" onClick="return confirm('คุณแน่ใจว่าต้องการจะลบข้อมูล')"><img src="<?php print $img_path; ?>botton_delete.gif" border="0" width="20" height="20"></a></td>
        <td class="regBlack_13"><? echo $rs["obj_id"];  ?></td>
     <td class="regBlack_13"><? echo $rs["objective"];  ?></td>
  </tr>
  
  
  <?
}
//?>
</table>
</body>
</html>
