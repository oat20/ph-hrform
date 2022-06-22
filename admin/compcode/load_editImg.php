<? ob_start();
session_start(); 
 include "include/connect.php";
require_once("include/function.php");
$conn = connect_db("db_news");
if(!$conn)
echo "à¡Ô´¤ÇÒÁ¼Ô´¾ÅÒ´äÁèÊÒÁÒÃ¶µÔ´µèÍ¡Ñº°Ò¹¢éÍÁÙÅä´é";



if ($Img==1)
{

    if (!empty($file))
{
		$sql_e="select  *  from  detail_news where id_detail='$id_detail'";
		$exec_e=mysql_query($sql_e,$link);
			while($rs1= mysql_fetch_array($exec_e))
				{
					$name_x=$rs1[file_detail];
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

			$sql2="update  detail_news set   file_detail ='$passw_img$fname ' where id_detail='$id_detail'";
			$exec2=mysql_query($sql2);
	//		echo"$exec2=mysql_query($sql2);";
//			$result = mysql_query($sql);
		if (!$exec2)  { 
				echo("àÍç¡«Ô¤ÔÇµì¤ÓÊÑè§ SQL äÁèä´é " . mysql_error() ); 
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



		
	header("location: edit_dataImg.php");
		}
		else

		header("location: edit_dataImg.php");
	
		
}
//*****************************************************************************************
if ($Img==4)
{

		
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



		

	foreach ($_FILES["userfile"]["error"] as $key5 => $error) {
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
 

				
					 move_uploaded_file($tmp_name,"$uploadDir$passw$fname");
						
						$num='0';
						
									
														$sql4= "INSERT INTO image( id_Img,name_Imgtop,id_detail,num) VALUES('','$passw$fname','$member','$key5')";
							  		 					$result4 = mysql_query($sql4,$link);
							
									
		}

	if(!empty($uploadfile))
	{
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

    } 



else
{      header("location: edit_dataImg.php");    }

}
        header("location: edit_dataImg.php");

}
       header("location: edit_dataImg.php");

//*****************************************************************************************
if ($Img==5)
{

if (!empty($file))
{
		$sql_e="select  *  from  image where id_Img='$id_Img'";
		$exec_e=mysql_query($sql_e);
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
				echo("àÍç¡«Ô¤ÔÇµì¤ÓÊÑè§ SQL äÁèä´é " . mysql_error() ); 
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



		
		header("location: edit_dataImg.php");
		
	}
else
		header("location: edit_dataImg.php");
	
		
}



?>


