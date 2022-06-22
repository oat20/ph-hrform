<? ob_start();
session_start(); 
 include "include/connect.php";
require_once("include/function.php");
$conn = connect_db("db_news");
if(!$conn)
echo "เกิดความผิดพลาดไม่สามารถติดต่อกับฐานข้อมูลได้";
echo"$id_position";
  $msg = "";
   if ( empty( $id_position)){
    if ( $Submit == "ตกลง" )
	{
        if ( empty( $name_type))
         $msg = $msg . "<font color=\"#FF0000\" size=1>กรุณากรอกข้อมูลให้ครบถ้วน</font> <br>\n";
         
       if ( ! empty( $name_position_t ) )
        {
			$sql = "SELECT Max(id_position) AS M FROM position_news";
			$exec = mysql_query($sql,$link);
			
			

			$Max = mysql_result($exec,"M");
			$Max =  $Max+ 1;
			$registerdate=date("Y-n-j");
			$mysql = " INSERT INTO position_news(id_position,name_position_t,name_position_e) VALUES('$Max','$name_position_t','$name_position_e')";
			$rs = mysql_query($mysql,$link) ;
			
			mysql_close();
			
		
		}
	}
	}
	 if ( !empty( $id_position))
	 {
	 		edit_position($id_position,$name_position_t,$name_position_e);
			//echo"huhu";
			$sql="ALTER TABLE `status_admin` CHANGE `$initial` `$name_type_e` VARCHAR( 10 ) CHARACTER SET tis620 COLLATE tis620_thai_ci NOT NULL";			
			//$exec=mysql_query($sql);
	 }
	 header("location: ../default,show_position.php");
	?>
<!--<meta http-equiv="refresh" content="0;URL=show_typenew]'s.php"> -->
