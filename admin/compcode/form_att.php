<script language="JavaScript" type="text/javascript">
function checkval(form) 
{
  		if (form.attach.value == "") 
		{
       			alert("! ยังไม่ได้แนบไฟล์เอกสารประกอบโครงการ");
          		form.attach.focus();
          		return false;
        }
}
</script>

<?php
$sql="select pro_id,budget_year,names
from project
where pro_id = '$_GET[pro_id]'";
$rs=mysql_query($sql);
$ob=mysql_fetch_array($rs);
?>
<table>
	<tr>
    	<td class="formcolhd">รหัสโครงการ</td>
        <td class="td2"><?=$ob["pro_id"];?></td>
    </tr>
    <tr>
    	<td class="formcolhd">ปีงบประมาณ</td>
        <td class="td2"><?=$ob["budget_year"];?></td>
    </tr>
    <tr>
    	<td class="formcolhd">ชื่อโครงการ</td>
        <td class="td2"><?=$ob["names"];?></td>
    </tr>
</table>
<p></p>

<form action="<?=$livesite;?>admin/compcode/addFile.php" method="post" enctype="multipart/form-data" onSubmit="return checkval(this)">
<fieldset>
<legend>เอกสารประกอบ</legend>
<table width="100%">
	<tr>
    	<th class="th1"></th>
        <th class="th1">Download</th>
        <th class="th1">ลบ</th>
    </tr>
    <?php
	$sql2="select * from project_att
	where pro_id='$_GET[pro_id]'";
	$rs2=mysql_query($sql2);
	while($ob2=mysql_fetch_array($rs2))
	{
		if($ob2["display"]=="")
		{
			$ob2["display"]=$ob2["attach"];
		}
	?>
    <tr>
    	<td class="td2"><?=$ob2["display"];?></td>
        <td class="td2"><center><a href="<?=$livesite;?>phpm/attachment/<?=$ob2["attach"];?>" title="Download" target="_blank"><img src="<?=$livesite;?>img/button_save.png" border="0"></a></center></td>
        <td class="td2"><center><a href="<?=$livesite;?>admin/compcode/delFile.php?id=<?=$ob2["id"];?>" title="ลบ" onClick="return confirm('ยืนการลบข้อมูล');"><img src="<?=$livesite;?>img/deleteC.gif" border="0"></a></center></td>
    </tr>
    <?php
	}
	?>
</table>
<p></p>

<table>
	<tr>
    	<td class="formcoltitle">ชื่อแสดงผล</td>
        <td><input name="display_name" type="text" size="60" maxlength="100" /></td>
    </tr>
    	<tr>
             	<td class="formcoltitle">แนบไฟล์</td>
                <td class="formcol2"><label>
                  <input type="file" name="attach" id="fileField" size="60">
          </label></td>
      </tr>
<tr>
             	<td></td>
             <td class="tdpadding">
             	<input name="pro_id" type="hidden" value="<?=$_GET["pro_id"];?>" />
             	<input name="action" type="hidden" value="save" /> 
                <input class="button2" type="submit" name="submit" value="Save">
                </td>
          </tr>
    </table>
    </fieldset>
</form>