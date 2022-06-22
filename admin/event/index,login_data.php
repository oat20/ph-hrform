<table width="100%" border="0" cellspacing="0" cellpadding="0" align="center">
<form action="login.php" method="post" name="login" enctype="multipart/form-data">
  <tr>
      <td align="left" valign="top" class="font14">
<strong>กรุณาใส่ชื่อบัญชีผู้ใช้และรหัสผ่าน</strong><br>
<?
  if($error_msg != "")
  {
?>
	<br><font color="#CC0000"><b><? echo $error_msg ?></b></font><br><br>
<?
  }
?>
ชื่อบัญชีผู้ใช้<br>
<input size=40 value="<? echo $login_username ?>" name="login_username"><br>
รหัสผ่าน<br>
<input type=password size=40 name=login_password><br><br>
<input type="submit" value=" เข้าสู่ระบบ " name="set_twig_authenticated" style="background-color: #eeeeee; color: #000000; font-family: MS Sans Serif; font-size: 10pt">
<input type="hidden" name="action" value="true">
	</td>
  </tr>
</form>
</table>
