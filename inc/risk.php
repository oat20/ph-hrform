<? #session_start(); 
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link href="../admin/compcode/tool/css_text.css" rel="stylesheet" type="text/css">
<body bgcolor="#5c7094" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
<fieldset>
  <legend>ความเสี่ยงที่สำคัญที่จะอาจจะเกิดขึ้นจากกระบวนการ ผลผลิต ผลลัพธ์ ของโครงการ</legend>
<table width="100%" border="0" cellpadding="0" cellspacing="0" bordercolorlight="#9999cc" bordercolordark="White" class="table2">
<tr bgcolor="#E0E3CE">
<th class="td1">ประเด็นที่ต้องพิจารณาความเสี่ยงที่อาจจะเกิดขึ้น</th>
    <th class="td1">ความเสี่ยงที่อาจจะเกิดขึ้น</th>
    <th class="td1">คำอธิบาย</th>
	<th class="td1">ระดับความเสี่ยง</th>
	<th class="td1">แนวทางการป้องกัน
ความเสี่ยง
</th>
	<th class="td1">ผู้ที่รับผิดชอบต่อการนำแนวทาง การป้องกันไปใช้</th>
	<th class="td1">ต้นทุนที่จะเกิดขึ้นจากการนำแนวทางการป้องกันไปใช้</th>
	<th colspan="2" class="td1">&nbsp;</th>
	</tr>
    <?php
	$risk="select * from risk_cate
	order by ris_id asc";
	$rs_risk=mysql_query($risk);
	while($ob_risk=mysql_fetch_array($rs_risk))
	{
	?>
    <tr   bgcolor=<? echo "$color"; ?>>
    <th colspan="9"><strong><?=$ob_risk["risk"].": ".$ob_risk["description"];?></strong></th>
    </tr>
<?
$sql_1= "SELECT * from project_risk
where pro_id='$_GET[pro_id]'
and ris_id='$ob_risk[ris_id]'
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
  	<td class="regBlack_13"><?=$rs["issue"];?></td>
    <td class="regBlack_13"><?=$rs["risk"];?></td>
      	<td class="regBlack_13" align="center"><? echo $rs["comment"];  ?></td>
    <td class="regBlack_13"><strong><? echo $risk_level[$rs["level"]];  ?></strong></td>
    <td class="regBlack_13"><? echo $rs["protect"];  ?></td>
    <td class="regBlack_13"><? echo $rs["respone"];  ?></td>
    <td class="regBlack_13"><? echo $rs["cost"];  ?></td>
    <td class="regBlack_13"><a href="javascript:NewWindow('<?=$livesite;?>inc/editRisk.php?id=<?=$rs[id];?>','acepopup','650','500','fullscreen','front');" title="แก้ไข"><img src="<?=$livesite;?>admin/compcode/img/editpic.gif" border="0"></a></td>
    <td class="regBlack_13"><a href="<?=$livesite;?>admin/compcode/delRisk.php?id=<?=$rs["id"];?>" title="ลบ" onClick="return confirm('! ยืนยันการลบข้อมูล');"><img src="<?=$livesite;?>admin/compcode/img/botton_delete.gif" border="0"></a></td>
    </tr>
  
  <?
}
	}
?>
<tr   bgcolor=<? echo "$color"; ?>>
    <td colspan="9" class="regBlack_13">
    	<input name="" type="button" value="เพิ่มความเสี่ยงที่อาจเกิดขึ้น" class="buttonn" onClick="javascript:NewWindow('<?=$livesite;?>inc/formRisk.php?pro_id=<?=$ob[pro_id];?>','acepopup','650','500','fullscreen','front');">
    </td>
    </tr>
</table>
</fieldset>
</body>
</html>
