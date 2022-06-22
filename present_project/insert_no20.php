<?php
ob_start();
session_start();
include("../admin/compcode/include/config.php"); 
include "../admin/compcode/include/connect_db.php";
require_once("../admin/compcode/include/function.php");

$budget=$_REQUEST['budget'];
$bt_id=$_REQUEST['bt_id'];
#project_pay no.20
$pay=$_REQUEST['pay'];
$q1=$_REQUEST['q1'];
$q2=$_REQUEST['q2'];
$q3=$_REQUEST['q3'];
$q4=$_REQUEST['q4'];
$q11=$_REQUEST['q11'];
$q22=$_REQUEST['q22'];
$q33=$_REQUEST['q33'];
$q44=$_REQUEST['q44'];

$q1=$q1."/".$q11;
$q2=$q2."/".$q22;
$q3=$q3."/".$q33;
$q4=$q4."/".$q44;

$sql="update project set budget='$budget', bt_id='$bt_id' 
where pro_id='$_SESSION[Max]'";
mysql_query($sql);

$sql2="insert into project_budtype (pro_id, bt_id, budget, quarter1, quarter2, quarter3, quarter4) values ('$_SESSION[Max]', '$q1', '$q2', '$q3', '$q4')";
mysql_query($sql2);

$Max=$_SESSION[Max];
session_unregister("Max");

header("location: ../index.php");
?>