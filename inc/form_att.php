<?php
include("../admin/compcode/include/config.php");
include("../admin/compcode/include/connect_db.php");
?>
<script language="JavaScript" type="text/javascript">
function checkval(form) 
{
  		if (form.att.value == "") 
		{
       			alert("แนบไฟล์เอกสารประกอบโครงการ");
          		form.att.focus();
          		return false;
        }
}
</script>
<form action="#" method="get" enctype="multipart/form-data" onSubmit="return checkval(this)">
<fieldset>
<legend>เอกสารประกอบ</legend>
<table>
    	<tr>
             	<td class="formcoltitle">แนบไฟล์</td>
                <td class="formcol2"><label>
                  <input type="file" name="att" id="fileField" size="100"><br/>
                  หมายเหตุ ขนาดไฟล์ไม่เกิน 5MB (.pdf,.zip,.rar)
                </label></td>
      </tr> 
<tr>
             	<td></td>
             <td class="tdpadding"> 
                <input class="button2" type="submit" name="submit" value="ถัดไป >">
                </td>
          </tr>
    </table>
    </fieldset>
</form>