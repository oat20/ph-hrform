<?php
session_start();
include("../admin/compcode/include/config.php");
include("../admin/compcode/include/connect_db.php");
include("../admin/compcode/include/function.php");

$f=$_GET[f];
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>&#3600;&#3634;&#3609;&#3586;&#3657;&#3629;&#3617;&#3641;&#3621;&#3610;&#3619;&#3636;&#3627;&#3634;&#3619;&#3650;&#3588;&#3619;&#3591;&#3585;&#3634;&#3619; &#3588;&#3603;&#3632;&#3626;&#3634;&#3608;&#3634;&#3619;&#3603;&#3626;&#3640;&#3586;&#3624;&#3634;&#3626;&#3605;&#3619;&#3660; &#3617;&#3627;&#3634;&#3623;&#3636;&#3607;&#3618;&#3634;&#3621;&#3633;&#3618;&#3617;&#3627;&#3636;&#3604;</title>
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
    <td><table width="900" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td valign="top" background="images/page1.jpg">
        <p>&nbsp;</p>
          <p>&nbsp;</p>
          <p>&nbsp;</p>
          <p>&nbsp;</p>
          <div id="nagiv"><a href="index.html">หน้าหลัก</a> > เสนอโครงการประจำปี</div>
          <div id="content">
          
          	<?php 
		   		include("../admin/compcode/form_19.php");
			?>
          </div>
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
</body>
</html>
