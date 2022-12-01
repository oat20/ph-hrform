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

switch($_GET['type']){
	
	case "0" : 
		$sql=mysqli_query($condb,"SELECT *,t2.dp_name, t2.dp_code, t2.dp_tel, t2.dp_telin
			FROM $db_eform.department_type as t1
			right join $db_eform.tb_orgnew as t2 on(t1.typ_id=t2.typ_id) 
			order by convert(t1.typ_name using tis620) asc, 
			convert(t2.dp_name using tis620) asc
		"); 
		break;
		
	default : 
		$sql=mysqli_query($condb,"SELECT *,t2.dp_name, t2.dp_code, t2.dp_tel, t2.dp_telin
			FROM $db_eform.department_type as t1
			right join $db_eform.tb_orgnew as t2 on(t1.typ_id=t2.typ_id)
			where t1.typ_id = '$_GET[type]'
			order by convert(t1.typ_name using tis620) asc, 
			convert(t2.dp_name using tis620) asc
		"); 
		break;
		
}

while($rsAscode=mysqli_fetch_assoc($sql)){
		$json_data[]=array(
			"id"=>$rsAscode['dp_id'],    
			"code"=>$rsAscode['dp_code'],
			"label"=>$rsAscode['dp_name'],
			"group"=>$rsAscode['typ_name'],
			"tel"=>$rsAscode['dp_tel'],
			"telin"=>$rsAscode['dp_telin'],
		);
	}

$json=json_encode($json_data,JSON_UNESCAPED_UNICODE);    
echo $json;    
//mysql_close();
?>