<?php
ob_start();
session_start();
include"include/config.php";
$conn=connect_db("ph_web");

$username=$_GET["username"];
$m_id=$_GET["m_id"];

$sql="delete from admin_status
where username='$username' and m_id='$m_id'";
mysql_query($sql);

header("location: ../admin.php");
?>