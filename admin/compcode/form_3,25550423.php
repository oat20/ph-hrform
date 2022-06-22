<!--<script language="JavaScript" type="text/javascript">
function checkval() 
{
  		if (document.form.position[i].value == "") 
		{
       			alert("กรอกตำแหน่งในโครงการ");
          		document.form.position[i].focus();
          		return false;
        }
		
		if (document.form.pro_name_res[i].value == "") 
		{
       			alert("กรอกชื่อผู้รับผิดชอบ");
          		document.form.pro_name_res[i].focus();
          		return false;
        }
		
		if (document.form.mission[i].value == "") 
		{
       			alert("กรอกบทบาทหน้าที่ความรับผิดชอบ");
          		document.form.mission[i].focus();
          		return false;
        }
}
</script> -->

<!--<h2>3. ผู้รับผิดชอบ</h2> -->
<!--<form action="#" method="post" onSubmit="JavaScript:return checkval();" name="form"> -->
<script type="text/javascript" src="inc/addtextbox.js"></script>
	<fieldset>
    	<legend>3. ผู้รับผิดชอบ</legend>
	<table border="0" cellpadding="0" cellspacing="0" width="100%">
    	<tr>
        	<!--<td><span class="boldBlack_10">ลำดับ</span></td> -->
        	<td><span class="boldBlack_10">ตำแหน่งในโครงการ</span></td>
            <td><span class="boldBlack_10">ชื่อบุคคล</span></td>
            <td><span class="boldBlack_10">บทบาทหน้าที่ความรับผิดชอบ</span></td>
            <td></td>
        </tr>
        </table>
        <?php
		#for($i=1;$i<=5;$i++)
		#{
		?>
        <ul id="files-root" style="list-style:none">
        	<!--<td><?php #print $i; ?></td> -->
        	<li><input name="position[]" type="text" size="30" maxlength="200"> <input name="pro_name_res[]" type="text" size="30" maxlength="200"> <input name="mission[]" type="text" size="30" maxlength="200"> <input type="button" value="Add" onclick="addFile()" class="buttonn" /></li>
            <!--<td><input name="pro_name_res[]" type="text" size="30" maxlength="200"></td>
            <td><input name="mission[]" type="text" size="30" maxlength="200"></td>
            <td><input type="button" value="Add" onclick="addFile()" class="buttonn" /></td> -->
        </ul>
        <?php
		#}
		?>
        <!--<tr class="tdcol2">
        	<td></td>
        	<td></td>
            <td></td>
            <td><input class="button2" type="button" name="submit" value="< ย้อนกลับ" onClick="javascript:history.go(-1)"> <input class="button2" type="submit" name="submit" value="ถัดไป >"></td>
            </tr> -->
    <!--</table> -->
    	</fieldset>
<!--</form> -->