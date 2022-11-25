<?php
header ('Content-type: text/html; charset=utf-8');
header("Cache-Control: no-cache, must-revalidate");
header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");

error_reporting(E_ALL & ~E_NOTICE);

date_default_timezone_set('Asia/Bangkok'); //set datetime thailand
ini_set('short_open_tag', 'on');
$charset="utf-8";

$cf_https = ($_SERVER['HTTPS'] == "on") ? "https://" : "http://";

if($_SERVER['HTTP_HOST']=='localhost' or $_SERVER['HTTP_HOST']=='127.0.0.1'){
	//$livesite="http://".$_SERVER['SERVER_NAME']."/www2/ph/hr/";
	$livesite= $cf_https.$_SERVER['HTTP_HOST']."/ph/ph-hrform/"; //on localhost
}else{
	$livesite= $cf_https.$_SERVER['HTTP_HOST']."/hr/"; //on server
}

//define('att', dirname(__FILE__) . '\phpm\attachment');
//define('livepath', dirname(__FILE__));

$cf_mulogo='<img src="'.$livesite.'img/PH_logo_web.png" class="img-responsive">';

$photoDir = 'admin/compcode/photo/'; #ตำแหน่ง upload รูป
$fileDir='admin/compcode/files/'; #ตำแหน่ง upload ไฟล์

$img_path="admin/compcode/img/"; #path รูป
$img_path2="img/"; #path รูป
$img_path3="room_it/images/"; #path รูป

/*$titlebar=array(
	"title"=>"Information Staff Development",
	"shorttitle"=>"PH-ISD",
	"icon"=>"<i class='fa fa-line-chart'></i>"
);*/
$titlebar=array(
	"title"=>"PH-HRD E-Forms",
	"shorttitle"=>"HRD",
	"label"=>"แบบฟอร์มขออนุมัติปฏิบัติงานพัฒนาบุคลการ / บริการวิชาการ",
	"icon"=>"<i class='fa fa-connectdevelop fa-fw'></i>",
	"label_02"=>"งานบริหารทรัพยากรบุคคล",
	"label_03"=>"Human Resource Division"
);

$cf_budgetperstaff=5000;

$date_create=date("Y-m-d H:i:s");
$cf_thaiyear=date('Y')+543;
$remoteip=$_SERVER['REMOTE_ADDR'];

$admin_status=array(
	"1"=>array("label"=>"Super Administrator","color"=>"default"),
	"2"=>array("label"=>"จัดการข้อมูลระดับคณะฯ: งานบริหารทรัพยากรบุคคล","color"=>"primary"),
	"3"=>array("label"=>"บุคลากรคณะฯ (ผู้ขออนุมัติ)","color"=>"success"),
	//"4"=>"Staff"
	"5"=>array("label"=>"บันทึกงบประมาณ: งานการเงินฯ","color"=>"info"),
	"6"=>array("label"=>"View Report","color"=>"warning"),
	//"7"=>array("label"=>"Back-End","color"=>"danger"),
); 

$cf_yn_msg=array(
	"yes"=>array("icon"=>"<i class='fa fa-check'></i>","label"=>"Yes","color"=>"success"),
	"no"=>array("icon"=>"<i class='fa fa-times'></i>","label"=>"No","color"=>"danger")
);

$cf_yn_msg02=array(
	"1"=>array("icon"=>"<i class='fa fa-check fa-fw'></i>","label"=>"Yes","color"=>"success"),
	"0"=>array("icon"=>"<i class='fa fa-times fa-fw'></i>","label"=>"No","color"=>"danger")
);

//เพศ
$per_sex=array(
	"0"=>array("label"=>"ยังไม่ระบุ","icon"=>"<i class='fa fa-ban'></i>"),
	"F"=>array("label"=>"หญิง","icon"=>"<i class='fa fa-female'></i>"),
	"M"=>array("label"=>"ชาย","icon"=>"<i class='fa fa-male'></i>")
);

//สถานะแบบฟอร์ม
$cf_devformstatus = array("discuss"=>array("label"=>"พิจารณา","color"=>"warning"),
	"approve"=>array("label"=>"อนุมัติ","color"=>"success"),
	//"cancel"=>array("label"=>"ยกเลิก","color"=>"danger"),
	"notapprove"=>array("label"=>"ไม่อนุมัติ", "color"=>"danger"),
	"other"=>array("label"=>"อื่นๆ","color"=>"default"),
);

//ภายในประเทศ
$cf_local=array(
	"0"=>array("name"=>"ยังไม่ระบุ", "color"=>"default", "icon"=>"<i class='fa fa-exclamation-circle'></i>"),
	"1"=>array("name"=>"ภายในประเทศ","color"=>"success", "icon"=>"<i class='fa fa-location-arrow'></i>"),
	"2"=>array("name"=>"ต่างประเทศ","color"=>"primary", "icon"=>"<i class='fa fa-plane'></i>")
);

//สถานะฟอร์มลาต่างประเทศ
$cf_devleave_status=array(
	"0"=>array("name"=>"เห็นชอบและเสนอคณบดีพิจารณาดำเนินการ","color"=>"success"),
	"1"=>array("name"=>"อื่นๆ","color"=>"default")
);

//อนุมัติ*
$cf_approve=array(
	"wait"=>array("name"=>"รออนุมัติ","color"=>"warning", "icon"=>"<i class='fa fa-hourglass fa-fw'></i>"),
	"approve"=>array("name"=>"อนุมัติ","color"=>"success", "icon"=>"<i class='fa fa-check fa-fw'></i>"),
	"not"=>array("name"=>"ไม่อนุมัติ","color"=>"danger", "icon"=>"<i class='fa fa-exclamation fa-fw'></i>"),
	"cancel"=>array("name"=>"ยกเลิก", "color"=>"default", "icon"=>"<i class='fa fa-close fa-fw'></i>"),
);

$cf_cancel_msg=array(
	"yes"=>array("icon"=>"<i class='fa fa-check fa-fw'></i>","name"=>"Yes","color"=>"danger"),
	"no"=>array("icon"=>"<i class='fa fa-minus' fa-fw'></i>","name"=>"No","color"=>"success")
);

$cf_contextual=array("default", "primary", "success", "info", "warning", "danger");

//ขออนุมัติค่าใช้จ่าย
$cf_devnopay=array(
	"1"=>"ไม่เบิกค่าใช้จ่าย",
	"0"=>"ขออนุมัติค่าใช้จ่าย"
);

//เส้นทางไหลของเอกสาร
$cf_member_docroute = array(
	"A" => "ผู้เสนอ",
	"B" => "หัวหน้าภาควิชา / หัวหน้างาน",
	"C" => "ระดับบริหารงาน"
);

//smtp mu mailserver
ini_set('SMTP', 'mumail.mahidol.ac.th');
ini_set('smtp_port', '25');
ini_set('sendmail_from', 'noreply@'.$_SERVER['HTTP_HOST']);
?>