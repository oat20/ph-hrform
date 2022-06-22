<?php
#include("../admin/compcode/include/config.php");
#include("../admin/compcode/include/connect_db.php");
#include("../admin/compcode/include/function.php");
$pro_id=$_GET['pro_id'];
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">

<!-- <link href="tool/css_text.css" rel="stylesheet" type="text/css">
 -->
 <!--calendar picker -->
<link rel="stylesheet" type="text/css" href="admin/themes/fancyblue.css" title="Calendar Theme - forest.css" >
<!-- import the calendar script -->
		<script type="text/javascript" src="admin/src/utils.js"></script>
		<script type="text/javascript" src="admin/src/calendar1.js"></script>
<!-- import the language module -->
		<script type="text/javascript" src="admin/lang/calendar-en.js"></script>
<!-- other languages might be available in the lang directory; please check
		your distribution archive. -->
<!-- import the calendar setup script -->
		<script type="text/javascript" src="admin/src/calendar-setup.js"></script>
        <!--calendar picker -->
        
<!--editor -->
<script language="JavaScript" type="text/javascript" src="admin/wysiwyg.js"></script>
<!--editor -->

<!--tooltip -->
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js"></script>
<script type="text/javascript" src="inc/tooltip/inc/jquery.timers.js"></script>
<script type="text/javascript" src="inc/tooltip/inc/jquery.dropshadow.js"></script>
<script type="text/javascript" src="inc/tooltip/inc/mbTooltip.js"></script>
<link rel="stylesheet" type="text/css" href="inc/tooltip/css/mbTooltip.css" title="style1">

<script>
  $(function(){
    $("[title]").mbTooltip({ // also $([domElement]).mbTooltip  >>  in this case only children element are involved
      opacity : .97,       //opacity
      wait:1200,           //before show
      cssClass:"default",  // default = default
      timePerWord:70,      //time to show in milliseconds per word
      hasArrow:false,			// if you whant a little arrow on the corner
      hasShadow:true,
      imgPath:"images/",
      ancor:"mouse", //"parent"  you can ancor the tooltip to the mouse position or at the bottom of the element
      shadowColor:"black", //the color of the shadow
      mb_fade:200 //the time to fade-in
    });
  });
</script>
<!--tooltip -->

<script type="text/javascript" src="inc/addtextbox.js"></script>

