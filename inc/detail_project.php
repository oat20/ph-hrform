<?php
include("../admin/compcode/include/config.php");
include("../admin/compcode/include/connect_db.php");
include("../admin/compcode/include/function.php");

$pro_id=$_GET[pro_id];
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title><?=$pro_id;?></title>
</head>

<body>
</body>
</html>
<!DOCTYPE html>
<html>
<head>
<link href="../room_it/style2.css" rel="stylesheet" type="text/css"/>
<link href="../admin/compcode/tool/css_text.css" rel="stylesheet" type="text/css"/>

  <link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" rel="stylesheet" type="text/css"/>
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js"></script>
  <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"></script>
  
  <script>
  $(document).ready(function() {
    $("#accordion").accordion();
  });
  </script>
</head>
<body>
 <?php
 $sql="select * from project 
 left join section on (project.sec_id=section.sec_id)
 left join type_section on (project.typ_id=type_section.typ_id)
 left join sub_strategic on (project.str_id=sub_strategic.id)
 left join strategic on (sub_strategic.parent=strategic.str_id)
 left join objective on (project.obj_id=objective.obj_id)
 left join sub_point_policy on (project.sub_id=sub_point_policy.sub_id)
 left join activity on (project.act_id=activity.act_id)
 left join budtype on (project.bt_id=budtype.bt_id)
 left join organization on (project.DeID_main=organization.DeID)
 where project.pro_id='$pro_id'";
 $rs=mysql_query($sql);
 $ob=mysql_fetch_array($rs);
 ?> 
<div id="accordion">
	<h3><a href="#">ชื่อโครงการ</a> <img src="../admin/compcode/img/editpic.gif" border="0" alt="แก้ไข"></h3>
	<div>
		<table border="0" cellpadding="0" cellspacing="0">
	<tr>
    	<td class="tdpadding"><span class="boldBlack_10">ปีงบประมาณ:</span></td>
        <td class="tdpadding"><span class="regBlack_10"><?php print $ob[budget_year]; ?></span></td>
    </tr>
     <tr>
          <td class="tdpadding"><span class="boldBlack_10">ชื่อโครงการ:</span></td>
          <td class="tdpadding"><span class="regBlack_10"><?php print $ob[names]; ?></span></td>
    </tr>
  </table>
	</div>
    
	<h3><a href="#">หน่วยงานรับผิดชอบ</a> <img src="../admin/compcode/img/editpic.gif" border="0" alt="แก้ไข"></h3>
	<div>
    <?php
	$sql2="select * from organization";
	$rs2=mysql_query($sql2);
	$ob2=mysql_fetch_array($rs2);
	?>
		<table cellspacing="0">
