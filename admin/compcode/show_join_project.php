<!--<link href="tool/css_text.css" rel="stylesheet" type="text/css"> -->
<body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
<!--<h1 class="title">แสดงโครงการ</h1> -->
<table border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#9999cc" bordercolordark="White" width="100%">
<tr   bgcolor="#E0E3CE">
    <th rowspan="2" class="text">ลำดับ</th>
    <th rowspan="2" class="text">ปีงบประมาณ</th>
    <th rowspan="2" class="text"><div align="center">โครงการ</div></th>
	<th colspan="2" class="text"><div align="center">ระยะเวลาการดำเนินงาน</div></th>
  </tr>
<tr   bgcolor="#E0E3CE">
    <th class="text"><div align="center">วันที่เริ่มต้นงาน</div></th>
    <th class="text"><div align="center">วันที่สิ้นสุด</div></th>
</tr>
 <?
 $sql="select * from project
 inner join project_dep_res on (project.pro_id = project_dep_res.pro_id)
 where project_dep_res.DeID='$per_dept' and project_dep_res.kind='join'
 order by project.budget_year, project.created desc";
 $exec=mysql_query($sql);
while($rs=mysql_fetch_array($exec)){
	++$num;
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
    <td class="textthai" align="center"><span><? echo"$num."; ?></span></td>
    <td align="center" class="textthai"><?php print $rs["budget_year"]; ?></td>
    <td width=""        class="textthai"><? echo $rs["names"];  ?></td>
	<td width=""    class="textthai" align="center"><? echo dateThai($rs["pro_start"]);  ?></td>
    <td class="textthai" align="center"><? echo dateThai($rs["pro_end"]);  ?></td>
  </tr>
					  		  
  <?
}
?>
<!--<tr >
  <td colspan="5" align="center" background="compcode/picture/bar07.jpg" height="10">&nbsp;  </td>
</tr> -->
  		  <?
	#$num++;
#}
?>
</table>
</body>
</html>
