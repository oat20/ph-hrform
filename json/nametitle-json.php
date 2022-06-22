<?php
include('../admin/compcode/include/connect_db.php');
$sql=mysql_query("select t_name
	from $db_eform.per_titlename
	order by convert(t_name using tis620) asc");
while($rsAscode=mysql_fetch_assoc($sql)){
		$json_data[]=array(    
			"label"=>$rsAscode['t_name']    
		);
	}
$json=json_encode($json_data);    
echo $json;    
mysql_close();
?>