<tr>
          <td valign="top" class="formcolhd">ส่วนงานรับผิดชอบ :</td>
          <td  align="left" class="formcol2"><?php #if($ob2[DeID]==$ob[DeID_main]){ print $ob2[Fname]; }
		  print $ob[Fname]; ?></td>
        </tr>
        <!--<tr >
          <td>ส่วนงานร่วม:</td>
          <td class="formcol2"><?php #if($ob2[DeID]==$ob[DeID_join]){ print $ob2[Fname]; } ?></td>
        </tr> -->
        </table>
	</div>
    
	<h3><a href="#">ผู้รับผิดชอบ</a> <img src="../admin/compcode/img/editpic.gif" border="0" alt="แก้ไข"></h3>
	<div>
		<table border="0" cellpadding="0" cellspacing="0">
    	<tr>
        	<td class="formcolhd">ลำดับ</td>
        	<td class="formcolhd">ตำแหน่งในโครงการ</td>
            <td class="formcolhd">ชื่อบุคคล</td>
            <td class="formcolhd">บทบาทหน้าที่ความรับผิดชอบ</td>
        </tr>
        <?php
		$sql3="select * from project_res where pro_id='$pro_id'
		order by id asc";
		$rs3=mysql_query($sql3);
		while($ob3=mysql_fetch_array($rs3)){
		?>
        <tr>
        	<td class="formcol2"><?php print ++$i; ?></td>
        	<td class="formcol2"><?php print $pro_position[$ob3[position]]; ?></td>
            <td class="formcol2"><?php print $ob3[names]; ?></td>
            <td class="formcol2"><?php print $ob3[mission]; ?></td>
        </tr>
        <?php
		}
		?>
        </table>
	</div>
    
	<h3><a href="#">ประเภทโครงการ</a> <img src="../admin/compcode/img/editpic.gif" border="0" alt="แก้ไข"></h3>
	<div>
		<?php print $ob[section]; ?>
	</div>
    
    <h3><a href="#">ลักษณะโครงการ</a> <img src="../admin/compcode/img/editpic.gif" border="0" alt="แก้ไข"></h3>
	<div>
		<?php print $ob[type_s]; ?>
	</div>
    
    <h3><a href="#">ประเด็นยุทธศาสตร์มหาวิทยาลัย</a> <img src="../admin/compcode/img/editpic.gif" border="0" alt="แก้ไข"></h3>
	<div>
		<table cellspacing="0">
        	<tr>
            	<td class="formcolhd">ยุทธศาสตร์:</td>
                <td class="formcol2"><?php print $ob[strategic_th]." > ".$ob[nameth]; ?></td>
            </tr>
            <tr>
            	<td class="formcolhd">ความสอดคล้องตามเป้าประสงค์หลัก:</td>
                <td class="formcol2"><?php print $ob[objective]; ?></td>
            </tr>
        </table>
	</div>
    
    <h3><a href="#">สอดคล้องกับนโยบายรัฐบาล</a> <img src="../admin/compcode/img/editpic.gif" border="0" alt="แก้ไข"></h3>
	<div>
		<?php 
		$sql8="select * from 
		point_policy, sub_point_policy, project_pol
		where project_pol.sub_id=sub_point_policy.sub_id
		and sub_point_policy.poi_id=point_policy.poi_id
		and project_pol.pro_id='$ob[pro_id]'";
		$rs8=mysql_query($sql8);
		while($ob8=mysql_fetch_array($rs8))
		{
			print "> ".$ob8[subname]."<br/>"; 
			}
		?>
	</div>
    
    <h3><a href="#">ความสำคัญ หลักการและเหตุผลของโครงการ</a> <img src="../admin/compcode/img/editpic.gif" border="0" alt="แก้ไข"></h3>
	<div>
		<?php print $ob[reason]; ?>
	</div>
    
    <h3><a href="#">วัตถุประสงค์ของโครงการ</a> <img src="../admin/compcode/img/editpic.gif" border="0" alt="แก้ไข"></h3>
	<div>
		<?php print $ob[pro_obj]; ?>
	</div>
    
    <h3><a href="#">กลุ่มเป้าหมายและขอบเขตการดำเนินการ</a> <img src="../admin/compcode/img/editpic.gif" border="0" alt="แก้ไข"></h3>
	<div>
		<table cellspacing="0">
        	<tr>
            	<td class="formcolhd">กลุ่มผู้รับบริการเป้าหมาย</td>
                <td class="formcolhd">พื้นที่/สถานที่เป้าหมาย</td>
            </tr>
            <tr>
            	<td class="formcol2"><?php print $ob[pro_target_group]." ".$ob[pro_target_group_number]." ".$ob[pro_target_group_unit];?></td>
                <td class="formcol2"><?php print $ob[pro_area]; ?></td>
            </tr>
        </table>
	</div>
    
    <h3><a href="#">ระยะเวลาการดำเนินงาน</a> <img src="../admin/compcode/img/editpic.gif" border="0" alt="แก้ไข"></h3>
	<div>
		<?php print dateThai($ob[pro_start])." ถึง ".dateThai($ob[pro_end]); ?>
	</div>
    
    <h3><a href="#">ขั้นตอนและกระบวนการการดำเนินโครงการ</a> <img src="../admin/compcode/img/editpic.gif" border="0" alt="แก้ไข"></h3>
	<div>
		<table border="0" cellpadding="0" cellspacing="0">
<tr>
             	<td class="formcolhd">วัน เดือน ปี </td>
                <td class="formcolhd">ขั้นตอน</td>
                <td class="formcolhd">กิจกรรม</td>
                <td class="formcolhd">แผนดำเนินงาน (ร้อยละ)</td>
                <td class="formcolhd">แผนการใช้เงิน (บาท)</td>
             </tr>
             
             <?php
			 $sql4="select * from project_step
			 where pro_id='$pro_id'
			 order by id asc";
			 $rs4=mysql_query($sql4);
			 while($ob4=mysql_fetch_array($rs4)){
             print "<tr>";
             	print "<td class='formcol2'>".$ob4[date_step]."</td>";
				print "<td class='formcol2'>".$step[$ob4[step]]."</td>";
				print "<td class='formcol2'>".$ob4[act_step]."</td>";
				print "<td class='formcol2'>".$ob4[plan_step]."%</td>";
				print "<td class='formcol2'>".$ob4[bug_step]."</td>";
             print "</tr>";
			 }
             ?>
             </table>
             
	</div>
    
    <h3><a href="#">ผลการดำเนินงานที่ผ่านมา</a> <img src="../admin/compcode/img/editpic.gif" border="0" alt="แก้ไข"></h3>
	<div>
		<?php print $ob[reason2]; ?>
	</div>
    
    <h3><a href="#">ตัวชี้วัดผลผลิตโครงการ</a> <img src="../admin/compcode/img/editpic.gif" border="0" alt="แก้ไข"></h3>
	<div>
		<table border="0" cellpadding="0" cellspacing="0" width="100%">
