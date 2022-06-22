<?php
ob_start();
session_start();

include("include/config.php");
 include "include/connect_db.php";
 
 if($_POST[action] == "edit")
 {
	 $sql="update project_res set names='$_POST[pro_name_res]', position='$_POST[position]', mission='$_POST[mission]'
	 where id='$_POST[id]'";
	 mysql_query($sql);
	 
	 echo"<script language='JavaScript'>";
	 	print"window.opener.location.reload();";
								echo"self.close();";
								echo"</script>";
 }
 
 $sql="select * from project_res
 where id='$_GET[id]'";
 $rs=mysql_query($sql);
 $ob=mysql_fetch_array($rs);
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
                	<?php
					foreach($pro_position as $kp => $vp){
						if($kp == $ob[position])
						{
                			print "<option value='".$kp."' selected='selected'>- ".$vp." -</option>";
						}
						else
						{
							print "<option value='".$kp."'>- ".$vp." -</option>";
						}
					}
					?>
                </select>
            <!--<input name="position[]" type="text" size="30" maxlength="200"> --></td>
            <td><input name="pro_name_res" type="text" size="30" maxlength="200" value="<?=$ob[names];?>"></td>
            <td><input name="mission" type="text" size="30" maxlength="200" value="<?=$ob[mission];?>"></td>
            <td>
            	<input name="id" type="hidden" value="<?=$_GET[id];?>" />
            	<input name="action" type="hidden" value="edit" />
            <input type="submit" value="Save" class="button" /></td>
        	</tr>
    </table>
    	</fieldset>
</form>
<?php
ob_end_flush();
?>