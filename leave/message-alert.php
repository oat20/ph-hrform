<?php
session_start();

include("../admin/compcode/include/config.php");
require_once '../lib/mysqli.php';
include("../admin/compcode/include/connect_db.php");
include("../admin/compcode/check_login.php");
include("../admin/compcode/include/function.php");
?>
<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<?php include('../lib/css-inc.php');?>
</head>

<body>
<div class="container">
	<div class="space1"></div>
	<?php //include('../header-inc.php');?>
    
    <div class="alert alert-success" role="alert">
    	<p><i class="fa fa-check"></i> บันทึกข้อมูลเรียบร้อย กรุณาพิมพ์แบบฟอร์ม และแนบเอกสารตามที่ระบุเพื่อยืนเสนออนุมัติ <a href="../profile/profile.php" class="alert-link"><i class="fa fa-home"></i> หน้าหลัก</a></p>
        <hr>
        <p class="text-right"><a href="form-edit.php?dev_id=<?php echo $_GET['dev_id'];?>" class="alert-link"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> กลับไปแก้ไข</a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="print-form-pdf.php?dev_id=<?php echo $_GET['dev_id'];?>" class="alert-link" target="_blank"><i class="fa fa-print"></i> พิมพ์แบบฟอร์ม</a></p>
    </div>
    
    <!--<iframe src="//docs.google.com/viewer?url=http://localhost/hr/leave/print-form-pdf.php?dev_id=<?php //echo $_GET['dev_id'];?>" width="1140" height="600"></iframe>-->

</div><!--container-->

<?php include('../lib/js-inc.php');?>
</body>
</html>