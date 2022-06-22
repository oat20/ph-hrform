<!doctype html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<? session_start(); 

?>
<? //if(check_admin($authuser))//+++++++++++++ function  chack สถานะผู้ดูแลระบบ+++++++
//	{
	
//  header_admin(); ?>
    <script language="javascript" type="text/javascript">
function checkval(form) 
{
  		if (form.names.value == "") 
		{
       			alert("กรุณาใส่ข้อมูล ชื่อผู้ใช้");
          		form.names.focus();
          		return false;
        }
  
  		if (form.ministry_id.value == "") 
		{
       			alert("กรุณาเลือกสังกัด");
          		form.ministry_id.focus();
          		return false;
        }
		
				if (form.user_n.value == "") 
		{
       			alert("กรุณาใส่ข้อมูล  username");
          		form.user_n.focus();
          		return false;
        }
					if (form.password1.value == "") 
		{
       			alert("กรุณาใส่ข้อมูล  password");
          		form.password1.focus();
          		return false;
        }
					if (form.password2.value == "") 
		{
       			alert("กรุณาใส่ข้อมูล  re_password");
          		form.password2.focus();
          		return false;
        }
		//form.day.disabled = false;
		//form.month.disabled = false;
		//form.year.disabled = false;
}


</script>
<!-- <link href="tool/css_text.css" rel="stylesheet" type="text/css">
 --><body bgcolor="" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
<form name="adduser" action="default,warning.php" method="post" enctype="multipart/form-data" onSubmit="return checkval(this)">

<table cellpadding="3" cellspacing="0">
<tr  >
  <td colspan="2"><div align="center" class="boldWhite_16"><img src="compcode/picture/bar_addmin.jpg" width="400" height="18"></div></td>
  </tr>
<tr  bgcolor="#5681ac">
  <td background="compcode/picture/bar07.jpg">&nbsp;</td>
  <td background="compcode/picture/bar07.jpg">&nbsp;</td>
</tr>
<tr   >
<td class="regWhite_13" background="compcode/picture/bar07.jpg">ชื่อ:</td>
<td background="compcode/picture/bar07.jpg"><input name="names" type="text" size="60" maxlength="100"></td>
</tr>

<tr >
  <td  class="regWhite_13" background="compcode/picture/bar07.jpg">นามสกุล:</td>
  <td  background="compcode/picture/bar07.jpg"><input name="names" type="text" size="60" maxlength="100"></td>
</tr>
<tr >
  <td  class="regWhite_13" background="compcode/picture/bar07.jpg">ภาควิชา/ส่วนงาน:</td>
  <td  background="compcode/picture/bar07.jpg">
  	<select name="">
  		<option></option>
  	</select>
   </td>
</tr>
<tr >
  <td  class="regWhite_13" background="compcode/picture/bar07.jpg">Email:</td>
  <td  background="compcode/picture/bar07.jpg"><input name="names2" type="text" size="60" maxlength="100"></td>
</tr>
<!--<tr >
<td  class="regWhite_13" background="compcode/picture/bar07.jpg">Useraname
      :</td>
<td  background="compcode/picture/bar07.jpg"><input name="user_n" type="text" size="50"> </td>
</tr>

<tr  >
<td  class="regWhite_13" background="compcode/picture/bar07.jpg"><font face="Ms Sans serif">Password
      : </font></td>
<td background="compcode/picture/bar07.jpg"><input name="password1" type="password" size="50"> </td>
</tr>

<tr >
<td class="regWhite_13" background="compcode/picture/bar07.jpg">Confirm Password
      :</td>
<td background="compcode/picture/bar07.jpg"><input name="password2" type="password" size="50"> </td>
</tr> -->

<tr >
  <td background="compcode/picture/bar07.jpg">สิทธิ์การใช้งาน:</td>
  <td></td>
</tr>
  <tr>
            <td colspan="2"  background="compcode/picture/bar07.jpg">
                <input class="button" type="submit" name="submit" value="แก้ไข">
                <input class="button" type="button" name="submit2" value="ยกเลิก" onClick="location.href='admin.php'">              </td>
    </tr>
</table>
</form>
<?
/*}

else
{
echo"    ";

}*/

?>