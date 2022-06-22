<? session_start();
$id_user=$_GET["id_user"]; 
//include "include/config.php";

?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=tis-620">
<!-- <link href="tool/css_text.css" rel="stylesheet" type="text/css">
 --><body bgcolor="#5c7094" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">

<?
//=================================================================
$conn = connect_db("ph_web");
include"compcode/load_status_admin.php";
if(!$conn)
echo "เกิดความผิดพลาดไม่สามารถติดต่อกับฐานข้อมูลได้";

//=======================++++ดึงชื่อของ admin ++++++=====================

$sql_a="select * from  admin 
where  u_id='$id_user'";
$exec_a= mysql_query($sql_a);
$rs_a=mysql_fetch_array($exec_a) ;
$name=$rs_a[names];
$username=$rs_a["username"];
  ?>
  <br/>
<table border="0" cellpadding="3" cellspacing="0" background="compcode/picture/bar07.jpg">
<tr><td colspan="4" background="compcode/picture/bar_null.jpg"><div align="center" class="boldWhite_13">กำหนดสิทธิ์ผู้ดูแลระบบ</span></div></td>
</tr>
  <tr >
    <td><br>
	<table width="100%" border="0" align="center"  cellpadding="0" cellspacing="0" background="compcode/picture/bar07.jpg">
      <tr  >
        <td colspan="2" background="compcode/picture/bar07.jpg" ><span class="regWhite_16">ผู้ใช้</span>&nbsp;&nbsp;<span class="boldWhite_16"><? echo"$name"; ?></span></td>
      </tr>
      <!--<tr >
        <td background="compcode/picture/bar07.jpg">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="boldWhite_13">ล๊อกอิน </span>&nbsp;&nbsp;&nbsp;&nbsp;<span class="regWhite_13"><? #echo $rs_a["username"]; ?></span></td>
      </tr> -->
    </table>
    <br/>
    <table border="0">
      <tr>
        <td valign="top">
        	<fieldset>
        	<legend class="boldWhite_14">สิทธิ์</legend>
            <table border="0" cellpadding="3">
            <?php
				$sql="select * from admin_status, menu
				where admin_status.username='$username' and admin_status.m_id=menu.id
				order by menu.ordering asc";
				$rs=mysql_query($sql);
				while($ob=mysql_fetch_array($rs)){
			?>
       	  <tr>
                	<td><a href="compcode/del_permission.php?username=<?php echo $username; ?>&m_id=<?php echo $ob["m_id"]; ?>" title="ถอนสิทธิ์" onClick="return confirm('คุณแน่ใจว่าต้องการถอนสิทธิ์นี้')"><img src="compcode/Img/botton_delete.gif"   border="0"width="22" height="20"></a ></td>
                    <td class='regWhite_13'><?php echo $ob["name"]; ?></td>
                </tr>
               <?php
			   	}
			   ?>
            </table>
            </fieldset>
        </td>
        <td width="20">&nbsp;</td>
        <td>
        	<fieldset>
        	<legend class="boldWhite_14">กำหนดสิทธิ์</legend>
        	<form name="form1" method="post" action="admin.php?mode=permission">
<table width="100%"  border="0" align="center" cellpadding="3" background="compcode/picture/bar07.jpg">
<input type='hidden' name='user' value='<? echo"$username"; ?>'>
  <?
	$sql_fix= "SELECT * FROM menu  
	order by ordering asc";
	$exec_fix= mysql_query($sql_fix);	
	  While($rs_fix=mysql_fetch_array($exec_fix) )
			{	
	?>
						<tr>  
							<td align='light'  class='regWhite_13' background=compcode/picture/bar07.jpg><input type='checkbox' name='m_id[]' value= '<?php echo $rs_fix["id"]; ?>'></td>
                            <td class='regWhite_13'><?php echo $rs_fix["name"]; ?></td>
			</tr>
            <?php
 }
?>

<tr>
            <td colspan="2"  background="compcode/picture/bar07.jpg">
                <input class=button type="submit" name="Submit" value="เพิ่มสิทธิ์">
              </td>
    </tr> 
    </table>
    </form>
    </fieldset>
        </td>
      </tr>
    </table>
    <br>
		  </table>
<?
/*}

else
{
echo"    ";

}
*/
?>
</body>
</html>




