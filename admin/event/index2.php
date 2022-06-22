<? session_start();
if($user==""){ 
	header("location: login_oc.php");
} 
$serverpath="";
$levelpath="../";
?>
<link href="../style/default.css" rel="stylesheet" type="text/css"> 
<body leftmargin="0" topmargin="0">
<table width="950" border="0" align="center" cellpadding="5" cellspacing="0">
  <tr>
    <td background="../img/index4.jpg"><? require'menu.php'; ?></td>
    <td align="right" background="../img/index4.jpg"><? //require'form,search_data.php'; ?></td>
  </tr>
</table>
  <table width="950" border="0" cellpadding="0" cellspacing="0" align="center">
  <tr>
    <td height="5" colspan="2" background="../img/background.jpg"></td>
  </tr>
</table>

<table width="950" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td align="center" valign="top">&nbsp;</td>
    <td align="center" valign="top">&nbsp;</td>
    <td align="center" valign="top">&nbsp;</td>
  </tr>
  <tr>
    <td width="200" align="center" valign="top"><? require'index,calendar.php'; ?></td>
    <td width="5" align="center" valign="top">&nbsp;</td>
    <td align="center" valign="top"><? require'eventselect_comp.php'; ?></td>
  </tr>
  <tr>
    <td valign="top" align="center">&nbsp;</td>
    <td valign="top" align="center">&nbsp;</td>
    <td valign="top" align="center">&nbsp;</td>
  </tr>
</table>
 <table width="950" border="0" cellpadding="0" cellspacing="0" align="center">
  <tr>
    <td background="../img/index4.jpg" height="1"></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
</table>