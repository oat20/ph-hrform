<form action="" method="post">
<fieldset>
<legend>เปลี่ยนรหัสผ่าน</legend>
<table>
<TR   background="compcode/picture/bar07.jpg">
      <TD colspan="2" background="compcode/picture/bar07.jpg" class="tdpadding"><span class="regRed_14"><?php echo $msg2; ?></span></TD>
    </TR>
    <TR   background="compcode/picture/bar07.jpg"> 
      <TD background="compcode/picture/bar07.jpg" class="tdpadding">รหัสผ่านเดิม:</TD>
      <TD background="compcode/picture/bar07.jpg" class="tdpadding"><input name="oldpass" type="password" size="100" maxlength="10">      </TD>
    </TR>
    <TR> 
      <TD background="compcode/picture/bar07.jpg" class="tdpadding"><span>รหัสผ่านใหม่: </span></TD>
      <TD background="compcode/picture/bar07.jpg" class="tdpadding"><INPUT name="newpass" type="password" size="100" maxlength="10"></TD>
    </TR>
    <TR > 
      <TD background="compcode/picture/bar07.jpg" class="tdpadding">ยืนยันรหัสผ่านใหม่:</TD>
      <TD background="compcode/picture/bar07.jpg" class="tdpadding"><INPUT name="newpass2" type="password" size="100" maxlength="10"></TD>
    </TR>
    <tr>
            <td colspan="2"  background="compcode/picture/bar07.jpg" class="tdpadding">
            	<input type="hidden" name="username" value="<?php echo $rs_b["username"]; ?>" />
                <input class=buttonn type="submit" name="changepw" value="เปลี่ยนรหัสผ่าน" id="changepw">
                <!--<input class=button type="reset" name="submit2" value="������"> -->              </td>
          </tr>
</table>
</fieldset>
</form>