<?php
include('../admin/compcode/include/config.php');
include('../admin/compcode/include/function.php');

include('../lib/css-inc.php');

print '<div class="container-fluid">
	<div class="space1"></div>
	'.warning('warning','<i class="fa fa-exclamation"></i> Warning','ระบบนี้ไม่สามารถใช้งานนอกเครือข่ายมหิดลได้').'
</div>';

include('../lib/js-inc.php');
?>