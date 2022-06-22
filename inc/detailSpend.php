<? #session_start(); 
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link href="../admin/compcode/tool/css_text.css" rel="stylesheet" type="text/css">
<body bgcolor="#5c7094" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
<fieldset>
  <legend>รายละเอียดค่าใช้จ่าย</legend>
<table width="100%" border="0" cellpadding="0" cellspacing="0" bordercolorlight="#9999cc" bordercolordark="White" class="table2">
<?php
$spe_cate="select * from spending_cate 
order by id asc";
$rs_spe_cate=mysql_query($spe_cate);
while($ob_spe_cate=mysql_fetch_array($rs_spe_cate))
{
?>
<tr bgcolor="#E0E3CE">
<th colspan="3"><?=$ob_spe_cate["spend"].": ".$ob_spe_cate["comment"];?></th>
    </tr>
<?
$sql_1= "SELECT * from project_detail_spend
where pro_id='$_GET[pro_id]'
and spe_id='$ob_spe_cate[id]'
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
  	<td class="regBlack_13"><?=$rs["detail"];?></td>
    <td class="regBlack_13"><a href="javascript:NewWindow('<?=$livesite;?>inc/editDetailspending.php?id=<?=$rs[id];?>','acepopup','600','350','fullscreen','front');" title="แก้ไข"><img src="<?=$livesite;?>admin/compcode/img/editpic.gif" border="0"></a></td>
    <td class="regBlack_13"><a href="<?=$livesite;?>admin/compcode/delProjectdetailspend.php?id=<?=$rs["id"];?>" title="ลบ" onClick="return confirm('! ยืนยันการลบข้อมูล');"><img src="<?=$livesite;?>admin/compcode/img/botton_delete.gif" border="0"></a></td>
    </tr>
 <?
}
}
?>
<tr   bgcolor=<? echo "$color"; ?>>
    <td colspan="3" class="regBlack_13">
    	<input name="" type="button" value="เพิ่มรายละเอียดการใช้จ่าย" class="buttonn" onClick="javascript:NewWindow('<?=$livesite;?>inc/formDetailspending.php?pro_id=<?=$ob[pro_id];?>','acepopup','600','350','fullscreen','front');">
    </td>
    </tr>
</table>
</fieldset>
</body>
</html>