<script language="JavaScript" type="text/javascript">
function checkval(form) 
{
  		if (form.bud_year.value == "") 
		{
       			alert("ใส่ปีงบประมาณ");
          		form.bud_year.focus();
          		return false;
        }
		if (form.budget.value == "") 
		{
       			alert("ใส่งบประมาณ");
          		form.budget.focus();
          		return false;
        }
		if (form.bt_id.value == "0") 
		{
       			alert("เลือกแหล่งเงิน");
          		form.bt_id.focus();
          		return false;
        }
		if (form.title_pic.value == "") 
		{
       			alert("ใส่ชื่อโครงการ");
          		form.title_pic.focus();
          		return false;
        }
		if (form.sec_id.value == "0") 
		{
       			alert("เลือกประเภทโครงการ");
          		form.sec_id.focus();
          		return false;
        }
		if (form.typ_id.value == "0") 
		{
       			alert("เลือกลักษณะโครงการ");
          		form.typ_id.focus();
          		return false;
        }
		if (form.str_id.value == "0") 
		{
       			alert("เลือกยุทธศาสตร์");
          		form.str_id.focus();
          		return false;
        }
		if (form.startdate.value == "") 
		{
       			alert("กำหนดวันเริ่มโครงการ");
          		form.startdate.focus();
          		return false;
        }
		if (form.enddate.value == "") 
		{
       			alert("กำหนดวันสิ้นสุดโครงการ");
          		form.enddate.focus();
          		return false;
        }
}
</script>
<?php
$sql="select * from project
inner join organization on (project.DeID_main=organization.DeID)
inner join project_suc on (project.pro_id=project_suc.pro_id)
where project.pro_id='$pro_id'";
$rs=mysql_query($sql);
$ob=mysql_fetch_array($rs);
$fname=$ob['Fname'];
$suc_id=$ob['suc_id'];
?>
<!--<h1 class="title">เพิ่ม / แก้ไข</h1> -->
<FORM enctype="multipart/form-data" action="../inc/action_follow.php" method="post" name="addproject" onsubmit="return checkval(this)">
      <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" background="compcode/picture/back_1.jpg">
        <input type="hidden" name="MAX_FILE_SIZE" value="500000000">
    <input type="hidden" name="cate" value="2">
    	<?php
		if($msg!="")
		{
        print"<tr  >";
          print'<td colspan="2" background="compcode/picture/back_1.jpg" class="msgalert">'.$msg.'</td>';
        print"</tr>";
		}
		?>
        <tr>
          <td colspan="2" class="td1">ปีงบประมาณ</td>
        </tr>
        <tr>
        	<td class="tdpadding"><?=$ob[budget_year];?></td>
        </tr>
        <tr>
          <td colspan="2" class="td1">ชื่อโครงการ</td>
        </tr>
        <tr>
        	<td colspan="2" class="tdpadding"><?=$ob[names];?></td>
        </tr>
        <tr>
          <td colspan="2" class="td1">ส่วนงานรับผิดชอบ</td>
        </tr>
        <tr>
        	<td colspan="2" class="tdpadding"><?=$fname;?></td>
        </tr>
        <tr  >
          <td colspan="2" valign="top" class="td1">ผู้รับผิดชอบ</td>
        </tr>
        <tr  >
          <td colspan="2" valign="top" class="tdpadding">
          	
            <table border="0" cellpadding="0" cellspacing="0" width="100%">
    	<tr>
        	<td class="formcolhd">ชื่อบุคคล</td>
        	<td class="formcolhd">ตำแหน่งในโครงการ</td>
            <td class="formcolhd">บทบาทหน้าที่ความรับผิดชอบ</td>
        </tr>
        <?php
		$sql3="select * from project_res where pro_id='$ob[pro_id]'
		order by id asc";
		$rs3=mysql_query($sql3);
		while($ob3=mysql_fetch_array($rs3)){
		?>
        <tr>
        	<td class="formcol2"><?php print ++$i.". ".$ob3[names]; ?></td>
        	<td class="formcol2"><?php print $pro_position[$ob3[position]]; ?></td>
            <td class="formcol2"><?php print $ob3[mission]; ?></td>
        </tr>
        <?php
		}
		?>
        </table>          </td>
        </tr>
		
        
        <tr >
          <td colspan="2" class="td1"  >ลักษณะโครงการ</td>
        </tr>
        <tr >
          <td colspan="2" class="tdpadding"  >   
          	
                    <?php
					#$typ=show_data("type_section","typ_id");
					$sql2="select * from project
					right join type_section on (project.typ_id=type_section.typ_id)";
					$typ=mysql_query($sql2);
					while($ob2=mysql_fetch_array($typ)){
						if($ob2['typ_id']==$ob['typ_id']){
							#print "<input name='typ_id' type='radio' value='' checked> ".$ob2['type_s'];
							print "<img src='../img/tick.png' /> ".$ob2['type_s'];
						}else{
							#print "<input name='typ_id' type='radio' value=''> ".$ob2['type_s'];
							print $ob2['type_s'];
						}
					}
					?>                   </td>
        </tr>
        <tr >
          <td colspan="2" class="td1">ประเด็นยุทธศาสตร์</td>
        </tr>
        <tr >
          <td class="tdpadding" colspan="2">
          	
            	<table cellpadding="0" cellspacing="0" border="0" width="100%">
                	<?php
				$result=show_data("strategic","str_id");
				while($ob4=mysql_fetch_array($result)){
					$str_id=$ob4[str_id];
					#print "<optgroup label=".$ob4["strategic_th"].">";
						print "<tr>";
                    	print "<td colspan='2' class='formcolhd'>".$ob4["strategic_th"]."</td>";
                    print "</tr>";
						$sql5="select * from sub_strategic where parent='$str_id'";
						$rs5=mysql_query($sql5);
						$num=1;
						while($ob5=mysql_fetch_array($rs5)){
							if($ob5['id'] == $ob['str_id'])
							{
						print "<tr>";
						#print "<td class='tdpadding'><input name='str_id' type='radio' value='' checked></td>";
						print "<td class='formcol2'><img src='../img/tick.png' /></td>";
                    	print "<td class='formcol2'>".$ob5[nameth]." (".$ob5[nameen].")</td>";
                    print "</tr>";
					}
					else
					{
						print "<tr>";
						#print "<td class='tdpadding'><input name='str_id' type='radio' value=''></td>";
						print "<td class='formcol2'>&nbsp;</td>";
                    	print "<td class='formcol2'>".$ob5[nameth]." (".$ob5[nameen].")</td>";
                    print "</tr>";
					}
								#print "<option value=".$ob5[id]." selected>".$num.". ".$ob5[nameth]." (".$ob5[nameen].")</option>";
								#print "<option value=".$ob5[id].">".$num.". ".$ob5[nameth]." (".$ob5[nameen].")</option>";
							$num++;
						}
				}
				?>
            </table>            </td>
        </tr>
        <tr>
        	<td class="td1">ความสอดคล้องตามเป้าประสงค์หลัก</td>
        </tr>
        <tr>
        	<td class="tdpadding">
            
            	<table width="100%" cellspacing="0">
                	<?php
					$objective="select * from objective order by obj_id asc";
					$rs_objective=mysql_query($objective);
					while($ob_objective=mysql_fetch_array($rs_objective))
					{
						if($ob_objective['obj_id'] == $ob['obj_id'])
						{
                	print "<tr>";
						#print "<td class='tdpadding'><input name='obj_id' type='radio' value='' checked disabled></td>";
						print "<td class='formcol2'><img src='../img/tick.png' /></td>";
                    	print "<td class='formcol2'>".$ob_objective['objective']."</td>";
                    print "</tr>";
						}
						else
						{
							print "<tr>";
						#print "<td class='tdpadding'><input name='obj_id' type='radio' value='' disabled></td>";
						print "<td class='formcol2'>&nbsp;</td>";
                    	print "<td class='formcol2'>".$ob_objective['objective']."</td>";
                    print "</tr>";
						}
					}
					?>
                </table>
                
            </td>
        </tr>
        <tr>
        	<td class="td1">หลักการและเหตุผลของโครงการ</td>
        </tr>
        <tr>
        	<td><?=$ob['reason'];?></td>
        </tr>
        <tr>
        	<td class="td1">วัตถุประสงค์โครงการ</td>
        </tr>
        <tr>
        	<td><?=$ob['pro_obj'];?></td>
        </tr>
             <!--<tr >
               <td class="formcoltitle">ยุทธศาสตร์ข้อที่:</td>
               <td  class="formcol2">
               	<select>
                	<option value="">- เลือกรายการ -</option>
                </select>               </td>
             </tr> -->
             <tr>
             	<td colspan="2" class="td1">ระยะเวลาการดำเนินงาน</td>
             </tr>
             <tr>
               <td colspan="2" class="tdpadding">
               	<?php
					print dateThai($ob['pro_start'])." ถึง ".dateThai($ob['pro_end']);
				?>
               </td>
             </tr>
             
             <!--<tr>
             	<td colspan="2" class="formcolhd">หลักการและเหตุผล:</td>
             </tr>
             <tr>
               <td class="formcol2" colspan="2"><textarea id="elm1" name="reason" rows="20" style="width: 100%"></textarea></td>
             </tr> -->
             <tr >
               <td colspan="2" class="td1">ผลการดำเนินงานตามตัวชี้วัด</td>
             </tr>
             <tr >
               <td colspan="2" class="tdpadding">
               
               <table border="0" cellpadding="0" cellspacing="0" width="100%">
