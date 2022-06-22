<? ob_start(); 
session_start(); 
 include "include/connect.php";
require_once("include/function.php");
$conn = connect_db("db_news");
if(!$conn)
echo "เกิดความผิดพลาดไม่สามารถติดต่อกับฐานข้อมูลได้";



//***************************************************************************
if ($news==1)
{

			if (!empty($file))
{

			$filesDir = './files/' ;
			$sql_e="select  *  from  detail_news where id_detail='$id_file'";
			$exec_e=mysql_query($sql_e,$link);
			while($rs1= mysql_fetch_array($exec_e))
				{
					$name_x=$rs1[file_detail];
					//unlink("photo/$name_x");
					//unlink("thumb/$name_x");
					unlink("files/$name_x");
				}
		
function random_password($len)
{
srand((double)microtime()*10000000);
$chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";
$ret_str = "";
$num = strlen($chars);
for($i = 0; $i < $len; $i++)
{
$ret_str.= $chars[rand()%$num];
$ret_str.=""; 
}
return $ret_str; 
}

		$size = $_FILES['file']['size'];
        $type = $_FILES['file']['type'];
        $tmp_name = $_FILES['file']['tmp_name'];
        $fname =$_FILES["file"]["name"] ;
		$passw= random_password(7); 
		move_uploaded_file($tmp_name, "$filesDir$passw$fname");

		
		$sql3="update  detail_news set   file_name ='$fname ' where id_detail='$id_file'";
		$exec3=mysql_query($sql3);
		
		$sql2="update  detail_news set   file_detail='$passw$fname ' where id_detail='$id_file'";
		$exec2=mysql_query($sql2);
		
		
				header("location: edit_datanews.php");
		}
		
	else
	
				header("location: edit_datanews.php");
	
}


//*****************************************************************************************
if ($news==2)
{

if (!empty($file))
{
		$sql_e="select  *  from  image where id_Img='$id_Img'";
		$exec_e=mysql_query($sql_e,$link);
	//	echo"$exec1=mysql_query($sql1);";
			while($rs1= mysql_fetch_array($exec_e))
				{
					$name_x=$rs1[name_Imgtop ];
					unlink("photo/$name_x");
					unlink("thumb/$name_x");
					//unlink("files/$name");
				}
		
function random_password($len)
{
srand((double)microtime()*10000000);
$chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";
$ret_str = "";
$num = strlen($chars);
for($i = 0; $i < $len; $i++)
{
$ret_str.= $chars[rand()%$num];
$ret_str.=""; 
}
return $ret_str; 
}

 $uploadDir = './photo/' ;
$thumbDir = './thumb/' ;



		$size = $_FILES['file']['size'];
        $type = $_FILES['file']['type'];
        $tmp_name = $_FILES['file']['tmp_name'];
		
        $fname =$_FILES["file"]["name"] ;
		$passw_img= random_password(7); 
		$uploadfile = $uploadDir.$passw_img.basename($fname);
		$thumbfile = $thumbDir .$passw_img.$fname;

		
        move_uploaded_file($tmp_name, "$uploadDir$passw_img$fname");

			$sql2="update  image set   name_Imgtop='$passw_img$fname ' where id_Img='$id_Img'";
			$exec2=mysql_query($sql2);
	//		echo"$exec2=mysql_query($sql2);";
//			$result = mysql_query($sql);
		if (!$exec2)  { 
				echo("เอ็กซิคิวต์คำสั่ง SQL ไม่ได้ " . mysql_error() ); 
			} 

		list($w1, $h1) = getimagesize($uploadfile);		// Get new dimensions 
	$quality = 100;
	$w2 = 100 ; # 
	$percent = $w2 / $w1 ;
	$h2 = $h1 * $percent ;

	$h2 = 80 ; # 
	$percent = $h2 / $h1 ;
	$w2 = $w1 * $percent ;

	$w2 = 120 ; # 
	$h2 = 90 ; # 

	$im = imageCreateTrueColor($w2+4, $h2+4);	
	$im1 = imageCreateFromJpeg($uploadfile);

	$dark = ImageColorAllocate($im,185,185,185);	// dark
	$light = ImageColorAllocate($im,230,230,230);	
	$white = ImageColorAllocate($im,254,254,254);
	imagefilledRectangle($im, 0, 0, $w2+3 , $h2+3, $white);	
	imagefilledRectangle($im, 4, 4, $w2+4 , $h2+4, $light);
	imagefilledRectangle($im, 3, 3, $w2+2 , $h2+2, $dark);

	imageCopyResampled($im, $im1, 0, 0, 0, 0, $w2, $h2, $w1, $h1);
	#imageCopyResized($im, $im1, 0, 0, 0, 0, $w2, $h2, $w1, $h1);
	imageString($im, 5, 5, $h2 - 20, "", $light);
	imagejpeg($im, $thumbfile , $quality);	# %
	imageDestroy($im);
	imageDestroy($im1);



		
		header("location: edit_datanews.php");
		
	}
else
		header("location: edit_datanews.php");
	
		
}
?>


