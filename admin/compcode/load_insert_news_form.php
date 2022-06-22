<? ob_start();
session_start();
include("include/config.php"); 
include "include/connect_db.php";
require_once("include/function.php");

#project
#no. 1
$budget_year=$_REQUEST['bud_year'];
$names=$_REQUEST['title_pic'];
#no. 2
$DeID_main=$_REQUEST['per_dept_main'];
$DeID_join=$_REQUEST['per_dept_join'];
#no. 4
$sec_id=$_REQUEST['sec_id'];
#no. 5
$typ_id=$_REQUEST['typ_id'];
#no. 6+17
$str_id=$_REQUEST['str_id'];
$obj_id=$_REQUEST['obj_id'];
$sf_id=$_REQUEST['sf_id'];

#project_res no.3+18
$position=$_REQUEST['position'];
$pro_name_res=$_REQUEST['pro_name_res'];
$mission=$_REQUEST['mission'];
/*$conn = connect_db("ph_web");
if(!$conn)
echo "????????????????????????????????????????????";


// ?????????? Ramdom password 


$today = date("H:i:s");  
$date_t=date("Y-m-d");
$date_1="$y_1"."-"."$m_1"."-"."$d_1";
$date_2="$y_2"."-"."$m_2"."-"."$d_2";
 $uploadDir = './photo/' ;
$thumbDir = './thumb/' ;


/*function random_password($len)
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
}*/
// echo random_password(8); 


#$Max = random_ID("10","2"); 
#$path="files"; 
#$filenewcon=strstr($file_name,'.');
#$now = date("Dgis");



			#if (!empty($file))
				
				#{
			#copy( $file ,"$path/$passw$now$filenewcon")or die( "????????Copy ???" );
			
				#}
			$msql = "SELECT Max(pro_id) AS M 
			FROM project";
			$mexec = mysql_query($msql);
			$ob=mysql_fetch_array($mexec);
			$Max=$ob['M'];
			if($Max==""){
				$Max = 11111;
			}else{
				$Max = $Max +1;
			}
			#$status_hotnews ='0';
		
// Insert file


 
			#if(!empty($file_name))
			#{
							//$detaile_pic='???????????';
							$files_n=$filenewcon;
							$sql1= "INSERT INTO  project (pro_id, budget_year, names, DeID_main, DeID_join, sec_id, typ_id, str_id, obj_id, sf_id, created, create_by) VALUES ('$Max','$budget_year','$names','$DeID_main','$DeID_join','$sec_id','$typ_id','$str_id','$obj_id','$sf_id','$date_create', '$per_id')";
							$exec1=mysql_query($sql1);
							//echo"$exec1=mysql_query($sql1,$link);";
			#}
			#else
			#{
							#$file_name=????????????;
							#$null_value=????????????;
							for($i=0;$i<count($position);$i++)
							{
								$sql2= "INSERT INTO  project_res (pro_id, names, position, mission) VALUES ('$Max', '$pro_name_res[$i]', '$position[$i]', '$mission[$i]')";
								$exec2=mysql_query($sql2);
								print $sql2."<br/>";
								#print $position[$i]."<br/>"; 
							}
						//echo"$exec1=mysql_query($sql1,$link);";
						
						
						#if($exec1 and $exec2)
						#{
							session_register("Max");
							print $_SESSION['Max'];
						#}
						#else
						#{
							#warning("Error: ไม่สามารถเพิ่มข้อมูลได้");
						#}
			
			#}
	

			


	//* ***************************************************************

/*foreach ($_FILES["userfile"]["error"] as $key5 => $error) {
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

		$ext = strtolower(end(explode('.', $fname)));
		$prod_img = $uploadDir.$passw.basename($fname);
		$prod_img_thumb = $thumbDir.$passw.$fname;
		echo"$ext";
		
				
						$num='0';
						
			if($cate==1)
				{
									
					if( !empty( $files_n ) )
								
						{
							$sql4= "INSERT INTO image( id_Img,name_Imgtop,id_detail,num) VALUES('','$passw$fname','$Max','$key5')";
							$result4 = mysql_query($sql4,$link);
						}
					elseif($key5==$num)
						{
							$sql_run= "UPDATE detail_news  SET  file_detail='$passw$fname'  WHERE  id_detail='$Max' ";							  
							$result1= mysql_query($sql_run,$link);
						}
					else
						{
				 			$sql3= "INSERT INTO image( id_Img,name_Imgtop,id_detail,num) VALUES('','$passw$fname','$Max','$key5')";
							$result3 = mysql_query($sql3,$link);
						}
				}
			if($cate==2)
				{
			
						$sql4= "INSERT INTO image( id_Img,name_Imgtop,id_detail,num) VALUES('','$passw$fname','$Max','$key5')";
						$result4 = mysql_query($sql4,$link);
													//	echo"$result4 = mysql_query($sql4,$link);";
							
				}
	


	
	//echo"copy($prod_img,$userfile_name);";
	
			if ($ext == "jpg" or $ext == "jpeg" or $ext =="png" or $ext=="gif")
				{
					//copy($prod_img,$userfile_name);
					move_uploaded_file($tmp_name, "$uploadDir$passw$fname");
					chmod ($prod_img, octdec($mode));

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
*
}*/



				header("location: ../../phpm/present_project_p2.php");
 ?>

