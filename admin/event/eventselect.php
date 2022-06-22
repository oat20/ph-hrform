<? session_start(); 
require_once("db.php");
include"check.php";
		if (isset($HTTP_GET_VARS['id']))
		{
		$q4="delete from calendar_events where id='$id'";
		$re4=mysql_query($q4, $handle) or die("Error".mysql_error());
				if($re4)
				{
						echo "<meta http-equiv='refresh' content=0;url=index1.php>";
				}
		}
		
		function renHTML($strTemp) {
  $strTemp = nl2br(htmlspecialchars($strTemp));
  return $strTemp;
}
?>
<meta http-equiv="Content-Type" content="text/html; charset=windows-874">
<link href="../style/default.css" type="text/css" rel="stylesheet">
<script language="JavaScript" type="text/JavaScript">
<!--
function MM_openBrWindow(theURL,winName,features) { //v2.0
  window.open(theURL,winName,features);
}
//-->
</script>

<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr>
<td bgcolor="#000000">
<table width="100%" border="0" cellpadding="3" cellspacing="1" bordercolor="#CCCCCC">
  <tr bgcolor="#FFFFCC">
  <td width="7%" class="fonttitle"><div align="center">เวลา</div></td>
    <td width="40%" align="center" class="fonttitle" width="50%">กิจกรรม</td>
   <td width="18%" align="center" class="fonttitle">สถานที่</td>
    <td width="13%" align="center" class="fonttitle">ผู้รับผิดชอบ</td>
    <td width="12%" align="center" class="fonttitle">เบอร์โทรศัพท์</td>
    <td width="10%" align="center" class="fonttitle">แก้ไข / ลบ</td>
  </tr>
  <?
			$now_stamp=$year.'-'.$month.'-'.$day;	
			$sql="select * from calendar_events
			where startdate='$now_stamp'
			order by starttime asc";
			$exec=mysql_query($sql,$db);
			$swap=1;
			while($rs=mysql_fetch_array($exec)){
				$status=$rs[status]; 
				//กำหนดค่าสลับการสีแถว
				if ( $swap ==  "1" ){
					$color = "#cccccc";
					$swap = "2";
				}else{
					$color = "#ffffcc";
					$swap = "1";
				}
				//กำหนดค่าสลับการสีแถว 
				if($status=="disable"){ 
				$disable="ยกเลิก"; 
				}else{
				$disable="";
				} 
				?>
  <tr bgcolor=<? echo $color ?>>
  <td valign="top" class="font14"><? echo $rs[starttime]; ?> น.</td>
      <td valign="top" class="font14"><? echo nl2br(htmlspecialchars($rs[activity])); ?>&nbsp;&nbsp;<? echo $disable; ?></td>
<td valign="top" class="font14"><? echo nl2br(htmlspecialchars($rs[location])); ?></td>
  <td valign="top" class="font14"><? echo nl2br(htmlspecialchars($rs[responsible])); ?></td>
  <td valign="top" class="font14"><? echo $rs[tel]; ?></td>
  <td valign="top" align="center"><a href="index,editactivity.php?keyid=<? echo $rs[id]; ?>"><img src="../img/botton_edit.gif" width="20" height="20" alt="แก้ไข" border="0"></a> / <a href="delevent.php?id_del=<? echo $rs[id]; ?>" onclick="return confirm('ต้องการลบ <? echo $rs[activity]; ?> หรือไม่')"><img src="../img/bin.gif" alt="ลบ" border="0"></a></td>
  </tr>
  <?
  }
  ?>
</table>
</td>
</tr>
</table>

