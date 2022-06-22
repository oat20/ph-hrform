<?php
include('../admin/compcode/include/connect_db.php');
$sql=mysql_query("SELECT ed_institute 
FROM $db_eform.education
group by ed_institute
having ed_institute != ''
order by CONVERT(ed_institute using tis620) asc");
while($rsAscode=mysql_fetch_assoc($sql)){
		$json_data[]=array(    
			"label"=>$rsAscode['ed_institute']    
		);
	}
$json=json_encode($json_data);    
echo $json;    
mysql_close();
?>