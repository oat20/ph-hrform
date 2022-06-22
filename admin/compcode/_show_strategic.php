<table border="0" cellpadding="3" cellspacing="0" bordercolorlight="#9999cc" bordercolordark="White">
<tr bgcolor="#E0E3CE">
<td class="boldBlack_12">&nbsp;</td>
    <td class="boldBlack_12"><div>&nbsp;</div></td>
    <td class="boldBlack_12">ยุทธศาสตร์</td>
</tr>
<?
 //echo"$pagetop"; 
#$conn = connect_db("db_news");
	
/*$sql_1= "SELECT * from  detail_news,user,type_news   
where detail_news.user_login=user.username and detail_news.id_type=type_news.id_type
order by detail_news.date_detail desc   
LIMIT $goto , $pagelen";*/
/*$sql_1="select * from news, news_category, admin
where news.id_type=news_category.id_type and news.user_login=admin.username and news.trash = '0'
order by news.date_detail desc";*/
$sql_1="SELECT str_id, strategic_th
FROM strategic
ORDER BY str_id ASC";
$result_1=mysql_query($sql_1);
$num_rows =mysql_num_rows($result_1);

		For ($i=0; $i < $num_rows; $i++){
				$rs=mysql_fetch_array($result_1);
				#$names=$rs["names"];
				#$name_type=$rs["name_type"];
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
  <tr bgcolor=<? echo "$color"; ?>>
  <td class="regBlack_13"><A HREF="str.php?id_detail=<? echo $rs["str_id"]; ?>&mode=edit" title="แก้ไข"><img src="<?=$img_path; ?>botton_edit.gif"   border="0"width="20" height="20"></a> </td>
    <td class="regBlack_13"><A HREF="compcode/delete.php?id_detail=<? echo $rs["id_detail"]; ?>" onClick="return confirm('ยืนยันลบข้อมูล')" title="ลบ"><img src="<?=$img_path; ?>botton_delete.gif" border="0"width="20" height="20"></a></td>
    <td class="regBlack_13"><?php echo $rs["strategic_th"]; ?></td>
  </tr>
  <?
}
?>
</table>
