<?php 
$y=$_GET[y];
$keyword=$_GET['keyword'];
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
<div id="naiv2">
                        	<form action="<?=$_SERVER['PHP_SELF'];?>" method="get">ค้นหา <input type="text" size="25" name="keyword" /><input type="submit" value="ค้นหา" class="buttonn" /></form>
                        	<p>ปีงบประมาณ <?php include("../inc/report_strategic_year.php"); ?></p>
                        </div>
<!--<h1 class="title">แสดงโครงการ</h1> -->
<table border="0" align="center" cellpadding="0" cellspacing="1" bordercolordark="White" width="100%">
<tr bgcolor="#E0E3CE">
    <th rowspan="2" class="th1">ลำดับ</th>
    <th rowspan="2" class="th1">ปีงบประมาณ</th>
    <th rowspan="2" class="th1">ชื่อโครงการ</th>
    <th rowspan="2" class="th1">ส่วนงานรับผิดชอบ</th>
	<th colspan="2" class="th1">ระยะเวลาการดำเนินงาน</th>
	<!--<th rowspan="2" class="text">&nbsp;</th> -->
  </tr>
<tr bgcolor="#E0E3CE">
    <th class="th1">เริ่ม</th>
    <th class="th1">สิ้นสุด</th>
  </tr>
 <?
 #$sql="select * from project
 #inner join project_dep_res on (project.pro_id = project_dep_res.pro_id)
 #where project_dep_res.DeID='$per_dept' and project_dep_res.kind='main'
 #order by project.budget_year, project.created desc";
 if($y==""){
 	#$sql="select * from project
 	#inner join organization on (project.DeID_main=organization.DeID)
 	#order by project.budget,project.pro_start asc";
	$sql="select * from project,organization
	where (create_by='$per_id'
	or DeID_main='$per_dept')
	and project.DeID_main=organization.DeID";
 }else if($y!=""){
 	$sql="select * from project
 	inner join organization on (project.DeID_main=organization.DeID)
 	where project.budget_year='$y'
 	order by project.budget,project.pro_start asc";
 }else if($keyword!=""){
 	$sql="select * from project
 	inner join organization on (project.DeID_main=organization.DeID)
 	where project.names like '%$keyword%' or project.pro_id like '%$keyword%'
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
  <tr>
    <td align="center" class="td2"><span><? echo"$num."; ?></span></td>
    <td class="td2"><?php print $rs["budget_year"]; ?></td>
    <td width="" class="td2"><a href="pa.php?mode=1&pro_id=<?=$rs['pro_id'];?>"><? echo $rs["names"];  ?></a></td>
    <td class="td2"><?=$rs[Fname];?></td>
	<td width=""    class="td2"><? echo dateThai($rs["pro_start"]);  ?></td>
    <td class="td2"><? echo dateThai($rs["pro_end"]);  ?></td>
    <!--<td class="text" align="center"><a href="report_pa.php?mode=1&pro_id=<?=$rs['pro_id'];?>" title="แสดงรายละเอียด"><img src="../admin/compcode/img/icon_preview.gif" border="0"></a> <a href="pa.php?mode=1&pro_id=<?=$rs['pro_id'];?>" title="แก้ไขข้อมูล"><img src="../admin/compcode/img/editpic.gif" border="0"></a><a href="#" title="ยกเลิกโครงการ"><img src="../admin/compcode/img/botton_delete.gif" border="0"></a></td> -->
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
