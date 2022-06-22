<?php
ob_start();
session_start();

include("admin/compcode/include/config.php");
include("admin/compcode/include/connect_db.php");
include("admin/compcode/include/function.php");
include("admin/compcode/check_login.php");
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
<script language="JavaScript" type="text/javascript">
var win=null;
function NewWindow(mypage,myname,w,h,pos,infocus)
{
if(pos=="random"){myleft=(screen.width)?Math.floor(Math.random()*(screen.width-w)):100;mytop=(screen.height)?Math.floor(Math.random()*((screen.height-h)-75)):100;}
if(pos=="center"){myleft=(screen.width)?(screen.width-w)/2:100;mytop=(screen.height)?(screen.height-h)/2:100;}
else if((pos!='center' && pos!="random") || pos==null){myleft=0;mytop=0}
settings="width=" + w + ",height=" + h + ",top=" + mytop + ",left=" + myleft + ",scrollbars=yes,location=no,directories=no,status=no,menubar=no,toolbar=no,resizable=yes";win=window.open(mypage,myname,settings);
win.focus();
}
</script>

<script type="text/javascript" src="admin/compcode/editor/jscripts/tiny_mce/tiny_mce.js"></script>
<script type="text/javascript">
	tinyMCE.init({
		// General options
		mode : "textareas",
		theme : "advanced",
		plugins : "safari,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,wordcount",

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
		content_css : "css/content.css",

		// Drop lists for link/image/media/template dialogs
		template_external_list_url : "lists/template_list.js",
		external_link_list_url : "lists/link_list.js",
		external_image_list_url : "lists/image_list.js",
		media_external_list_url : "lists/media_list.js",

		// Replace values for the template plugin
		template_replace_values : {
			username : "Some User",
			staffid : "991234"
		}
	});
</script>

<link rel="stylesheet" type="text/css" href="admin/themes/fancyblue.css" title="Calendar Theme - forest.css" >
<!-- import the calendar script -->
		<script type="text/javascript" src="admin/src/utils.js"></script>
		<script type="text/javascript" src="admin/src/calendar1.js"></script>
<!-- import the language module -->
		<script type="text/javascript" src="admin/lang/calendar-en.js"></script>
<!-- other languages might be available in the lang directory; please check
		your distribution archive. -->
<!-- import the calendar setup script -->
		<script type="text/javascript" src="admin/src/calendar-setup.js"></script>
</head>

<body>
<div id="warp">
    	<img src="phpm/images/head.png">
        
        <div class="menu">
        	<ul>
            	<li><a href="phpm/index.php">< กลับหน้าหลัก</a></li>
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
        <div style="clear:both"></div>
        
        <div id="sidebar">
        	<?php include("inc/projectMenu.php");?>
        </div>
        
    <div id="content">
    	<?php include("inc/form01.php");?>
    </div>
    
    <div style="clear:both"></div>
    
</div>
</body>
</html>
<?php
ob_end_flush();
?>