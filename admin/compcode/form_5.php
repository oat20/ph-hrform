<!--<script language="JavaScript" type="text/javascript">
function checkval() 
{
  		if (document.form_4.typ_id.value == "0") 
		{
       			alert("เลือกลักษณะโครงการ");
          		document.form_4.typ_id.focus();
          		return false;
        }
}
</script> -->
<!--<form action="#" method="post" name="form_4" onSubmit="JavaScript:return checkval();"> -->
	<fieldset>
    	<legend>5. ลักษณะโครงการ</legend>
<table>
<tr >
          <td class="formcolhd">ลักษณะโครงการ :</td>
          <td background="compcode/picture/back_1.jpg" class="tdpadding">
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
        <!--<tr>
        	<td></td>
            <td><input class="button2" type="submit" name="submit" value="ถัดไป >"></td>
        </tr> -->
        </table>
        </fieldset>
<!--</form> -->