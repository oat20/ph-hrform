<?
		session_start();
?>
<?
		require_once("db.php");
		$q4="delete from calendar_events where id='$id_del'";
		$re4=mysql_query($q4, $db) or die("Error".mysql_error());
				if($re4)
				{
				?>
						<font size=4 face=ms sans serif,thonburi color=#ff0000>ลบรายการปฏิทินกิจกรรมเรียบร้อย...</font>
						<meta http-equiv='refresh' content=3;url=index.php>
				<?
				}
?>
