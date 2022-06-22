<? 
/*include "include/config.php";
$conn = connect_db("db_news");
if(!$conn)
echo "�Դ�����Դ��Ҵ�������ö�Դ��͡Ѻ�ҹ��������";*/
?>


<?  //  header_admin("���������Ƿ�����");?>
<link href="tool/css_text.css" rel="stylesheet" type="text/css">
<body bgcolor="#5c7094" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
<table border="0" align="center" cellpadding="0" cellspacing="0" bordercolorlight="#9999cc" bordercolordark="White">

<tr   bgcolor="#E0E3CE">
    <td class="boldBlack_12">&nbsp;</td>
    <td  class="boldBlack_12"><div>&nbsp;</div></td>
	<td class="boldBlack_12">นโยบายรัฐบาล</td>
  </tr>
<?
$sql="select * from policy
order by pol_id desc";
$exec=mysql_query($sql);
#$exec = show_data(position_news,id_position);
$swap=1;
while($rs=mysql_fetch_array($exec))
			{
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
      <td class="regBlack_13"><? echo"<A HREF=default,editposition.php?id_position=$id_position>"?><img src="<?php print $img_path; ?>botton_edit.gif"  border="0"  width="20" height="20"></a></td>
    <td class="regBlack_13"><A HREF="compcode/delete.php?id_position=<? echo $id_position; ?>&&initial<? echo $initial; ?>" onClick="return confirm('ยืนยันลบข้อมูล')"> <img src="<?php print $img_path; ?>botton_delete.gif" border="0" width="20" height="20"></a></td>
    <td class="regBlack_13"><?php print $rs["policy"]; ?></td>
  </tr>
  <?
}
//?>
</table>
</body>
</html>
