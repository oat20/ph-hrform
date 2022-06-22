<?php
ob_start();
include("../../../config.php");
include("../../../compcode/conn.php");
require_once("../../include/function.php");

//

/*$sql="select * from tb_register
inner join tb_division on tb_register.re_dep=tb_division.div_id
inner join tb_com on tb_register.register_id=tb_com.register_id
inner join tb_user on tb_register.technic_id=tb_user.user_id
where tb_register.register_id='$_GET[register_id]'";*/
$sql="select * from tb_register
inner join tb_division on tb_register.re_dep=tb_division.div_id
inner join tb_com on tb_register.register_id=tb_com.register_id
where tb_register.register_id='$_GET[register_id]'";
$rs=mysql_query($sql);
$ob=mysql_fetch_array($rs);
$re_name=explode(";",$ob[re_name]);

$technicID=explode(";",$ob["technic_id"]);
for($t=0;$t<count($technicID);$t++){
	$t2=trim($technicID[$t]);
	$sql2="select * from tb_user
	where user_id='$t2'
	order by name asc, surname asc";
	$rs2=mysql_query($sql2);
	$ob2=mysql_fetch_assoc($rs2);
	$technicName.="- ".$ob2["name"]." ".$ob2["surname"]."<br>";
}

$html="<p class='pmhMiddleRight'><input type='checkbox'> บันทึกลงคอมพิวเตอร์แล้ว</p> 
<h1>ใบงานซ่อม<br/>งานกายภาพสิ่งแวดล้อม และความปลอดภัย</h1>
<p class='pmhMiddleRight'><strong>เลขที่ (Job ID)</strong> ".$ob[register_id]."</p>
<p class='pmhMiddleRight'><strong>วันที่</strong> ".iconv("tis-620","utf-8",date_sub($ob[date_regis]))."</p>
<p>สำหรับผู้แจ้งซ่อม</p>
<table border='1'>
	<tbody>
	<tr>
		<td width='50%'><strong>ผู้แจ้งซ่อม</strong> ".$re_name[0]."</td>
		<td width='50%'><strong>ส่วนงาน</strong> ".$ob[division]."</td>
	</tr>
	</tbody>
</table>
<p></p>
<p><strong>ขอแจ้งซ่อมอุปกรณ์ซึ่งประจำอยู่ ณ</strong> ".$ob[re_location]."</p>
<table border='1'>
<thead>
  <tr>
    <th><strong>ชื่อพัสดุ/ครุภัณฑ์</strong></th>
    <th><strong>หมายเลขครุภัณฑ์</strong></th>
    <th><strong>ยี่ห้อรุ่น</strong></th>
	<th>อาการเสีย</th>
  </tr>
  </thead>
  <tbody>
  	<tr>
		<td>".$ob[comname]."</td>
		<td>".$ob[code]."</td>
		<td>".$ob[brand]."</td>
		<td>".$ob[symptom]."</td>
	</tr>
 </tbody>
 </table>
<hr/>
<p>1. สำหรับเจ้าหน้าที่</p>
<table border='1'>
	<tbody>
		<tr>
			<td width='50%'><strong>ผู้ดำเนินการซ่อม</strong><p>".$technicName."</p></td>
			<td width='50%'><strong>การดำเนินงาน</strong>
				<p>
					<input type='checkbox'  /> ยังไม่สามารถดำเนินการได้</p>
					<p><input type='checkbox'  /> ซ่อมเสร็จเรียบร้อย</p>
					<p><input type='checkbox'  /> ไม่สามารถซ่อมได้
				</p>
			</td>
		</tr>
	</tbody>
</table>
<table border='1'>
	<tbody>
		<tr>
			<td width='50%'><strong>ผลการดำเนินงาน</strong>
				<p>&nbsp;</p>
				<p>&nbsp;</p>
				<p>&nbsp;</p>
				<p>&nbsp;</p>
				<p>&nbsp;</p>
			</td>
			<td width='50%'><strong>หมายเหตุ</strong>
				<p>&nbsp;</p>
				<p>&nbsp;</p>
				<p>&nbsp;</p>
				<p>&nbsp;</p>
				<p>&nbsp;</p>
			</td>
		</tr>
	</tbody>
</table>";
/*echo "<p>&nbsp;</p>
<p class='pmhMiddleRight'>ลงวันที่ ........................................</p>";*/
$html.='<hr/>';
$html.="<table><tr>
<td width='50%'><strong>2. เรียน</strong> <input type='checkbox' /> <strong>หัวหน้าพัสดุ</strong>
<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type='checkbox' /> <strong>หัวหน้าหน่วยซ่อมบำรุง</strong>
<p>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
เพื่อดำเนินการ<br/>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
..........ขอรายละเอียดประวัติการซ่อม
<br/>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
..........ส่งซ่อมช่างภายนอก
<br/>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
..........หน่วยซ่อมบำรุงดำเนินการ
<br/>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
..........อื่นๆ........................................
</p>
<p>
<p>&nbsp;</p>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
........................................ลงชื่อ (เลขานุการคณะฯ)<br/>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
........../........../..........
</p>
</td>
<td width='50%'><strong>3. เรียน เลขานุการคณะฯ</strong>
<p>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
เพื่อทราบผลการดำเนินงาน</P>
<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type='checkbox' /> ดำเนินการซ่อมเรียบร้อยแล้ว</p>
<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type='checkbox' /> ดำเนินการซ่อมไม่ได้ต้องส่งซ่อมภายนอก</p>
<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type='checkbox' /> สืบราคาค่าซ่อมช่างภายนอกค่าใช้จ่ายในการซ่อม</p>
<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
จำนวน........................................บาท</p>
<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type='checkbox' /> ประวัติการซ่อมและอื่นๆ........................................</p>
<p>&nbsp;</p>
<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
......................................................................</p> 
<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type='checkbox' /> ลงชื่อหัวหน่วยพัสดุ / <input type='checkbox' /> หัวหน้าหน่วยซ่อมบำรุง
<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
........../........../..........
</p>
</td>
</tr></table>";
$html.="<hr/>
<table>
<tr>
	<td><strong>4. เรียน คณบดี</strong>
		<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		เพื่อโปรดพิจารณาอนุมัติให้ช่างภายนอกซ่อมได้ในวงเงิน..............................บาท</p>
		<p>
		<p>&nbsp;</p>
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		........................................เลขานุการคณะฯ<br/>
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		........../........../..........
		</p>
	</td>
	<td>
		<p><strong>5. ความเห็นคณบดี</strong></p>
		<p><input type='checkbox' /> อนุมัติ</p>
		<p><input type='checkbox' /> ไม่อนุมัติ</p>
		<p>&nbsp;</p>
		<p>................................</p>
		<p>........../........../..........</p>
		</p>
	</td>
</tr>
</table>";

include("mpdf.php");
ob_end_clean();
$mpdf=new mPDF('th','A4','','TH SarabunPSK',20,5,5,5,0,0); //A4 แนวตั้ง, A4-L แนวนอน
$mpdf->SetDisplayMode('fullpage');
$mpdf->list_indent_first_level = 0;	// 1 or 0 - whether to indent the first level of a list
$stylesheet = file_get_contents('mpdfstyletables-2.css');
$mpdf->WriteHTML($stylesheet,1);	// The parameter 1 tells that this is css/style only and no body/html/text
$mpdf->SetAutoFont(AUTOFONT_ALL);
$mpdf->WriteHTML($html);
$mpdf->Output();
exit;
?>