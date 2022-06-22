<?php
ob_start();
session_start();

include("include/config.php");
 include "include/connect_db.php";
  include("check_login.php");
 
 $sql="delete from project_str_fac
 where id='$_GET[id]'";
mysql_query($sql);

#header("location: ".$livesite."phpm/pa.php?mode=1&pro_id=".$_GET[pro_id]);
echo"<script language='JavaScript'>";
								echo"history.go(-1);";
								echo"</script>";

ob_end_flush();
?>