<!--<h2 class="boldBlack_10">1. ชื่อโครงการ</h2>
<div class="space5"></div> -->
<fieldset>
	<legend>17. ยุทธศาสตร์คณะ</legend>
    <table width="100%" class="table2">
  <tr>
    <th>ประเด็นยุทธศาสตร์</th>
    <th>เป้าประสงค์</th>
    <th>ตัวชี้วัด/เป้าหมาย</th>
    <th colspan="2">&nbsp;</th>
    </tr>
    <?php
	$str_fac="select project_str_fac.id, strategic_faculty.sf_name, str_fac2.name as a1, str_fac3.name as a2 
	 from project_str_fac, strategic_faculty, str_fac2, str_fac3
	where project_str_fac.str_fac_id = strategic_faculty.sf_id
	and project_str_fac.obj_fac_id = str_fac2.id
	and project_str_fac.ind_fac_id = str_fac3.id
	and project_str_fac.pro_id = '$_GET[pro_id]'";
	$rs_str_fac=mysql_query($str_fac);
	while($ob_str_fac=mysql_fetch_array($rs_str_fac)){
	?>
  <tr>
    <td><?=$ob_str_fac["sf_name"];?></td>
    <td><?=$ob_str_fac["a1"];?></td>
    <td><?=$ob_str_fac["a2"];?></td>
    <td><a href="javascript:NewWindow('<?=$livesite;?>admin/compcode/editProjectstrfac.php?id=<?php print $ob_str_fac[id]; ?>','acepopup','905','300','fullscreen','front');" title="แก้ไข"><img src="<?=$livesite;?>admin/compcode/img/editpic.gif" border="0"/></a></td>
            <td><a href="<?=$livesite;?>admin/compcode/delProjectstrfac.php?id=<?=$ob_str_fac[id];?>" onClick="return confirm('! ยืนยันการลบข้อมูล');"><img src="<?=$livesite;?>admin/compcode/img/botton_delete.gif" border="0"/></a></td>
  </tr>
  <?php
	}
  ?>
  <tr>
    	<td colspan="5">
        	<input name="" type="button" value="เพิ่มยุทธศาสตร์คณะฯ" class="buttonn" onClick="javascript:NewWindow('<?=$livesite;?>admin/compcode/addProjectstrfac.php?pro_id=<?=$ob[pro_id];?>','acepopup','750','300','fullscreen','front');">
        </td>
    </tr>
</table>

</fieldset>
