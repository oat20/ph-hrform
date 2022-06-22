<?php

/** PHPExcel */
require_once 'Classes/PHPExcel.php';

/** PHPExcel_IOFactory - Reader */
include 'Classes/PHPExcel/IOFactory.php';


$inputFileName = "testdb.xlsx";  
$inputFileType = PHPExcel_IOFactory::identify($inputFileName);  
$objReader = PHPExcel_IOFactory::createReader($inputFileType);  
$objReader->setReadDataOnly(true);  
$objPHPExcel = $objReader->load($inputFileName);  

$objWorksheet = $objPHPExcel->setActiveSheetIndex(0);
$highestRow = $objWorksheet->getHighestRow();
$highestColumn = $objWorksheet->getHighestColumn();

$headingsArray = $objWorksheet->rangeToArray('A1:'.$highestColumn.'1',null, true, true, true);
$headingsArray = $headingsArray[1];

$r = -1;
$namedDataArray = array();
for ($row = 2; $row <= $highestRow; ++$row) {
    $dataRow = $objWorksheet->rangeToArray('A'.$row.':'.$highestColumn.$row,null, true, true, true);
    if ((isset($dataRow[$row]['A'])) && ($dataRow[$row]['A'] > '')) {
        ++$r;
        foreach($headingsArray as $columnKey => $columnHeading) {
            $namedDataArray[$r][$columnHeading] = $dataRow[$row][$columnKey];
        }
    }
}

//echo '<pre>';
//var_dump($namedDataArray);
//echo '</pre><hr />';

//*** Connect to MySQL Database ***//
$objConnect = mysqli_connect("localhost","root","root","test") or die(mysql_error());
//$objDB = mysql_select_db("mydatabase");
mysqli_query($objConnect,"set names utf8");

/*$sql="select * from tb_test order by t_id asc";
		$rs=mysqli_query($objConnect, $sql);
		while($ob=mysqli_fetch_assoc($rs)){*/
$i = 0;
foreach ($namedDataArray as $result) {
		$i++;
		$id=trim($result["id"]);
		
		$sql="select * from tb_test
		where t_id='$id'";
		$rs=mysqli_query($objConnect, $sql);
		//$ob=mysqli_fetch_assoc($rs);
		$row=mysqli_num_rows($rs);
		//if($id == $ob["t_id"]){
		if($row > "0"){
			$strSQL="update tb_test set
			col1='$result[col]'
			where t_id='$id'";
			mysqli_query($objConnect,$strSQL);
		}else if($row == "0"){
			$strSQL = "";
			$strSQL .= "INSERT INTO tb_test";
			$strSQL .= "(col1) ";
			$strSQL .= "VALUES ";
			$strSQL .= "('$result[col]')";
			mysqli_query($objConnect,$strSQL) or die(mysql_error());
		}
		echo "Row $i Inserted...<br>";
}
		//}
mysqli_close($objConnect);
?>