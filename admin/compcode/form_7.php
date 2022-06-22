<!--<h2 class="boldBlack_10">1. ชื่อโครงการ</h2>
<div class="space5"></div> -->
<!--<form action="../inc/insert_p2.php" method="post" onsubmit="checkval(this.form)"> -->
<fieldset>
	<legend>7. ความสอดคล้องกับนโยบายรัฐบาล</legend>
<table border="0" cellpadding="0" cellspacing="1">
    <?php
	$sub_point_policy="select * from sub_point_policy, project_pol
	where sub_point_policy.sub_id = project_pol.sub_id
	and project_pol.pro_id = '$_GET[pro_id]'
	order by sub_point_policy.sub_id asc";
	$rs_sub_point_policy=mysql_query($sub_point_policy);
	while($ob_sub_point_policy=mysql_fetch_array($rs_sub_point_policy))
	{
	?>
    <tr>
    	<td class="tdpadding"><?php print $ob_sub_point_policy['subname']; ?></td>
        <td class="formcol2"><a href="admin/compcode/delProjectpol.php?id=<?=$ob_sub_point_policy[id];?>" onClick="return confirm('! ยืนยันการลบข้อมูล');"><img src="admin/compcode/img/botton_delete.gif" border="0"/></a></td>
    </tr>
<?php
	}
?>
	<td colspan="2">
            	<input type="button" value="เพิ่มความสอดคล้องกับนโยบายรัฐบาล" class="buttonn" onClick="javascript:NewWindow('admin/compcode/addProjectpol?pro_id=<?=$ob[pro_id];?>','ส่วนงานร่วม','650','450','fullscreen','front');" />
            </td>
  </table>
</fieldset>
<!--</form> -->
