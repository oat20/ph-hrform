<?php
include('../admin/compcode/include/connect_db.php');
$sql=mysql_query("SELECT pert_name 
FROM $db_eform.personel_type
GROUP by pert_name
order by convert(pert_name using tis620) asc");
while($rsAscode=mysql_fetch_assoc($sql)){
		$json_data[]=array(    
			"label"=>$rsAscode['pert_name']    
		);
	}
$json=json_encode($json_data);    
echo $json;    
mysql_close();
?>