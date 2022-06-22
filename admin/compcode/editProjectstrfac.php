<?php
ob_start();
session_start();

include("include/config.php");
 include "include/connect_db.php";
 include("include/function.php");
 include("check_login.php");
 
 if($_POST[action] == "edit")
 {
	 $sql="update project_str_fac set 
	 str_fac_id = '$_POST[str_fac_id]', 
	 obj_fac_id = '$_POST[obj_fac_id]', 
	 ind_fac_id = '$_POST[ind_fac_id]', 
	 days = '$date_create'
	 where id = '$_POST[id]'";
	 mysql_query($sql);
	 
	 echo"<script language='JavaScript'>";
	 	print"window.opener.location.reload();";
								echo"self.close();";
								echo"</script>";
 }
 
 $str_fac="select * from project_str_fac
 where id='$_GET[id]'";
 $rs_str_fac=mysql_query($str_fac);
 $ob_str_fac=mysql_fetch_array($rs_str_fac);
?>
<title><?=$livesite." ".$titlebar;?></title>
<link href="tool/css_text.css" rel="stylesheet" type="text/css">
<form action="<?=$PHP_SELF;?>" method="post">
<fieldset>
  <legend>ยุทธศาสตร์คณะฯ</legend>
<table width="100%" border="0" cellpadding="0" cellspacing="0" class="table1">
<tr>
    	<th>ประเด็นยุทธศาสตร์</th>
        <td>
        <select name="str_fac_id" style="width:500px">
          <option value="0">- -</option>
          <?php
		$rs=show_data("strategic_faculty","sf_id");
		while($ob=mysql_fetch_array($rs)){
			if($ob_str_fac["str_fac_id"] == $ob["sf_id"]){
				print "<option value=".$ob[sf_id]." selected='selected'>- ".$ob[sf_name]." -</option>";
			}else{
				print "<option value=".$ob[sf_id].">- ".$ob[sf_name]." -</option>";
			}
		}
		?>
        </select>
        </td>
    </tr>
    <tr>
    	<th>เป้าประสงค์</th>
        <td><select name="obj_fac_id" style="width:500px">
          <option value="0">- -</option>
          <?php
		$rs=show_data("str_fac2","id");
		while($ob=mysql_fetch_array($rs)){
			if($ob_str_fac["obj_fac_id"] == $ob["id"]){
				print "<option value=".$ob[id]." selected='selected'>- ".$ob[name]." -</option>";
			}else{
				print "<option value=".$ob[id].">- ".$ob[name]." -</option>";
			}
		}
		?>
        </select></td>
    </tr>
    <tr>
      <th>ตัวชี้วัด</th>
      <td><select name="ind_fac_id" style="width:500px">
          <option value="0">- -</option>
          <?php
		$rs=show_data("str_fac3","id");
		while($ob=mysql_fetch_array($rs)){
			if($ob_str_fac["ind_fac_id"] == $ob["id"]){
				print "<option value=".$ob[id]." selected='selected'>- ".$ob[name]." -</option>";
			}else{
				print "<option value=".$ob[id].">- ".$ob[name]." -</option>";
			}
		}
		?>
        </select></td>
    </tr>
    <tr>
      <th>&nbsp;</th>
      <td>
        <input name="id" type="hidden" value="<?=$ob_str_fac[id];?>" />
        <input name="action" type="hidden" value="edit" />
        <input type="submit" name="button" id="button" value="Save" class="button" /></td>
    </tr>
</table>
</fieldset>
</form>