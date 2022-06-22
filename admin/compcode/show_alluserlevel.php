<?
session_start();
//include "include/config.php";
?>

<?  
/*if(check_admin($authuser))
	chack_menu($authuser);
else 
	chack_menu($authuser);*/
?>
<link href="tool/css_text.css" rel="stylesheet" type="text/css">

<body bgcolor="#5c7094" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
<br>
<br>
<table width="500" border="0" align="center"></table>
<form name="userlevel" method="post" action="compcode/load_userlevel.php">
<table width="500" border="0" align="center" cellpadding="0" cellspacing="0" bordercolor="#CCCCCC">
<!--<tr>
    <td width="20"  bgcolor="#7490C5"><img src="Img/icons_new.gif"></td>
    <td width="173"  bgcolor="#7490C5" ><div align="center" class="boldWhite_14">ชื่อ</div></td>
	<td width="256"  bgcolor="#7490C5" ><div align="center" class="boldWhite_14">สังกัด</div></td>
	<td  width="77"  bgcolor="#7490C5">&nbsp;<span class="boldWhite_14">เลือก ระดับ </span></td>

  </tr> -->
<tr><td colspan="4" ><img src="compcode/picture/bar_leveladmin.jpg" /></td>
</tr>
<tr  >
  <td colspan="4" background="compcode/picture/bar07.jpg">&nbsp;</td>
</tr>




<?
 //echo"$pagetop"; 

	


$items = 10 ;
$sql = "select * from user  where  username='$user' && ministry_id='$key_id' ";
$exec=mysql_query($sql);
$swap=1;
$rs=mysql_fetch_array($exec);
			$statususer_name=$rs[username];
			$statusnames=$rs[names];
			$ministry_id =$rs[ministry_id ];
			$status_user =$rs[status_user ];
				$sql_1 = "select * from ministry_news  where  ministry_id ='$key_id '  ";
				$exec_1=mysql_query($sql_1);
				$rs_1=mysql_fetch_array($exec_1);
				$ministry_name =$rs_1[ministry_name];


//กำหนดค่าสลับการสีแถว
			/*if ( $swap ==  "1" )
			{
					$color = "#7490C5";
					$swap = "2";
			}
			else
			{
					$color = "#A4B8DE";
					$swap = "1";
			}*/
			//กำหนดค่าสลับการสีแถว
?>
  <tr   bgcolor=""><input type='hidden' name='statususer_name'  value='<? echo"$statususer_name"; ?>'>
    <td width="19" background="compcode/picture/bar07.jpg" class="boldWhite_13">&nbsp;ชื่อ</td>
    <td width="138" background="compcode/picture/bar07.jpg" class="regWhite_13">&nbsp;&nbsp;<? echo"$statusnames";  ?></td>
	<td width="201" background="compcode/picture/bar07.jpg" class="regWhite_13"><span class="boldWhite_13">สังกัด </span>&nbsp; <? echo"	$ministry_name ";  ?></td>
	<td  width="142" background="compcode/picture/bar07.jpg"><span class="boldWhite_13">เลือกระดับ</span>	  <select name="status_userlevel">
	<option value='<? echo"$status_user";?>'><? echo"ระดับ  $status_user";?></option>
	<option value=admin>ระดับ admin</option>
	<option value=user>ระดับ  user</option>
	  </select>	  </td>

  </tr>
  
  
  <?


?>
<tr >
  <td colspan="4" align="center" background="compcode/picture/bar07.jpg">&nbsp;  </td>
</tr>
  <tr>
            <td colspan="4"  background="compcode/picture/bar07.jpg"><div align="center"> 
                <input class=button type="submit" name="submit" value="ตกลง">
                <input class=button type="reset" name="submit2" value="เคลียร์">
              </div></td>
    </tr>
		  
		    <tr> 
            <td colspan="4"><img src="compcode/picture/bar08.jpg" width="500"  height="6"></td>
          </tr>
</table> 
</form>
</body>
</html>
