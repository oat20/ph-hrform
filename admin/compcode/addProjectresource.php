<?php
ob_start();
session_start();

include("include/config.php");
 include "include/connect_db.php";
 include("include/function.php");
 include("check_login.php");
 
 if($_POST[action] == "add")
 {
	 $sql="insert into project_resource (pro_id, resource, resource_from) 
	 values ('$_POST[pro_id]', '$_POST[resource]', '$_POST[resource_from]')";
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
	<legend>ทรัพยากรที่ใช้</legend>
	<table border="0" cellpadding="0" cellspacing="0">
<tr>
             	<td class="formcolhd">ทรัพยากรที่ต้องใช้<br/>(วัสดุอุปกรณ์และบุคลากร)</td>
                <td class="formcolhd"><span class="formcol2">
                  <input name="resource" type="text" size="50" maxlength="50" id="resource" />
                </span></td>
             </tr>
             
             <tr>
             	<td class="formcolhd">แหล่งที่มาของทรัพยากร<br/>
(เช่น ระบุไว้แล้วในงบประมาณ หรือต้องยืมหน่วยงาน/โครงการอื่นใช้  ให้ระบุชื่อหน่วยงาน/โครงการ)</td>
                <td class="formcol2"><input name="resource_from" type="text" size="50" maxlength="50" id="resource_from" /></td>
             </tr>
             <tr>
               <td colspan="2" class="tdpadding">
               	<input name="pro_id" type="hidden" value="<?=$_GET[pro_id];?>" />
               	<input name="action" type="hidden" value="add" />
               	<input type="submit" value="Save" class="button">
               </td>
             </tr>
             <!--<tr>
             	<td colspan="5" class="tdpadding"><input name="" type="submit" value="เพิ่มขั้นตอนการดำเนินโครงการ" class="buttonn"> <input name="" type="button" value="ถัดไป >" class="buttonn" onClick="location.href='no13.php'"></td>
             </tr> -->
    </table>
  </fieldset>
</form>