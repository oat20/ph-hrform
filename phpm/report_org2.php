<?php
$y=$_GET[y]; 
?>
<link href="tool/css_text.css" rel="stylesheet" type="text/css">
<table border="0" cellpadding="3" cellspacing="0" bordercolorlight="#9999cc" bordercolordark="White" width="100%">
<tr>
	<td colspan="4" class="tdpadding"><span class="boldBlack_10">ปีงบประมาณ <?php print $y; ?></span></td>
</tr>
<tr bgcolor="#E0E3CE">
	<td class="boldBlack_12">ส่วนงาน</td>
    <td class="boldBlack_12">จำนวนโครงการ</td>
	<td class="boldBlack_12">งบประมาณ</td>
    </tr>
<?
 //echo"$pagetop"; 
	//$mysql ="select  *   from type_news";
	$sql = "SELECT organization.DeID, organization.Fname, COUNT( project.pro_id ) AS a,sum(project_budtype.budget) as b
FROM organization
LEFT JOIN project ON ( organization.DeID = project.DeID_main )
left join project_budtype on (project.pro_id = project_budtype.pro_id)
where project.budget_year='$y' 
GROUP BY organization.DeID, organization.Fname
ORDER BY organization.DeID ASC";
#$exec = show_user();
$exec=mysql_query($sql);
$swap=1;
while($rs=mysql_fetch_array($exec))
			{
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
	<td bgcolor="<? echo "$color"; ?>" class="regBlack_13"><?php print $rs[Fname]; ?></td> 
        <td class="regBlack_13"><a href="<?=$_SERVER[PHP_SELF];?>?DeID=<?=$rs[DeID];?>&y=<?=$y;?>&mode=1"><?php print $rs[a]; ?></a></td>
        <td bgcolor="<? echo "$color"; ?>" class="regBlack_13"><? echo number_format($rs["b"],","); ?></td>
       </tr>
  <?
}
?>
</table>
