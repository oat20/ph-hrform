<? #session_start(); 
/*include "include/config.php";
$conn = connect_db("db_news");
if(!$conn)
echo "�Դ�����Դ��Ҵ�������ö�Դ��͡Ѻ�ҹ��������";*/
?>


<?  //  header_admin("���������Ƿ�����");?>
<link href="tool/css_text.css" rel="stylesheet" type="text/css">
<!--<body bgcolor="#5c7094" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0"> -->
<?php
$sql="select * from section
order by sec_id asc";
$exec=mysql_query($sql);
$total=mysql_num_rows($exec);
?>
<table border="0" cellpadding="3" cellspacing="0" bordercolorlight="#9999cc" bordercolordark="White">
<tr bgcolor="#E0E3CE">
	<td class="boldBlack_12">&nbsp;</td>
    <td class="boldBlack_12">&nbsp;</td>
	<td class="boldBlack_12">ประเภทโครงการ</td>
    <td class="boldBlack_12">รายละเอียดเพิ่มเติ่ม</td>
    </tr>
<?
#$exec = show_data(news_category,id_type);
#$exec = show_data(j,id);
$swap=1;
while($rs=mysql_fetch_array($exec))
			{
			#$initial=$rs[initial];
			/*$sql2="select count(id_detail) as a1
			from news
			where id_type='$id_type'";
			$rs2=mysql_query($sql2);
			$ob2=mysql_fetch_array($rs2);*/

//��˹������Ѻ�������
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
			//��˹������Ѻ�������
?>
  <tr   bgcolor=<? echo "$color"; ?>>
  <td class="regBlack_13"><A HREF=section.php?id_type=<?php echo $rs["sec_id"]; ?>&mode=edit title="แก้ไข"><img src="<?php print $img_path; ?>botton_edit.gif"  border="0"  width="20" height="20"></a></td>
    <td class="regBlack_13" align="center"><A HREF="compcode/delete.php?id_user=<? echo $u_id; ?>" onClick="return confirm('ยืนยันลบข้อมูล')" title="ลบ"><img src="<?php print $img_path; ?>botton_delete.gif"   border="0"width="22" height="20"></a></td>
  
  <td class="regBlack_13"><?php print $rs["section"]; ?></td>
  <td class="regBlack_13"><? echo $rs["comment"];  ?></td>
    </tr>
  <?
}
//?>
</table>
<!--</body>
</html> -->
