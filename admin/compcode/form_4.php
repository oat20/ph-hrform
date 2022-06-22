<!--<script language="JavaScript" type="text/javascript">
function checkval() 
{
  		if (document.form_3.sec_id.value == "0") 
		{
       			alert("เลือกประเภทโครงการ");
          		document.form_3.sec_id.focus();
          		return false;
        }
}
</script> -->
<!--<h2>4. ประเภทโครงการ</h2> -->
<!--<form action="#" method="post" name="form_3" onSubmit="JavaScript:return checkval();"> -->
	<fieldset>
    	<legend>4. ประเภทโครงการ</legend>
<table>
<tr >
          <td class="formcolhd">ประเภทโครงการ:</td>
          <td class="tdpadding">
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
        <!--<tr>
        	<td></td>
            <td><input class="button2" type="submit" name="submit" value="ถัดไป >"></td>
        </tr> -->
        </table>
        </fieldset>
<!--</form> -->