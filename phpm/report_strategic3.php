<? #session_start(); 
/*include "include/config.php";
$conn = connect_db("db_news");
if(!$conn)
echo "�Դ�����Դ��Ҵ�������ö�Դ��͡Ѻ�ҹ��������";*/
$str_id=$_GET[str_id];
$y=$_GET[y]
?>


<?  //  header_admin("���������Ƿ�����");?>
<link href="tool/css_text.css" rel="stylesheet" type="text/css">
<!--<body bgcolor="#5c7094" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0"> -->
<?php
$sql="select project.pro_id,project.names,project.budget_year,project.pro_start,project.pro_end, sum(project_budtype.budget) as a1 
from project
left join project_budtype on (project.pro_id=project_budtype.pro_id)
where project.str_id='$str_id' 
and project.budget_year='$y'
group by project.pro_id,project.names,project.budget_year,project.pro_start,project.pro_end
order by project.pro_start asc";
$exec=mysql_query($sql);
$total=mysql_num_rows($exec);

$sql2="select * from strategic
inner join sub_strategic on (strategic.str_id=sub_strategic.parent)
where sub_strategic.id='$str_id'";
$rs2=mysql_query($sql2);
$ob2=mysql_fetch_array($rs2);
?>
<table border="0" align="center" cellpadding="3" cellspacing="0" bordercolorlight="#9999cc" bordercolordark="White" width="100%">
<tr>
	<td colspan="4" class="tdpadding"><span class="boldBlack_10"><?=$ob2[strategic_th]." > ".$ob2[nameth];?></span></td>
</tr>
<tr bgcolor="#E0E3CE">
	<td class="boldBlack_12">ลำดับ</td>
    <td class="boldBlack_12">ชื่อโครงการ</td>
    <td class="boldBlack_12">ปีงบประมาณ</td>
    <td class="boldBlack_12">ระยะเวลา</td>
    <td class="boldBlack_12">งบประมาณ</td>
    <!--<td class="boldBlack_12"></td> -->
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
  <td class="regBlack_13"><?=++$i;?></td>
  <td class="regBlack_13"><a href="../inc/detail_project.php?pro_id=<?=$rs[pro_id];?>" target="_blank"><?php print $rs[names]; ?></a></td>
  <td class="regBlack_13"><?=$rs[budget_year];?></td>
  <td class="regBlack_13"><? echo dateThai($rs["pro_start"])." ถึง ".dateThai($rs[pro_end]);  ?></td>
    <td class="regBlack_13"><? echo number_format($rs["a1"],",");  ?></td>
    <!--<td class="regBlack_13">
    	<a href="#">[รายงานแบบเสนอโครงการ]</a><br/>
        <a href="#">[รายงาน PA]</a><br/>
        <a href="#">[รายงาน MU-FIS]</a>
    </td> -->
    </tr>
  <?
}
//?>
</table>
<!--</body>
</html> -->
