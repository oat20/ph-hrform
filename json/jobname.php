<?php
include('../admin/compcode/include/connect_db.php');
$sql=mysql_query("SELECT job_name
FROM $db_eform.job
group by job_name
ORDER by CONVERT(job_name USING tis620) asc");
while($rsAscode=mysql_fetch_assoc($sql)){
		$json_data[]=array(    
			"label"=>$rsAscode['job_name']
		);
	}
$json=json_encode($json_data);    
echo $json;    
mysql_close();
?>