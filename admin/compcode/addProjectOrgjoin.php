<?php
ob_start();
session_start();

include("include/config.php");
 include "include/connect_db.php";
 include("include/function.php");
 include("check_login.php");
 
 if($_POST[action] == "add")
 {
	 foreach($_POST[depid] as $k => $v)
	 {
	 $sql="insert into project_dep_res (pro_id, DeID) 
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
  <legend>ส่วนงานร่วม</legend>
  <table width="100%">
                    	<?php
						$success="select * from organization
						order by DeID asc";
						$rs_success=mysql_query($success);
						while($ob_success=mysql_fetch_array($rs_success))
						{
						?>
                    	<tr>
                        	<td><input type="checkbox" value="<?=$ob_success['DeID'];?>" name="depid[]"/>
                            <?=$ob_success['Fname'];?></td>
                        </tr>
                        <?php
						}
						?>
                        <tr>
    	<td>
        	<input name="pro_id" type="hidden" value="<?=$_GET[pro_id];?>" />
        	<input name="action" type="hidden" value="add" />
        	<input name="" type="submit" value="Save" class="button">
        </td>
    </tr>
                    </table>
</fieldset>
</form>