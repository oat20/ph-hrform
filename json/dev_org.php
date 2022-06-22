<?php
include('../admin/compcode/include/connect_db.php');
$sql=mysql_query("SELECT dev_org 
	FROM $db_eform.develop
	group by dev_org
	HAVING dev_org != ''
	order by convert(dev_org using tis620) asc");
while($rsAscode=mysql_fetch_assoc($sql)){
		$json_data[]=array(    
			"label"=>trim($rsAscode['dev_org'])
		);
	}
$json=json_encode($json_data);    
echo $json;    
mysql_close();
?>