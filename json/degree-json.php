<?php
include('../admin/compcode/include/connect_db.php');
$sql=mysql_query("SELECT dg_name 
FROM $db_eform.degree
WHERE dg_status='1'
GROUP BY dg_name
ORDER BY CONVERT(dg_name USING tis620) ASC");
while($rsAscode=mysql_fetch_assoc($sql)){
		$json_data[]=array(    
			"label"=>$rsAscode['dg_name']    
		);
	}
$json=json_encode($json_data);    
echo $json;    
mysql_close();
?>