<?
$subject="account ����к��Ѵ��â������ Ƿ.";
$messages=$_POST[messages];
$msgerror="";

if ($subject=="" or $messages=="") {
	echo "<H3>ERROR : ��سҡ�͡���������ú��Ѻ</H3>";
} else {

	$from="youremail";
	$header="From: �к��觢������ ".$from;

	include "include/connect.php";
	$sql="select * from sub_list";
	$result=mysql_db_query($dbname,$sql);
	while($rs=mysql_fetch_array($result)){
		$to=$rs[email];

		mail($to, $subject, $messages, $header);
		//echo "$to<BR>";
	}
	echo "<H3>�觢�����ö֧��Ҫԡ���º��������</H3>";
	
	#$senddate=date("Y-m-d H:i");
	#$sql2="insert into mail(subject, message, date)
	#values('$subject', '$messages', '$senddate')";
	#mysql_db_query($dbname, $sql2);
}
echo "[ <A HREF=admin_send.php>��Ѻ仿�����觢������</A> ] ";
?>
