<?php
ob_start();
session_start();
include("../admin/compcode/include/config.php");
include("../admin/compcode/include/connect_db.php");
include("../admin/compcode/include/function.php");
include("../admin/compcode/check_login.php");

$f=$_REQUEST["f"];
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
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
<link href="../room_it/style2.css" rel="stylesheet" type="text/css">
<link href="../admin/compcode/tool/css_text.css" rel="stylesheet" type="text/css">
</head>

<body>
<!--start top -->
<div id="top">
	<div class="logo"><img src="../img/logo.png"></div>
    	<div class="profile">
    		<?php include("../admin/compcode/show_namesstatus.php"); ?>
         </div>
    <div style="clear:both"></div>
 </div>
<!-- end top -->
 
 <!--start main -->
 <div id="main">
 
 	<!--start right -->
 	<div id="right">
    	<?php include("../admin/compcode/chack_menu.php"); ?>
    </div>
    <!--end right -->
    
    <!--start left -->
    <div id="left">
    	<div class="box_top"></div>
        <div class="box_mid">
        	
            <div id="nagiv"><a href="#">หน้าหลัก</a> > เสนอโครงการประจำปี</div>
            
           <?php 
		   		#switch($f)
				#{
					#case "f2" : include("admin/compcode/form_2.php"); break;
					#default : include("admin/compcode/form_1.php"); break;
				#}
				include("../admin/compcode/form_20.php");
			?>
        	
        </div>
        <div class="box_bottom"></div>
    </div>
    <!--end left -->
    
    <div style="clear:both"></div>
 
 </div>
<!--end main -->

</body>
</html>
<?php
ob_end_flush();
?>