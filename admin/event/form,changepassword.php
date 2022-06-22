<?
session_start();
include"db.php";
$msg="";
if($Submit){
		if ($oldpass=="" or $newpass=="" or $newpass2=="") {
				$msg=$msg."Error : กรุณากรอกข้อมูลให้ครบนะครับ"; 
		}
		
		if ($oldpass!="" and $newpass!="" and $newpass2!=""){
				$sql2="select * from user where username='$username'";
				$result_member=mysql_db_query($sql2, $db);
				$object_member=mysql_fetch_array($result_member);
				$key=$object_member[password];
				if($oldpass != $key) {
						$msg=$msg."Error : รหัสผ่านเดิม ไม่ถูกต้องครับ";
				}else{
					if($newpass != $newpass2){
								$msg=$msg.("รหัสผ่านใหม่ และ ยืนยันรหัสผ่านใหม่ ไม่ตรงกัน"); 
					}else{
								$sql3="update user set  password='$newpass' where username='$username' ";
								$result3=mysql_db_query($sql3,$link);
								if ($result3) 
								{
										$msg=$msg."เปลี่ยนรหัสผ่านเรียบร้อยแล้วครับ";
										echo"<meta http-equiv='refresh' content='3;URL=logout_oc.php'>";
								} 
								else 
								{
										$msg=$msg."ไม่สามารถเปลี่ยนรหัสผ่านได้";
								}
						}
				}
		} 
}
?>
<TITLE>Member ระบบสมาชิก</TITLE><meta http-equiv="Content-Type" content="text/html; charset=windows-874">
<link href="style.css" rel="stylesheet" type="text/css">
<TABLE width="100%" border="0">
  <FORM ACTION="form,changepassword.php" METHOD=POST enctype="multipart/form-data">
        <TR>
          <TD class="fontalert" align="center"><?php echo $msg; ?></TD>
        </TR>
        <TR>
          <TD class="font14">รหัสผ่านเดิม :       </TD>
    </TR>
        <TR>
          <TD><INPUT name="oldpass" type="password" size="40" class="puttext"></TD>
    </TR>
        <TR>
          <TD class="font14"> รหัสผ่านใหม่ :       </TD>
    </TR>
        <TR>
          <TD><INPUT name="newpass" type="password" size="40" class="puttext"></TD>
    </TR>
        <TR>
          <TD class="font14">ยืนยันรหัสผ่านใหม่ :      </TD>
    </TR>
        <TR>
          <TD><INPUT name="newpass2" type="password" size="40" class="puttext"></TD>
    </TR>
        <TR>
          <TD class='font14'><INPUT name="Submit" TYPE="Submit" VALUE="&nbsp;&nbsp;แก้ไข&nbsp;&nbsp;" class="over"></TD>
    </TR>
</form>
  </TABLE>
