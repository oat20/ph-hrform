<script language="JavaScript" type="text/javascript">
function checkval(form) 
{
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
}
</script>
<fieldset>
	<legend>งบประมาณและการวางแผนการใช้จ่ายงบประมาณโครงการ</legend>
	<!--<!--<table>
    	<tr>
             	<td class="tdpadding">งบประมาณ:</td>
                <td class="tdpadding"><input name="budget" type="text" size="100" maxlength="20"> บาท</td>
             </tr>
             <tr>
             	<td class="tdpadding">แหล่งเงิน:</td>
                <td class="tdpadding">
                <?php
				/*print "<select name=bt_id>";
					print "<option value=0>- เลือกรายการ -</option>";
				$sql="select * from budtype";
				$rs=mysql_query($sql);
				while($ob=mysql_fetch_array($rs)){
					print "<option value=".$ob['bt_id'].">- ".$ob['bt_name']."</option>";
				}
				print "</select>";*/
				?>
                </td>
             </tr>
    </table> -->
    <table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr>
                    	<td class="formcolhd">เงินงบประมาณแผ่นดิน</td>
                        <td class="formcolhd">งบประมาณที่ได้รับ</td>
                        <td colspan="2" class="formcolhd"></td>
                    </tr>
                     
    <?php
		$sql6="select * from project_budtype 
		inner join budtype on (project_budtype.bt_id=budtype.bt_id)
		where project_budtype.pro_id='$ob[pro_id]'
		order by project_budtype.id asc";
		$rs6=mysql_query($sql6);
		while($ob6=mysql_fetch_array($rs6)){
		?>
    <tr>
    	<td class="formcol2"><?=$ob6[bt_name];?></td>
        <td class="formcol2"><?=number_format($ob6[budget],"2");?></td>
        <td class="formcol2"><a href="javascript:NewWindow('admin/compcode/editProjectPay.php?id=<?php print $ob6[id]; ?>','acepopup','750','430','fullscreen','front');" title="แก้ไข"><img src="admin/compcode/img/editpic.gif" border="0"/></a></td>
            <td class="formcol2"><a href="admin/compcode/delProjectPay.php?id=<?=$ob6[id];?>&pro_id=<?=$ob[pro_id];?>" title="ลบ" onClick="return confirm('! ยืนยันการลบข้อมูล');"><img src="admin/compcode/img/botton_delete.gif" border="0"/></a></td>
    </tr>
    <?php
		}
		?>
    <tr>
    	<td colspan="7">
        	<input name="" type="button" value="เพิ่มแหล่งเงิน" class="buttonn" onClick="javascript:NewWindow('admin/compcode/addProjectPay.php?pro_id=<?=$ob[pro_id];?>','acepopup','750','430','fullscreen','front');">
        </td>
    </tr>
                </table>
    <!--<br/>
    <table cellspacing="0">
<tr >
        	<td class="formcolhd">ไตรมาส</td>
            <td class="formcolhd">แผนการใช้จ่าย (บาท)</td>
            <td class="formcolhd">ผลการใช้จ่าย (บาท)</td>
        </tr>
        <tr class="tdpadding">
        	<td class="formcol2">ไตรมาสที่ 1 (ตุลาคม - ธันวาคม)</td>
            <td class="formcol2"><input name="q1" type="text" size="30" maxlength="9"></td>
            <td class="formcol2"><input name="q11" type="text" size="30" maxlength="9"></td>
        </tr>
        <tr class="tdpadding">
        	<td class="formcol2">ไตรมาสที่ 2 (มกราคม - มีนาคม)</td>
            <td class="formcol2"><input name="q2" type="text" size="30" maxlength="9"></td>
            <td class="formcol2"><input name="q22" type="text" size="30" maxlength="9"></td>
        </tr>
        <tr class="tdpadding">
        	<td class="formcol2">ไตรมาสที่ 3 (เมษายน - มิถุนายน)</td>
            <td class="formcol2"><input name="q3" type="text" size="30" maxlength="9"></td>
           <td class="formcol2"><input name="q33" type="text" size="30" maxlength="9"></td>
        </tr>
        <tr class="tdpadding">
        	<td class="formcol2">ไตรมาสที่ 4 (กรกฎาคม - กันยายน)</td>
            <td class="formcol2"><input name="q4" type="text" size="30" maxlength="9"></td>
            <td class="formcol2"><input name="q44" type="text" size="30" maxlength="9"></td>
        </tr>
        <tr>
        	<td colspan="3" class="tdpadding"><center><input class="buttonn" type="button" name="submit" value="< ย้อนกลับ" onClick="javascript:history.go(-1)"><input class="buttonn" type="submit" name="submit" value="เสร็จสิ้น"></center></td>
        </tr>
    </table> -->
  </fieldset>
