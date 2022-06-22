<?php
#ob_start();
#session_start();
#$conn=mysql_connect("localhost","root","");
#mysql_select_db("phnews",$conn);
#mysql_query("set names tis620");
ob_start();
session_start();
include "compcode/include/config.php";
include"compcode/check_login.php";
$conn=connect_db("ph_web");
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
  <a href="../html2009/index.html"><img src="../html2009/images/logo.gif" alt="individual" width="286" height="66" border="0"></a>
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
            <li>แก้ไข Modules</li>
        </ul>
    </div>
    <div class="submenu2">
    	<ul>
        	<li><a href="#">รายการ Modules</a></li>
            <li><a href="#">เพิ่ม Modules</a></li>
        </ul>
    </div>
    <table width="100%" border="0" align="center" cellpadding="3" cellspacing="1" bordercolorlight="#9999cc" bordercolordark="White">
    <form action="#" method="post" enctype="multipart/form-data">
<tr bgcolor="#E0E3CE">
<th><div align="center" class="boldBlack_12">option</div></th>
    	<th class="boldBlack_12">Modules</th>
		<th class="boldBlack_12">รายละเอียด</th>
        <th class="boldBlack_12">Link</th>
        </tr>
<?
$sql="select * from menu";
$exec=mysql_query($sql);
$swap=1;
while($rs=mysql_fetch_array($exec))
			{
			if($login=="1"){
				$login="Yes";
			}else{
				$login="No";
			}
			//กำหนดค่าสลับการสีแถว
			if ( $swap ==  "1" )
			{
					$color = "#99CEF9";
					$swap = "2";
			}
			else
			{
					$color = "#EEEEEE";
					$swap = "1";
			}
			//กำหนดค่าสลับการสีแถว
?>
<tr   bgcolor=<? echo "$color"; ?>>
<td bgcolor="<? echo "$color"; ?>" align="center" valign="top"><A HREF=#?key_id=<?php echo $rs["id"]; ?> title="แก้ไข"><img src="compcode/img/botton_edit.gif"  border="0" width="19" height="19"></a> <A HREF="#?key_id=<? echo $rs["id"]; ?>" onClick="return confirm('คุณแน่ใจว่าต้องการจะลบข้อมูล')" title="ลบ"><img src="compcode/Img/botton_delete.gif"   border="0"width="22" height="20"></a></td>
   	 	<td bgcolor="<? echo "$color"; ?>" class="regBlack_12" valign="top"><input type="text" value="<?php echo $rs["name"]; ?>" size="25" maxlength="255" /></td>
		<td bgcolor="<? echo "$color"; ?>" class="regBlack_12"><textarea name="" cols="30" rows="3" wrap="virtual"><? echo $rs["alias"];  ?></textarea></td>
        <td class="regBlack_12" valign="top"><input type="text" value="<?php echo $rs["link"]; ?>" size="25" maxlength="255" /></td>
 </tr>
  <?
}
?>
</form>
</table>
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