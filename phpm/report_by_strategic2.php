<? #session_start(); 
$y=$_GET[y];
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link href="tool/css_text.css" rel="stylesheet" type="text/css">
<body bgcolor="#5c7094" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
<table border="0" cellpadding="0" cellspacing="0" bordercolorlight="#9999cc" bordercolordark="White" width="100%">
<tr>
	<td colspan="4" class="tdpadding"><span class="boldBlack_10">ปีงบประมาณ <?php print $y; ?></span></td>
</tr>
<tr bgcolor="#E0E3CE">
<td class="boldBlack_12" colspan="2">ยุทธศาสตร์</td>
	<td class="boldBlack_12">จำนวนโครงการ</td>
    <td class="boldBlack_12">งบประมาณ</td>
	</tr>
<?
$sql_1= "SELECT strategic.str_id, strategic.strategic_th, sub_strategic.id, sub_strategic.nameth, COUNT( project.pro_id ) AS a, SUM( project_budtype.budget ) AS b
FROM strategic
left JOIN sub_strategic ON ( strategic.str_id = sub_strategic.parent ) 
left JOIN project ON ( project.str_id = sub_strategic.id )
left join project_budtype on (project.pro_id=project_budtype.pro_id)
where project.budget_year='$y' 
GROUP BY strategic.str_id, strategic.strategic_th, sub_strategic.id, sub_strategic.nameth
ORDER BY strategic.str_id ASC";
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
  	<td class="regBlack_13"><?php print $rs[strategic_th]; ?></td>
    <td class="regBlack_13"><?php print $rs[nameth]; ?></td>
    <td class="regBlack_13"><a href="<?=$_SERVER[PHP_SELF];?>?str_id=<?=$rs[id];?>&mode=1&y=<?=$y;?>"><?php print $rs[a]; ?></a></td>
  	<td class="regBlack_13"><?php print  number_format($rs["b"],","); ?></td>
    </tr>
  <?
}
?>
</table>
</body>
</html>
