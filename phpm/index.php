<?php
ob_start();
session_start();
include("../admin/compcode/include/config.php");
include("../admin/compcode/include/connect_db.php");
include("../admin/compcode/check_login.php");
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="keywords" content="<?=$titlebar;?>">
<title><?=$titlebar;?></title>
<script type="text/javascript">
<!--
function MM_swapImgRestore() { //v3.0
  var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
}

function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}

function MM_findObj(n, d) { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}

function MM_swapImage() { //v3.0
  var i,j=0,x,a=MM_swapImage.arguments; document.MM_sr=new Array; for(i=0;i<(a.length-2);i+=3)
   if ((x=MM_findObj(a[i]))!=null){document.MM_sr[j++]=x; if(!x.oSrc) x.oSrc=x.src; x.src=a[i+2];}
}
//-->
</script>
<link href="style.css" rel="stylesheet" type="text/css">
<link href="../admin/compcode/tool/css_text.css" rel="stylesheet" type="text/css">
</head>

<body onLoad="MM_preloadImages('images/icon01.gif')">
<table width="900" border="1" align="center" cellspacing="0" bgcolor="#FF9900">
	<tr>
    	<td background="images/head.png" height="120">&nbsp;</td>
    </tr>
  <tr>
    <td><table width="900" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td height="451" valign="top">
          <p>&nbsp;</p>
          <table width="700" border="1" align="center" cellpadding="10" bgcolor="#FFFFFF">
          <tr>
            <td height="0" class="regBlack_14">
            	<div id="content">
            <fieldset>
            	<legend>โครงการ</legend>
                <p><a href="myProject.php" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('Image1','','images/icon01.gif',1)"><img src="images/icon14.gif" name="Image1" width="22" height="16" hspace="10" vspace="0" border="0" align="middle" id="Image1">โครงการส่วนงาน</a></p>
            <p><a href="projectPresent.php" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('Image1','','images/icon01.gif',1)"><img src="images/icon14.gif" name="Image1" width="22" height="16" hspace="10" vspace="0" border="0" align="middle" id="Image1">&#3649;&#3610;&#3610;&#3615;&#3629;&#3619;&#3660;&#3617;ที่ 1 &#3648;&#3626;&#3609;&#3629;&#3650;&#3588;&#3619;&#3591;&#3585;&#3634;&#3619;&#3586;&#3629;&#3591;&#3588;&#3603;&#3632;&#3626;&#3634;&#3608;&#3634;&#3619;&#3603;&#3626;&#3640;&#3586;&#3624;&#3634;&#3626;&#3605;&#3619;&#3660;</a></p>
            <p><a href="#" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('Image3','','images/icon01.gif',0)"><img src="images/icon14.gif" name="Image3" width="22" height="16" hspace="10" border="0" align="middle" id="Image3"></a><a href="pa.php">&#3649;&#3610;&#3610;&#3615;&#3629;&#3619;&#3660;&#3617;&#3607;&#3637;&#3656; 2 &#3619;&#3634;&#3618;&#3591;&#3634;&#3609;&#3612;&#3621;&#3585;&#3634;&#3619;&#3604;&#3635;&#3648;&#3609;&#3636;&#3609;&#3591;&#3634;&#3609;&#3605;&#3634;&#3617; PA &#3619;&#3629;&#3610; 6 &#3648;&#3604;&#3639;&#3629;&#3609; &#3649;&#3621;&#3632; 12 &#3648;&#3604;&#3639;&#3629;&#3609; </a></p>
              <p><a href="#" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('Image2','','images/icon01.gif',1)"><img src="images/icon14.gif" name="Image2" width="22" height="16" hspace="10" vspace="0" border="0" align="left" id="Image2"></a><a href="follow.php">&#3649;&#3610;&#3610;&#3615;&#3629;&#3619;&#3660;&#3617;&#3607;&#3637;&#3656; 3 &#3651;&#3609;&#3619;&#3632;&#3610;&#3610; MUFIS</a></p>
              <p><a href="#" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('Image2','','images/icon01.gif',1)"><img src="images/icon14.gif" name="Image2" width="22" height="16" hspace="10" vspace="0" border="0" align="left" id="Image2"></a><a href="../document/manual.pdf" target="_blank">คู่มือการใช้</a></p>
              </fieldset>
              <br/>
              <fieldset>
              	<legend>รายงาน</legend>
              <!--<p><a href="reportfollow.php" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('Image3','','images/icon01.gif',0)"><img src="images/icon14.gif" name="Image4" width="22" height="16" hspace="10" border="0" align="middle" id="Image3">รายงานการติดตามผลการดำเนินงานโครงการ</a></p>
              <p><a href="report_pa.php" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('Image3','','images/icon01.gif',0)"><img src="images/icon14.gif" name="Image4" width="22" height="16" hspace="10" border="0" align="middle" id="Image3">รายงานผลการดำเนินงานตาม PA รอบ 6 เดือนและ 12 เดือน</a></p> -->
              <p><a href="<?=$livesite;?>report/reportUnitbyyear.php" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('Image3','','images/icon01.gif',0)"><img src="images/icon14.gif" name="Image4" width="22" height="16" hspace="10" border="0" align="middle" id="Image3">จำนวนโครงการตามปีงบประมาณ</a></p>
              <p><a href="report_by_strategic.php" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('Image3','','images/icon01.gif',0)"><img src="images/icon14.gif" name="Image4" width="22" height="16" hspace="10" border="0" align="middle" id="Image3">รายงานโครงการตามยุทธศาสตร์</a></p>
              <p><a href="report_by_org.php" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('Image3','','images/icon01.gif',0)"><img src="images/icon14.gif" name="Image4" width="22" height="16" hspace="10" border="0" align="middle" id="Image3">รายงานโครงการตามส่วนงาน</a></p>
              </fieldset>
              
              <?php
			  if($_SESSION["per_type"]==22222){
			  ?>
              <br/>
              <fieldset>
              	<legend>ผู้ดูแลระบบ</legend>
              </fieldset>
              <?php
			  }
			  ?>
              
              <p><a href="../profile/profile.php" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('Image3','','images/icon01.gif',0)"><img src="images/icon14.gif" name="Image4" width="22" height="16" hspace="10" border="0" align="middle" id="Image3">แก้ไขข้อมูลส่วนตัว</a></p>
              <p><a href="../admin/compcode/logout_admin.php" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('Image3','','images/icon01.gif',0)" onClick="return confirm('ยืนยันออกจากระบบ');"><img src="images/icon14.gif" name="Image4" width="22" height="16" hspace="10" border="0" align="middle" id="Image3">ออกจากระบบ</a></p>
              	</div>
              </td>
          </tr>
        </table>
          <div align="center"></div></td>
      </tr>
      <tr>
        <td><div align="center"><span class="style1"><br>
          Revised: Copyright @ 2011, Faculty of Public Health, Mahidol University, Webmaster<br>
                <br>
          420/1 Ratchawithi RD., Ratchathewi District, Bangkok 10400. Thailand Tel: (+66) 0-2354-8543 <br>
  &#3588;&#3603;&#3632;&#3626;&#3634;&#3608;&#3634;&#3619;&#3603;&#3626;&#3640;&#3586;&#3624;&#3634;&#3626;&#3605;&#3619;&#3660;, &#3617;&#3627;&#3634;&#3623;&#3636;&#3607;&#3618;&#3634;&#3621;&#3633;&#3618;&#3617;&#3627;&#3636;&#3604;&#3621;, Webmaster. 420/1 &#3606;&#3609;&#3609;&#3619;&#3634;&#3594;&#3623;&#3636;&#3606;&#3637; &#3648;&#3586;&#3605;&#3619;&#3634;&#3594;&#3648;&#3607;&#3623;&#3637; &#3585;&#3619;&#3640;&#3591;&#3648;&#3607;&#3614;&#3631; 10400.&#3650;&#3607;&#3619; 0-2354-8543</span></div>
          <br></td>
      </tr>
    </table></td>
  </tr>
</table>
<?php
include("../inc/googleAnaly.php");
include("../inc/truehit.php");
ob_end_flush();
?>
</body>
</html>
