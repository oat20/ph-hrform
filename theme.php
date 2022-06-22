<?php
ob_start();
session_start();

include("admin/compcode/include/config.php");
include("admin/compcode/include/connect_db.php");
include("admin/compcode/include/function.php");
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title><?php print $titlebar; ?></title>
<style type="text/css">
<!--
/*body {
	background-color: #e3e7ea;
	font-family: verdana, tahoma;
}
.post{
	width: 220px;
}
.post .title1{
	background-image: url(img/box2_01.png);
	background-repeat: no-repeat;
	height: 7px;
}
.post .title2{
	font-size: 10pt;
	font-weight: bold;
	color: #FFFFFF;
	background-image: url(img/box2_02.png);
	padding-left: 10px;
}
.post .title3{
	background-image: url(img/box2_03.png);
	background-repeat: no-repeat;
	height: 7px;
}
.post2{
	width: 875px;
}
.post2 .title1{
	background-image: url(img/box_01.png);
	background-repeat: no-repeat;
	height: 7px;
}
.post2 .title2{
	font-size: 10pt;
	padding-left: 10px;
	background-color: #ffffff;
	padding-right: 10px;
}
.post2 .title3{
	background-image: url(img/box_03.png);
	background-repeat: no-repeat;
	height: 10px;
}*/

-->
</style>
<link href="phpm/style.css" rel="stylesheet" type="text/css">
<link href="admin/compcode/tool/css_text.css" rel="stylesheet" type="text/css">
</head>

<body>
<div id="warp">
    	<img src="phpm/images/head.png">
        
        <div class="menu">
        	<ul>
            	<li><a href="#">< กลับหน้าหลัก</a></li>
            	<!--<li><a href="#">โครงการในกำกับ</a></il>
                <li><a href="#">เสนอโครงการ</a>
                	<ul>
                    	<li><a href="#">แบบฟอร์ม 1</a></li>
                        <li><a href="#">แบบฟอร์ม 2</a></li>
                        <li><a href="#">แบบฟอร์ม 3</a></li>
                    </ul>
                </il>
                <li><a href="#">รายงาน</a></il> -->
            </ul>
        </div>
        
    <div id="content">    	
    	<?php include("inc/form01.php");?>
    </div>
    
</div>
</body>
</html>
<?php
ob_end_flush();
?>