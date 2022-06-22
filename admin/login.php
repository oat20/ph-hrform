<?php
#ob_start();
#session_start();
#$conn=mysql_connect("localhost","root","");
#mysql_select_db("phnews",$conn);
#mysql_query("set names tis620");
ob_start();
session_start();
include "compcode/include/config.php";
include('compcode/include/connect_db.php');
//$conn=connect_db("utf8");
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>คณะสาธารณสุขศาสตร์ มหาวิทยาลัยมหิดล</title>
<style type="text/css">
<!--
.style125 {
	color: #666666;
	font-size: 8pt;
}
.style127 {
	font-size: 8pt;
	color: #FFFF66;
}
.style7 {
	color: #49596A;
	font-size: 10pt;
	padding: 3px;
	font-family: verdana, arial, tahoma;
	font-weight: bold;
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
	font-size: 12pt;
	font-weight: bolder;
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
  	<form action="compcode/admin.php" method="post" enctype="multipart/form-data">
<table border="0" align="center" cellpadding="3" cellspacing="0">
	<tr>
    	<td colspan="2">&nbsp;</td>
    </tr>
		  <tr> 
            <td colspan="2" align="center"><span class="style17">ล๊อกอินเข้าสู่ผู้ดูแลระบบ</span></td>
        </tr>
		  <tr> 
            <td colspan="2">&nbsp;</td>
          </tr>
          <tr> 
            <td background="compcode/picture/bar07.jpg"></td>
            <td height="25" background="compcode/picture/bar07.jpg"><label class="boldWhite_13">ชื่อผู้ใช้ :</label>
            <br/>
            <input name="username" maxlength="20" type="text" size="30" class="style7" />            </td>
          </tr>
          <tr> 
            <td background="compcode/picture/bar07.jpg"></td>
            <td background="compcode/picture/bar07.jpg"><lable class="boldWhite_13">รหัสผ่าน :</label>
            <br/>
            <input name="password" type="password" size="30" maxlength="20" class="style7" />              </td>
          </tr>
          <tr> 
            <td colspan="2" background="compcode/picture/bar07.jpg">&nbsp;<strong><font color="#FF0000"><br>
            </font></strong></td>
          </tr>
          <tr> 
            <td colspan="2"  background="compcode/picture/bar07.jpg"><div align="center"> 
                <input class=button type="submit" name="submit" value="เข้าสู่ระบบ">
                </div></td>
          </tr>
          <tr> 
            <td colspan="2">&nbsp;</td>
          </tr>
        </table>
    </form>
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