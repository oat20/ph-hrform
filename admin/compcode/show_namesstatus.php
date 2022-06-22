<?
#session_start();
$sql="select   *  from  personel
inner join organization on (personel.per_dept=organization.DeID)  
where  personel.per_id='$per_id'" ;
$exec = mysql_query($sql);
$Status = mysql_fetch_array ($exec);
$name_s=$Status['username'];
$ministry_id =$Status['Fname'];
$profile_DeID=$Status['DeID'];
if($name_s==""){
	$name_s=$Status['per_email'];
}
/*$sql_ministry="select   *  from  ministry_news   where  ministry_id='$ministry_id'" ;
$exec_ministry = mysql_query($sql_ministry);
$Status_ministry = mysql_fetch_array ($exec_ministry);
$ministry_name=$Status_ministry[ministry_name];*/

echo "<span class=boldGray_8>".$name_s." (".$ministry_id.")</span><br/><span class=regBlack_8><a href=".$livesite."profile.php>ข้อมูลส่วนตัว</a> - <a href=>เปลี่ยนรหัสผ่าน</a> - <a href=".$livesite."admin/compcode/logout_admin.php>ออกจากระบบ</a></span>";
?>