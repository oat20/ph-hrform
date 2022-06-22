<link href="tool/css_text.css" rel="stylesheet" type="text/css">
<script language="JavaScript" type="text/javascript" src="admin/wysiwyg.js"></script>
<!--<script language="JavaScript" type="text/javascript">
function checkval(form) 
{
  		if (form.pro_resource.value == "") 
		{
       			alert("ใส่ทรัพยากรที่ใช้");
          		form.pro_resource.focus();
          		return false;
        }
		
		if (form.pro_resource_from.value == "") 
		{
       			alert("ใส่แหล่งที่มาของทรัพยากร");
          		form.pro_resource_from.focus();
          		return false;
        }
		
}
</script> -->
<form action="inc/add_project.php" method="post">
<fieldset>
	<legend>ทรัพยากรที่ต้องใช้</legend>
	<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr>
                    	<td class="formcolhd">ทรัพยากรที่ต้องใช้<br/>(วัสดุอุปกรณ์และบุคลากร)</td>
                        <td class="formcolhd">แหล่งที่มาของทรัพยากร<br/>
(เช่น ระบุไว้แล้วในงบประมาณ หรือต้องยืมหน่วยงาน/โครงการอื่นใช้  ให้ระบุชื่อหน่วยงาน/โครงการ)
</td>
                        <td colspan="2" class="formcolhd"></td>
                    </tr>
                     
    <?php
		$sql6="select * from project_resource
		where pro_id='$ob[pro_id]'
		order by id asc";
		$rs6=mysql_query($sql6);
		while($ob6=mysql_fetch_array($rs6)){
		?>
    <tr>
    	<td class="formcol2"><?=$ob6["resource"];?></td>
        <td class="formcol2"><?=$ob6["resource_from"];?></td>
        <td class="formcol2"><a href="javascript:NewWindow('admin/compcode/editProjectresource.php?id=<?php print $ob6[id]; ?>','acepopup','750','200','fullscreen','front');" title="แก้ไข"><img src="admin/compcode/img/editpic.gif" border="0"/></a></td>
            <td class="formcol2"><a href="admin/compcode/delProjectresource.php?id=<?=$ob6[id];?>&pro_id=<?=$ob[pro_id];?>" title="ลบ" onClick="return confirm('! ยืนยันการลบข้อมูล');"><img src="admin/compcode/img/botton_delete.gif" border="0"/></a></td>
    </tr>
    <?php
		}
		?>
    <tr>
    	<td colspan="7">
        	<input name="" type="button" value="เพิ่มทรัพยากรที่ใช้" class="buttonn" onClick="javascript:NewWindow('admin/compcode/addProjectresource.php?pro_id=<?=$ob[pro_id];?>','acepopup','750','200','fullscreen','front');">
        </td>
    </tr>
                </table>
    </fieldset>
