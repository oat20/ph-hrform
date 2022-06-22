<!doctype html>
<?php
ob_start(); 
/*require_once("include/header.php");
require_once("include/function.php");*/
//header_html("ผู้ดูแลระบบ");
?>
<link href="tool/css_text.css" rel="stylesheet" type="text/css">
<body bgcolor="#000033" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
<table width="780" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td><img src="img/baner-most.jpg" alt="baner-most" width="1004" height="122"></td>
  </tr>
    <tr>
    <td height="10">&nbsp;</td>
  </tr>
  <tr>
    <td></td>
  </tr>
</table>
<br>

<form action="admin.php" method="post">
<table width="280" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr> 
            <td colspan="2">&nbsp;</td>
          </tr>
		  <tr> 
            <td colspan="2">&nbsp;</td>
          </tr>
		  <tr> 
            <td colspan="2" align="center"><font color="#FFFFFF" size="2"><strong>หน้าจอล๊อกอินเข้าสู่ผู้ดูแลระบบ.</strong></font></td>
          </tr>
		  <tr> 
            <td colspan="2">&nbsp;</td>
          </tr>
          <tr> 
            <td colspan="2"><img src="picture/bar03.jpg" width="280" height="18"></td>
          </tr>
          <tr> 
            <td background="picture/bar07.jpg"> <div align="right"><strong><span class="regWhite_13">ชื่อผู้ใช้ : </span><font color="#FFFFFF">&nbsp;</font></strong></div></td>
            <td height="25" background="picture/bar07.jpg"> <input name="username"  id="username" size="18" maxlength="18">
            <font color="#FF0000"><strong>*</strong></font>             </td>
          </tr>
          <tr> 
            <td background="picture/bar07.jpg"><div align="right"><font color="#FFFFFF" size="2" face="Ms Sans serif" class="boldWhite_13">รหัสผ่าน : </font>&nbsp;</div></td>
            <td background="picture/bar07.jpg"><input name="password" type="password" id="password" size="18" maxlength="18">
              <font color="#FF0000"><strong>*</strong></font></td>
          </tr>
          <tr> 
            <td colspan="2" background="picture/bar07.jpg">&nbsp;<strong><font color="#FF0000"><br>
            </font></strong></td>
          </tr>
          <tr> 
            <td colspan="2"  background="picture/bar07.jpg"><div align="center"> 
                <input class="button" type="submit" name="submit" value="ตกลง">
                <input class="button" type="reset" name="submit2" value="เคลียร์">
              </div></td>
          </tr>
          <tr> 
            <td colspan="2"><img src="picture/bar08.jpg" width="280" height="6"></td>
          </tr>
          <tr> 
            <td colspan="2">&nbsp;</td>
          </tr>
        </table>
		  </form>
<?

//echo"$username   $password";
	//require_once("file:///C|/Documents%20and%20Settings/mljeed/Desktop/KumpeePHP/include/footer.php");
?>
