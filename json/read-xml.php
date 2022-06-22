<?php
ini_set('max_execution_time','60');

$xml = simplexml_load_file('http://localhost/ph/hr/json/personel-xml.php');
foreach($xml->personel as $personel){
	if($personel->label=='วงเดือน พัฒโก'){
		$nameth=$personel->nameth->name;
		//foreach($nameth as $namethitem){
			//echo $namethitem->name;
		//}
		echo $nameth.'<br>';
		//echo "$nameth"."<BR>";
		echo $personel->dpname;
		header('location: //www.ph.mahidol.ac.th'); die();
	}else{
		header('location: //www.mahidol.ac.th'); die();
	}
}

//print_r($xml);
?>