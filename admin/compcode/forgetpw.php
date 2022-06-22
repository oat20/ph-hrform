<?
$subject="account เข้าระบบจัดการข่าวสาร วท.";
$messages=$_POST[messages];
$msgerror="";

if ($subject=="" or $messages=="") {
	echo "<H3>ERROR : กรุณากรอกข้อมูลให้ครบครับ</H3>";
} else {

	$from="youremail";
	$header="From: ระบบส่งข่าวสาร ".$from;

	include "include/connect.php";
	$sql="select * from sub_list";
	$result=mysql_db_query($dbname,$sql);
	while($rs=mysql_fetch_array($result)){
		$to=$rs[email];

		mail($to, $subject, $messages, $header);
		//echo "$to<BR>";
	}
	echo "<H3>ส่งข่าวสารถึงสมาชิกเรียบร้อยแล้ว</H3>";
	
	#$senddate=date("Y-m-d H:i");
	#$sql2="insert into mail(subject, message, date)
	#values('$subject', '$messages', '$senddate')";
	#mysql_db_query($dbname, $sql2);
}
echo "[ <A HREF=admin_send.php>กลับไปฟอร์มส่งข่าวสาร</A> ] ";
?>
