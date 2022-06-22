<? #session_start(); 
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link href="../admin/compcode/tool/css_text.css" rel="stylesheet" type="text/css">
<body bgcolor="#5c7094" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
<fieldset>
  <legend>แผนการใช้จ่ายงบประมาณของโครงการ</legend>
<table width="100%" border="0" cellpadding="0" cellspacing="0" bordercolorlight="#9999cc" bordercolordark="White" class="table2">
<tr bgcolor="#E0E3CE">
<th>รายการ</th>
    <th>งบประมาณทั้งหมด<br/>(บาท)</th>
    <th>ต.ค.<br/>(บาท)</th>
	<th>พ.ย.<br/>(บาท)</th>
	<th>ธ.ค.<br/>(บาท)</th>
	<th>ม.ค.<br/>(บาท)</th>
	<th>ก.พ.<br/>(บาท)</th>
	<th>มี.ค.<br/>(บาท)</th>
	<th>เม.ย.<br/>(บาท)</th>
	<th>พ.ค.<br/>(บาท)</th>
	<th>มิ.ย.<br/>(บาท)</th>
	<th>ก.ค.<br/>(บาท)</th>
	<th>ส.ค.<br/>(บาท)</th>
	<th>ก.ย.<br/>(บาท)</th>
	<th colspan="2">&nbsp;</th>
	</tr>
<?
$sql_1= "SELECT * from project_spending_plan
where pro_id='$_GET[pro_id]'
order by id asc";
$result_1=mysql_query($sql_1);
//echo"$result_1=mysql_query($sql_1);";
$num_rows =mysql_num_rows($result_1);
$swap=1;
		For ($i=0; $i < $num_rows; $i++){

//$exec=show_newsmimistry(detail_news,id_detail,$ministry);
//$exec = show_data(detail_news,id_detail);

$rs=mysql_fetch_array($result_1);
//¡ÓË¹´¤èÒÊÅÑº¡ÒÃÊÕá¶Ç
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
			//¡ÓË¹´¤èÒÊÅÑº¡ÒÃÊÕá¶Ç
?>
  <tr   bgcolor=<? echo "$color"; ?>>
  	<td class="regBlack_13"><?=$rs["list"];?></td>
    <td class="regBlack_13"><?=number_format($rs["budget"],"2");?></td>
      	<td class="regBlack_13" align="center"><? echo number_format($rs["m10"],"2");  ?></td>
    <td class="regBlack_13"><? echo number_format($rs["m11"],"2");  ?></td>
    <td class="regBlack_13"><? echo number_format($rs["m12"],"2");  ?></td>
    <td class="regBlack_13"><? echo number_format($rs["m1"],"2");  ?></td>
    <td class="regBlack_13"><? echo number_format($rs["m2"],"2");  ?></td>
    <td class="regBlack_13"><? echo number_format($rs["m3"],"2");  ?></td>
    <td class="regBlack_13"><? echo number_format($rs["m4"],"2");  ?></td>
    <td class="regBlack_13"><? echo number_format($rs["m5"],"2");  ?></td>
    <td class="regBlack_13"><? echo number_format($rs["m6"],"2");  ?></td>
    <td class="regBlack_13"><? echo number_format($rs["m7"],"2");  ?></td>
    <td class="regBlack_13"><? echo number_format($rs["m8"],"2");  ?></td>
    <td class="regBlack_13"><? echo number_format($rs["m9"],"2");  ?></td>
    <td class="regBlack_13"><a href="javascript:NewWindow('<?=$livesite;?>inc/editProjectspendplan.php?id=<?php print $rs[id]; ?>','acepopup','600','650','fullscreen','front');"" title="แก้ไข"><img src="<?=$livesite;?>admin/compcode/img/editpic.gif" border="0"></a></td>
    <td class="regBlack_13"><a href="<?=$livesite;?>admin/compcode/delProjectspendplan.php?id=<?=$rs["id"];?>" title="ลบ" onClick="return confirm('ยืนยันการลบข้อมูล');"><img src="<?=$livesite;?>admin/compcode/img/botton_delete.gif" border="0"></a></td>
    </tr>
  <?
}
?>
	<tr   bgcolor=<? echo "$color"; ?>>
    <td colspan="16" class="regBlack_13"><input name="" type="button" value="เพิ่มแผนการใช้จ่าย" class="buttonn" onClick="javascript:NewWindow('<?=$livesite;?>inc/formSpendingplan.php?pro_id=<?=$ob[pro_id];?>','acepopup','600','650','fullscreen','front');"></td>
    </tr>
</table>
</fieldset>
</body>
</html>
