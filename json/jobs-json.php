<?php
include('../admin/compcode/include/connect_db.php');
$sql=mysql_query("SELECT jobs_name 
	FROM $db_eform.job_special
	group by jobs_name
	order by convert(jobs_name using tis620) asc");
while($rsAscode=mysql_fetch_assoc($sql)){
		$json_data[]=array(    
			"label"=>trim($rsAscode['jobs_name'])
		);
	}
$json=json_encode($json_data);    
echo $json;    
mysql_close();
?>