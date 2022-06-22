<?php
include('../admin/compcode/include/connect_db.php');
$sql=mysql_query("select ed_edu,
		ed_major
		from $db_eform.education
		group BY ed_edu,
		ed_major
		HAVING ed_edu != ''
		and ed_major != ''
		order by convert(ed_edu using tis620) asc,
		convert(ed_major using tis620) asc");
while($rsAscode=mysql_fetch_assoc($sql)){
		$label=$rsAscode['ed_edu'].' ('.$rsAscode['ed_major'].')';
		$json_data[]=array(    
			//"label"=>trim($rsAscode['ed_edu']).' ('.trim($rsAscode['ed_major']).')'   
			"label"=>$label 
		);
	}
$json=json_encode($json_data);    
echo $json;    
mysql_close();
?>