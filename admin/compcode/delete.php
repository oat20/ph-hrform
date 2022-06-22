<? ob_start();
session_start();
//require_once("include/check_data.php");
include("include/config.php");
require_once("include/function.php");
require_once("include/connect_db.php");

//--------------------------------------------------------------------------------------------------------------------------------
if(!empty($id_detail)){
delete_detail($id_detail);
//echo"delete=== $id_detail";

#header("location: ../default,show_allnews.php ");
header("location: ../news.php ");
?>
<!--<meta http-equiv="refresh" content="0;URL=show_allnews.php">
 -->
<? } 
//--------------------------------------------------------------------------------------------------------------------------------
if(!empty($id_type)){
delete_type(news_category,$id_type);


#$sql="ALTER TABLE `status_admin`  DROP `$initial`";			
#$exec=mysql_query($sql);
//echo"delete=== $id_detail";
#header("location: ../default,show_typenews.php");
header("location: ../newscategory.php");
?>
<!--<meta http-equiv="refresh" content="0;URL=show_typenews.php"> -->
<? } 

//------------------------------------------------ ลบรายชื่อ  admin --------------------------------------------------------------------------------
if(!empty($id_user)){
delete_user(admin,$id_user);
#delete_user(fixtypenews_admin,$id_user);
header("location: ../admin.php ");
}
 
 ?>

 <? 
  //--------------------------------------------------------------------------------------------------------------------------------
if(!empty($id_position)){
delete_position(position_news,$id_position);
//echo"delete=== $id_detail";

header("location: ../default,show_position.php ");
?>
<!--<meta http-equiv="refresh" content="0;URL=show_allnews.php">
 -->
<? } 
 //--------------------------------------------------------------------------------------------------------------------------------
if(!empty($id_person)){
delete_person(person_most,$id_person);
//echo"delete=== $id_detail";

header("location: ../default,show_person.php ");
?>
<!--<meta http-equiv="refresh" content="0;URL=show_allnews.php">
 -->
<? } 
//--------------------------------------------------------------------------------------------------------------------------------