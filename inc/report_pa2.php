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
where pro_id='$pro_id'";
$rs=mysql_query($sql);
$ob=mysql_fetch_array($rs);
?>
<!--<h1 class="title">เพิ่ม / แก้ไข</h1> -->
<FORM enctype="multipart/form-data" action="../inc/action_pa.php" method="post" name="addproject" onsubmit="return checkval(this)">
      <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" background="compcode/picture/back_1.jpg">
        <input type="hidden" name="MAX_FILE_SIZE" value="500000000">
    <input type="hidden" name="cate" value="2">
    
        <!--<tr  >
          <td height="29"   colspan="2" background="compcode/picture/back_1.jpg" class="smalltext"><div align="center"></div></td>
        </tr> -->
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
					$typ=show_data("type_section","typ_id");
					#$sql2="select * from project
					#right join type_section on (project.typ_id=type_section.typ_id)";
					#$typ=mysql_query($sql2);
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
        <td rowspan="2" class="formcolhd">หน่วยนับ</td>
        <td rowspan="2" class="formcolhd">ค่าเป้าหมาย<br/>(แผน)</td>
        <td colspan="2" class="formcolhd"><center>ผลการดำเนินงาน</center></td>
    </tr>
    <tr>
    	<td class="formcolhd"><center>6 เดือน<br/>(1 ต.ค.-31 มี.ค.)</center></td>
        <td class="formcolhd"><center>12 เดือน<br/>(1 ต.ค.-31 ก.ย.)</center></td>
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
	        print "<td class='formcol2'>".$ob5['count']."</td>";
      print "<td class='formcol2'>".$ob5[plan]."</td>";
	  print "<td class='formcol2'><center>".$ob5['m6']."</center></td>";
	  print "<td class='formcol2'><center>".$ob5['m6']."</center></td>";
    print "</tr>";
	}
	?>
    </table>
    
               </td>
             </tr>
             <tr >
               <td colspan="2" class="td1">ผลการใช้จ่ายงบประมาณโครงการ</td>
             </tr>
             <tr >
               <td colspan="2" class="tdpadding">
               	
                <table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr>
                    	<td rowspan="2" class="formcolhd">เงินงบประมาณแผ่นดิน</td>
                        <td rowspan="2" class="formcolhd">งบประมาณที่ได้รับ</td>
                        <td colspan="2" class="formcolhd"><center>ผลการใช้จ่าย</center></td>
                    </tr>
                     <tr>
    	<td class="formcolhd"><center>6 เดือน (1 ต.ค.-31 มี.ค.)</center></td>
        <td class="formcolhd"><center>12 เดือน (1 ต.ค.-31 ก.ย.)</center></td>
    </tr>
    <?php
		$sql6="select * from project
		inner join project_pay on (project.pro_id=project_pay.pro_id)
		inner join budtype on (project.bt_id=budtype.bt_id)
		where project_pay.pro_id='$ob[pro_id]'
		order by project_pay.id asc";
		$rs6=mysql_query($sql6);
		$ob6=mysql_fetch_array($rs6);
		$q1=explode("/",$ob6[quarter1]);
		$q2=explode("/",$ob6[quarter2]);
		$q3=explode("/",$ob6[quarter3]);
		$q4=explode("/",$ob6[quarter4]);
		$q11=$ob6['q11'];
		$q22=$ob6['q22'];
		$q33=$ob6['q33'];
		$q44=$ob6['q44'];
		#$month6=$q1[1]+$q2[1];
		#$month12=$q1[1]+$q2[1]+$q3[1]+$q4[1];
		$month6=$q11+$q22;
		$month12=$q11+$q22+$q33+$q44;
		?>
    <tr>
    	<td class="formcol2"><?=$ob6[bt_name];?></td>
        <td class="formcol2"><?=$ob6[budget];?></td>
        <td class="formcol2"><?=$month6;?></td>
        <td class="formcol2"><?=$month12;?></td>
    </tr>
                </table>
               
               </td>
             </tr>
             <tr >
               <td colspan="2" class="td1">การประเมินความก้าวหน้าของโครงการ</td>
             </tr>
             <tr >
               <td colspan="2" class="tdpadding">
               	<?=$ob['pro_rate']."%"; ?>
               </td>
             </tr>
             <tr >
               <td colspan="2" class="td1">ปัญหาและอุปสรรคในการดำเนินการ</td>
             </tr>
             <tr >
               <td colspan="2" class="tdpadding"><?=$ob['pro_sum1'];?></td>
             </tr>
            <tr >
               <td colspan="2" class="td1">ข้อเสนอแนะหรือแนวทางในการแก้ไขปัญหา/อุปสรรค</td>
             </tr>
             <tr >
               <td colspan="2" class="tdpadding"><?=$ob['pro_sum2'];?></td>
             </tr>
             <tr >
             <tr >
               <td colspan="2" class="td1">ข้อมูลผู้รายงาน PA</td>
             </tr>
             <tr >
               <td colspan="2" class="tdpadding">
               	
                <table width="100%" cellspacing="0">
                	<?php
					$log="select * from project_log
					inner join organization on (project_log.DeID=organization.DeID)
					where project_log.pro_id='$pro_id' and project_log.status='2'";
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
