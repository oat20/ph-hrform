<?php
include('../admin/compcode/include/connect_db.php');

$xml=array('<?xml version="1.0" encoding="utf-8"?>');
$xml[]='<divisions>';
	
	$sql=mysql_query("SELECT *
		FROM $db_eform.department_type as t1
		inner join $db_eform.tb_orgnew as t2 on(t1.typ_id=t2.typ_id) 
		order by convert(t1.typ_name using tis620) asc,
		convert(t2.dp_name using tis620) asc");
	while($rsAscode=mysql_fetch_assoc($sql)){
		$xml[]='<division>';
			$xml[]='<id>'.$rsAscode['dp_id'].'</id>';
			$xml[]='<label>'.$rsAscode['dp_name'].'</label>';
			$xml[]='<group>'.$rsAscode['typ_name'].'</group>';
		$xml[]='</division>';
	}

$xml[]='</divisions>';

$xmloutput=join("\n",$xml);
header("content-type: application/xml");
echo $xmloutput;
?>