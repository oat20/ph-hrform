<?
session_start();
include"db.php";
$msg="";
if($Submit){
		if ($oldpass=="" or $newpass=="" or $newpass2=="") {
				$msg=$msg."Error : ��سҡ�͡���������ú�Ф�Ѻ"; 
		}
		
		if ($oldpass!="" and $newpass!="" and $newpass2!=""){
				$sql2="select * from user where username='$username'";
				$result_member=mysql_db_query($sql2, $db);
				$object_member=mysql_fetch_array($result_member);
				$key=$object_member[password];
				if($oldpass != $key) {
						$msg=$msg."Error : ���ʼ�ҹ��� ���١��ͧ��Ѻ";
				}else{
					if($newpass != $newpass2){
								$msg=$msg.("���ʼ�ҹ���� ��� �׹�ѹ���ʼ�ҹ���� ���ç�ѹ"); 
					}else{
								$sql3="update user set  password='$newpass' where username='$username' ";
								$result3=mysql_db_query($sql3,$link);
								if ($result3) 
								{
										$msg=$msg."����¹���ʼ�ҹ���º�������Ǥ�Ѻ";
										echo"<meta http-equiv='refresh' content='3;URL=logout_oc.php'>";
								} 
								else 
								{
										$msg=$msg."�������ö����¹���ʼ�ҹ��";
								}
						}
				}
		} 
}
?>
<TITLE>Member �к���Ҫԡ</TITLE><meta http-equiv="Content-Type" content="text/html; charset=windows-874">
<link href="style.css" rel="stylesheet" type="text/css">
<TABLE width="100%" border="0">
  <FORM ACTION="form,changepassword.php" METHOD=POST enctype="multipart/form-data">
        <TR>
          <TD class="fontalert" align="center"><?php echo $msg; ?></TD>
        </TR>
        <TR>
          <TD class="font14">���ʼ�ҹ��� :       </TD>
    </TR>
        <TR>
          <TD><INPUT name="oldpass" type="password" size="40" class="puttext"></TD>
    </TR>
        <TR>
          <TD class="font14"> ���ʼ�ҹ���� :       </TD>
    </TR>
        <TR>
          <TD><INPUT name="newpass" type="password" size="40" class="puttext"></TD>
    </TR>
        <TR>
          <TD class="font14">�׹�ѹ���ʼ�ҹ���� :      </TD>
    </TR>
        <TR>
          <TD><INPUT name="newpass2" type="password" size="40" class="puttext"></TD>
    </TR>
        <TR>
          <TD class='font14'><INPUT name="Submit" TYPE="Submit" VALUE="&nbsp;&nbsp;���&nbsp;&nbsp;" class="over"></TD>
    </TR>
</form>
  </TABLE>
