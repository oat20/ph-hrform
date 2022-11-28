<?php
require_once '../admin/compcode/include/config.php';
require_once '../inc/mysqli-inc.php';

if($_SERVER['REQUEST_METHOD']=='GET'){
    $respone=array(
        'status'=>'OK'
    );
    $sql=mysqli_query($condb,"select *,
        case
        when t1.dev_maintype = '1' then 'พัฒนาบุคลากร'
        when t1.dev_maintype = '2' then 'บริการวิชาการ'
        else '! Error'
        end as objective_display,
        case
        when t1.dev_nopay='1' then 'ไม่เบิกงบประมาณ'
        else 'เบิกงบประมาณ'
        end as pay_display
        from develop as t1
        INNER join develop_course_personel as t2 on (t1.dev_id=t2.dev_id)
        INNER JOIN personel_muerp as t3 on (t2.per_id=t3.per_id)
        inner join develop_type on (t1.dev_type=develop_type.dvt_id)
        WHERE t1.dev_remove LIKE 'no'
        ORDER BY t1.dev_create desc
        limit 10
    ");
    while($rs=mysqli_fetch_assoc($sql)){
        $respone['data'][]=array(
            'refid'=>$rs['dev_id'],
            'objective'=>$rs['objective_display'],
            'title'=>$rs['dvt_name'].' '.$rs['dev_typeother'].' - '.$rs['dev_onus'],
            'date_begin'=>'',
            'date_finish'=>'',
            'pay'=>$rs['pay_display'],
            'user'=>array(
                'name'=>'',
                'position'=>'',
                'division'=>''
            ),
            'timestamp'=>''
        );
    }
    echo json_encode($respone, JSON_UNESCAPED_UNICODE);
}
else{
    echo json_encode(array(
        'status'=>'Error'
    ));
}

mysqli_close($condb);
?>