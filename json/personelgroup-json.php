<?php
include('../admin/compcode/include/connect_db.php');
$sql=mysql_query("SELECT gr_title 
FROM $db_eform.personel_group
GROUP BY gr_title
ORDER by CONVERT(gr_title USING tis620) asc");
while($rsAscode=mysql_fetch_assoc($sql)){
		$json_data[]=array(    
			"label"=>$rsAscode['gr_title']    
		);
	}
$json=json_encode($json_data);    
echo $json;    
mysql_close();
?>