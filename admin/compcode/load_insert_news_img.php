<? ob_start();
session_start(); 
include "include/connect.php";
require_once("include/function.php");
$conn = connect_db("db_news");
if(!$conn)
echo "เกิดความผิดพลาดไม่สามารถติดต่อกับฐานข้อมูลได้";


?>
<meta http-equiv="Content-Type" content="text/html; charset=windows-874">

<?
// ?????????? Ramdom password 


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
$filenewcon= strstr($file_name,'.');
//echo"$filenewcon";
$now = date("Dgis");

echo"aa";

			if (!empty($file))
				
				{
			copy( $file ,"$path/$passw$now$filenewcon")or die( "ไม่สามารถCopy ได้" );
			
				}



			$msql = "SELECT Max(id_detail) AS M FROM detail_news";
			$mexec = mysql_query($msql,$link);
			$Max = mysql_result($mexec,"M");
			$Max =$Max +1;
			$status_hotnews ='0';

		
// Insert file


 
			if(!empty($file_name))
			{

			$files_n=$filenewcon;
			$sql1= "INSERT INTO  detail_news( id_detail,title_detail,descriptiondetail ,description_detail,file_name,file_detail,date_detail,date_1,date_2,time_detail,user_login,id_type,cate_detail,ministry_id,status_hotnews,status_news,show_news,show_news,id_person) VALUES ('$Max','$title_pic','$detaile_pic1','$detaile_pic','$file_name','$passw$now$filenewcon','$date_t','$date_1','$date_2','$today','$authuser','$key1','$cate','$ministry','$status_hotnews','$authuser','n','$id_person')";
			$exec1=mysql_query($sql1);
			echo"$exec1=mysql_query($sql1);  aaaa";
			}
			else
			{
			$file_name=ไม่มีข้อมูลลง;
			$null_value=ไม่มีข้อมูลลง;
			$sql1= "INSERT INTO  detail_news( id_detail,title_detail,descriptiondetail ,description_detail,file_name,file_detail,date_detail,date_1,date_2,time_detail,user_login,id_type,cate_detail,ministry_id,status_hotnews,status_news,show_news,id_person) VALUES ('$Max','$title_pic','$detaile_pic1','$detaile_pic','$file_name','$null_value','$date_t','$date_1','$date_2','$today','$authuser','$key1','$cate','$ministry','$status_hotnews','$authuser','n','$id_person')";
			$exec1=mysql_query($sql1);
		echo"$exec1=mysql_query($sql1);   bbbb";
			}


	//* ***************************************************************


	foreach ($_FILES["userfile"]["error"] as $key5 => $error) {
	if ($error == 0 ) 
	{  
		echo"axx";
		$title = trim($_REQUEST['title'][$key5]) ;
		$size = $_FILES["userfile"]["size"][$key5];
        $type = $_FILES["userfile"]["type"][$key5];
        $tmp_name = $_FILES["userfile"]["tmp_name"][$key5];
        $fname = $_FILES["userfile"]["name"][$key5];
		$passw = random_password(7); 
		$uploadfile = $uploadDir.$passw.basename($fname);
		$thumbfile = $thumbDir.$passw.$fname;
		echo"bxx";
		$ext = strtolower(end(explode('.', $fname)));
		$prod_img = $uploadDir.$passw.basename($fname);
		$prod_img_thumb = $thumbDir.$passw.$fname;

		
				
						$num='0';
			if($cate==3)
				{
									
					if( !empty( $files_n ) )
								
						{
							$sql4= "INSERT INTO image( id_Img,name_Imgtop,id_detail,num) VALUES('','$passw$fname','$Max','$key5')";
							$result4 = mysql_query($sql4);
						}
					elseif($key5==$num)
						{
							$sql_run= "UPDATE detail_news  SET  file_detail='$passw$fname'  WHERE  id_detail='$Max' ";							  
							$result1= mysql_query($sql_run);
						}
					else
						{
				 			$sql3= "INSERT INTO image( id_Img,name_Imgtop,id_detail,num) VALUES('','$passw$fname','$Max','$key5')";
							$result3 = mysql_query($sql3);
						}
				}			
				
				
				if($cate==1)
				{
									
					if( !empty( $files_n ) )
								
						{
							$sql4= "INSERT INTO image( id_Img,name_Imgtop,id_detail,num) VALUES('','$passw$fname','$Max','$key5')";
							$result4 = mysql_query($sql4);
						}
					elseif($key5==$num)
						{
							$sql_run= "UPDATE detail_news  SET  file_detail='$passw$fname'  WHERE  id_detail='$Max' ";							  
							$result1= mysql_query($sql_run);
						}
					else
						{
				 			$sql3= "INSERT INTO image( id_Img,name_Imgtop,id_detail,num) VALUES('','$passw$fname','$Max','$key5')";
							$result3 = mysql_query($sql3);
						}
				}
			if($cate==2)
				{
			
						$sql4= "INSERT INTO image( id_Img,name_Imgtop,id_detail,num) VALUES('','$passw$fname','$Max','$key5')";
						$result4 = mysql_query($sql4);
														echo"$result4 = mysql_query($sql4);";
							
				}
	


	
	//echo"copy($prod_img,$userfile_name);";
			//echo"cxx";
	
			if ($ext == "jpg" or $ext == "jpeg" or $ext =="png" or $ext=="gif")
				{
					//copy($prod_img,$userfile_name);
					move_uploaded_file($tmp_name, "$uploadDir$passw$fname");
					chmod ($prod_img, octdec($mode));
					echo"axscdwerrt";

			if ($ext =="jpg" or $ext =="jpeg")
				{
				$ori_img = imagecreatefromjpeg($prod_img);
				} 
			else if ($ext =="png") 
				{
				$ori_img = imagecreatefrompng($prod_img);
				} 
			else if ($ext =="gif") 
				{
				$ori_img = imagecreatefromgif($prod_img);
				}

	$ori_size = getimagesize($prod_img);
	$ori_w = $ori_size[0]; 
	$ori_h = $ori_size[1];

			if ($ori_w>100)
				{
					$new_w = 100; 
					$new_h = round(($new_w/$ori_w) * $ori_h);
					$new_img= imagecreatetruecolor($new_w, $new_h);

					imagecopyresized($new_img, $ori_img,0,0,0,0,$new_w, $new_h,$ori_w,$ori_h);
						if ($ext =="jpg" or $ext =="jpeg")
							{
							imagejpeg($new_img,$prod_img_thumb);
							} 
							else if ($ext =="png") 
							{
							imagepng($new_img,$prod_img_thumb);
							} 
							else if ($ext =="gif") 
							{
							imagegif($new_img,$prod_img_thumb);
							}

					imagedestroy($ori_img); 
					imagedestroy($new_img); 
				}


		}

	}

}



if($cate==3)
	{
				header("location: ../default,editdataweek_Img.php");
	}
else
	{
				header("location: ../default,editdata_Img.php");
	}


 ?>

