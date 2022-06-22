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
        	<td class="formcolhd">ชื่อบุคคล</td>
        	<td class="formcolhd">ตำแหน่งในโครงการ</td>
            <td class="formcolhd">บทบาทหน้าที่ความรับผิดชอบ</td>
            <td colspan="2" class="formcolhd"></td>
        </tr>
        <?php
		$sql3="select * from project_res where pro_id='$ob[pro_id]'
		order by id asc";
		$rs3=mysql_query($sql3);
		while($ob3=mysql_fetch_array($rs3)){
		?>
        <tr>
        	<td class="formcol2"><?php print ++$i.". ".$ob3[names]; ?></td>
        	<td class="formcol2"><?php print $pro_position[$ob3[position]]; ?></td>
            <td class="formcol2"><?php print $ob3[mission]; ?></td>
            <td class="formcol2"><a href="javascript:NewWindow('admin/compcode/editRes.php?id=<?php print $ob3[id]; ?>','acepopup','910','150','fullscreen','front');" title="แก้ไข"><img src="<?=$livesite;?>admin/compcode/img/editpic.gif" border="0"/></a></td>
            <td class="formcol2"><a href="admin/compcode/delRes.php?id=<?=$ob3[id];?>&pro_id=<?=$ob[pro_id];?>" onClick="return confirm('! ยืนยันการลบข้อมูล');"><img src="<?=$livesite;?>admin/compcode/img/botton_delete.gif" border="0"/></a></td>
        </tr>
        <?php
		}
		?>
        <tr>
        	<td colspan="3">
            	<input type="button" value="เพิ่มผู้รับผิดชอบ" class="buttonn" onClick="javascript:NewWindow('admin/compcode/addRes.php?pro_id=<?=$ob[pro_id];?>','acepopup','910','150','fullscreen','front');" />
            </td>
        </tr>
        </table>
    	</fieldset>
<!--</form> -->