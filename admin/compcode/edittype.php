<?
   include"../connect.php";
	if ( $Submit == "แก้ไข" )
	{
  			$sql1 = "UPDATE type_news   SET name_type='$insert' WHERE id_type='$id_type'";
			mysql_query( $sql1, $link);
			
			mysql_close();
			$msg = $msg . "<font color=blue>การแก้ไขเรียบร้อย</font>";
	}
echo "$maxt";

?>
<? 

$sql="Select * From type_news where id_type='$id_type'";
 $result = mysql_query($sql,$link);
 $rs = mysql_fetch_array( $result );
 $name_type=$rs[name_type];
echo"$msg";
?>
<? echo"$rs[cate_name]" ;
?>
<link href="../style/compbasic.css" rel="stylesheet" type="text/css">

<form action="edittype.php?id_type=<?php echo $id_type; ?>" method="post" enctype="multipart/form-data" name="edittype">
<br>
<br>
  <CENTER><table width="400" border="3" cellpadding="0"cellspacing="0" bordercolor="#FFFFFF" bgcolor="#FFFFFF">
    <tr >
	<td>
	<table width="400" border="0" cellpadding="5"cellspacing="0" bordercolor="" bgcolor="#FFFFFF">
    <tr bgcolor="#FFFFFF">
      <td colspan="2"><div align="center" class="titlebold"><b>ข้อมูลประเภทข่าวที่ต้องการแก้ไข</b></div></td>
    </tr>
    <tr>
     <td width="104"><div align="right" class="smalltext">รายชื่อประเภทข่าว</div></td>
      <td width="276" align="left"><input name="insert" type="text"value="<? echo $name_type ?>" size="30"></td>
    </tr>
    <tr bgcolor=#FFFFFF>
      <td colspan="2"><div align="center">
        <input type="submit" name="Submit" value="แก้ไข">
        <input type="reset" name="Submit2" value="ยกเลิก">
      </div></td>
    </tr>
  </table>
  </td>
  </tr>
  </table>
    <p>&nbsp;</p>
  </CENTER>
</form>
<CENTER>
</CENTER>
