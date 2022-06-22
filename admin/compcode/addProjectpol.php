<?php
ob_start();
session_start();

include("include/config.php");
 include "include/connect_db.php";
 include("include/function.php");
 include("check_login.php");
 
 if($_POST[action] == "add")
 {
	 foreach($_POST[sub_id] as $k => $v)
	 {
	 $sql="insert into project_pol (pro_id, sub_id) 
	 values ('$_POST[pro_id]', '$v')";
	 mysql_query($sql);
	 }
	 
	 echo"<script language='JavaScript'>";
	 	print"window.opener.location.reload();";
								echo"self.close();";
								echo"</script>";
 }
?>
<link href="tool/css_text.css" rel="stylesheet" type="text/css">
<form action="<?=$PHP_SELF;?>" method="post">
<fieldset>
  <legend>ความสอดคล้องกับนโยบายรัฐบาล</legend>
  <table width="100%" class="table2">
                    	<?php
						$success="select * from sub_point_policy
						order by sub_id asc";
						$rs_success=mysql_query($success);
						while($ob_success=mysql_fetch_array($rs_success))
						{
						?>
                    	<tr>
                        	<td><input type="checkbox" value="<?=$ob_success['sub_id'];?>" name="sub_id[]"/></td>
                            <td><?=$ob_success['subname'];?></td>
                        </tr>
                        <?php
						}
						?>
                        <tr>
                        <td>&nbsp;</td>
    	<td>
        	<input name="pro_id" type="hidden" value="<?=$_GET[pro_id];?>" />
        	<input name="action" type="hidden" value="add" />
        	<input name="" type="submit" value="Save" class="button">
        </td>
    </tr>
                    </table>
</fieldset>
</form>