<?php
include('../admin/compcode/include/connect_db.php');

$xml=array('<?xml version="1.0" encoding="utf-8"?>');
$xml[]='<personels>';
	
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
		$xml[]='<personel id="'.$rsAscode['per_id'].'">';
		$xml[]='<id>'.$rsAscode['per_id'].'</id>';
			$xml[]="<label>".$rsAscode['per_fnamet'].' '.$rsAscode['per_lnamet']."</label>";
			$xml[]='<nameth>';
				$xml[]='<title>'.$rsAscode['per_pname'].'</title>';
				$xml[]='<name>'.$rsAscode['per_fnamet'].'</name>';
				$xml[]='<surname>'.$rsAscode['per_lnamet'].'</surname>';
			$xml[]='</nameth>';
			$xml[]='<nameen>';
				$xml[]='<title>'.$rsAscode['per_pname2'].'</title>';
				$xml[]='<name>'.$rsAscode['per_fnamee'].'</name>';
				$xml[]='<surname>'.$rsAscode['per_lnamee'].'</surname>';
			$xml[]='</nameen>';
			$xml[]="<dpname>".$rsAscode['dp_name']."</dpname>";
			$xml[]="<job>".$rsAscode['job_name']."</job>";
			$xml[]="<jobs>".$rsAscode['jobs_name']."</jobs>";
			$xml[]="<type>".$rsAscode['pert_name']."</type>";
			$xml[]="<group>".$rsAscode['gr_title']."</group>";
			$xml[]="<email>".$rsAscode['per_email']."</email>";
			$xml[]="<tel>".$rsAscode['per_tel']."</tel>";
			$xml[]="<telin>".$rsAscode['per_telin']."</telin>";
			$xml[]="<status>".$rsAscode['ps_title']."</status>";
			$xml[]='<education>';
				$xml[]='<degree>'.$rsAscode['dg_name'].'</degree>';
				$xml[]='<edu>'.$rsAscode['ed_edu'].'</edu>';
				$xml[]='<institute>'.$rsAscode['ed_institute'].'</institute>';
				$xml[]='<country>'.$rsAscode['ct_name'].'</country>';
			$xml[]='</education>';
		$xml[]='</personel>';
	}

$xml[]='</personels>';

$xmloutput=join("\n",$xml);
header("content-type: application/xml");
echo $xmloutput;
?>