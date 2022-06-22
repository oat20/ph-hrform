<?php
include('../admin/compcode/include/connect_db.php');
$sql=mysql_query("select job_name 
	from $db_eform.job
		group by job_name
		having job_name != ''
		order by convert(job_name using tis620) asc");
while($rsAscode=mysql_fetch_assoc($sql)){
		$json_data[]=array(    
			"label"=>trim($rsAscode['job_name'])    
		);
	}
$json=json_encode($json_data);    
echo $json;    
mysql_close();
?>