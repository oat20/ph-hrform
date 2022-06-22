<?php
include('../../admin/compcode/include/config.php');
include('../../admin/compcode/include/connect_db.php');

$content='<table>
					<tbody>
						<tr>
							<td><img src="../../img/mulogo_80.png" width="70"></td>
							<td class="font-20" valign="middle"><strong>บันทึกข้อความ</strong></td>
							<td></td>
						</tr>
					</tbody>
				</table>';
$content.='<table border="1"><tbody><tr><td><strong>ส่วนงาน</strong> Content เนื้อหา</td>
				<td width="25%"><strong>ที่</strong></td><td width="25%"><strong>วันที่</strong></td></tbody></table>';
$content.='<p><strong>เรื่อง ขออนุมัติเดินทางไปปฏิบัติงาน การพัฒนาบุคลากร / บริการวิชาการ</strong></p>';
$content.='<p></p><p><strong>เรียน</strong></p>';
/*$content.='<pagefooter name="odds" content-right="Odd Footer" footer-style-right="color: #880000; font-style: italic;" line="1" />
<pagefooter name="evens" content-right="{DATE j-m-Y}" content-center="{PAGENO}/{nb}" footer-style="color: #880000; font-style: italic;" />';*/

$page2='<h1>บุคลากรที่เข้าร่วม</h1>';
$page2.='<table border="1">
					<thead>
						<tr>
							<th>ลำดับ</th>
							<th>ชื่อ</th>
							<th>ตำแหน่ง</th>
							<th>ส่วนงาน</th>
						</tr>
					</thead>
					<tbody>';
					$sql=mysql_query("select * from phper2.personel
							inner join phper2.tb_orgnew on (personel.per_dept=tb_orgnew.dp_id)
							where tb_orgnew.dp_id='23'
							order by convert(personel.per_fnamet using tis620) asc,
							convert(personel.per_lnamet using tis620) asc");
					while($ob=mysql_fetch_assoc($sql)){
						$page2.='<tr>
							<td>'.++$r.'</td>
							<td>'.$ob['per_pname'].' '.$ob['per_fnamet'].' '.$ob['per_lnamet'].'</td>
							<td>'.$ob['job_id'].'</td>
							<td>'.$ob['dp_name'].'</td>
						</tr>';
					}
					$page2.='</tbody>
				</table>';

//$footer = '<div class="content-footer">Tracking ID <strong>PH001</strong></div>';
$footer='<table class="font-12"><tbody><tr><td>หน้า {PAGENO}</td><td class="pmhBottomRight">Tracking ID <strong>PH001</strong></td></tr></tbody></table>';
//$footerE = '<div class="content-footer">Tracking ID <strong>PH002</strong></div>';

require("mpdf.php");
$mpdf=new mPDF('th','A4','','mu02',10,10,5,10,0,1); //A4 แนวตั้ง, A4-L แนวนอน
$mpdf->SetDisplayMode('fullpage','two');
$stylesheet = file_get_contents('mpdfstyletables-2.css');
$mpdf->WriteHTML($stylesheet,1);

//$mpdf->debug = true;
//$mpdf->allow_output_buffering = true;
$mpdf->SetAutoFont(AUTOFONT_ALL);

$mpdf->WriteHTML($content);

$mpdf->SetHTMLFooter($footer);

$mpdf->AddPage('','','','','',10,10,10,10,0,1);
$mpdf->WriteHTML($page2);
//$mpdf->SetHTMLFooter($footerE,'E');
$mpdf->Output();
exit;
?>