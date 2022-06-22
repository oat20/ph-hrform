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

<!--<h1 class="title">เพิ่ม / แก้ไข</h1> -->
<FORM enctype="multipart/form-data" action="admin/compcode/addproject.php" method="post" name="addproject" onsubmit="return checkval(this)">
      <table border="0" align="center" cellpadding="0" cellspacing="0" background="compcode/picture/back_1.jpg">
        <input type="hidden" name="MAX_FILE_SIZE" value="500000000">
    <input type="hidden" name="cate" value="2">
    
        <!--<tr  >
          <td height="29"   colspan="2" background="compcode/picture/back_1.jpg" class="smalltext"><div align="center"></div></td>
        </tr> -->
        <tr>
        	<td class="formcoltitle">ปีงบประมาณ :<br/><span class="regRed_12">(จำเป็นต้องกรอก)</span></td>
            <td class="formcol2"><input type="text" size="5" maxlength="4" name="bud_year" /></td>
        </tr>
        <tr>
             	<td class="formcoltitle">งบประมาณ:<br/><span class="regRed_12">(จำเป็นต้องกรอก)</span></td>
                <td class="formcol2"><input name="budget" type="text" size="50" maxlength="20"> บาท</td>
             </tr>
             <tr>
             	<td class="formcoltitle">แหล่งเงิน:<br/><span class="regRed_12">(จำเป็นต้องกรอก)</span></td>
                <td class="formcol2">
                <?php
				print "<select name=bt_id>";
					print "<option value=0>- เลือกรายการ -</option>";
				$sql="select * from budtype";
				$rs=mysql_query($sql);
				while($ob=mysql_fetch_array($rs)){
					print "<option value=".$ob['bt_id'].">- ".$ob['bt_name']."</option>";
				}
				print "</select>";
				?>
                </td>
             </tr>
        <tr  >
          <td class="formcoltitle"><div align="right">ชื่อโครงการ :<br/><span class="regRed_12">(จำเป็นต้องกรอก)</span></div></td>
          <td class="formcol2"><input name="title_pic" type="text" class="inputform" id="title_news" size="80" maxlength="100"></td>
        </tr>
        <tr  >
          <td class="formcoltitle" valign="top"><div align="right">ส่วนงานรับผิดชอบหลัก :</div></td>
          <td  align="left" class="formcol2">
            <?php 
          	/*print "<select name=>";
				print "<option value=0>- เลือกรายการ -</option>";
				$sql="select * from organization order by DeID asc";
				$rs=mysql_query($sql);
				while($ob=mysql_fetch_array($rs)){
          			print "<option value=".$ob['DeID'].">- ".$ob['Fname']."</option>";
				}
          	print "</select>";*/
			$sql="select DeID,Fname from organization
			where DeID='$per_dept'";
			$rs=mysql_query($sql);
			$ob=mysql_fetch_array($rs);
			print "<input type='hidden' name='per_dept_main' value='".$ob['DeID']."'>";
			print "<input name='' type='text' readonly='true' value='".$ob['Fname']."' size='80'>";
		?>          </td>
        </tr>
        <tr >
          <td class="formcoltitle">ส่วนงานร่วม:</td>
          <td class="formcol2">
          <?php 
          	print "<select name=per_dept_join>";
				print "<option value=0>- เลือกรายการ -</option>";
				$sql="select * from organization order by DeID asc";
				$rs=mysql_query($sql);
				while($ob=mysql_fetch_array($rs)){
          			print "<option value=".$ob['DeID'].">- ".$ob['Fname']."</option>";
				}
          	print "</select>";
		?>          </td>
        </tr>
        <tr >
          <td class="formcoltitle">หัวหน้าโครงการ:</td>
          <td class="formcol2"><input name="pro_res" type="text" size="80"><!--<br/><textarea cols="100%" rows="5" id="res" style="width:400; height:200"></textarea>
          <script language="javascript1.2">
  generate_wysiwyg('res');
  </script> -->
  
