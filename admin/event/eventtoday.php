<? session_start(); 
#require_once("db.php");
#include"check.php";
function renHTML($strTemp) {
  $strTemp = nl2br(htmlspecialchars($strTemp));
  return $strTemp;
}		
?>
<meta http-equiv="Content-Type" content="text/html; charset=windows-874">
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr>
<td bgcolor="#000000">
<table width="100%" border="0" cellpadding="3" cellspacing="1" bordercolor="#CCCCCC">
	<tr bgcolor="#FFFFCC">
    	<th align="center" class="boldBlack_12">option</th>
		<th  align="center" class="boldBlack_12">����ͧ</th>
		<th align="center" class="boldBlack_12">ʶҹ���</th>
		<th align="center" class="boldBlack_12">����Ѻ�Դ�ͺ/���Դ���</th>
        <th class="boldBlack_12">�ѹ/��͹/��</th>
	</tr>
  <?
			#$today=date("Y-m-d");
			#$sql="select * from events
			#where startdate='$today'
			#order by starttime asc";
			$sql="select * from events
			order by startdate desc";
			$exec=mysql_query($sql,$conn);
			$swap=1;
			while($rs=mysql_fetch_array($exec)){
				$status=$rs[status]; 
				//��˹������Ѻ�������
				if ( $swap ==  "1" ){
					$color = "#cccccc";
					$swap = "2";
				}else{
					$color = "#ffffcc";
					$swap = "1";
				}
				//��˹������Ѻ������� 
				if($status=="disable"){ 
				$disable="¡��ԡ"; 
				}else{
				$disable="";
				} 
				?>
	 <tr bgcolor=<? echo $color ?>>
     <td valign="top" align="center"><a href="event.php?keyid=<? echo $rs[id]; ?>&mode=edit" title="���"><img src="<?php echo $livesite; ?>admin/compcode/img/botton_edit.gif" width="20" height="20" alt="���" border="0"></a> <a href="delevent.php?id_del=<? echo $rs[id]; ?>" onclick="return confirm('��ͧ���ź <? echo $rs[activity]; ?> �������')" title="ź"><img src="<?php echo $livesite; ?>admin/compcode/img/botton_delete.gif" alt="ź" border="0"></a></td>
		<td valign="top" class="regBlack_12"><? echo renHTML($rs[activity]); ?></td>
		<td valign="top" class="regBlack_12"><? echo renHTML($rs[location]); ?></td>
		<td valign="top" class="regBlack_12"><? echo renHTML($rs[responsible]); ?></td>
        <td valign="top" class="regBlack_12"><?php echo dateThai($rs["startdate"]); ?> - <?php echo dateThai($rs["enddate"]); ?></td>
		</tr>
  <?
  }
  ?>
</table>
</td>
</tr>
</table>

