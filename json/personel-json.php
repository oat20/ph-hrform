<?php
include('../admin/compcode/include/connect_db.php');
$sql=mysql_query("SELECT *,a1.per_id, a1.per_img, a1.per_pname, a1.per_fnamet, a1.per_lnamet, a1.per_pname2, a1.per_fnamee, a1.per_lnamee, a2.dp_name, a1.job_id 
		from $db_eform.personel_muerp as a1
		inner join $db_eform.tb_orgnew as a2 on (a1.per_dept=a2.dp_id)
		inner join $db_eform.personel_status on (a1.per_status = personel_status.ps_id)
		inner join $db_eform.personel_type on (a1.per_type=personel_type.pert_id)
		inner join $db_eform.education on (a1.per_id = education.ed_perid)
		inner join $db_eform.degree on (education.ed_dgid = degree.dg_id)
		inner join $db_eform.personel_group as t5 on (a1.per_group = t5.gr_id)
		inner join $db_eform.job_special as t6 on (a1.jobs_id = t6.jobs_id)
		inner join $db_eform.job as t7 on (a1.job_id = t7.job_id)
		inner join $db_eform.country as t8 on (education.ed_country = t8.ct_id)
		where a1.per_trash = '0'
		and personel_status.ps_flag='1'
		order by a1.per_adddate desc");
while($rsAscode=mysql_fetch_assoc($sql)){
		$json_data[]=array(    
			"code"=>$rsAscode['per_id'],
			"label"=>$rsAscode['per_fnamet'].' '.$rsAscode['per_lnamet'],
			"titleth"=>$rsAscode['per_pname'],
			"nameth"=>$rsAscode['per_fnamet'],
			"surnameth"=>$rsAscode['per_lnamet'],
			"titleen"=>$rsAscode['per_pname2'],
			"nameen"=>$rsAscode['per_fnamee'],
			"surnameen"=>$rsAscode['per_lnamee'],
			"dpname"=>$rsAscode['dp_name'],
			"job"=>$rsAscode['job_name'],
			"jobs"=>$rsAscode['jobs_name'],
			"type"=>$rsAscode['pert_name'],
			"group"=>$rsAscode['gr_title'],
			"email"=>$rsAscode['per_email'],
			"tel"=>$rsAscode['per_tel'],
			"telin"=>$rsAscode['per_telin'],
			"status"=>$rsAscode['ps_title'],
			"edu_degree"=>$rsAscode['dg_name'],
			"edu_edu"=>$rsAscode['ed_edu'],
			"edu_institute"=>$rsAscode['ed_institute'],
		);
	}
$json=json_encode($json_data);    
echo $json;    
mysql_close();
?>