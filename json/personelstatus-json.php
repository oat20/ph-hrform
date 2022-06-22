<?php
include('../admin/compcode/include/connect_db.php');
$sql=mysql_query("SELECT ps_title 
FROM $db_eform.personel_status
GROUP by ps_title
order by convert(ps_title using tis620) asc");
while($rsAscode=mysql_fetch_assoc($sql)){
		$json_data[]=array(    
			"label"=>$rsAscode['ps_title']    
		);
	}
$json=json_encode($json_data);    
echo $json;    
mysql_close();
?>