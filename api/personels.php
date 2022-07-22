<?php
include("../admin/compcode/include/config.php");
require '../lib/mysqli.php';
include('../admin/compcode/include/connect_db.php');

$resultArray = array();

$id = mysqli_real_escape_string($condb, $_GET['id']);

$queryId = ($id == "") ? "" : " and t1.per_id='$id'";

//$edu = '';

	$sql = "SELECT * 
		FROM  $db_eform.personel_muerp AS t1
		left JOIN $db_eform.tb_orgnew AS t2 ON ( t1.per_dept = t2.dp_id ) 
		left JOIN $db_eform.personel_status AS t3 ON ( t1.per_status = t3.ps_id )
		left join $db_eform.job on (t1.job_id = job.job_id)
		left join $db_eform.job_academic as joba on (t1.ja_id = joba.ja_id)
		left join $db_eform.job_special as jobs on (t1.jobs_id = jobs.jobs_id) 
		WHERE t1.per_trash = '0'
		and t3.ps_flag = '1'
		".$queryId."
		ORDER BY convert(t1.per_fnamet using tis620),
		convert(t1.per_lnamet using tis620),
		t1.per_fnamee,
		t1.per_lnamee
	";
	$query = mysqli_query($condb, $sql);
	if (!$query) {

		http_response_code(400);
		echo json_encode(array(
			'status' => false
		));

	}else{

	while($result = mysqli_fetch_assoc($query))
	{
		$account=explode('@',$result['per_email']);
		$resultArray['data'][] = [
			"id" => $result['per_id'],
			"staffID" => $result['per_no'],
			"email"=>$result['per_email'],
			"account"=>$account[0],
			"titlename" => $result['per_pname'],
			"name" => $result['per_fnamet'],
			"surname" => $result['per_lnamet'],
			"fullnameTH"=>$result['per_fnamet'].' '.$result['per_lnamet'],
			"titlenameEN" => $result['per_pname2'],
			"nameEN" => $result['per_fnamee'],
			"surnameEN" => $result['per_lnamee'],
			"fullnameEng" => $result['per_fnamee']." ".$result['per_lnamee'],
			"imageUrl" => $livesite."img/personel/thumbnail/".$result['per_img'],
			"dp_id" => $result['dp_id'],
			"office"=>$result['dp_name'],
			"telin" => $result['per_telin'],
			"job" => [
				"position" => $result['job_name'],
				"academic" => $result['ja_name'],
				"special" => $result['jobs_name']
			],
			"training" => $result['per_training'],
			"skill" => $result['per_skill'],
			"expert" => $result['per_expert'],
			"resultphd" => $result['per_resultphd'],
		"status" => $result['ps_title']
		];
	}
	
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: GET");

	http_response_code(200);
	$jsonDecode=json_encode($resultArray, JSON_UNESCAPED_UNICODE);
	echo $jsonDecode;

}

mysqli_close($condb);
?>