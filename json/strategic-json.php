<?php
include('../admin/compcode/include/connect_db.php');
$sql=mysql_query("SELECT * 
FROM risk_db2.strategic as t1
where strategic_type_id='$_GET[typeid]'
order by convert(t1.title using tis620) asc");
while($rsAscode=mysql_fetch_assoc($sql)){
		$json_data[]=array(    
			"code"=>$rsAscode['id'],
			"label"=>$rsAscode['title']
		);
	}
$json=json_encode($json_data);    
echo $json;    
mysql_close();
?>