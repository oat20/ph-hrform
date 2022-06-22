<?php
include("admin/compcode/include/config.php");
include("admin/compcode/include/connect_db.php");
include("admin/compcode/include/function.php");

connect_db("utf8");
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>คณะสาธารณสุขศาสตร์ มหาวิทยาลัยมหิดล</title>
<link href="room_it/css/style.css" rel="stylesheet" type="text/css">
</head>

<body>
<div id="warp">
	
    <!--start top -->
    <div id="top">
    	<div class="left"></div>
        <div class="right">
        	<strong>Admin Admin</strong><br/><a href="#">[ข้อมูลส่วนตัว]</a> <a href="#">[ออกจากระบบ]</a>
        </div>
        <div style="clear:both"></div>
    </div>
	<!--end top -->

	<div style="clear:both">
    </div>
	
    <!--start center -->
	<div id="left">
    	<!--<img src="room_it/images/life.png" border="0"> -->
        <?php include("admin/compcode/menu_superadmin.php"); ?>
    </div>

	<div id="right">
   	  <h1>ประเภทโครงการ</h1>
      <div class="post">
    	<?php include("admin/compcode/_form_section.php"); ?>
    </div>
      <div class="post">
         <?php include("admin/compcode/_show_section.php"); ?>
	</div>
   </div>
    
    <div style="clear:both">
    </div>
	<!--end center -->
    
</div>
</body>
</html>
