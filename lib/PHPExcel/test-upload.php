<?php
session_start();

//error_reporting(E_ALL);

include('../../admin/compcode/include/config.php');
include('../../admin/compcode/include/connect_db.php');
include("../../admin/compcode/include/function.php");

//if (empty($_FILES['personelExcel'])) {
    //echo json_encode(['error'=>'No files found for upload.']); 
    // or you can throw an exception 
    //return; // terminate
//}

//rename & upload file
	/*$uploadexcel=$_FILES['personelExcel'];
	echo $uploadexcel['name'];
		$renameFile=date('YmdHis').$uploadexcel["name"];
		$pathFile='form/upload/'.$renameFile;
		move_uploaded_file($uploadexcel["tmp_name"], $pathFile);	*/	
		//$output = [];
		//echo json_encode($output);
		//rename & upload file
		
		/** PHPExcel */
		//read file
		//require_once 'lib/PHPExcel/Classes/PHPExcel.php';
		include('Classes/PHPExcel.php');
		
		/** PHPExcel_IOFactory - Reader */
		include 'Classes/PHPExcel/IOFactory.php';
		
		$inputFileName = "../../form/upload/template_excel.xlsx";
		//$inputFileName = $pathFile;  
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
		//readdata in excel
		
		//showdata in excel
		foreach ($namedDataArray as $result) {
			$cp_pertitle=trim($result['คำนำหน้าชื่อ']);
			$cp_pername=trim($result['ชื่อ']);
			$cp_persurname=trim($result['นามสกุล']);
			$cp_mumail=trim($result['MUmail']);
			$cp_dpname=trim($result['ส่วนงาน']);
			//$cp_session=session_id();
			
			//get perid
			$sqlPerid=mysql_query("select per_id from $db_eform.personel_muerp where (per_fnamet like '%$cp_pername%' and per_lnamet like '%$cp_persurname%') or per_email='$cp_mumail'");
			$rsPerid=mysql_fetch_assoc($sqlPerid);
			
			//get dpid
			$sqlDpid=mysql_query("select dp_id from $db_eform.tb_orgnew where dp_name like '%$cp_dpname%'");
			$rsDpid=mysql_fetch_assoc($sqlDpid);
			
			echo $rsPerid['per_id'].', '.$cp_pertitle.', '.$cp_pername.', '.$cp_persurname.', '.$cp_mumail.', '.$rsDpid['dp_id'].', '.$cp_dpname.', '.$cp_session.'<br>';
			
			/*mysql_query("insert into $db_eform.develop_course_personel (cp_id,
				per_id,
				cp_pertitle,
				cp_pername,
				cp_persurname,
				cp_mumail,
				cp_dpid,
				cp_dpname) 
				values ('".random_ID('4','2')."',
				'$rsPerid[per_id]',
				'$cp_pertitle',
				'$cp_pername',
				'$cp_persurname',
				'$cp_mumail',
				'$rsDpid[dp_id]',
				'$cp_dpname')");*/
		}
		//unlink($pathFile); //remove file
		//showdata in excel
		
		//header('location: test.php');
?>