<tr>
    	<td rowspan="2" class="formcolhd">ชื่อตัวชี้วัด</td>
        <td rowspan="2" class="formcolhd">ตัวชี้วัด</td>
        <td colspan="4" class="formcolhd">ประเภทตัวชี้วัด</td>
        <td colspan="3" class="formcolhd"><center>ค่าเป้าหมาย</center></td>
        <td rowspan="2" class="formcolhd"></td>
        <td rowspan="2" class="formcolhd"></td>
    </tr>
    <tr>
      <td class="formcolhd">ปริมาณ</td>
      <td class="formcolhd">คุณภาพ</td>
      <td class="formcolhd">เวลา</td>
      <td class="formcolhd">คุ้มค่า</td>
    	<td class="formcolhd"><center>แผน</center></td>
        <td class="formcolhd"><center>ผล</center></td>
        <td class="formcolhd"><center>หน่วยนับ</center></td>
    </tr>
    
    <?php
	$sql5="select * from project_ind
	left join indicator on (project_ind.ind_id=indicator.ind_id)
	where project_ind.pro_id='$ob[pro_id]'
	order by project_ind.id asc";
	$rs5=mysql_query($sql5);
	while($ob5=mysql_fetch_array($rs5)){
    print "<tr>";
      print "<td class='formcol2'>".$ob5[ind_name]."</td>";
      print "<td class='formcol2'>".$ob5[indicator]."</td>";
	  # print "<td class='formcol2'>".$ob5[ind_type]."</td>";
	   print "<td class='formcol2'>";
	   	if($ob5[a] == 1){
			print '<input name="a" type="checkbox" value="1" checked="checked" />';
	  	}else{
		 print '<input name="a" type="checkbox" value="1" />';
	  }
	  print "</td>";
	   print "<td class='formcol2'>";
	   	if($ob5[q] == 1){
			print '<input name="q" type="checkbox" value="1" checked="checked" />';
	  	}else{
		 print '<input name="q" type="checkbox" value="1" />';
	  }
	  print "</td>";
	   print "<td class='formcol2'>";
	   	if($ob5[t] == 1){
			print '<input name="t" type="checkbox" value="1" checked="checked" />';
	  	}else{
		 print '<input name="t" type="checkbox" value="1" />';
	  }
	  print "</td>";
	    print "<td class='formcol2'>";
	   	if($ob5[w] == 1){
			print '<input name="w" type="checkbox" value="1" checked="checked" />';
	  	}else{
		 print '<input name="w" type="checkbox" value="1" />';
	  }
	  print "</td>";
	    print "<td class='formcol2'>".$ob5[plan]."</td>";
		 print "<td class='formcol2'>".$ob5[results]."</td>";
	        print "<td class='formcol2'>".$ob5['counts']."</td>";
    print "</tr>";
	}
	?>
    </table>
	</div>
    
    <h3><a href="#">ประเภทกิจกรรม</a> <img src="../admin/compcode/img/editpic.gif" border="0" alt="แก้ไข"></h3>
	<div>
		<?php print $ob[activity]; ?>
	</div>
    
    <h3><a href="#">ทรัพยากรที่ต้องใช้</a> <img src="../admin/compcode/img/editpic.gif" border="0" alt="แก้ไข"></h3>
	<div>
		<table cellspacing="0">
        	<tr>
            	<td class="formcolhd">ทรัพยากรที่ต้องใช้ (วัสดุอุปกรณ์และบุคลากร)</td>
                <td class="formcolhd">แหล่งที่มาของทรัพยากร</td>
            </tr>
            <?php
			$sql7="select * from project_resource
			where pro_id='$ob[pro_id]'
			order by id asc";
			$rs7=mysql_query($sql7);
			while($ob7=mysql_fetch_array($rs7))
			{
			?>
            <tr>
            	<td class="formcol2"><?php print $ob7[resource]; ?></td>
                <td class="formcol2"><?php print $ob7[resource_from]; ?></td>
            </tr>
            <?php
			}
			?>
        </table>
	</div>
    
    <h3><a href="#">งบประมาณและการวางแผนการใช้จ่ายงบประมาณของโครงการ</a> <img src="../admin/compcode/img/editpic.gif" border="0" alt="แก้ไข"></h3>
	<div>
		<table border="0" cellpadding="0" cellspacing="0">
<tr>
                    	<td class="formcolhd">เงินงบประมาณแผ่นดิน</td>
                        <td class="formcolhd">งบประมาณที่ได้รับ</td>
                    </tr>
    <?php
		$sql6="select * from project_budtype 
		inner join budtype on (project_budtype.bt_id=budtype.bt_id)
		where project_budtype.pro_id='$ob[pro_id]'
		order by project_budtype.id asc";
		$rs6=mysql_query($sql6);
		while($ob6=mysql_fetch_array($rs6)){
		?>
    <tr>
    	<td class="formcol2"><?=$ob6[bt_name];?></td>
        <td class="formcol2"><?=number_format($ob6[budget]);?></td>
    </tr>
    <?php
		}
		?>
    </table>
	</div>
</div>

</body>
</html>