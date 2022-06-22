<?php
include('../admin/compcode/include/connect_db.php');
$sql=mysql_query("SELECT ed_major
FROM $db_eform.education
WHERE ed_major != ''
GROUP by ed_major
order by convert(ed_major using tis620) asc");
while($rsAscode=mysql_fetch_assoc($sql)){
		$json_data[]=array(    
			"label"=>trim($rsAscode['ed_major'])    
		);
	}
$json=json_encode($json_data);    
echo $json;    
mysql_close();
?>