<?php
include('../admin/compcode/include/connect_db.php');
$sql=mysql_query("select * from $db_eform.province
	order by convert(pv_name using tis620) asc");
while($rsAscode=mysql_fetch_assoc($sql)){
		$json_data[]=array(    
			//"code"=>$rsAscode['id'],
			"label"=>$rsAscode['pv_name']
		);
	}
$json=json_encode($json_data);    
echo $json;    
mysql_close();
?>