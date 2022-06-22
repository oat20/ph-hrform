<?php
$db = mysql_pconnect("localhost", "root", "") or die(mysql_error());
#$db = mysql_pconnect("localhost", "ad", "admin910") or die(mysql_error());
mysql_select_db("db_calendar", $db);
?>