<tr>
    	<td rowspan="2" class="formcolhd">ชื่อตัวชี้วัด</td>
        <td rowspan="2" class="formcolhd">ตัวชี้วัด</td>
        <td rowspan="2" class="formcolhd">ประเภทตัวชี้วัด</td>
        <td colspan="3" class="formcolhd"><center>ค่าเป้าหมาย</center></td>
    </tr>
    <tr>
    	<td class="formcolhd"><center>แผน</center></td>
        <td class="formcolhd"><center>ผล</center></td>
        <td class="formcolhd"><center>หน่วยนับ</center></td>
    </tr>
    
    <?php
	$sql5="select * from project_ind
	inner join indicator on (project_ind.ind_id=indicator.ind_id)
	inner join indicator_type on (project_ind.ind_type_id=indicator_type.ind_type_id)
	where project_ind.pro_id='$ob[pro_id]'
	order by project_ind.id asc";
	$rs5=mysql_query($sql5);
	while($ob5=mysql_fetch_array($rs5)){
    print "<tr>";
      print "<td class='formcol2'>".$ob5[ind_name]."</td>";
      print "<td class='formcol2'>".$ob5[indicator]."</td>";
	   print "<td class='formcol2'>".$ob5[ind_type]."</td>";
	    print "<td class='formcol2'>".$ob5[plan]."</td>";
		 print "<td class='formcol2'>".$ob5[result]."</td>";
	        print "<td class='formcol2'>".$ob5['count']."</td>";
    print "</tr>";
	}
	?>
    </table>
    
               </td>
             </tr>
             
             <tr >
               <td colspan="2" class="td1">แผนและผลการใช้จ่ายเงินในแต่ละไตรมาส</td>
             </tr>
             <?php
			 $sql6="select * from project
			inner join project_pay on (project.pro_id=project_pay.pro_id)
			inner join budtype on (project.bt_id=budtype.bt_id)
			where project_pay.pro_id='$ob[pro_id]'
			order by project_pay.id asc";
			$rs6=mysql_query($sql6);
			$ob6=mysql_fetch_array($rs6);
			 ?>
             <tr>
             	<td class="tdpadding"><span class="boldBlack_10">แหล่งงบประมาณ:</span> <?=$ob6[bt_name];?></td>
             </tr>
             <tr>
             	<td class="tdpadding"><span class="boldBlack_10">งบประมาณ:</span> <?=$ob6[budget];?> บาท</td>
             </tr>
             <tr >
               <td colspan="2" class="tdpadding">
               	
                <table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr>
                    	<td class="formcolhd">ไตรมาส</td>
                        <td class="formcolhd">แผนการใช้จ่ายเงิน (บาท)</td>
                        <td class="formcolhd">ผลการใช้จ่ายเงิน (บาท)</td>
                    </tr>
                     
    <?php
		$q1=explode("/",$ob6[quarter1]);
		$q2=explode("/",$ob6[quarter2]);
		$q3=explode("/",$ob6[quarter3]);
		$q4=explode("/",$ob6[quarter4]);
		?>
        <tr class="tdpadding">
        	<td class="formcol2">ไตรมาสที่ 1 (ตุลาคม - ธันวาคม)</td>
            <td class="formcol2"><?=$q1[0];?></td>
            <td class="formcol2"><?=$ob6[q11];?></td>
        </tr>
        <tr class="tdpadding">
        	<td class="formcol2">ไตรมาสที่ 2 (มกราคม - มีนาคม)</td>
            <td class="formcol2"><?=$q2[0];?></td>
            <td class="formcol2"><?=$ob6[q22];?></td>
        </tr>
        <tr class="tdpadding">
        	<td class="formcol2">ไตรมาสที่ 3 (เมษายน - มิถุนายน)</td>
            <td class="formcol2"><?=$q3[0];?></td>
            <td class="formcol2"><?=$ob6[q33];?></td>
        </tr>
        <tr class="tdpadding">
        	<td class="formcol2">ไตรมาสที่ 4 (กรกฎาคม - กันยายน)</td>
            <td class="formcol2"><?=$q4[0];?></td>
            <td class="formcol2"><?=$ob6[q44];?></td>
        </tr>
                </table>
               
               </td>
             </tr>
             <tr>
             	<td class="td1">ประเภทกิจกรรม</td>
             </tr>
             <tr>
             	<td class="tdpadding">
                
                	<table cellspacing="0" width="100%">
                    <?php
					$activity="select * from activity order by act_id asc";
					$rs_activity=mysql_query($activity);
					while($ob_activity=mysql_fetch_array($rs_activity))
					{
						if($ob_activity['act_id'] == $ob['act_id'])
						{
                	print "<tr>";
						#print "<td class='tdpadding'><input name='obj_id' type='radio' value='' checked disabled></td>";
						print "<td class='formcol2'><img src='../img/tick.png' /></td>";
                    	print "<td class='formcol2'>".$ob_activity['activity']."</td>";
                    print "</tr>";
						}
						else
						{
							print "<tr>";
						#print "<td class='tdpadding'><input name='obj_id' type='radio' value='' disabled></td>";
						print "<td class='formcol2'>&nbsp;</td>";
                    	print "<td class='formcol2'>".$ob_activity['activity']."</td>";
                    print "</tr>";
						}
					}
					?>
                    </table>
                    
                </td>
             </tr>
             <tr >
               <td colspan="2" class="td1">ผลสำเร็จของการดำเนินงานในแต่ละขั้นตอนของโครงการ</td>
             </tr>
             <tr >
               <td colspan="2" class="tdpadding">
               	
                <table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr>
	<td class="formcolhd">วันเดือนปี<br/>ดำเนินการ</td>
    <td class="formcolhd">กิจกรรม</td>
                    	<td class="formcolhd">ขั้นตอน</td>
                        <td class="formcolhd">ผลการใช้จ่ายเงินจริง (บาท)</td>
                        <td class="formcolhd">ผลการดำเนินงาน</td>
                    </tr>
                    <?php
					$project_step="select * 
					from project_step
					where pro_id='$ob[pro_id]'
					order by id asc";
					$rs_project_step=mysql_query($project_step);
					while($ob_project_step=mysql_fetch_array($rs_project_step))
					{
					?>
<tr>
	<td class="formcol2"><?=$ob_project_step['date_step'];?></td>
    <td class="formcol2"><?=++$i2.". ".$ob_project_step['act_step'];?></td>
  <td class="formcol2"><?=$step[$ob_project_step['step']];?></td>
  <td class="formcol2"><?=$ob_project_step['result_bug'];?></td>
  <td class="formcol2">
    <?php
	if($ob_project_step['result_step']==1)
	{
		print "สำเร็จ";
	}
	else
	{
		print "ไม่สำเร็จ";
	}
    	print " ".$ob_project_step['result_persent']."%";
		?>
  </td>
</tr>
<?php
}
?>
                </table>
               
               </td>
             </tr>
            <!-- <tr >
               <td colspan="2" class="td1">ข้อเสนอแนะหรือแนวทางในการแก้ไขปัญหา/อุปสรรค</td>
             </tr>
             <tr >
               <td colspan="2" class="tdpadding">&nbsp;</td>
             </tr>
             <tr >-->
             <tr>
             	<td class="td1">ผลสำเร็จการดำเนินงานของโครงการ</td>
             </tr>
             <tr>
             	<td class="tdpadding">
                	<table width="100%" cellspacing="0">
                	<?php
					$suc="select success.suc_id as a,success.suc_name as b, project_suc.suc_id as c 
					from success
					left join project_suc on (success.suc_id=project_suc.suc_id)
					where project_suc.pro_id='$pro_id' 
					order by success.suc_id asc";
					#$suc="select * from success order by suc_id asc";
					$rs_suc=mysql_query($suc);
					while($ob_suc=mysql_fetch_array($rs_suc))
					{
						if($ob_suc['a'] == $ob_suc['c'])
						{
                	print "<tr>";
						#print "<td class='tdpadding'><input name='obj_id' type='radio' value='' checked disabled></td>";
						print "<td class='formcol2'><img src='../img/tick.png' /></td>";
                    	print "<td class='formcol2'>".$ob_suc['b']."</td>";
                    print "</tr>";
						}
						else
						{
							print "<tr>";
						#print "<td class='tdpadding'><input name='obj_id' type='radio' value='' disabled></td>";
						print "<td class='formcol2'>&nbsp;</td>";
                    	print "<td class='formcol2'>".$ob_suc['b']."</td>";
                    print "</tr>";
						}
					}
					?>
                </table>
                </td>
             </tr>
             <tr>
             	<td class="td1">สรุปผลการดำเนินงาน</td>
             </tr>
             <tr>
             	<td class="tdpadding"><?=$ob['pro_sum1'];?></td>
        </tr>
             <!--<tr>
             	<td class="td1">เอกสารประกอบ</td>
                </tr>
                <tr>
                <td class="formcol2"><label>
                  <input type="file" name="att" id="fileField" size="80">
                </label></td>
      </tr> -->
             <tr >
               <td colspan="2" class="td1">ข้อมูลผู้รายงานการติดตามผลดำเนินโครงการ</td>
             </tr>
             <tr >
               <td colspan="2" class="tdpadding">
               	
                <table width="100%" cellspacing="0">
                	<?php
					$log="select * from project_log
					inner join organization on (project_log.DeID=organization.DeID)
					where project_log.pro_id='$pro_id' and project_log.status='1'";
					$rs_log=mysql_query($log);
					?>
                	<tr>
                    	<td class="formcolhd">ชื่อ - นามสกุล</td>
                        <td class="formcolhd">ส่วนงาน</td>
                        <td class="formcolhd">เบอร์โทรติดต่อ</td>
                        <td class="formcolhd">Email</td>
                        <td class="formcolhd">รายงานเมื่อ</td>
                        
                    </tr>
                    <?php
                    while($ob_log=mysql_fetch_array($rs_log))
					{
					?>
                    <tr>
                    	<td class="formcol2"><?=$ob_log['per_name'];?></td>
                        <td class="formcol2">
                        	<?=$ob_log['Fname'];?>
                        </td>
                        <td class="formcol2"><?=$ob_log['per_tel'];?></td>
                         <td class="formcol2"><?=$ob_log['per_email'];?></td>
                         <td class="formcol2"><?=dateThai($ob_log['modified']);?></td>
                    </tr>
                    <?php
					}
					?>
                </table>
               
               </td>
             </tr>
             <!--<tr >
               <td colspan="2" class="td1">ข้อมูลผู้เสนอโครงการ</td>
             </tr>
             <tr >
               <td colspan="2" class="tdpadding"></td>
             </tr> --> 	    
  </table>
</form>
</body>
</html>
