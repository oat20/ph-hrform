<?php 
$y=$_GET['y'];
$keyword=$_GET['keyword'];
$per_dept_main=$_GET['per_dept_main'];
$filter=$_GET['filter'];
?>
<SCRIPT LANGUAGE='JAVASCRIPT' TYPE='TEXT/JAVASCRIPT'>
 <!--
var win=null;
function NewWindow(mypage,myname,w,h,pos,infocus){
if(pos=="random"){myleft=(screen.width)?Math.floor(Math.random()*(screen.width-w)):100;mytop=(screen.height)?Math.floor(Math.random()*((screen.height-h)-75)):100;}
if(pos=="center"){myleft=(screen.width)?(screen.width-w)/2:100;mytop=(screen.height)?(screen.height-h)/2:100;}
else if((pos!='center' && pos!="random") || pos==null){myleft=0;mytop=20}
settings="width=" + w + ",height=" + h + ",top=" + mytop + ",left=" + myleft + ",scrollbars=yes,location=no,directories=no,status=no,menubar=no,toolbar=no,resizable=yes";win=window.open(mypage,myname,settings);
win.focus();}
// -->
</script>
<!--<link href="tool/css_text.css" rel="stylesheet" type="text/css"> -->
<body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
<?php include("../inc/search_project.php"); ?>
<!--<div id="naiv2">
                        	<form action="<?=$_SERVER['PHP_SELF']; ?>" method="get">ค้นหา <input type="text" size="25" name="keyword" /><input type="submit" value="ค้นหา" class="buttonn" /></form>
                        	<p>ปีงบประมาณ ><?php include("../inc/report_strategic_year.php"); ?></p>
                        </div> -->
<!--<h1 class="title">แสดงโครงการ</h1> -->
<table border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#9999cc" bordercolordark="White" width="100%">
<tr bgcolor="#E0E3CE">
    <th rowspan="2" class="text"><div align="center">ลำดับ</div></th>
    <th rowspan="2" class="text"><div align="center">ปีงบประมาณ</div></th>
    <th rowspan="2" class="text"><div align="center">ชื่อโครงการ</div></th>
    <th rowspan="2" class="text"><div align="center">ส่วนงานรับผิดชอบ</div></th>
	<th colspan="2" class="text"><div align="center">ระยะเวลาการดำเนินงาน</div></th>
    <!--<th rowspan="2">&nbsp;</th> -->
  </tr>
<tr bgcolor="#E0E3CE">
    <th class="text"><div align="center">เริ่ม</div></th>
    <th class="text"><div align="center">สิ้นสุด</div></th>
</tr>
 <?
 #$sql="select * from project
 #inner join project_dep_res on (project.pro_id = project_dep_res.pro_id)
 #where project_dep_res.DeID='$per_dept' and project_dep_res.kind='main'
 #order by project.budget_year, project.created desc";
 if($filter!=1)
 {
 	$sql="select project.pro_id,project.budget_year,project.names,organization.Fname,project.pro_start,project.pro_end 
	from project
 	inner join organization on (project.DeID_main=organization.DeID)
	inner join project_log on (project.pro_id=project_log.pro_id)
	where project_log.status='2'
	group by project.pro_id,project.budget_year,project.names,organization.Fname,project.pro_start,project.pro_end
 	order by project.budget,project.pro_start asc";
 }
 else
 {
 	$sql="select project.pro_id,project.budget_year,project.names,organization.Fname,project.pro_start,project.pro_end 
	from project
 	inner join organization on (project.DeID_main=organization.DeID)
	inner join project_log on (project.pro_id=project_log.pro_id)
 	where (project.names like '%$keyword%' or project.pro_id like '%$keyword%' or project.budget_year='$y' or project.DeID_main='$per_dept_main')
	and project_log.status='2'
	group by project.pro_id,project.budget_year,project.names,organization.Fname,project.pro_start,project.pro_end
 	order by project.budget,project.pro_start asc";
 }
 
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
    <td class="text" align="center"><span><? echo"$num."; ?></span></td>
    <td align="center" class="text"><?php print $rs["budget_year"]; ?></td>
    <!--<td width=""        class="text"><a href="javascript:NewWindow('../inc/detail_project?pro_id=<?php #print $rs[pro_id]; ?>','acepopup','640','480','fullscreen','front');" title="รายละเอียดโครงการ"><? #echo $rs["names"];  ?></a>
    </td> -->
    <td width=""        class="text"><a href="report_pa.php?pro_id=<?=$rs['pro_id'];?>&mode=1" title="รายละเอียดโครงการ"><? echo $rs["names"];  ?></a>
    </td>
    <td class="tdpadding"><?=$rs[Fname];?></td>
	<td width=""    class="text" align="center"><? echo dateThai($rs["pro_start"]);  ?></td>
    <td class="text" align="center"><? echo dateThai($rs["pro_end"]);  ?></td>
  	<!--<td class="tdpadding"><input type="button" value="รายงานผลการดำเนินโครงการ" class="button4" /></td> -->
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
