<?php
include('../admin/compcode/include/connect_db.php');
$sql=mysql_query("SELECT per_pname2 
FROM $db_eform.personel_muerp
where per_pname2 != ''
group by per_pname2
order by convert(per_pname2 using tis620) asc");
while($rsAscode=mysql_fetch_assoc($sql)){
		$json_data[]=array(    
			"label"=>$rsAscode['per_pname2']    
		);
	}
$json=json_encode($json_data);    
echo $json;    
mysql_close();
?>