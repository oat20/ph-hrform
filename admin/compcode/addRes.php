<?php
ob_start();
session_start();

include("include/config.php");
 include "include/connect_db.php";
 
 if($_POST[action] == "add")
 {
	 $sql="insert into project_res (pro_id,names,position,mission) values ('$_POST[pro_id]','$_POST[pro_name_res]','$_POST[position]','$_POST[mission]')";
	 mysql_query($sql);
	 
	 echo"<script language='JavaScript'>";
	 	print"window.opener.location.reload();";
								echo"self.close();";
								echo"</script>";
 }
?>
<link href="tool/css_text.css" rel="stylesheet" type="text/css">
<form action="<?=$PHP_SELF;?>" method="post">
	<fieldset>
    	<legend>ผู้รับผิดชอบ</legend>
	<table border="0" cellpadding="5" cellspacing="0">
    	<tr>
        	<td><span class="boldBlack_10">ตำแหน่งในโครงการ</span></td>
            <td><span class="boldBlack_10">ชื่อบุคคล</span></td>
            <td><span class="boldBlack_10">บทบาทหน้าที่ความรับผิดชอบ</span></td>
            <td></td>
        </tr>
        	<tr>
            <td>
            	<select name="position">
                	<option value="">- -</option>
                	<?php
					foreach($pro_position as $kp => $vp){
                		print "<option value='".$kp."'>- ".$vp." -</option>";
					}
					?>
                </select>
            <!--<input name="position[]" type="text" size="30" maxlength="200"> --></td>
            <td><input name="pro_name_res" type="text" size="30" maxlength="200"></td>
            <td><input name="mission" type="text" size="30" maxlength="200"></td>
            <td>
            	<input name="pro_id" type="hidden" value="<?=$_GET[pro_id];?>" />
            	<input name="action" type="hidden" value="add" />
            <input type="submit" value="Save" class="button" /></td>
        	</tr>
    </table>
    	</fieldset>
</form>
<?php
ob_end_flush();
?>