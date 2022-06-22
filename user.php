<?php
include("admin/compcode/include/config.php");
include("admin/compcode/include/connect_db.php");

connect_db("utf8");
$mode=$_GET["mode"];
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
   	  <h1>ผู้ใช้</h1>
      <div class="submenu">
      	<ul>
        	<li><a href="user.php">แสดงรายการ</a></li>
            <li><a href="user.php?mode=add">เพิ่มรายการ</a></li>
        </ul>
      </div>
      <div class="post">
      	<?php 
			switch($mode){
				case "add" : include("admin/compcode/form_adduser.php"); break;
				default : include("admin/compcode/_show_alluser.php"); break;
			} 
		?>
      </div>
      
    </div>
    
    <div style="clear:both">
    </div>
	<!--end center -->
    
</div>
</body>
</html>
