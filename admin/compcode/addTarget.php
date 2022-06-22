<?php
ob_start();
session_start();

include("include/config.php");
 include "include/connect_db.php";
 include("include/function.php");
 include("check_login.php");
 
 if($_POST[action] == "add")
 {
	 $sql="insert into project_target (pro_id, pro_target_group, pro_target_group_number, pro_target_group_unit, pro_area, days) 
	 values ('$_POST[pro_id]', '$_POST[pro_target_group]', '$_POST[pro_target_group_number]', '$_POST[unit]', '$_POST[pro_area]', '$date_create')";
	 mysql_query($sql);
	 
	 echo"<script language='JavaScript'>";
	 	print"window.opener.location.reload();";
								echo"self.close();";
								echo"</script>";
 }
?>

<title><?=$livesite." ".$titlebar;?></title>
<link href="tool/css_text.css" rel="stylesheet" type="text/css">
<form action="<?=$PHP_SELF;?>" method="post">
<fieldset>
<legend>กลุ่มเป้าหมายและขอบเขตการดำเนินงาน</legend>
<table>
	<tr>
	  <td class="tdpadding">กลุ่มผู้รับบริการเป้าหมาย</td>
	  <td class="tdpadding"><input name="pro_target_group" type="text" size="60" /></td>
	  </tr>
      <?php
	  $sql="select * from ";
	  ?>
	<tr>
    	<td class="tdpadding">จำนวน</td>
        <td class="tdpadding"><input name="pro_target_group_number" type="text" id="pro_target_group_number" size="5" maxlength="4" /></td>
    </tr>
	<tr>
	  <td class="tdpadding">หน่วยนับ</td>
	  <td class="tdpadding"><input name="unit" type="text" id="unit" size="10" maxlength="20" /></td>
  </tr>
	<tr>
	  <td class="tdpadding">พื้นที่ / สถานที่เป้าหมาย</td>
	  <td class="tdpadding"><input name="pro_area" type="text" size="60" /></td>
  </tr>
	<tr>
	  <td class="tdpadding">&nbsp;</td>
	  <td class="tdpadding"><input name="pro_id" type="hidden" value="<?=$_GET[pro_id];?>" />
        <input name="action" type="hidden" value="add" />
      <input type="submit" name="button" id="button" value="Save" class="button" /></td>
  </tr>
</table>
</fieldset>
</form>