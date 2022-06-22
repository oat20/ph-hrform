<?php
ob_start();
session_start();
include "admin/compcode/include/config.php";
include("admin/compcode/include/connect_db.php");
include "admin/compcode/include/function.php";
include("admin/compcode/check_login.php");

connect_db("utf8");
$mode=$_GET["mode"];
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title><?php print $titlebar; ?></title>
<link href="room_it/layout.css" rel="stylesheet" type="text/css">

<script type="text/javascript" src="admin/compcode/editor/jscripts/tiny_mce/tiny_mce.js"></script>
<script type="text/javascript">
	// Default skin
	tinyMCE.init({
		// General options
		mode : "exact",
		elements : "elm1",
		theme : "advanced",
		plugins : "safari,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,inlinepopups",

		// Theme options
		theme_advanced_buttons1 : "save,newdocument,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,styleselect,formatselect,fontselect,fontsizeselect",
		theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,cleanup,help,code,|,insertdate,inserttime,preview,|,forecolor,backcolor",
		theme_advanced_buttons3 : "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell,media,advhr,|,print,|,ltr,rtl,|,fullscreen",
		theme_advanced_buttons4 : "insertlayer,moveforward,movebackward,absolute,|,styleprops,|,cite,abbr,acronym,del,ins,attribs,|,visualchars,nonbreaking,template,pagebreak",
		theme_advanced_toolbar_location : "top",
		theme_advanced_toolbar_align : "left",
		theme_advanced_statusbar_location : "bottom",
		theme_advanced_resizing : true,

		// Example content CSS (should be your site CSS)
		content_css : "admin/compcode/editor/css/content.css",

		// Drop lists for link/image/media/template dialogs
		template_external_list_url : "admin/compcode/editor/lists/template_list.js",
		external_link_list_url : "admin/compcode/editor/lists/link_list.js",
		external_image_list_url : "admin/compcode/editor/lists/image_list.js",
		media_external_list_url : "admin/compcode/editor/lists/media_list.js",

		// Replace values for the template plugin
		template_replace_values : {
			username : "Some User",
			staffid : "991234"
		}
	});
</script>
</head>

<body>
<div id="top">
    	<div class="logo">
        	<img src="room_it/images/logo4.png">
        </div>
   </div>
   
<div id="warp">
	<!--<div id="menu">
    	<div class="middle">
        	หน้าหลัก
        </div>
    	<div class="bottom">
        	<div class="block1"></div>
            <div class="block2"></div>
        </div>
    </div> -->
    
	<!--<div id="top">
    	<div class="logo">
        	<h1>TMPS</h1>
        	<h2>Task Monitoring Projects System</h2>
        </div>
   </div> -->
   
   <div id="left">
   		<div class="top"></div>
        <div class="mid">
            <?php include("admin/compcode/menu_superadmin.php"); ?>        
        </div>
    	<div class="bottom"></div>
   </div>
            
    <div id="main">
    	<h1>โครงการร่วม</h1>
        <!--<div class="subtitle"><ul><li><a href="addproject.php">แสดงโครงการ</a></li><li><a href="addproject.php?mode=add">เพิ่มโครงการ</a></li></ul></div> -->
        
        <div class="post">
            <?php include("admin/compcode/show_join_project.php"); ?>
        </div>
    </div>
    
    <div style="clear:both"></div>

</div>
</body>
</html>
<?php ob_end_flush(); ?>