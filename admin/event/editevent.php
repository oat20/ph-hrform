<? session_start(); ?>
<link href="style/default.css" type="text/css" rel="stylesheet">
<?
$levelpath="../";
		require_once("db.php");
	$starttime=$hour.'.'.$minute;
	$endtime=$hour2.'.'.$minute2;
	
	$update="UPDATE calendar_events  SET activity='$activity',startdate='$startdate', enddate='$enddate',starttime='$starttime',endtime='$endtime',location='$location',description='$message',responsible='$responsible',tel='$tel',fax='$fax',email='$email'
	WHERE id='$id'";
	$rsUpdate = mysql_query($update, $db) or die(mysql_error());
	
	if($file!=""){
		$filename=$HTTP_POST_FILES['file']['name'];
		$filenewcon=strstr($filename,'.');
		$filename=date("YmdHi").$filenewcon;
		copy( $file,"../fileupload/$filename" ) or die( "ไม่สามารถ Copy ได้" );
		$update2="update calendar_events set fileupload='$filename'
		where id='$id'";
		$result2=mysql_query($update2,$db);
	}
	
	if($disable!=""){
		$update3="update calendar_events set status='$disable'
		where id='$id'";
		$result3=mysql_query($update3,$db);
	}
	
	if($rsUpdate || $result2 || $result3)
	{ ?>
						<font size=4 color="#FF0000" face="MS sans Serif, thonburi">แก้ไขรายการเรียบร้อย...</font>
						<meta http-equiv='refresh' content="3;URL=index.php">
	<? }
?>
