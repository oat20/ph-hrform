<Title> Upload.php </Title>
<?
require("../connect.php");
echo "<h3>Upload file</h3>";
$uploadDir = './photo/' ;
$thumbDir = './thumb/' ;
$cat = $_REQUEST['cat'];
 $date_t=date("Y-m-d");
mysql_query("set NAMES tis620 ");


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


Foreach ($_FILES["userfile"]["error"] as $key => $error) {
    if ($error == 0 ) 
	{  
		$title = trim($_REQUEST['title'][$key]) ;
		$size = $_FILES["userfile"]["size"][$key];
        $type = $_FILES["userfile"]["type"][$key];
        $tmp_name = $_FILES["userfile"]["tmp_name"][$key];
        $fname = $_FILES["userfile"]["name"][$key];
				$passw = random_password(7); 
		$uploadfile = $uploadDir.$passw.basename($fname);
		$thumbfile = $thumbDir.$passw .$fname;


				if (!ereg ("^image/pjpeg" , $type )) 
				{
			  			echo "<br>upload ‰¡Ë‰¥È ‡äû“– JPG ‡•Ë“ö—Èö º√ÿ≥“‡™Á§™ö‘¥À√◊Õ¢ö“¥‰ø≈Ï ";
			  	die;
				} 
				
						$limit = 8120000 ;
				if ( $size > $limit ) 
				{
			  			echo "<br>upload ‰¡Ë‰¥È ¢ö“¥‰ø≈Ï„À≠Ë‡º‘öº«Ë“ $limit ‰∫•Ï ";
			  	die;
				} 
        move_uploaded_file($tmp_name, "$uploadDir$passw$fname");
		echo "$key : $title , $size Byte &nbsp; $type &nbsp;  $fname , $thumbfile<br> \n ";
		
			//	$sql = "SELECT image From tbimage  WHERE  image='$fname' " ;
			//	$result = mysql_query( $sql);
				 if($key=="")
							 {
							 		 $sql = "INSERT  into  tbimage ( id_pic,cat_id,title_pic,name_pic,detaile_pic,view_pic ,news_day) values ('','$cat' , '$title_pic' , '$passw$fname' ,'$detaile_pic' , '','$date_t' ) ";
							  		 $result = mysql_query($sql,$link);
									echo"  $result = mysql_query($sql,$link);";
							 }
							 else
							 {
							 		$sql3 = "SELECT max(id_pic) AS num FROM tbimage";
									$results3 = mysql_query ( $sql3,$link );
									$rs1 = mysql_fetch_array( $results3); 
									$Max = $rs1[num];
					
									  $sql3= "INSERT INTO image( id_Img,name_Imgtop,id_detail,num) VALUES('','$passw$now$fname','$Max','$num')";
							  		 $result = mysql_query($sql3,$link);
									 echo"  $result = mysql_query($sql3,$link);";
									
							}
				
		
		} 
		else 
		{		// if exists
			                
						
			if (!$result)  { 
				echo("‡ÕÁºç‘§‘«ûÏ§” —Ëß SQL ‰¡Ë‰¥È " . mysql_error() ); 
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
	echo "<hr color=red noshade size=1>";
    } 

?>
<hr><a href=../gallery/Img_insert.php>Upload ‡û‘Ë¡</a> | 
<a href=../gallery/listfile.php ?>View photo</a>
<a href=../gallery/listfile.php ?>View thumb</a>
