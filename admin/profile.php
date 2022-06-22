<?php
ob_start();
session_start();
include "compcode/include/config.php";
include"compcode/check_login.php";
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=tis-620">
<title>คณะสาธารณสุขศาสตร์ มหาวิทยาลัยมหิดล</title>
<style type="text/css">
<!--
.style125 {
	color: #666666;
	font-size: 8pt;
}
.style127 {font-size: 11px; color: #FFFF66; }
.style7 {
	color: #FFFFFF;
	font-size: 12pt;
	font-weight: bolder;
	margin-bottom: 10px;
}
.style138 {color: #FF6600; font-weight: bold; }
.style8 {
	color: #9E3F01;
	font-weight: bold;
	text-decoration: none;
}
.style12 {color: #FF6600}
.style17 {
	color: #9E3F01;
	font-size: 12px;
	font-weight: bold;
}
.style19 {color: #9E3F01; font-weight: bold; }
-->
</style>
<link href="styles/style2.css" rel="stylesheet" type="text/css">
</head>
<body>

<div id="contrainer">
	
    <div id="top">
  		<a href="../html2009/index.html"><img src="../html2009/images/logo.gif" alt="individual" width="286" height="66" border="0"></a>
  	</div>
  
  <div id="body">
  	<h2>ผู้ดูแลระบบ (Administrator)</h2>
    <div class="submenu1">
    	<ul>
        	<li><a href="default.php">หน้าหลักผู้ดูแลระบบ</a></li>
            <li>แก้ไขข้อมูลส่วนตัว</li>
        </ul>
    </div>
    <!--<div class="submenu2">
    	<ul>
        	<li><a href="profile.php">ข้อมูลส่วนตัว</a></li>
            <li><a href="profile.php">เปลี่ยนรหัสผ่าน</a></li>
        </ul>
    </div> -->
  	<?php 
		#switch($mode){
			#case "add" : include "compcode/form_adduser.php"; break;
			#case "permission" : include "compcode/form_status_admin.php"; break; 
			#default : require "compcode/_show_alluser.php"; break;  
		#}
		include"../profile/form_changepw.php";
	?>
    <br class="spacer">
  </div>
   
	<div id="footerMain">
		<div id="footer">
	<p align="center" class="copyright"><span class="style125">
        <span class="style127">Revised: Copyright @ 2009, &#3588;&#3603;&#3632;&#3626;&#3634;&#3608;&#3634;&#3619;&#3603;&#3626;&#3640;&#3586;&#3624;&#3634;&#3626;&#3605;&#3619;&#3660;, &#3617;&#3627;&#3634;&#3623;&#3636;&#3607;&#3618;&#3634;&#3621;&#3633;&#3618;&#3617;&#3627;&#3636;&#3604;&#3621;,   Webmaster.<br>
      420/1 &#3606;&#3609;&#3609;&#3619;&#3634;&#3594;&#3623;&#3636;&#3606;&#3637; &#3648;&#3586;&#3605;&#3619;&#3634;&#3594;&#3648;&#3607;&#3623;&#3637; &#3585;&#3619;&#3640;&#3591;&#3648;&#3607;&#3614;&#3631; 10400.&#3650;&#3607;&#3619; 0-2354-8543 </span></span></p>
	<div align="center"><a target="_blank" href="http://truehits.net/stat.php?id=s0028754"></a></div>
		</div>
  </div>

</div>

</body>
</html>
<?php
ob_end_flush();
?>