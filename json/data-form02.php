<?php
require_once '../admin/compcode/include/config.php';
require_once '../inc/mysqli-inc.php';

if($_SERVER['REQUEST_METHOD']=='GET'){
    $respone=array(
        'status'=>'OK'
    );
    $sql=mysqli_query($condb, "select *,
        if(t3.per_name='', concat(t5.per_pname,t5.per_fnamet,' ',t5.per_lnamet), t3.per_name) as user_display,
        if(t1.dev_cancel='1', 'ยกเลิกรายการ', '') as cancel_display 
        from $db_eform.develop_leave as t1
	 	left join $db_eform.develop_leave_type as t2 on (t1.dev_type=t2.la_id)
		left join $db_eform.develop_leave_personel as t3 on (t1.dev_id=t3.dev_id)
		left join $db_eform.tb_orgnew as t4 on (t3.per_dept=t4.dp_id)
		left join $db_eform.personel_muerp as t5 on (t3.per_id=t5.per_id)
        left join job on (t3.per_job=job.job_id)
		order by t1.dev_orddate desc
        ");
        while($rs=mysqli_fetch_assoc($sql)){
            $respone['data'][]=array(
                'refid'=>$rs['dev_id'],
                'title'=>$rs['la_name'].' - '.$rs['dev_onus'],
                'country'=>$rs['dev_country'],
                'date_begin'=>date('d/m/Y', strtotime($rs["dev_stdate"])),
                'date_finish'=>date('d/m/Y', strtotime($rs["dev_enddate"])),
                'user'=>array(
                    'name'=>$rs['user_display'],
                    'position'=>$rs['job_name'],
                    'division'=>$rs['dp_name']
                ),
                'note'=>$rs['cancel_display'],
                'timestamp'=>date('d/m/Y', strtotime($rs['dev_orddate']))
            );
        }
        echo json_encode($respone, JSON_UNESCAPED_UNICODE);
}else{
    echo json_encode(array(
        'status'=>'Error'
    ));
}

mysqli_close($condb);
?>