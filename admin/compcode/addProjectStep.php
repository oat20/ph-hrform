<?php
ob_start();
session_start();

include("include/config.php");
 include "include/connect_db.php";
 include("include/function.php");
 include("check_login.php");
 
 if($_POST[action] == "add")
 {
	 $sql="insert into project_step (pro_id, date_step, step, act_step, plan_step, bug_step, result_step, result_persent, problem_step) 
	 values ('$_POST[pro_id]', '$_POST[date_step]', '$_POST[step]', '$_POST[act_step]', '$_POST[plan_step]', '$_POST[bug_step]', '$_POST[result_step]', '$_POST[result_persent]','$_POST[problem_step]')";
	 mysql_query($sql);
	 
	 echo"<script language='JavaScript'>";
	 	print"window.opener.location.reload();";
								echo"self.close();";
								echo"</script>";
 }
?>
<script language="JavaScript" type="text/javascript">
function checkval(form) 
{
  		if (form.date_step.value == "") 
		{
       			alert("ใส่วัน เดือน ปี");
          		form.date_step.focus();
          		return false;
        }
		if (form.step.value == "0") 
		{
       			alert("เลือกขั้นตอน");
          		form.step.focus();
          		return false;
        }
		if (form.act_step.value == "") 
		{
       			alert("ใส่กิจกรรม");
          		form.act_step.focus();
          		return false;
        }
}
</script>
<link href="tool/css_text.css" rel="stylesheet" type="text/css">
<form action="<?=$PHP_SELF;?>" method="post">
<fieldset>
	<legend>ขั้นตอนและกระบวนการการดำเนินโครงการ</legend>
	<table border="0" cellpadding="0" cellspacing="0">
<tr>
             	<td class="formcolhd">วัน เดือน ปี </td>
                <td class="formcolhd"><span class="formcol2">
                  <input name="date_step" type="text" size="50" maxlength="50" />
                </span></td>
             </tr>
             
             <tr>
             	<td class="formcol2"><span class="formcolhd">ขั้นตอน</span></td>
                <td class="formcol2">
                	<select name="step">
                	<?php
					foreach($step as $k=>$v){
						print "<option value=".$k.">- ".$v." -</option>";
					}
					?>
                    </select>
                </td>
             </tr>
             <tr>
               <td class="tdpadding"><span class="formcolhd">กิจกรรม</span></td>
               <td class="tdpadding"><span class="formcol2">
                 <input name="act_step" type="text" size="50" maxlength="100" />
               </span></td>
             </tr>
             <tr>
               <td class="tdpadding">แผนการดำเนินงาน</td>
               <td class="tdpadding"><?=show_persent("0","plan_step");?></td>
             </tr>
             <tr>
               <td class="tdpadding"><span class="formcolhd">งบประมาณที่ใช้ (บาท)</span></td>
               <td class="tdpadding"><span class="formcol2">
                 <input name="bug_step" type="text" size="50" maxlength="20" />
               </span></td>
             </tr>
             <tr>
               <td class="tdpadding">ผลการดำเนินงาน</td>
               <td class="tdpadding">
               	<select name="result_step">
    	<option value="">- -</option>
    	<option value="1">- สำเร็จ -</option>
        <option value="0">- ไม่สำเร็จ -</option>
    </select>
               </td>
             </tr>
             <tr>
               <td class="tdpadding">คิดเป็น ร้อยละ</td>
               <td class="tdpadding"><?=show_persent("0","result_persent");?></td>
             </tr>
             <tr>
               <td class="tdpadding">ถ้าไม่สำเร็จเนื่องจาก</td>
               <td class="tdpadding"><label for="problem_step"></label>
               <input name="problem_step" type="text" id="problem_step" size="50" maxlength="100" /></td>
             </tr>
             <tr>
               <td colspan="2" class="tdpadding">
               	<input name="pro_id" type="hidden" value="<?=$_GET[pro_id];?>" />
               	<input name="action" type="hidden" value="add" />
               	<input type="submit" value="Save" class="button">
               </td>
             </tr>
             <tr>
               <td colspan="2" class="tdpadding"><span class="boldRed_10">หมายเหตุ จำนวนเงินไม่ต้องใส่เครื่องหมาย "," ขั้นหลัก เช่น 100000</span></td>
             </tr>
             <!--<tr>
             	<td colspan="5" class="tdpadding"><input name="" type="submit" value="เพิ่มขั้นตอนการดำเนินโครงการ" class="buttonn"> <input name="" type="button" value="ถัดไป >" class="buttonn" onClick="location.href='no13.php'"></td>
             </tr> -->
    </table>
  </fieldset>
</form>