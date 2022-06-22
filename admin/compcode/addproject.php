<? ob_start();
session_start();
include("include/config.php"); 
include "include/connect_db.php";
require_once("include/function.php");
include("check_login.php");

connect_db("utf8");

$bud_year=$_POST["bud_year"];
$budget=$_POST["budget"];
$bt_id=$_POST["bt_id"];
$title_pic=$_POST["title_pic"]; #ชื่อโครงการ
$per_dept_main=$_POST["per_dept_main"];
$per_dept_join=$_POST["per_dept_join"];
$pro_res=$_POST["pro_res"];
$sec_id=$_POST["sec_id"];
$typ_id=$_POST["typ_id"];
$str_id=$_POST["str_id"];
$obj_id=$_POST["obj_id"];
$startdate=$_POST["startdate"];
$enddate=$_POST["enddate"];
$act_id=$_POST["act_id"];

$pro_id=random_ID("5","2");

$sql1= "INSERT INTO  project(pro_id, budget_year, names, sec_id, typ_id, str_id, obj_id, act_id, budget, bt_id, pro_start, pro_end, created) VALUES('$pro_id', '$bud_year', '$title_pic', '$sec_id', '$typ_id', '$str_id', '$obj_id','$act_id', '$budget', '$bt_id', '$startdate', '$enddate', '$date_create')";
$rs1=mysql_query($sql1);
print $sql1;
							
$sql2="insert into project_dep_res(pro_id, DeID, kind) values('$pro_id', '$per_dept_main', 'main')";
$rs2=mysql_query($sql2);
print $sql2;
							
$sql3="insert into project_dep_res(pro_id, DeID, kind) values('$pro_id', '$per_dept_join', 'join')";
$rs3=mysql_query($sql3);
print $sql3;
							
$sql4="insert into project_res(pro_id, names) values('$pro_id', '$pro_res')";
$rs4=mysql_query($sql4);
print $sql4;
							//echo"$exec1=mysql_query($sql1,$link);";
							if($rs1 and $rs2 and $rs3 and $rs4){
	header("location: ../../addproject.php");
}else{
	print "ไม่สามารถบันทึกได้";
}
				
ob_end_flush();
 ?>

