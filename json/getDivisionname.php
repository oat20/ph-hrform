<?php
//include('../admin/compcode/include/connect_db.php');
require('../inc/mysqli-inc.php');

$db_eform="ph_hr_eform";

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: GET,POST");
header("Access-Control-Allow-Credentials: true");
header('Content-Type: application/json;charset=utf-8');

$json_data=array();

$sql=mysqli_query($condb,"SELECT *,t2.dp_name, t2.dp_code, t2.dp_tel, t2.dp_telin
FROM $db_eform.department_type as t1
inner join $db_eform.tb_orgnew as t2 on(t1.typ_id=t2.typ_id)
where t2.dp_id = '$_GET[id]'
order by convert(t1.typ_name using tis620) asc, 
convert(t2.dp_name using tis620) asc
");

if(mysqli_num_rows($sql) > 0){
	
$rsAscode=mysqli_fetch_assoc($sql);
		$json_data[]=array(
			"id"=>$rsAscode['dp_id'],    
			"code"=>$rsAscode['dp_code'],
			"label"=>$rsAscode['dp_name'],
			"group"=>$rsAscode['typ_name'],
			"tel"=>$rsAscode['dp_tel'],
			"telin"=>$rsAscode['dp_telin'],
			"message" => "OK"
		);
	
}else{
	
	$json_data[]=array(
		"message" => "ERROR"
	);
	
}

$json=json_encode($json_data);    
echo $json;    
//mysql_close();
?>