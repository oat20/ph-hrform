<? ob_start();
session_start(); 
 include "include/connect.php";
require_once("include/function.php");
$conn = connect_db("db_news");
if(!$conn)
echo "เกิดความผิดพลาดไม่สามารถติดต่อกับฐานข้อมูลได้";

	


// ำฟัง์ชั่ Ramdom password มาใช้เื่อำหดชื่อไฟล์้องัาร้ำั


//echo"$filesupload_type";
$today = date("H:i:s");  
$date_t=date("Y-m-d");
$date_1="$y_1"."-"."$m_1"."-"."$d_1";
$date_2="$y_2"."-"."$m_2"."-"."$d_2";
 $uploadDir = './photo/' ;
$thumbDir = './thumb/' ;

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
// echo random_password(8); 


$passw = random_password(7); 
$path="files"; 
$filenewcon = strstr($file_name,'.');
$now = date("Dgis");
if($explain=="")
{
$explain=ไม่มีรายละเอียด;
}
else
{
$explain=$explain;
}

if(empty($file))
{
$file='ว่าง';
}
else
{ 


copy( $file ,"$path/$passw$now$filenewcon")or die( "ไม่สามาร Copy ได้" );
}


/*$filename="$file_name";

echo"$filename";*/

	//echo"$id_type";
			$msql = "SELECT Max(id_detail) AS M FROM detail_news";
			$mexec = mysql_query($msql,$link);
			$Max = mysql_result($mexec,"M");
			$Max =$Max +1;
			$status_hotnews ='0';
		
// Insert file 
			if(empty($detaile_pic))
			{
			$detaile_pic='ไม่มีข้อมูลง';
			$files_n=$filenewcon;
			$sql1= "INSERT INTO  detail_news( id_detail,title_detail,descriptiondetail ,description_detail,file_name,file_detail,date_detail,date_1,date_2,time_detail,user_login,id_type,cate_detail,ministry_id,status_hotnews) VALUES ('$Max','$title_pic','$detaile_pic1','$detaile_pic','$file_name','$passw$now$filenewcon','$date_t','$date_1','$date_2','$today','$authuser','$key1','$cate','$ministry','$status_hotnews ')";
			$exec1=mysql_query($sql1,$link);
			//echo"$exec1=mysql_query($sql1,$link);";
			}
			else
			{
			$file_name='ไม่มีข้อมูล';
			$sql1= "INSERT INTO  detail_news( id_detail,title_detail,descriptiondetail ,description_detail,file_name,file_detail,date_detail,date_1,date_2,time_detail,user_login,id_type,cate_detail,ministry_id,status_hotnews) VALUES ('$Max','$title_pic','$detaile_pic1','$detaile_pic','$file_name','$passw$now$filenewcon','$date_t','$date_1','$date_2','$today',,'$authuser','$key1','$cate','$ministry','$status_hotnews ')";
			$exec1=mysql_query($sql1,$link);
			//echo"$exec1=mysql_query($sql1,$link);";
			}


	//$sql4= "INSERT INTO image( id_Img,name_Imgtop,name_Imgcenter,name_Imgbottom,id_detail) VALUES('','$passw1$now1$filenewcon1','$file_Image2','$file_Image3','$Max')";

	//* ***************************************************************
	foreach ($_FILES["userfile"]["error"] as $key5 => $error) {
 //   echo"$userfile $key1";
	if ($error == 0 ) 
	{  
		$title = trim($_REQUEST['title'][$key5]) ;
		$size = $_FILES["userfile"]["size"][$key5];
        $type = $_FILES["userfile"]["type"][$key5];
        $tmp_name = $_FILES["userfile"]["tmp_name"][$key5];
        $fname = $_FILES["userfile"]["name"][$key5];
		$passw = random_password(7); 
		$uploadfile = $uploadDir.$passw.basename($fname);
		$thumbfile = $thumbDir.$passw.$fname;


				
        move_uploaded_file($tmp_name, "$uploadDir$passw$fname");
	//	echo "$key : $title , $size Byte &nbsp; $type &nbsp;  $fname , $thumbfile<br> \n ";
		
			//	$sql = "SELECT image From tbimage  WHERE  image='$fname' " ;
			//	$result = mysql_query( $sql);
								
							//		echo"$passw$fname";
							$num='0';
									if( !empty( $files_n ) )
								
												{
														$sql4= "INSERT INTO image( id_Img,name_Imgtop,id_detail,num) VALUES('','$passw$fname','$Max','$key5')";
							  		 					$result4 = mysql_query($sql4,$link);
													//	echo"  4   $result4 = mysql_query($sql4,$link);";
												}
									elseif($key5==$num)
												{
														$sql_run= "UPDATE detail_news  SET  file_detail='$passw$fname'  WHERE  id_detail='$Max' ";							  
									    				$result1= mysql_query($sql_run,$link);
													//	echo"  1   $result1= mysql_query($sql_run,$link);";
												}
									 			else
												{
				 					 					$sql3= "INSERT INTO image( id_Img,name_Imgtop,id_detail,num) VALUES('','$passw$fname','$Max','$key5')";
							  		 					$result3 = mysql_query($sql3,$link);
														//	 echo"  3  $result 3= mysql_query($sql3,$link);";
									 			}
											
	
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
	//echo "<hr color=red noshade size=1>";
    } 




 if($cate==1)

				header("location: edit_dataImg.php");


else
				header("location: edit_datanews.php");

 ?>

