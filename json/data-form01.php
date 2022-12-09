<?php
require_once '../admin/compcode/include/config.php';
require_once '../inc/mysqli-inc.php';

if($_SERVER['REQUEST_METHOD']=='GET'){
    $y = mysqli_real_escape_string($condb, $_GET['y']);

    $dev_create = ($y == '') ? "" : " and year(t1.dev_create)='".$y."'";

    $respone=array(
        'status'=>true
    );

    $sql=mysqli_query($condb,"select *,
        case
        when t1.dev_maintype = '1' then 'พัฒนาบุคลากร'
        when t1.dev_maintype = '2' then 'บริการวิชาการ'
        else '! Error'
        end as objective_display,
        case
        when t1.dev_nopay='1' then 'ไม่เบิกงบประมาณ'
        when t1.dev_nopay = '0' then 'เบิกงบประมาณ'
        else '! Error'
        end as pay_display,
        case
        when t1.dev_cancel = 'no' then ''
        when t1.dev_cancel = 'yes' then 'ยกเลิกรายการ'
        else '! Error'
        end as cancel_display
        from develop as t1
        INNER join develop_course_personel as t2 on (t1.dev_id=t2.dev_id)
        INNER JOIN personel_muerp as t3 on (t2.per_id=t3.per_id)
        inner join develop_type on (t1.dev_type=develop_type.dvt_id)
        inner join job on (t3.job_id = job.job_id)
        inner join tb_orgnew on (t3.per_dept = tb_orgnew.dp_id)
        WHERE t1.dev_remove LIKE 'no'
        ".$dev_create."
        ORDER BY t1.dev_create desc
    ");

    while($rs=mysqli_fetch_assoc($sql)){
        $respone['data'][]=array(
            'refid'=>$rs['dev_id'],
            'objective'=>$rs['objective_display'],
            'title'=>$rs['dvt_name'].' '.$rs['dev_typeother'].' - '.$rs['dev_onus'],
            'organization' => $rs['dev_org'].', '.$rs['dev_place'],
            'date_begin'=> date('d/m/Y, H:i', strtotime($rs['dev_stdate'].' '.$rs['dev_timebegin'].':00')),
            'date_finish'=> date('d/m/Y, H:i', strtotime($rs['dev_enddate'].' '.$rs['dev_timeend'].':00')),
            'pay'=>$rs['pay_display'],
            'personel'=>array(
                'name'=> $rs['per_pname'].$rs['per_fnamet'].' '.$rs['per_lnamet'],
                'position'=> $rs['job_name'],
                'division'=> $rs['dp_name']
            ),
            'file_attachment' => '',
            'note' => $rs['cancel_display'], 
            'timestamp'=>date('d/m/Y H:i:s', strtotime($rs['dev_create']))
        );
    }
    echo json_encode($respone, JSON_UNESCAPED_UNICODE);
}
else{
    echo json_encode(array(
        'status'=>false
    ));
}

mysqli_close($condb);
?>