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
<link rel="stylesheet" type="text/css" href="../admin/themes/fancyblue.css" title="Calendar Theme - forest.css" >
<!-- import the calendar script -->
		<script type="text/javascript" src="../admin/src/utils.js"></script>
		<script type="text/javascript" src="../admin/src/calendar1.js"></script>
<!-- import the language module -->
		<script type="text/javascript" src="../admin/lang/calendar-en.js"></script>
<!-- other languages might be available in the lang directory; please check
		your distribution archive. -->
<!-- import the calendar setup script -->
		<script type="text/javascript" src="../admin/src/calendar-setup.js"></script>
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

var win=null;
function NewWindow(mypage,myname,w,h,pos,infocus)
{
if(pos=="random"){myleft=(screen.width)?Math.floor(Math.random()*(screen.width-w)):100;mytop=(screen.height)?Math.floor(Math.random()*((screen.height-h)-75)):100;}
if(pos=="center"){myleft=(screen.width)?(screen.width-w)/2:100;mytop=(screen.height)?(screen.height-h)/2:100;}
else if((pos!='center' && pos!="random") || pos==null){myleft=200;mytop=200}
settings="width=" + w + ",height=" + h + ",top=" + mytop + ",left=" + myleft + ",scrollbars=yes,location=no,directories=no,status=no,menubar=no,toolbar=no,resizable=yes";win=window.open(mypage,myname,settings);
win.focus();
}
</script>
<?php
$sql="select * from project
inner join organization on (project.DeID_main=organization.DeID)
where project.pro_id='$pro_id'";
$rs=mysql_query($sql);
$ob=mysql_fetch_array($rs);
$fname=$ob['Fname'];
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
        	<td class="tdpadding"><select name="budget_year">
            	<?php
				$y=date("Y");
				$yc=$y+543;
				$ys=$yc-4;
				$yn=$yc+4;
				for($yy=$ys;$yy<=$yn;$yy++){
					if($yy == $ob[budget_year]){
            			print "<option value='".$yy."' selected='selected'>- ".$yy." -</option>";
					}else{
						print "<option value='".$yy."'>- ".$yy." -</option>";
					}
				}
				?>
            </select></td>
        </tr>
        <tr>
          <td colspan="2" class="td1">ชื่อโครงการ</td>
        </tr>
        <tr>
        	<td colspan="2" class="tdpadding"><textarea name="names" cols="100" rows="2" wrap="virtual"><?=$ob[names];?></textarea></td>
        </tr>
        <tr>
          <td colspan="2" class="td1">ส่วนงานรับผิดชอบ</td>
        </tr>
        <tr>
        	<td colspan="2" class="tdpadding">
            	<select name="DeID_main">
            <?php
			$rs2=show_data("organization","DeID");
			while($ob2=mysql_fetch_array($rs2))
			{
				if($ob2[DeID] == $ob[DeID_main])
				{
					print "<option value='".$ob2[DeID]."' selected>- ".$ob2[Fname]." -</option>";
				}
				else
				{
					print "<option value='".$ob2[DeID]."'>- ".$ob2[Fname]." -</option>";
				}
			}
			?>
            	</select>
            </td>
        </tr>
        <tr  >
          <td colspan="2" valign="top" class="td1">ส่วนงานร่วม</td>
        </tr>
        <tr>
        	<td>
            	<table>
                	<?php
					$sqlProjectOrgjoin="select * from project_dep_res,organization
					where project_dep_res.DeID = organization.DeID
					and project_dep_res.pro_id = '$ob[pro_id]'
					order by organization.DeID asc";
					$rsProjectOrgjoin=mysql_query($sqlProjectOrgjoin);
					while($obProjectOrgjoin=mysql_fetch_array($rsProjectOrgjoin))
					{
					?>
                	<tr>
                    	<td><?=$obProjectOrgjoin[Fname];?></td>
            <td class="formcol2"><a href="../admin/compcode/delProjectOrgjoin.php?id=<?=$obProjectOrgjoin[id];?>" onClick="return confirm('! ยืนยันการลบข้อมูล');"><img src="../admin/compcode/img/botton_delete.gif" border="0"/></a></td>
                    </tr>
                    <?php
					}
					?>
                    <tr>
        	<td colspan="2">
            	<input type="button" value="เพิ่มส่วนงานร่วม" class="buttonn" onClick="javascript:NewWindow('../admin/compcode/addProjectOrgjoin.php?pro_id=<?=$ob[pro_id];?>','ส่วนงานร่วม','350','550','fullscreen','front');" />
            </td>
        </tr>
                </table>
            </td>
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
            <td class="formcolhd"></td>
            <td class="formcolhd"></td>
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
            <td class="formcol2"><a href="javascript:NewWindow('../admin/compcode/editRes.php?id=<?php print $ob3[id]; ?>','acepopup','905','125','fullscreen','front');" title="แก้ไข"><img src="../admin/compcode/img/editpic.gif" border="0"/></a></td>
            <td class="formcol2"><a href="../admin/compcode/delRes.php?id=<?=$ob3[id];?>&pro_id=<?=$ob[pro_id];?>" onClick="return confirm('! ยืนยันการลบข้อมูล');"><img src="../admin/compcode/img/botton_delete.gif" border="0"/></a></td>
        </tr>
        <?php
		}
		?>
        <tr>
        	<td colspan="3">
            	<input type="button" value="เพิ่มผู้รับผิดชอบ" class="buttonn" onClick="javascript:NewWindow('../admin/compcode/addRes.php?pro_id=<?=$ob[pro_id];?>','acepopup','905','125','fullscreen','front');" />
            </td>
        </tr>
        </table>          </td>
        </tr>
		
        <tr >
          <td colspan="2" class="td1"  >ประเภทโครงการ</td>
        </tr>
        <tr >
          <td colspan="2" class="tdpadding"  >   
          	
                    <?php
					$section=show_data("section","sec_id");
					#$sql2="select * from project
					#right join type_section on (project.typ_id=type_section.typ_id)";
					#$rs_section=mysql_query($section);
					while($ob_section=mysql_fetch_array($section)){
						if($ob_section['sec_id'] == $ob['sec_id']){
							print "<input name='sec_id' type='radio' value='".$ob_section[sec_id]."' checked>".$ob_section['section']."<br/>";
							#print "<img src='../img/tick.png' /> ".$ob_section['section'];
						}else{
							print "<input name='sec_id' type='radio' value='".$ob_section[sec_id]."'>".$ob_section['section']."<br/>";
							#print " ".$ob_section['section'];
						}
					}
					?>                   </td>
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
							print "<input name='typ_id' type='radio' value='".$ob2[typ_id]."' checked>".$ob2['type_s']."<br/>";
							#print "<img src='../img/tick.png' /> ".$ob2['type_s'];
						}else{
							print "<input name='typ_id' type='radio' value='".$ob2[typ_id]."'>".$ob2['type_s']."<br/>";
							#print $ob2['type_s'];
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
						print "<td class='tdpadding'><input name='str_id' type='radio' value='".$ob5[id]."' checked></td>";
						#print "<td class='formcol2'><img src='../img/tick.png' /></td>";
                    	print "<td class='formcol2'>".$ob5[nameth]." (".$ob5[nameen].")</td>";
                    print "</tr>";
					}
					else
					{
						print "<tr>";
						print "<td class='tdpadding'><input name='str_id' type='radio' value='".$ob5[id]."'></td>";
						#print "<td class='formcol2'>&nbsp;</td>";
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
                	<tr>
                    	<td>
                        	<select name="obj_id">
                            	<option value="0">- เลือกรายการ -</option>
                	<?php
					$objective="select * from objective order by obj_id asc";
					$rs_objective=mysql_query($objective);
					while($ob_objective=mysql_fetch_array($rs_objective))
					{
						if($ob_objective['obj_id'] == $ob['obj_id'])
						{
                	print "<option value='".$ob_objective[obj_id]."' selected>- ".$ob_objective[objective]." -</option>";
						}
						else
						{
						print "<option value='".$ob_objective[obj_id]."'>- ".$ob_objective[objective]." -</option>";
						}
					}
					?>
                    	</select>
                    	</td>
                        </tr>
                </table>
                
            </td>
        </tr>
        <tr>
        	<td class="td1">หลักการและเหตุผลของโครงการ</td>
        </tr>
        <tr>
        	<td><textarea name="reason" cols="100" rows="10" wrap="virtual"><?=$ob['reason'];?></textarea></td>
        </tr>
        <tr>
        	<td class="td1">วัตถุประสงค์โครงการ</td>
        </tr>
        <tr>
        	<td><textarea name="pro_obj" cols="100" rows="10" wrap="virtual"><?=$ob['pro_obj'];?></textarea></td>
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
               	<input type="text" name="startdate" id="startdate" size="10" readonly="true" value="<?=$ob['pro_start'];?>"> 
        <input type="reset" value="เลือกวัน" id='butstart' onclick="alert('click');" class="buttonn"> 
        <script type="text/javascript">
		var cal = new Zapatec.Calendar.setup({
		
		inputField     :    "startdate",     // id of the input field
		ifFormat       :    "%Y-%m-%d",     // format of the input field
		showsTime      :     false,
		button         :    "butstart",  // trigger button (well, IMG in our case)
		align          :    "Tl"           // alignment (defaults to "Bl")
		
		});
		
	</script> 
    ถึง
                <input type="text" name="enddate" id="enddate" size="10" readonly="true" value="<?=$ob['pro_end'];?>"> 
        <input type="reset" value="เลือกวัน" id='butend' onclick="alert('click');" class="buttonn"> 
        <script type="text/javascript">
		var cal = new Zapatec.Calendar.setup({
		
		inputField     :    "enddate",     // id of the input field
		ifFormat       :    "%Y-%m-%d",     // format of the input field
		showsTime      :     false,
		button         :    "butend",  // trigger button (well, IMG in our case)
		align          :    "Tl"           // alignment (defaults to "Bl")
		
		});
		
	</script>
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
	inner join indicator on (project_ind.ind_id=indicator.ind_id)
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
			 print "<td class='formcol2'><a href=\"javascript:NewWindow('../admin/compcode/editProjectIndicator.php?id=".$ob5[id]."','acepopup','600','450','fullscreen','front');\" title=\"แก้ไข\"><img src=\"../admin/compcode/img/editpic.gif\" border=\"0\"/></a></td>";
	  print "<td class='formcol2'><a href=\"../admin/compcode/delProjectIndicator?id=".$ob5[id]."&pro_id=".$ob[pro_id]."\" onClick=\"return confirm('! ยืนยันการลบข้อมูล');\"><img src=\"../admin/compcode/img/botton_delete.gif\" border=\"0\"/></a></td>";
    print "</tr>";
	}
	?>
    	<tr>
        	<td colspan="9">
            	<input type="button" value="เพื่มตัวชี้วัด" class="buttonn" onClick="javascript:NewWindow('../admin/compcode/addProjectIndicator.php?pro_id=<?=$ob[pro_id];?>','acepopup','600','450','fullscreen','front');" />
            </td>
        </tr>
    </table>
    
               </td>
             </tr>
             
             <tr >
               <td colspan="2" class="td1">แผนและผลการใช้จ่ายเงินในแต่ละไตรมาส</td>
             </tr>
               <td colspan="2" class="tdpadding">
               	
                 <table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr>
                    	<td rowspan="2" class="formcolhd">เงินงบประมาณแผ่นดิน</td>
                        <td rowspan="2" class="formcolhd">งบประมาณที่ได้รับ</td>
                        <td colspan="2" class="formcolhd"><center>
                          ไตรมาส 1
                        </center></td>
                        <td colspan="2" class="formcolhd">ไตรมาส 2</td>
                        <td colspan="2" class="formcolhd">ไตรมาส 3</td>
                        <td colspan="2" class="formcolhd">ไตรมาส 4</td>
                        <td rowspan="2" class="formcolhd"></td>
                        <td rowspan="2" class="formcolhd"></td>
                    </tr>
                     <tr>
    	<td class="formcolhd"><center>แผน</center></td>
        <td class="formcolhd"><center>ผล</center></td>
        <td class="formcolhd">แผน</td>
        <td class="formcolhd">ผล</td>
        <td class="formcolhd">แผน</td>
        <td class="formcolhd">ผล</td>
        <td class="formcolhd">แผน</td>
        <td class="formcolhd">ผล</td>
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
        <td class="formcol2"><?=number_format($ob6[quarter1],"2");?></td>
        <td class="formcol2"><?=number_format($ob6[q11],"2");?></td>
        <td class="formcol2"><?=number_format($ob6[quarter2],"2");?></td>
        <td class="formcol2"><?=number_format($ob6[q22],"2");?></td>
       <td class="formcol2"><?=number_format($ob6[quarter3],"2");?></td>
        <td class="formcol2"><?=number_format($ob6[q33],"2");?></td>
        <td class="formcol2"><?=number_format($ob6[quarter4],"2");?></td>
        <td class="formcol2"><?=number_format($ob6[q44],"2");?></td>
        <td class="formcol2"><a href="javascript:NewWindow('../admin/compcode/editProjectPay.php?id=<?php print $ob6[id]; ?>','acepopup','750','420','fullscreen','front');" title="แก้ไข"><img src="../admin/compcode/img/editpic.gif" border="0"/></a></td>
            <td class="formcol2"><a href="../admin/compcode/delProjectPay.php?id=<?=$ob6[id];?>&pro_id=<?=$ob[pro_id];?>" title="ลบ" onClick="return confirm('! ยืนยันการลบข้อมูล');"><img src="../admin/compcode/img/botton_delete.gif" border="0"/></a></td>
    </tr>
    <?php
		}
		?>
    <tr>
    	<td colspan="8">
        	<input name="" type="button" value="เพิ่มแหล่งเงิน" class="buttonn" onClick="javascript:NewWindow('../admin/compcode/addProjectPay.php?pro_id=<?=$ob[pro_id];?>','acepopup','750','420','fullscreen','front');">
        </td>
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
						print "<td class='tdpadding'><input name='act_id' type='radio' value='".$ob_activity[act_id]."' checked></td>";
						#print "<td class='formcol2'><img src='../img/tick.png' /></td>";
                    	print "<td class='formcol2'>".$ob_activity['activity']."</td>";
                    print "</tr>";
						}
						else
						{
							print "<tr>";
						print "<td class='tdpadding'><input name='act_id' type='radio' value='".$ob_activity[act_id]."'></td>";
						#print "<td class='formcol2'>&nbsp;</td>";
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
                        <td class="formcolhd"></td>
                        <td class="formcolhd"></td>
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
  <td class="formcol2"><?=number_format($ob_project_step[bug_step],"2");?></td>
  <td class="formcol2">
  	<?php
	if($ob_project_step[result_step] == 1)
	{
		print "<strong>สำเร็จ</strong><br/>คิดเป็น ร้อยละ ".$ob_project_step[result_persent];
	}
	else
	{
		print "<strong>ไม่สำเร็จ</strong><br/>เนื่องจาก ".$ob_project_step[problem_step];
	}
	?>
  </td>
  <td class="formcol2"><a href="javascript:NewWindow('../admin/compcode/editProjectStep.php?id=<?php print $ob_project_step[id]; ?>','acepopup','750','420','fullscreen','front');" title="แก้ไข"><img src="../admin/compcode/img/editpic.gif" border="0"/></a></td>
            <td class="formcol2"><a href="../admin/compcode/delProjectStep.php?id=<?=$ob_project_step[id];?>&pro_id=<?=$ob[pro_id];?>" title="ลบ" onClick="return confirm('! ยืนยันการลบข้อมูล');"><img src="../admin/compcode/img/botton_delete.gif" border="0"/></a></td>
</tr>
<?php
}
?>
	<tr>
    	<td colspan="8">
        	<input name="" type="button" value="เพิ่มขั้นตอนการดำเนินงาน" class="buttonn" onClick="javascript:NewWindow('../admin/compcode/addProjectStep.php?pro_id=<?=$ob[pro_id];?>','acepopup','650','500','fullscreen','front');">
        </td>
    </tr>
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
                	<table>
                    	<?php
						$success="select * from success,project_suc
						where success.suc_id = project_suc.suc_id
						and project_suc.pro_id = '$ob[pro_id]'
						order by success.suc_id asc";
						$rs_success=mysql_query($success);
						while($ob_success=mysql_fetch_array($rs_success))
						{
						?>
                    	<tr>
                            <td><?=$ob_success['suc_name'];?></td>
                            <td><a href="../admin/compcode/delProjectSuccess.php?id=<?=$ob_success[id];?>" title="ลบ" onClick="return confirm('! ยืนยันการลบข้อมูล');"><img src="../admin/compcode/img/botton_delete.gif" border="0"/></a></td>
                        </tr>
                        <?php
						}
						?>
                        <tr>
    	<td colspan="2">
        	<input name="" type="button" value="เพิ่มผลสำเร็จการดำเนินงาน" class="buttonn" onClick="javascript:NewWindow('../admin/compcode/addProjectSuccess.php?pro_id=<?=$ob[pro_id];?>','acepopup','300','300','fullscreen','front');">
        </td>
    </tr>
                    </table>
                </td>
             </tr>
             <tr>
             	<td class="td1">สรุปผลการดำเนินงาน</td>
             </tr>
             <tr>
             	<td class="tdpadding"><textarea name="sum1" cols="100" rows="5" wrap="virtual"><?=$ob[pro_sum1];?></textarea></td>
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
               	
                <table>
                <?php
				$sql_pro_log="select * from personel,organization
				where personel.per_dept=organization.DeID
				and personel.per_id='$per_id'";
				$rs_pro_log=mysql_query($sql_pro_log);
				$ob_pro_log=mysql_fetch_array($rs_pro_log);
				?>
                	<tr>
                    	<td>ชื่อ - นามสกุล</td>
                        <td><input name="per_name" type="text" size="50" maxlength="200" value="<?=$ob_pro_log["per_pname"].$ob_pro_log["per_fnamet"]." ".$ob_pro_log["per_lnamet"];?>"></td>
                    </tr>
                    <tr>
                    	<td>ส่วนงาน</td>
                        <td>
                        	<select name="DeID">
                            	<option value="<?=$ob_pro_log["per_dept"];?>">- <?=$ob_pro_log["Fname"];?></option>
                            <?php
							$org=show_data("organization","DeID");
							while($ob_org=mysql_fetch_array($org))
							{
								print "<option value='".$ob_org['DeID']."'>- ".$ob_org['Fname']."</option>";
							}
							?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                    	<td>เบอร์โทรติดต่อ</td>
                        <td><input name="per_tel" type="text" size="50" maxlength="200"></td>
                    </tr>
                    <tr>
                    	<td>Email</td>
                        <td><input name="per_email" type="text" size="50" maxlength="200" value="<?=$ob["per_email"];?>"></td>
                    </tr>
                </table>
               
               </td>
             </tr>
             <!--<tr >
               <td colspan="2" class="td1">ข้อมูลผู้เสนอโครงการ</td>
             </tr>
             <tr >
               <td colspan="2" class="tdpadding"></td>
             </tr> -->
             <tr>
             	<td class="tdpadding"><center><input name="confirm" type="checkbox" value="1" onClick="javaScript:if(this.checked){document.addproject.submit.disabled=false;}else{document.addproject.submit.disabled=true;}"> <span class="boldBlack_12">คลิกเพื่อยืนยันข้อมูล</span></center></td>
             </tr>
             <tr >	
            <td colspan="2" align="center" class="tdpadding">
            	<input name="pro_id" type="hidden" value="<?=$ob['pro_id'];?>"> 
                <input type="submit" name="submit" value="บันทึกรายการ" class="buttonn" disabled="false">
                <input class="buttonn" type="button" name="submit2" value="ยกเลิก" onClick="location.href='follow.php'">              </td>
          </tr> 	    
  </table>
</form>
</body>
</html>