<!--<ul id="files-root" style="list-style:none">
<li><input type="text" name="name_res[]" size="60" maxlength="200"> <input type="button" value="เพิ่มชื่อผู้รับผิดชอบ" onclick="addFile()" class="buttonn" /></li>
</ul> -->  </td>
        </tr>
        <tr >
          <td class="formcoltitle"><div align="right"  >ประเภทโครงการ :<br/><span class="regRed_12">(จำเป็นต้องกรอก)</span></div>          </td>
          <td class="formcol2">
          	<select name="sec_id">
                	<option value="0">- เลือกรายการ -</option>
                    <?php
					$sec=show_data("section","sec_id");
					while($ob=mysql_fetch_array($sec)){
						print "<option value=".$ob[sec_id].">- ".$ob[section]."</option>";
					}
					?>                 
                </select>                           </td>
        </tr>
		
        
        <tr >
          <td class="formcoltitle"  ><div align="right">ลักษณะโครงการ :<br/><span class="regRed_12">(จำเป็นต้องกรอก)</span></div>          </td>
          <td background="compcode/picture/back_1.jpg" class="formcol2">
          	<select name="typ_id">
                	<option value="0">- เลือกรายการ -</option>
                    <?php
					$typ=show_data("type_section","typ_id");
					while($ob=mysql_fetch_array($typ)){
						print "<option value=".$ob[typ_id].">- ".$ob[type_s]."</option>";
					}
					?>                 
                </select>         </td>
        </tr>
        <tr >
          <td colspan="2" class="formcolhd">ประเด็นยุทธศาสตร์</td>
        </tr>
        <tr >
          <td class="formcoltitle" ><div align="right" >ยุทธศาสตร์:<br/><span class="regRed_12">(จำเป็นต้องกรอก)</span></div>          </td>
          <td class="formcol2">
          	<select name="str_id">
            	<option value="0">- เลือกรายการ -</option>
                <?php
				$result=show_data("strategic","str_id");
				while($ob=mysql_fetch_array($result)){
					$str_id=$ob[str_id];
					print "<optgroup label=".$ob["strategic_th"].">";
						$sql="select * from sub_strategic where parent='$str_id'";
						$rs=mysql_query($sql);
						$num=1;
						while($ob=mysql_fetch_array($rs)){
							print "<option value=".$ob[id].">".$num.". ".$ob[nameth]." (".$ob[nameen].")</option>";
							$num++;
						}
					print "</optgroup>";
				}
				?>
            </select>          </td>
        </tr>
             <!--<tr >
               <td class="formcoltitle">ยุทธศาสตร์ข้อที่:</td>
               <td  class="formcol2">
               	<select>
                	<option value="">- เลือกรายการ -</option>
                </select>               </td>
             </tr> -->
             <tr >
               <td class="formcoltitle">เป้าประสงค์:</td>
               <td  class="formcol2">
               	<select name="obj_id">
                	<option value="">- เลือกรายการ -</option>
                    <?php
					$obj=show_data("objective","obj_id");
					while($ob=mysql_fetch_array($obj)){
						print "<option value=".$ob[obj_id].">- ".$ob[objective]."</option>";
					}
					?>                 
                </select>               </td>
             </tr>
             <tr>
             	<td colspan="2" class="formcolhd">ระยะเวลาการดำเนินงาน</td>
             </tr>
             <tr>
             	<td class="formcoltitle">วันที่เริ่มต้นโครงการ :<br/><span class="regRed_12">(จำเป็นต้องกรอก)</span></td>
                <td class="formcol2"><input type="text" name="startdate" id="startdate" size="10" readonly="true"> 
        <input type="reset" value="เลือกวัน" id='butstart' onclick="alert('click');" class="buttonn"> 
        <script type="text/javascript">
		var cal = new Zapatec.Calendar.setup({
		
		inputField     :    "startdate",     // id of the input field
		ifFormat       :    "%Y-%m-%d",     // format of the input field
		showsTime      :     false,
		button         :    "butstart",  // trigger button (well, IMG in our case)
		align          :    "Tl"           // alignment (defaults to "Bl")
		
		});
		
	</script></td>
             </tr>
             <tr>
             	<td class="formcoltitle">วันที่สิ้นสุดโครงการ :<br/><span class="regRed_12">(จำเป็นต้องกรอก)</span></td>
                <td class="formcol2"><input type="text" name="enddate" id="enddate" size="10" readonly="true"> 
        <input type="reset" value="เลือกวัน" id='butend' onclick="alert('click');" class="buttonn"> 
        <script type="text/javascript">
		var cal = new Zapatec.Calendar.setup({
		
		inputField     :    "enddate",     // id of the input field
		ifFormat       :    "%Y-%m-%d",     // format of the input field
		showsTime      :     false,
		button         :    "butend",  // trigger button (well, IMG in our case)
		align          :    "Tl"           // alignment (defaults to "Bl")
		
		});
		
	</script></td>
             </tr>
             
             <tr>
             	<td class="formcoltitle">ประเภทกิจกรรม:</td>
                <td class="formcol2">
                <?php
				print "<select name=act_id>";
					print "<option value=0>- เลือกรายการ -</option>";
				$sql="select * from activity";
				$rs=mysql_query($sql);
				while($ob=mysql_fetch_array($rs)){
					print "<option value=".$ob['act_id'].">- ".$ob['activity']."</option>";
				}
				print "</select>";
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
            <td colspan="2" align="center" class="tdpadding"> 
                <input class="button2" type="submit" name="submit" value="บันทึกรายการ">
                <input class="button2" type="reset" name="submit2" value="เคลียร์">              </td>
          </tr>		    
  </table>
</form>
</body>
</html>
