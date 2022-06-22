<? ob_start();
session_start(); 
 #include "include/connect.php";
require_once("include/connect_db.php");
#$conn = connect_db("db_news");
$conn = connect_db("utf8");
if(!$conn){
echo "เกิดความผิดพลาดไม่สามารถติดต่อกับฐานข้อมูลได้";
}

$name_type=$_POST["name_type"];
$name_type_e=$_POST["name_type_e"];

  $msg = "";
   #if ( empty( $id_type)){
        if ( empty( $name_type) or $name_type_e == ""){
		
         $msg = $msg . "<font color=\"#FF0000\" size=2>กรุณากรอกข้อมูลให้ครบถ้วน</font> <br>\n";<br>

}else if ( ! empty( $name_type ) ){
			
			$sql = "SELECT Max(sec_id) AS M 
			FROM section";
			$exec = mysql_query($sql);
			$Max = mysql_result($exec,"M");
			$Max =  $Max+1;
			#$registerdate=date("Y-n-j");
			#$mysql = " INSERT INTO type_news (id_type,name_type,initial) VALUES('$Max','$name_type','$name_type_e')";
			$mysql = " INSERT INTO section (sec_id,section,comment) 
			VALUES('$Max','$name_type','$name_type_e')";
			$rs = mysql_query($mysql) ;
			#$mysql_e = "ALTER TABLE  status_admin  ADD  $name_type_e  VARCHAR( 200 )  NULL ";
			#$rs_e = mysql_query($mysql_e,$link) ;

			$msg=$msg."<span class=boldRed_10>บันทึกข้อมูลเรียบร้อย</span>";
			mysql_close();
			
		#header("location: newscategory.php");
		}
	#}
	 #if ( !empty( $id_type))
	 #{
	 		#edit_type($id_type,$name_type,$name_type_e);
			
			#$sql="ALTER TABLE `status_admin` CHANGE `$initial` `$name_type_e` VARCHAR( 10 ) CHARACTER SET tis620 COLLATE tis620_thai_ci  NULL";			
			#$exec=mysql_query($sql);
	 #}

	?>
<!--<meta http-equiv="refresh" content="0;URL=show_typenews.php"> -->
