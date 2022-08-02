<?php
include('../admin/compcode/include/config.php');
require_once '../lib/mysqli.php';
include('../admin/compcode/include/connect_db.php');
include('../admin/compcode/include/function.php');

$sql=mysqli_query($condb, "select * from $db_eform.develop
			inner join $db_eform.tb_orgnew on (develop.dp_id = tb_orgnew.dp_id)
			inner join $db_eform.sub_strategic on (develop.ss_id = sub_strategic.id)
			inner join $db_eform.strategic_faculty on (develop.sf_id = strategic_faculty.sf_id)
			inner join $db_eform.personel_muerp on (develop.dev_perid = personel_muerp.per_id)
			inner join $db_eform.develop_level as t7 on(develop.le_id=t7.le_id)
			inner join $db_eform.develop_type as t8 on(develop.dev_type=t8.dvt_id)
			where develop.dev_trackid='$_GET[getTrackid]'");
$ob=mysqli_fetch_assoc($sql);
$dev_bookfrom=explode('+',$ob['dev_bookfrom']);

$content='<table>
				<tbody>
					<tr>
						<td width="45%"><br>ที่ อว 78.14/....................../......................................<br>วันที่ .....................................</td>
						<td class="pmhTopRight"><img src="../img/logo-MU.png" width="80"></td>
						<td width="45%"><br>'.$ob['dp_name'].'</td>
				</tbody>
				</table>';

$content.='<p>เรื่อง <strong>ขออนุมัติเดินทางไปปฏิบัติงาน เพื่อการให้บริการวิชาการ</strong></p>';
$content.='<p></p><p>เรียน คณบดี</p>';
$content.='<p><strong>ตามหนังสือ</strong> '.$dev_bookfrom['0'].' <strong>ที่</strong> '.$dev_bookfrom['1'].' <strong>ลงวันที่</strong> '.dateThai($dev_bookfrom['2']).' <strong>เรื่อง</strong> '.$dev_bookfrom['3'].'</p>';

$content.='<p><strong>ได้เชิญข้าพเจ้าไปปฏิบัติงานเพื่อ</strong> '.$ob['dvt_name'].'&nbsp;&nbsp;'.$ob['dev_typeother'].'</p>';

//$content.='<p><strong>ซึ่งเกี่ยวข้องกับกิจกรรม</strong> '.$ob['activity'].'</p>';

$content.='<p><strong>หลักสูตร/หัวข้อโครงการ</strong> '.$ob['dev_onus'].' <strong>ระหว่างวันที่</strong> '.dateformat_03($ob['dev_stdate']).' ถึง '.dateformat_03($ob['dev_enddate']).' <strong>ตั้งแต่เวลา</strong> '.$ob['dev_timebegin'].' ถึง '.$ob['dev_timeend'].' <strong>ณ</strong> '.$ob['dev_place'].' '.$ob['dev_org'].'</p>';

$content.='<p><strong>ระดับกิจกรรม</strong> '.$ob['le_title'].'</p>';

$content.='<p><strong>รายละเอียดการขออนุมัติค่าใช้จ่าย</strong> '.$cf_devnopay[$ob['dev_nopay']].'</p>';

if($ob['dev_nopay'] == '0'){
$content.='<table border="1">
					<thead>
						<tr>
							<th>จากแหล่งเงิน</th>
							<th>โดยแบ่งเป็นค่าใช้จ่าย</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td width="50%">
								<ol>';
									$sql03=mysqli_query($condb, "select * from $db_eform.develop_form_budget
									inner join $db_eform.budtype on (develop_form_budget.bt_id=budtype.bt_id)
									inner join $db_eform.develop_payfrom as t3 on(budtype.pf_id=t3.pf_id)
									where develop_form_budget.dev_id='$ob[dev_id]'
									order by t3.pf_id asc, 
									budtype.bt_id asc");
									while($ob03=mysqli_fetch_assoc($sql03)){
										$content.='<li>'.$ob03['pf_title'].' &raquo; '.$ob03['bt_name'].' '.number_format($ob03['dev_pay01']).' บาท</li>';
									}
								$content.='</ol>
							</td>
							<td width="50%">
								<ol>';
									$sql04=mysqli_query($condb, "select * from $db_eform.develop_form_cost
									inner join $db_eform.develop_cost_type on (develop_form_cost.ct_id=develop_cost_type.ct_id)
									where develop_form_cost.dev_id='$ob[dev_id]'
									order by develop_cost_type.ct_id asc");
									while($ob04=mysqli_fetch_assoc($sql04)){
										$content.='<li>'.$ob04['ct_title'].' '.number_format($ob04['dev_pay01']).' บาท</li>';
									}
								$content.='</ol>
							</td>
						</tr>
					</tbody>
				</table>';
}
				
$content.='<p><strong>จำนวนชั่วโมงที่ใช้จริง '.Showtraininghour($ob['dev_training_hour']).'</strong></p>';

//$content.='<p><strong>ข้อมูลประกอบการพิจารณา</strong></p>';
/*$content.='<p>ครั้งสุดท้ายที่ไปเมื่อวันที่............เดือน....................พ.ศ.................ถึงวันที่............เดือน.........................พ.ศ......................<br>
				การจัดส่งรายงาน <img src="../img/blank-check-box.svg" width="16"> ส่งแล้ว <img src="../img/blank-check-box.svg" width="16"> ยังได้ส่ง  ระบุ<dottab>
				</p>';*/

$content.='<hr>';

$content.='<p>จึงเรียนมาเพื่อโปรดพิจารณาอนุมัติด้วยจักเป็นพระคุณยิ่ง</p>';

$content.='<table>
					<tbody>
						<tr>
						<td width="60%">';
							
							if($ob['dev_cancel']=='yes'){
								$qCancel=mysqli_query($condb, "select * from $db_eform.develop_cancel where dev_id='$ob[dev_id]'");
								$rCancel=mysqli_fetch_assoc($qCancel);
								$content.='<strong>เหตุผลยกเลิก</strong><br>'.$rCancel['cc_comment'];
							}
						
						/*$sqlRequestapprove=mysql_query("select * from $db_eform.develop_course_personel as t1
							inner join $db_eform.personel_muerp as t2 on(t1.per_id=t2.per_id)
							where t1.dev_id='$ob[dev_id]'
							and t2.per_dept='$ob[dp_id]'
							order by rand()
							limit 1");
						$rsRequestapprove=mysql_fetch_assoc($sqlRequestapprove);*/
						$content.='</td>';
						/*$content.='<td width="50%" class="bpmClearC">
							........................................................ ผู้ขออนุมัติ
							<br>('.$rsRequestapprove['per_pname'].' '.$rsRequestapprove['per_fnamet'].' '.$rsRequestapprove['per_lnamet'].')
						</td>';*/
						$content.='<td width="40%">
							<dottab> ผู้ขออนุมัติ
							<br>(<dottab>)
						</td>';
						$content.='</tr>
					</tbody>
				</table>';

$content.='<table border="1" class="font-12">
					<thead>
						<tr>
							<th>เรียน <dottab></th>
							<th>ความเห็นของคณบดี</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td width="50%">
								เพื่อโปรด
										<br><img src="../img/blank-check-box.svg" width="16"> พิจารณา
										<br><img src="../img/blank-check-box.svg" width="16"> อนุมัติ					
										<br><img src="../img/blank-check-box.svg" width="16"> อื่นๆ
								<br>ลงชื่อ <dottab>
								<br>ตำแหน่ง <dottab>
							</td>
							<td width="50%">
								<img src="../img/blank-check-box.svg" width="16"> อนุมัติ  <img src="../img/blank-check-box.svg" width="16">  เห็นชอบให้ดำเนินการตามเสนอ  <img src="../img/blank-check-box.svg" width="16">  ลงนาม
								<br><img src="../img/blank-check-box.svg" width="16">  ความเห็นเพิ่มเติม (ถ้ามี)............................................................<br>
		     						ลงนาม<dottab><br>
		     						          (<dottab>)<br>
								 ตำแหน่ง<dottab>
							</td>
						</tr>
					</tbody>
				</table>';

//บุคลากรผู้เข้าร่วม
$personelJoin='';
$sqlPersonel=mysqli_query($condb, "select * from $db_eform.personel_muerp
							inner join $db_eform.develop_course_personel on (personel_muerp.per_id=develop_course_personel.per_id)
							where develop_course_personel.dev_id='$ob[dev_id]'
							order by convert(personel_muerp.per_fnamet using tis620) asc,
							convert(personel_muerp.per_lnamet using tis620) asc");
					while($obPersonel=mysqli_fetch_assoc($sqlPersonel)){
						$personelJoin.=$obPersonel['per_pname'].$obPersonel['per_fnamet'].' '.$obPersonel['per_lnamet'].', ';
					}
$content.='<p class="font-12"><strong>บุคลากรผู้เข้าร่วม</strong> '.substr($personelJoin,'0','-2').'<p>';
//บุคลากรผู้เข้าร่วม

//งบประมาณคงเหลือ
/*$qBudgetdep=mysql_query("select * from $db_eform.department_budget where dp_id='$ob[dp_id]' and db_year='$ob[dev_year]'"); 
							$rBudgetdep=mysql_fetch_assoc($qBudgetdep);//งบที่ได่รับ

							$qBudgetUse=mysql_query("SELECT sum(t2.dev_pay01) as c1 
								FROM $db_eform.develop as t1
								inner join $db_eform.develop_form_budget as t2 on(t1.dev_id=t2.dev_id)
								INNER join $db_eform.budtype as t3 on(t2.bt_id=t3.bt_id)
								where t1.dev_year='$ob[dev_year]' 
								and t1.dev_cancel='no'
								and t3.bt_pay='1'
								and t1.dev_nopay='0'
								and t1.dev_remove='no'
								and t1.dp_id='$ob[dp_id]'");
								$rBudgetUse=mysql_fetch_assoc($qBudgetUse);
							//งบที่ใช้ไป
							
							$db_budget3=$rBudgetdep['db_budget']-$rBudgetUse['c1']; //งบคงเหลือ
$content.='<p class="infobox font-16">งบประมาณคงเหลือ '.number_format($db_budget3,'2').' บาท</p>';*/
//งบประมาณคงเหลือ

/*$page2='<h1>บุคลากรที่เข้าร่วม</h1>';
$page2.='<table border="1">
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
					$sqlPersonel=mysql_query("select * from $db_eform.personel_muerp
							inner join $db_eform.tb_orgnew on (personel_muerp.per_dept=tb_orgnew.dp_id)
							inner join $db_eform.develop_course_personel on (personel_muerp.per_id=develop_course_personel.per_id)
							inner join $db_eform.job as t4 on(personel_muerp.job_id=t4.job_id)
							where develop_course_personel.dev_id='$ob[dev_id]'
							and mid(develop_course_personel.cp_id,1,1) != 'A'
							order by convert(tb_orgnew.dp_name using tis620) asc,
							convert(personel_muerp.per_fnamet using tis620) asc,
							convert(personel_muerp.per_lnamet using tis620) asc");
					while($obPersonel=mysql_fetch_assoc($sqlPersonel)){
						$page2.='<tr>
							<td>'.++$r.'</td>
							<td>'.$obPersonel['per_pname'].' '.$obPersonel['per_fnamet'].' '.$obPersonel['per_lnamet'].'</td>
							<td>'.$obPersonel['job_name'].'</td>
							<td>'.$obPersonel['dp_name'].'</td>
						</tr>';
					}
					$page2.='</tbody>
				</table>';*/

//$footer = '<div class="content-footer">Tracking ID <strong>PH001</strong></div>';
$footer='<table class="font-10"><tbody><tr><td>หน้า {PAGENO}/{nb}</td><td class="pmhBottomRight">Form No. <strong>'.$ob['dev_id'].'</strong></td></tr></tbody></table>';
//$footerE = '<div class="content-footer">Tracking ID <strong>PH002</strong></div>';

require_once '../lib/mpdf/vendor/autoload.php';
//custom font
$defaultConfig = (new Mpdf\Config\ConfigVariables())->getDefaults();
$fontDirs = $defaultConfig['fontDir'];

$defaultFontConfig = (new Mpdf\Config\FontVariables())->getDefaults();
$fontData = $defaultFontConfig['fontdata'];

$mpdf = new \Mpdf\Mpdf([
    'fontDir' => array_merge($fontDirs, [
        '../lib/mpdf/thsarabun',
    ]),
    'fontdata' => $fontData + [
            'sarabun' => [
                'R' => 'THSarabunNew.ttf',
                'I' => 'THSarabunNew Italic.ttf',
                'B' =>  'THSarabunNew Bold.ttf',
            ]
        ],
		'default_font' => 'sarabun',
        'margin_header' => 0,
        'margin_footer' => 0,
]);
$mpdf->SetDisplayMode('fullpage','two');
$stylesheet = file_get_contents('../lib/mpdf/mpdfstyletables-2.css');
$mpdf->WriteHTML($stylesheet,1);

$mpdf->allow_output_buffering = true;

if($ob['dev_cancel']=='yes'){
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