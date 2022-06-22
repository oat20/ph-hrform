<?php
include('../admin/compcode/include/config.php');
include('config-inc.php');
include('../admin/compcode/include/connect_db.php');
include('../admin/compcode/include/function.php');

$sql=mysql_query("select *, 
	t3.per_tel as t3_tel,
	t3.per_adddate as adddate
	from $db_eform.develop_leave as t1
	left join $db_eform.develop_leave_type as t2 on (t1.dev_type=t2.la_id)
	left join $db_eform.develop_leave_personel as t3 on (t1.dev_id=t3.dev_id)
	left join $db_eform.personel_type as t4 on (t3.per_type=t4.pert_id)
	left join $db_eform.job as t5 on (t3.per_job=t5.job_id)
	left join $db_eform.degree as t6 on (t1.dev_edu=t6.dg_id)
	left join $db_eform.tb_orgnew as t8 on (t3.per_dept=t8.dp_id)
	left join $db_eform.personel_muerp as t9 on (t3.per_id=t9.per_id)
	where t1.dev_id='$_GET[dev_id]'");
$ob=mysql_fetch_assoc($sql);

$content='<table>
				<tbody>
					<tr>
						<td class="pmhTopRight"><img src="../img/mulogo_80.png"></td>
						<td width="45%" class="pmhBottomRight font-16">
							<br><br>'.$ob['dp_name'].'
							<br>โทร. '.$ob['t3_tel'].'
						</td>
				</tbody>
				</table>';

$content.='<p class="font-16">
	ที่ อว 78.14/............/................<br>
	วันที่ '.dateThai($ob['dev_orddate']).'<br>
	เรื่อง '.$ob['pert_name'].' ขออนุมัติ'.$ob['la_name'].' '.$cf_local[$ob['dev_local']]['name'].'
	</p>';
$content.='<p class="font-16">เรียน คณบดี</p>';

$content.='<p class="font-16">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ข้อมูลการเสนอขออนุมัติลาฯ</p>';

$content.='<p class="font-16">ผู้เสนอขออนุมัติ ชื่อ-สกุล '.$ob['per_fnamet'].' '.$ob['per_lnamet'].' <img src="../img/check.svg" width="16"> '.$ob['pert_name'].' ตำแหน่ง '.$ob['job_name'].'
<br>เลขประจำตำแหน่ง ......................................................... สังกัด '.$ob['dp_name'].'
<br>บรรจุเมื่อวันที่ '.dateThai($ob['adddate']).' ระยะเวลาการจ้างตั้งแต่วันที่ '.dateThai($ob['per_contract1']).' ถึงวันที่ '.dateThai($ob['per_contract2']).'
<br>โทร '.$ob['per_tel'].' โทรสาร '.$ob['per_fax'].'</p>';

$content.='<p class="font-16">๑.  ประเภทการลา <img src="../img/check.svg" width="16"> '.$ob['la_name'].' 
                          <img src="../img/check.svg" width="16"> '.$cf_local[$ob['dev_local']]['name'].'</p>';
				
$content.='<p class="font-16">๒. ข้อมูลการลา   
     หัวข้อ/เรื่อง/หลักสูตร '.$ob['dev_onus'].'
     <br>สถานที่/องค์กร '.$ob['dev_place'].' ประเทศ '.$ob['dev_country'].'
     <br>ระยะเวลาที่ลา ตั้งแต่วันที่ '.dateThai($ob['dev_stdate']).' ถึงวันที่ '.dateThai($ob['dev_enddate']).' มีกำหนด '.$ob['dev_training_hour'].' วัน
</p>';

$content.='<p class="font-16">ชื่อทุน '.$ob['dev_fundname'].'
 ระดับการศึกษา '.$ob['dg_name'].'  
</p>';

$content.='<p class="font-16">ได้แนบเอกสารประกอบการพิจารณา ดังนี้&nbsp;&nbsp;';
	$sqlDoc=mysql_query("select * from $db_eform.develop_leave_doc as t1
		inner join $db_eform.develop_leave_doc2 as t2 on (t1.ld_id=t2.ld_id)
		where t2.dev_id='$ob[dev_id]'
		order by t1.ld_id asc");
		while($rDoc=mysql_fetch_assoc($sqlDoc)){
			$content.='<img src="../img/check.svg" width="16"> '.$rDoc['ld_name'].'&nbsp;&nbsp;';
		}
				$content.=$ob['dev_docother'].'</p>';

$content.='<p class="font-16">ความเห็นต้นสังกัด<br>';
	foreach($cf_devleave_status as $v){
		$content.='&nbsp;&nbsp;<img src="../img/blank-check-box.svg" width="16"> '.$v['name'].' ';
	}
$content.='ระบุ <dottab></p>';

$content.='<br><table class="font-16">
					<tbody>
						<tr>
							<td width="40%">';
								if($ob['dev_cancel']==1){$content.='<strong>เหตุผลยกเลิก</strong><br>'.$ob['dev_cancelcomment'];}
							$content.='</td>';
							
							if($ob['dev_bossname']=='' and $ob['dev_bosspos']==''){
								$content.='<td class="bpmClearC font-16" width="60%">
									ลงชื่อ .........................................................
									<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(.........................................................)
									<br>ตำแหน่ง .........................................................
								</td>';
							}else{
								$content.='<td class="bpmClearC font-16" width="60%">
									ลงชื่อ .........................................................
									<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(&nbsp;'.$ob['dev_bossname'].'&nbsp;)
									<br>ตำแหน่ง '.$ob['dev_bosspos'].'
								</td>';
							}
						
						$content.='</tr>
					</tbody>
				</table>';

//$page2='<h1>บุคลากรที่เข้าร่วม</h1>';
/*$page2.='<table border="1">
					<thead>
						<tr>
							<th>ลำดับ</th>
							<th>ชื่อ</th>
							<th>ตำแหน่ง</th>
							<th>ส่วนงาน</th>
						</tr>
					</thead>
					<tfoot>
						<tr>
							<th>ลำดับ</th>
							<th>ชื่อ</th>
							<th>ตำแหน่ง</th>
							<th>ส่วนงาน</th>
						</tr>
					</tfoot>
					<tbody>';
					$sqlPersonel=mysql_query("select * from phper2.personel
							inner join phper2.tb_orgnew on (personel.per_dept=tb_orgnew.dp_id)
							inner join phper2.develop_course_personel on (personel.per_id=develop_course_personel.per_id)
							where develop_course_personel.dev_id='$ob[dev_id]'
							order by convert(tb_orgnew.dp_name using tis620) asc,
							convert(personel.per_fnamet using tis620) asc,
							convert(personel.per_lnamet using tis620) asc");
					while($obPersonel=mysql_fetch_assoc($sqlPersonel)){
						$page2.='<tr>
							<td>'.++$r.'</td>
							<td>'.$obPersonel['per_pname'].' '.$obPersonel['per_fnamet'].' '.$obPersonel['per_lnamet'].'</td>
							<td>'.$obPersonel['job_id'].'</td>
							<td>'.$obPersonel['dp_name'].'</td>
						</tr>';
					}
					$page2.='</tbody>
				</table>';*/

//$footer = '<div class="content-footer">Tracking ID <strong>PH001</strong></div>';
$footer='<table><tbody><tr class="font-16"><td class="pmhBottomRight">Form No. <strong>'.$ob['dev_id'].'</strong></td></tr></tbody></table>';
//$footerE = '<div class="content-footer">Tracking ID <strong>PH002</strong></div>';

require("../lib/mpdf/mpdf.php");
$mpdf=new mPDF('th','A4','','thsarabun',20,20,20,10,0,0); //A4 แนวตั้ง, A4-L แนวนอน
$mpdf->SetDisplayMode('fullpage','two');
$stylesheet = file_get_contents('../lib/mpdf/mpdfstyletables-3.css');
$mpdf->WriteHTML($stylesheet,1);

//$mpdf->debug = true;
$mpdf->allow_output_buffering = true;
$mpdf->SetAutoFont(AUTOFONT_ALL);

if($ob['dev_cancel']=='1'){
	$mpdf->SetWatermarkText('ยกเลิก'); $mpdf->watermark_font = 'thsarabun'; $mpdf->showWatermarkText = true;
}

$mpdf->WriteHTML($content);

$mpdf->SetHTMLFooter($footer);

//$mpdf->AddPage('','','','','','10','10','10','10',0,1); 
//$mpdf->WriteHTML($page2);
//$mpdf->SetHTMLFooter($footerE,'E');
$mpdf->Output($ob['dev_id'].'.pdf','I');
exit;
?>