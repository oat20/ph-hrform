<?php
include('../admin/compcode/include/connect_db.php');
$sql=mysql_query("SELECT ct_name
FROM $db_eform.country
group by ct_name
ORDER by CONVERT(ct_name USING tis620) asc");
while($rsAscode=mysql_fetch_assoc($sql)){
		$json_data[]=array(    
			"label"=>$rsAscode['ct_name']
		);
	}
$json=json_encode($json_data);    
echo $json;    
mysql_close();
?>