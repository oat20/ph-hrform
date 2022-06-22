<?php
$strFileName = "countriesoftheworld.csv";
$objFopen = file($strFileName);
if ($objFopen) {
//for($i=0;$i<sizeof($objFopen);$i++){
foreach($objFopen as $value){
		$json_data[]=array(    
			//"label"=>$objFopen[$i]
			"label"=>trim($value)    
		);
	}
}
$json=json_encode($json_data);    
echo $json;    
?>