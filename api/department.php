<?php
#include("../admin/compcode/include/config.php");
include("../admin/compcode/include/connect_db.php");

$xml=array('<?xml version="1.0" encoding="utf-8"?>');

$xml[]="<deps>";
	
	$sql="select * from organization
	order by DeID asc";
	$result = mysql_query($sql);
	while($setinfo = mysql_fetch_array($result)){
		$xml[]="<dep>";
			$xml[]="<code>".$setinfo['DeID']."</code>";
			$xml[]="<name>".$setinfo['Fname']."</name>";
		$xml[]="</dep>";
	}

$xml[]="</deps>";

$xmloutput=join("\n",$xml);

header("content-type: application/xml");

echo $xmloutput;
?>