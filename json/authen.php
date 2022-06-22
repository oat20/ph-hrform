<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: GET,POST");
header("Access-Control-Allow-Credentials: true");
header('Content-Type: application/json;charset=utf-8');

//include('../admin/compcode/include/connect_db.php');
require('../inc/mysqli-inc.php');

switch($_GET['mode']){
		
	case "AUTH1" : $sql=mysqli_query($condb,"SELECT *,a1.per_id, a1.per_img, a1.per_pname, a1.per_fnamet, a1.per_lnamet, a1.per_pname2, a1.per_fnamee, a1.per_lnamee, a2.dp_name, a1.job_id 
		from ph_hr_eform.personel_muerp as a1
		inner join ph_hr_eform.tb_orgnew as a2 on (a1.per_dept=a2.dp_id)
		inner join ph_hr_eform.personel_status on (a1.per_status = personel_status.ps_id)
		inner join ph_hr_eform.personel_type on (a1.per_type=personel_type.pert_id)
		inner join ph_hr_eform.education on (a1.per_id = education.ed_perid)
		inner join ph_hr_eform.degree on (education.ed_dgid = degree.dg_id)
		inner join ph_hr_eform.personel_group as t5 on (a1.per_group = t5.gr_id)
		inner join ph_hr_eform.job_special as t6 on (a1.jobs_id = t6.jobs_id)
		inner join ph_hr_eform.job as t7 on (a1.job_id = t7.job_id)
		inner join ph_hr_eform.country as t8 on (education.ed_country = t8.ct_id)
		inner join ph_hr_eform.job_academic as t9 on (a1.ja_id=t9.ja_id)
		where (a1.per_no = '".base64_encode($_GET['token'])."'
		or a1.per_idcard = '$_GET[token]') 
		and a1.per_trash = '0'
		and personel_status.ps_flag='1'
		order by a1.per_adddate desc"); break;
		
	case "EMAIL" : $sql=mysqli_query($condb,"SELECT *,a1.per_id, a1.per_img, a1.per_pname, a1.per_fnamet, a1.per_lnamet, a1.per_pname2, a1.per_fnamee, a1.per_lnamee, a2.dp_name, a1.job_id 
		from ph_hr_eform.personel_muerp as a1
		inner join ph_hr_eform.tb_orgnew as a2 on (a1.per_dept=a2.dp_id)
		inner join ph_hr_eform.personel_status on (a1.per_status = personel_status.ps_id)
		inner join ph_hr_eform.personel_type on (a1.per_type=personel_type.pert_id)
		inner join ph_hr_eform.education on (a1.per_id = education.ed_perid)
		inner join ph_hr_eform.degree on (education.ed_dgid = degree.dg_id)
		inner join ph_hr_eform.personel_group as t5 on (a1.per_group = t5.gr_id)
		inner join ph_hr_eform.job_special as t6 on (a1.jobs_id = t6.jobs_id)
		inner join ph_hr_eform.job as t7 on (a1.job_id = t7.job_id)
		inner join ph_hr_eform.country as t8 on (education.ed_country = t8.ct_id)
		inner join ph_hr_eform.job_academic as t9 on (a1.ja_id=t9.ja_id)
		where a1.per_email = '$_GET[token]' 
		and a1.per_trash = '0'
		and personel_status.ps_flag='1'
		order by a1.per_adddate desc"); break;

}
if(mysqli_num_rows($sql) >= 1 and $_GET['token'] != ''){
	
$rsAscode=mysqli_fetch_assoc($sql);
		$json_data[]=array(
			"id" => $rsAscode['per_id'],
			"account" => $rsAscode['per_username'],
			"perid" => base64_decode($rsAscode['per_no']),
			"idcard"=>$rsAscode['per_idcard'],
			"label"=>$rsAscode['per_pname'].' '.$rsAscode['per_fnamet'].' '.$rsAscode['per_lnamet'],
			"titleth"=>$rsAscode['per_pname'],
			"nameth"=>$rsAscode['per_fnamet'],
			"surnameth"=>$rsAscode['per_lnamet'],
			"titleen"=>$rsAscode['per_pname2'],
			"nameen"=>$rsAscode['per_fnamee'],
			"surnameen"=>$rsAscode['per_lnamee'],
			"dpname"=>$rsAscode['dp_name'],
			"job"=>$rsAscode['job_name'],
			"jobs"=>$rsAscode['jobs_name'],
			"job_academic" => $rsAscode['ja_name'],
			"type"=>$rsAscode['pert_name'],
			"group"=>$rsAscode['gr_title'],
			"email"=>$rsAscode['per_email'],
			"tel"=>$rsAscode['per_tel'],
			"telin"=>$rsAscode['per_telin'],
			"status"=>$rsAscode['ps_title'],
			"edu_degree"=>$rsAscode['dg_name'],
			"edu_edu"=>$rsAscode['ed_edu'],
			"edu_institute"=>$rsAscode['ed_institute'],
			"message" => "OK"
		);
	
}else{
	
	$json_data[] = array(
		"message" => "ERROR"
	);
	
}
$json=json_encode($json_data);    
echo $json;    
//mysql_close();
?>