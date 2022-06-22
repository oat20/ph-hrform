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
<form action="../present_project/insert_no12_16.php" method="get" onSubmit="return checkval(this)">
<fieldset>
	<legend>ขั้นตอนและกระบวนการการดำเนินโครงการ</legend>
	<table border="0" cellpadding="0" cellspacing="0">
<tr>
             	<td class="formcolhd">วัน เดือน ปี </td>
                <td class="formcolhd">ขั้นตอน</td>
                <td class="formcolhd">กิจกรรม</td>
                <td class="formcolhd">แผนการดำเนินงาน (ร้อยละ)</td>
                <td class="formcolhd">แผนการใช้จ่าย (บาท)</td>
             </tr>
             
             <?php
			 $sql="select * from project_step
			 where pro_id='$_SESSION[Max]'
			 order by id asc";
			 $rs=mysql_query($sql);
			 while($ob=mysql_fetch_array($rs)){
             print "<tr>";
             	print "<td class='formcol2'>".$ob[date_step]."</td>";
				print "<td class='formcol2'>".$step[$ob[step]]."</td>";
				print "<td class='formcol2'>".$ob[act_step]."</td>";
				print "<td class='formcol2'>".$ob[plan_step]."%</td>";
				print "<td class='formcol2'>".$ob[bug_step]."</td>";
             print "</tr>";
			 }
             ?>
             
             <tr>
             	<td class="formcol2"><input name="date_step" type="text" size="20" maxlength="50"></td>
                <td class="formcol2">
                	<select name="step">
                    	<option value="0">เลือกรายการ</option>
                	<?php
					foreach($step as $k=>$v){
						print "<option value=".$k.">- ".$v."</option>";
					}
					?>
                    </select>
                </td>
                <td class="formcol2"><input name="act_step" type="text" size="20"></td>
                <td class="formcol2"><?=show_persent();?></td>
                <td class="formcol2"><input name="bug_step" type="text" size="20"></td>
             </tr>
             <tr>
               <td colspan="5" class="tdpadding"><span class="regRed_14">หมายเหตุ จำนวนเงินไม่ต้องใส่เครื่องหมาย "," ขั้นหลัก เช่น 100000</span></td>
             </tr>
             <tr>
             	<td colspan="5" class="tdpadding"><input name="" type="submit" value="เพิ่มขั้นตอนการดำเนินโครงการ" class="buttonn"> <input name="" type="button" value="ถัดไป >" class="buttonn" onClick="location.href='no13.php'"></td>
             </tr>
    </table>
  </fieldset>
</form>