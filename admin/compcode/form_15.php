<script language="JavaScript" type="text/javascript">
function checkval(form) 
{
  		if (form.act_id.value == "0") 
		{
       			alert("เลือกประเภทกิจกรรม");
          		form.sec_id.focus();
          		return false;
        }
}
</script>
<fieldset>
<legend>ประเภทกิจกรรม</legend>
<table>
<tr >
          <td><div align="right"  >ประเภทกิจกรรม:</div></td>
          <td class="formcol2">
          	<select name="act_id">
                	<option value="0">- เลือกรายการ -</option>
                    <?php
					$sec=show_data("activity","act_id");
					while($ob_sec=mysql_fetch_array($sec)){
						if($ob["sec_id"] == $ob_sec["act_id"]){
							print "<option value=".$ob_sec[act_id]." selected='selected'>- ".$ob_sec[activity]."</option>";
						}else{
							print "<option value=".$ob_sec[act_id].">- ".$ob_sec[activity]."</option>";
						}
					}
					?>                 
                </select>                           </td>
        </tr>             	
        <tr>
        	<td></td>
        <td class="tdpadding">
        <input name="number" type="hidden" value="11" />
         <input name="pro_id" type="hidden" value="<?=$_GET["pro_id"];?>" />
        <input name="" type="submit" value="บันทึกข้อมูล" class="button"></td>
             </tr>
             </table>
             </fieldset>
