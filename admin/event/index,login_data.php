<table width="100%" border="0" cellspacing="0" cellpadding="0" align="center">
<form action="login.php" method="post" name="login" enctype="multipart/form-data">
  <tr>
      <td align="left" valign="top" class="font14">
<strong>��س������ͺѭ�ռ����������ʼ�ҹ</strong><br>
<?
  if($error_msg != "")
  {
?>
	<br><font color="#CC0000"><b><? echo $error_msg ?></b></font><br><br>
<?
  }
?>
���ͺѭ�ռ����<br>
<input size=40 value="<? echo $login_username ?>" name="login_username"><br>
���ʼ�ҹ<br>
<input type=password size=40 name=login_password><br><br>
<input type="submit" value=" �������к� " name="set_twig_authenticated" style="background-color: #eeeeee; color: #000000; font-family: MS Sans Serif; font-size: 10pt">
<input type="hidden" name="action" value="true">
	</td>
  </tr>
</form>
</table>
