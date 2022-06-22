<? session_start();
$levelpath="../"; 
				require_once("db.php");
				
				$starttime=$starthour.'.'.$startminute;
				
				if($endhour=="" || $endminute==""){
					$endtime="-";
				}else{
					$endtime=$endhour.'.'.$endminute;
				}
				
				if($fax==""){ $fax="-"; }
				
				if($email==""){ $email="-"; }
				
				if($enddate==""){ $enddate=$startdate; }
				
				if($description==""){ $description="-"; }
				
				$status="enable";
				
		$query_addMycalendar = "INSERT INTO calendar_events(activity, startdate, enddate, starttime, endtime, location, description, responsible,tel, fax, email ,status,useradd) 
				VALUES('$activity', '$startdate', '$enddate', '$starttime', '$endtime', '$location', '$description','$responsible','$tel', '$fax', '$email','$status','$user')";
				$addMycalendar=mysql_query($query_addMycalendar,$db) or die('not connect database');
				
				if($addMycalendar){ ?>
					<font size=4 color=#ff0000 face="MS sans Serif, thonburi">เพิ่มปฏิทินกิจกรรมเรียบร้อย...</font></td>
						<meta http-equiv="refresh" content="3;URL=index.php">
				<? }
?>

