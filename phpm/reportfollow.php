<?php
session_start();
include("../admin/compcode/include/config.php");
include("../admin/compcode/include/connect_db.php");
include("../admin/compcode/include/function.php");

$mode=$_GET[mode];
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title><?php print $titlebar; ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link href="style.css" rel="stylesheet" type="text/css">
<link href="../admin/compcode/tool/css_text.css" rel="stylesheet" type="text/css">
</head>
<body>

<!-- ImageReady Slices (Untitled-1) -->
<table width="900" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td><img src="images/index_01.jpg" width="925" height="209" alt=""></td>
  </tr>
  <tr>
    <td><table width="926" border="0" cellspacing="0">
      <tr>
        <td background="images/index_04.jpg">&nbsp;</td>
        <td bgcolor="#FFFFFF">
        	<div id="navi3"><?php include("../inc/gotohome.html"); ?></div>
        </td>
        <td background="images/index_06.jpg">&nbsp;</td>
      </tr>
      <tr>
        <td background="images/index_04.jpg">&nbsp;</td>
        <td bgcolor="#FFFFFF">
        	<div id="content">
            	<fieldset>
                	<legend>รายงานการติดตามผลผลดำเนินโครงการ</legend>
                        <?php
						switch($mode){ 
							case "1" : include("../inc/reportfollow2.php"); break;
							default: include("../inc/reportfollow.php"); break;
						} 
						?>
                </fieldset>
            </div>
        </td>
        <td background="images/index_06.jpg">&nbsp;</td>
      </tr>
      <tr>
        <td width="55" background="images/index_04.jpg">&nbsp;</td>
        <td width="804" bgcolor="#FFFFFF">&nbsp;</td>
        <td width="61" background="images/index_06.jpg">&nbsp;</td>
      </tr>
      <tr>
        <td colspan="3" background="images/index_08.jpg">&nbsp;</td>
        </tr>
      <tr>
        <td colspan="3"><div align="center"><span class="style1">Revised: Copyright @ 2011, Faculty of Public Health, Mahidol University, Webmaster<br>
            <br>
          420/1 Ratchawithi RD., Ratchathewi District, Bangkok 10400. Thailand Tel: (+66) 0-2354-8543 <br>
  &#3588;&#3603;&#3632;&#3626;&#3634;&#3608;&#3634;&#3619;&#3603;&#3626;&#3640;&#3586;&#3624;&#3634;&#3626;&#3605;&#3619;&#3660;, &#3617;&#3627;&#3634;&#3623;&#3636;&#3607;&#3618;&#3634;&#3621;&#3633;&#3618;&#3617;&#3627;&#3636;&#3604;&#3621;, Webmaster. 420/1 &#3606;&#3609;&#3609;&#3619;&#3634;&#3594;&#3623;&#3636;&#3606;&#3637; &#3648;&#3586;&#3605;&#3619;&#3634;&#3594;&#3648;&#3607;&#3623;&#3637; &#3585;&#3619;&#3640;&#3591;&#3648;&#3607;&#3614;&#3631; 10400.&#3650;&#3607;&#3619; 0-2354-8543</span></div></td>
      </tr>
    </table></td>
  </tr>
</table>
<!-- End ImageReady Slices -->
</body>
</html>