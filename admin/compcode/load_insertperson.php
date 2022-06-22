<? ob_start();
session_start(); 
 include "include/connect.php";
require_once("include/function.php");
$conn = connect_db("db_news");
if(!$conn)
echo "เกิดความผิดพลาดไม่สามารถติดต่อกับฐานข้อมูลได้";
echo"$id_person";
echo"$edit";

  $msg = "";
   if ( empty( $id_person))
	   {
			if ( $Submit == "ตกลง" )
				{
						 if ( empty( $name_person))
						$msg = $msg . "<font color=\"#FF0000\" size=1>กรุณากรอกข้อมูลให้ครบถ้วน</font> <br>\n";
         
						if ( ! empty( $name_person ) )
						 {
								$sql = "SELECT Max(id_person) AS M FROM person_most";
								$exec = mysql_query($sql);
			
			

								$Max = mysql_result($exec,"M");
								$Max =  $Max+ 1;
								$registerdate=date("Y-n-j");
								$mysql = " INSERT INTO person_most(id_person,title,name_person,id_position) VALUES('$Max','$title','$name_person','$id_position')";
								$rs = mysql_query($mysql) ;
								echo"$rs = mysql_query($mysql) ;";
								mysql_close();
			
		
						}
			}
	}
	 if ( !empty($id_person))
	 {
	 		edit_person($id_person,$title,$name_person,$id_position);
			//echo"huhu";
			$sql="ALTER TABLE `status_admin` CHANGE `$initial` `$name_type_e` VARCHAR( 10 ) CHARACTER SET tis620 COLLATE tis620_thai_ci NOT NULL";			
			//$exec=mysql_query($sql);
	 }
header("location: ../default,show_person.php");
	?>
<!--<meta http-equiv="refresh" content="0;URL=show_typenew]'s.php"> -->
