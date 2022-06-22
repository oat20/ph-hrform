<?php
move_uploaded_file($_FILES["uploadFile"]["tmp_name"], $_FILES["uploadFile"]["name"]);

/** PHPExcel */
require_once 'Classes/PHPExcel.php';

/** PHPExcel_IOFactory - Reader */
include 'Classes/PHPExcel/IOFactory.php';


//$inputFileName = "testdb.xlsx";
//$inputFileName='template_excel.xlsx';
$inputFileName = $_FILES["uploadFile"]["name"];  
$inputFileType = PHPExcel_IOFactory::identify($inputFileName);  
$objReader = PHPExcel_IOFactory::createReader($inputFileType);  
$objReader->setReadDataOnly(true);  
$objPHPExcel = $objReader->load($inputFileName);  


// for no header
/*$objWorksheet = $objPHPExcel->setActiveSheetIndex(0);
$highestRow = $objWorksheet->getHighestRow();
$highestColumn = $objWorksheet->getHighestColumn();

$r = -1;
$namedDataArray = array();
for ($row = 1; $row <= $highestRow; ++$row) {
    $dataRow = $objWorksheet->rangeToArray('A'.$row.':'.$highestColumn.$row,null, true, true, true);
    if ((isset($dataRow[$row]['A'])) && ($dataRow[$row]['A'] > '')) {
        ++$r;
        $namedDataArray[$r] = $dataRow[$row];
    }
}*/


//header
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
//header

//echo '<pre>';
//var_dump($namedDataArray);
//echo '</pre><hr />';

?>
<!--<table border="1">
  <tr>
    <td>ชื่อ</td>
  </tr>-->
<?php
foreach ($namedDataArray as $result) {
	echo trim(iconv('utf-8','tis-620',$result['คำนำหน้าชื่อ'])).trim($result['ชื่อ']).trim($result['นามสกุล']).trim($result['MUmail']).trim($result['ส่วนงาน']).'<br>';
	//echo trim($result['id']).trim($result['col']).'<br>';
?>
	  <!--<tr>
		<td><?php //echo trim($result["ทดสอบcol"]);?></td>
	  </tr>-->
<?
}
?>
<!--</table>-->