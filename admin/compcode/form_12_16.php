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
<fieldset>
	<legend>ขั้นตอนและกระบวนการการดำเนินโครงการ</legend>
	<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr>
	<td class="formcolhd">วันเดือนปี<br/>ดำเนินการ</td>
    <td class="formcolhd">กิจกรรม</td>
                         <td class="formcolhd">แผนการดำเนินงาน</td>
                        <td class="formcolhd">แผนการใช้จ่ายเงินจริง (บาท)</td>
                        <td class="formcolhd"></td>
                        <td class="formcolhd"></td>
                    </tr>
                    <?php
					foreach($step as $k_step => $v_step){
					?>
                    <tr>
                      <td colspan="6" class="formcolhd"><?=$v_step;?></td>
      </tr>
                    <?php
					$project_step="select * 
					from project_step
					where pro_id='$ob[pro_id]'
					and step='$k_step'
					order by id asc";
					$rs_project_step=mysql_query($project_step);
					while($ob_project_step=mysql_fetch_array($rs_project_step))
					{
					?>
      <tr>
	<td class="formcol2"><?=$ob_project_step['date_step'];?></td>
    <td class="formcol2"><?=++$i2.". ".$ob_project_step['act_step'];?></td>
  <td class="formcol2"><?=$ob_project_step["plan_step"]."%";?></td>
  <td class="formcol2">
  	<?=number_format($ob_project_step[bug_step],"2");?>
  </td>
  <td class="formcol2"><a href="javascript:NewWindow('<?=$livesite;?>admin/compcode/editProjectStep.php?id=<?php print $ob_project_step[id]; ?>','acepopup','750','420','fullscreen','front');" title="แก้ไข"><img src="<?=$livesite;?>admin/compcode/img/editpic.gif" border="0"/></a></td>
            <td class="formcol2"><a href="<?=$livesite;?>admin/compcode/delProjectStep.php?id=<?=$ob_project_step[id];?>&pro_id=<?=$ob[pro_id];?>" title="ลบ" onClick="return confirm('! ยืนยันการลบข้อมูล');"><img src="<?=$livesite;?>admin/compcode/img/botton_delete.gif" border="0"/></a></td>
</tr>
<?php
}
					}
?>
	<tr>
    	<td colspan="8">
        	<input name="" type="button" value="เพิ่มขั้นตอนการดำเนินงาน" class="buttonn" onClick="javascript:NewWindow('<?=$livesite;?>admin/compcode/addProjectStep.php?pro_id=<?=$ob[pro_id];?>','acepopup','650','500','fullscreen','front');">
        </td>
    </tr>
                </table>
  </fieldset>
