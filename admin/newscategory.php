<?php
ob_start();
session_start();
include "compcode/include/config.php";
include"compcode/check_login.php";
$conn = connect_db("ph_web");
if(!$conn){
echo "เกิดความผิดพลาดไม่สามารถติดต่อกับฐานข้อมูลได้";
}
$mode=$_GET["mode"];
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
.style7 {color: #49596A;
	font-size: 10px;
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
	<!--top part start -->
	<div id="top">
  <a href="#"><img src="../html2009/images/logo.gif" alt="individual" width="286" height="66" border="0"></a>
  <!--<ul>
  <li class="hover"><a href="../html2009/index">&#3627;&#3609;&#3657;&#3634;&#3649;&#3619;&#3585;</a></li>
  <li><a href="#">&#3648;&#3585;&#3637;&#3656;&#3618;&#3623;&#3585;&#3633;&#3610;&#3588;&#3603;&#3632;</a></li>
  <li><a href="#">&#3605;&#3636;&#3604;&#3605;&#3656;&#3629;&#3648;&#3619;&#3634;</a></li>
  </ul> -->
	</div>
<!--top part end -->
	<!--header start -->
  <!--header end -->
  <!--body start -->
  <div id="body">
  	<h2>ผู้ดูแลระบบ (Administrator)</h2>
    <div class="submenu1">
    	<ul>
        	<li><a href="default.php">หน้าหลักผู้ดูแลระบบ</a></li>
            <li>หมวดหมู่ข่าวสาร</li>
        </ul>
    </div>
    <div class="submenu2">
    	<ul>
        	<li><a href="newscategory.php">รายการหมวดหมู่ข่าว</a></li>
            <li><a href="newscategory.php?mode=add">เพิ่มหมวดหมู่ข่าวสาร</a></li>
        </ul>
    </div>
  	<?php 
		switch($mode){
			case "add" : include "compcode/_form_section.php"; break;
			case "edit" : include "compcode/_form_org.php"; break;
			default : include"compcode/_show_section.php"; break; 
		}
	?>
    <br class="spacer">
	<!--left panel start -->
  <!--left panel end -->
   <!--mid panel start --><!--mid panel end -->
    <!--right panel start -->
    <!--right panel end -->
	<!--bodyBottom start -->
	<!--bodyBottom end-->
	<!--<br class="spacer"> -->
  </div>
   
	<!--body end -->
	<!--footer start -->
	<div id="footerMain">
	<div id="footer">
	<!--<ul>
	<li><a href="#">Home</a>|</li>
	<li><a href="#">Services</a>|</li>
	<li><a href="#">Testimonials</a>|</li>
	<li><a href="#">Projects</a>|</li>
	<li><a href="#">Privacy</a>|</li>
	<li><a href="#">Latest Ideas</a></li>
	</ul> -->
	<!--<p align="center" class="copyright"><span class="style125"></span> </span></p> -->
	<!--<div align="center"><span class="style7"><a target="_blank" href="http://truehits.net/stat.php?id=s0028754"><img src="http://hits.truehits.in.th/noscript.php?id=s0028754" alt="Thailand Web Stat" border="0" width="14" height="17"> </a></span></div> -->
	<p align="center" class="copyright"><span class="style125">
        <span class="style127">Revised: Copyright @ 2009, &#3588;&#3603;&#3632;&#3626;&#3634;&#3608;&#3634;&#3619;&#3603;&#3626;&#3640;&#3586;&#3624;&#3634;&#3626;&#3605;&#3619;&#3660;, &#3617;&#3627;&#3634;&#3623;&#3636;&#3607;&#3618;&#3634;&#3621;&#3633;&#3618;&#3617;&#3627;&#3636;&#3604;&#3621;,   Webmaster.<br>
      420/1 &#3606;&#3609;&#3609;&#3619;&#3634;&#3594;&#3623;&#3636;&#3606;&#3637; &#3648;&#3586;&#3605;&#3619;&#3634;&#3594;&#3648;&#3607;&#3623;&#3637; &#3585;&#3619;&#3640;&#3591;&#3648;&#3607;&#3614;&#3631; 10400.&#3650;&#3607;&#3619; 0-2354-8543 </span></span></p>
	<div align="center"><a target="_blank" href="http://truehits.net/stat.php?id=s0028754"></a></div>
	<div align="center"><span class="style7">
      <!-- END WEBSTAT CODE -->
    </span>    </div>
    </div>
</div>
	<!--footer end -->
</div>
</body>
</html>
<?php
ob_end_flush();
?>