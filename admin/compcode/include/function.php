<?php             //?????? Admin 

//-------------------------------------------------------------------------------------------------------------------------------------------------

//include("check_data.php");
function login($username,$password,$database,$tablename)
/*??????? username ??? password ????????????
???????????????????? ?????????????????????????
*/
{
//?????????????????

$conn=connect_db("utf8");
if(!$conn)
	return 0;
//??????? username ???????????????????????????
$sql = "select * from $tablename 
where username='$username' and password='$password'";
$result = mysql_query($sql);

#mysql_query("SET NAMES TIS620");

if(!$result)
	return 0;
if(mysql_num_rows($result)>0)
	return 1;
else
	return 0;
}

//------------------------------------------------------------------------------------------------------------------
//resize image function
function resizeImage($filename, $targetw, $targeth, $quality, $targetfilename, $crop){ 
    if ($im = @imagecreatefromjpeg($filename)){ 
        $w      = imagesx($im); 
        $h      = imagesy($im); 
        $sc     = 1; 
        if ($w > $targetw){ 
            $sc = $targetw/$w; 
        } 
        if ($h > $targeth/$sc){ 
            $sc = $targeth/$h; 
        }    
        if (!$crop){ 
            $result = imagecreatetruecolor($targetw, $targeth); 
            $grey   = imagecolorallocate($result, 0xf1, 0xef, 0xea); 
            imagefill($result, 0, 0, $grey); 
            imagecopyresampled($result, $im, ($targetw - $w*$sc)/2, ($targeth - $h*$sc)/2, 0, 0, $w*$sc, $h*$sc, $w, $h); 
        } else { 
            $result = imagecreatetruecolor($w*$sc, $h*$sc); 
            imagecopyresampled($result, $im, 0, 0, 0, 0, $w*$sc, $h*$sc, $w, $h); 
        } 
        imagejpeg($result, $targetfilename, $quality); 
    } 
} 


//-------------------------------

//???????????
function num_Img($id_detail)
{
global  $num_Img;
$con=connect_db("db_news");

if(!$con)
	return "????????????????????????????? ??????????????????";
$sql="select * from image  where id_detail=$id_detail ";
$result = mysql_query($sql);
//echo"$result = mysql_query($sql);";
$num_Img=mysql_num_rows($result);


	return $num_Img;


}

//=======================     ++++????????????  ????   ??????   +++++      ==============================

function delete_detail($id_detail)
{
		$con=connect_db("ph_web");
			if(!$con)
				return "????????????????????????????? ??????????????????";
		$sql1="select  *  from  news where id_detail='$id_detail'";
		$exec1=mysql_query($sql1);
			while($rs1= mysql_fetch_array($exec1))
				{
					$name=$rs1[file_detail ];
					unlink("photo/$name");
					unlink("thumb/$name");
					unlink("files/$name");
				}
		$result = mysql_query("delete from news where id_detail='$id_detail'");
		$sql="select  *  from  image  where id_detail='$id_detail'";
		$exec=mysql_query($sql);
			while($rs= mysql_fetch_array($exec))
				{
					$name=$rs[name_Imgtop];
					unlink("photo/$name");
					unlink("thumb/$name");
				}
		$result1= mysql_query("delete from image where id_detail='$id_detail'");
			if(!$result)
						return("???????????????????????????");
			else
						return true;
}

//=================================================================================

/*???????????????????????????????????????????????*/
function db_to_array($result)
{
	$result_array=array();
	for($count=0;$row=@mysql_fetch_array($result);$count++)
		$result_array[$count]=$row;
	return $result_array;
}


//=================================================================================

/*?????????????????????????*/
function calculate_items($cart)
{
  // ????????????????????
  $items = 0;
  if(is_array($cart))
  {
    foreach($cart as $isbn => $qty)
    {  
      $items += $qty;
    }
  }
  return $items;
}

//=================================================================================
function show_ministry_id($authuser)
{
global  $ministry;
global  $ministry_name;
		$conn = connect_db("db_news");
			if(!$conn)
				echo "????????????????????????????????????????????";
		$sql="select   *  from  user  where  username='$authuser'" ;
		$exec = mysql_query($sql);
		$Status = mysql_fetch_array ($exec);
		$status_user=$Status[status_user];
		$ministry=$Status[ministry_id];
			if($exec){
				return  $ministry;
			}
			else

 				return 0;
}


//=================================================================================
function show_newsmimistry($tablename ,$id_detail,$ministry_id )
{
		$conn = connect_db("db_news");
			if(!$conn)
					echo "????????????????????????????????????????????";
		$sql = "select * from $tablename  where ministry_id='$ministry_id' ORDER BY $id_detail  DESC ";
		$result = mysql_query($sql);
			if(!$result)
				return 0;
			else
				 return $result;
}

//=========================     +++adduser++++    ====================================
function adduser($max,$user_n,$password1,$names,$email , $regdate)
{
		$conn = connect_db("ph_web");
				if(!$conn)
					echo "????????????????????????????????????????????";
		$sql="insert into admin (u_id,username,password,names, email, login, regdate) 					
		values('$max','$user_n','$password1','$names','$email','0', '$regdate')";
		$result = mysql_query($sql);
		echo"$result = mysql_query($sql);";
			if(!$result)
				return 0;
			else
 				return $result;
}

//=========================     +++adduser++++    ====================================
function adduserstatus($user_n)
{
		$conn = connect_db("db_news");
				if(!$conn)
					echo "????????????????????????????????????????????";
		echo"$username";
		$sql_status="insert into status_admin(username,org,train,Img_activity,job,procure,newpaper,government,sport_news) 					values('$user_n','0','0','0','0','0','0','0','0')";
		$result_status = mysql_query($sql_status);
		echo"$result_status = mysql_query($sql_status);";
			if(!$result_status)
				return 0;
			else
 				return $result_status;
}

//=============================================================================
function show_user($tablename)
{
		#$conn = connect_db("db_news");
		$conn = connect_db($charset);
				if(!$conn)
					echo "????????????????????????????????????????????";
		#$sql = "select * from $tablename  where  username  not like  '%mljeed%' ";
		$sql = "select * from personel
		inner join organization on (personel.per_dept=organization.DeID)
		left join usergroup on (personel.per_type=usergroup.id)
		order by personel.per_fnamet asc";
		$result = mysql_query($sql);
				if(!$result)
					return 0;
				else
 					return $result;
}
//=========================     +++??????????++++    ====================================
function show_data($tablename ,$id_detail)
{
		#$conn = connect_db("db_news");
		#$conn = connect_db("ph_news");
			#if(!$conn)
				#echo "????????????????????????????????????????????";
		$sql = "select * from $tablename  ORDER BY $id_detail  asc ";
		$result = mysql_query($sql);
			if(!$result)
				return 0;
			else
 				return $result;
}
//========================     +++??????????+++    ====================================
function delete_type($tablename ,$id_type)
{
#$conn = connect_db("db_news");
$conn = connect_db("ph_web");
if(!$conn)
echo "????????????????????????????????????????????";
$sql = "delete from $tablename where id_type='$id_type'";
$result = mysql_query($sql);
if(!$result)
	return 0;
else
 return $result;
}
//========================     +++??????????+++    ====================================
function delete_person($tablename ,$id_person)
{
$conn = connect_db("db_news");
if(!$conn)
echo "????????????????????????????????????????????";
$sql = "delete from $tablename where id_person='$id_person'   ";
$result = mysql_query($sql);
if(!$result)
	return 0;
else
 return $result;
}
//========================     +++??????????+++    ====================================
function delete_position($tablename ,$id_position)
{
$conn = connect_db("db_news");
if(!$conn)
echo "????????????????????????????????????????????";
$sql = "delete from $tablename where id_position='$id_position'   ";
$result = mysql_query($sql);
if(!$result)
	return 0;
else
 return $result;
}
//========================     +++??????????+++    ====================================
function delete_user($tablename ,$id_user)
{
	$conn = connect_db("ph_web");
		if(!$conn)
			echo "????????????????????????????????????????????";
	$sql = "delete from $tablename where u_id='$id_user'   ";
	$result = mysql_query($sql);
		if(!$result)
			return 0;
		else
 			return $result;
}




//===============================================================
function status_chack($user)
{
		$conn = connect_db("db_news");
			if(!$conn)
				echo "????????????????????????????????????????????";
		$sql1= "SELECT * FROM   status_admin where  username='$user'";
		$result= mysql_query($sql1);
		$rs= mysql_fetch_array($result);
		$user=$rs[username];
   			if (empty($user ))
			     return true;
  			else
				return false;
}
///=======================================================================


	
function cutstring($str, $len) {
 if (strlen($str)<=$len) return $str;
 else return sprintf("%.".$len."s..", $str);
}	

//format date
function dateThai($date){
	$_month_name = array("01"=>"ม.ค.","02"=>"ก.พ.","03"=>"มี.ค.","04"=>"เม.ย.","05"=>"พ.ค.","06"=>"มิ.ย.","07"=>"ก.ค.","08"=>"ส.ค.","09"=>"ก.ย.","10"=>"ต.ค.","11"=>"พ.ย.","12"=>"ธ.ค.");
	$yy=substr($date,0,4);$mm=substr($date,5,2);$dd=substr($date,8,2);$time=substr($date,11,8);
	$yy+=543;
	if($date != '' and $date != '0000-00-00' and $date != '0000-00-00 00:00:00' and $date != '00000000' and $date!='00000000000000'){
		$dateT=intval($dd)." ".$_month_name[$mm]." ".$yy;
	}else{
		$dateT = '';
	}
	#$dateT=iconv("tis-620","utf-8",$dateT);
	return $dateT;
	}

//???????? ????????????????????
function dateFormat($date){
if($date != '' and $date != '0000-00-00' and $date != '0000-00-00 00:00:00' and $date != '00000000' and $date!='00000000000000'){
			$yy=substr($date,0,4);$mm=substr($date,5,2);$dd=substr($date,8,2);$time=substr($date,11,8);
		$yy2=$yy+543;
		$dateC=intval($dd)."/".$mm."/".$yy2;
	}else{
		$dateC = '';
	}
	return $dateC;
}

function dateFormat_02($date){
if($date != '' and $date != '0000-00-00' and $date != '0000-00-00 00:00:00' and $date != '00000000' and $date!='00000000000000'){
			$yy=substr($date,0,4);$mm=substr($date,5,2);$dd=substr($date,8,2);$time=substr($date,11,5);
		$yy2=$yy+543;
		$dateC=intval($dd)."/".$mm."/".$yy2.", ".$time;
	}else{
		$dateC = '';
	}
	return $dateC;
	}
	
function dateformat_03($date_1) //วันที่พร้อมชื่อวัน
{
	$_date_name = array("Sun"=>"อา.","Mon"=>"จ.","Tue"=>"อ.","Wed"=>"พ.","Thu"=>"พฤ.","Fri"=>"ศ.","Sat"=>"ส.");
	$_month_name = array("01"=>"ม.ค.","02"=>"ก.พ.","03"=>"มี.ค.","04"=>"เม.ย.","05"=>"พ.ค.","06"=>"มิ.ย.","07"=>"ก.ค.","08"=>"ส.ค.","09"=>"ก.ย","10"=>"ต.ค.","11"=>"พ.ย.","12"=>"ธ.ค.");
	$yy=substr($date_1,0,4); $mm=substr($date_1,5,2); $dd=substr($date_1,8,2);
	$yy+=543;
if($date_1!= '' and $date_1 != '0000-00-00' and $date_1 != '0000-00-00 00:00:00' and $date_1 != '00000000' and $date_1!='00000000000000'){		$datet2=date("D", strtotime($date_1));
		$dateT=$_date_name[$datet2].", ".intval($dd)." ".$_month_name[$mm]." ".$yy;
	}else{
		$dateT = '';
	}
	return $dateT;
}

function dateFormat_04($date){
	$yy=substr($date,0,4);$mm=substr($date,5,2);$dd=substr($date,8,2);$time=substr($date,11,8);
	$yy2=$yy+543;
if($date != '' and $date != '0000-00-00' and $date != '0000-00-00 00:00:00' and $date != '00000000' and $date!='00000000000000'){		$dateC=intval($dd)."/".$mm."/".$yy2;
	}else{
		$dateC = '';
	}
	return $dateC;
}
	
/*function   date_sub($date_1)
							{
							global  $y,$m,$d;
							$y=substr("$date_1",0,4);
							$m=substr("$date_1",5,2);
							$d=substr("$date_1",8,2);
							
							}*/	
//format date							
							
							
/*function delete_detail($id_detail)
{
		$con=connect_db("db_news");
			if(!$con)
				return "????????????????????????????? ??????????????????";
		$sql1="select  *  from  detail_news where id_detail='$id_detail'";
		$exec1=mysql_query($sql1);
			while($rs1= mysql_fetch_array($exec1))
				{
					$name=$rs1[file_detail ];
					unlink("photo/$name");
					unlink("thumb/$name");
					unlink("files/$name");
				}
	}*/
function edit_type($id_type,$name_type,$name_type_e)
{
$con=connect_db("db_news");

if(!$con)
	return "????????????????????????????? ??????????????????";
	
$sql="update type_news set  name_type='$name_type' where id_type= $id_type ";
$result = mysql_query($sql);

$sql_e="update type_news set  initial='$name_type_e' where id_type= $id_type ";
$result_e= mysql_query($sql_e);

}

//=======================================================================

// ??????? form ??????
function check_form($formdata){
foreach ($formdata as $key => $value){ 
if (!isset($key) || $value == "" )
return false;
}
return true;
}
//=======================================================================
function edit_position($id_position,$name_position_t,$name_position_e)
{
$con=connect_db("db_news");

if(!$con)
	return "????????????????????????????? ??????????????????";
$sql="update position_news set  name_position_t='$name_position_t' where id_position= $id_position";
$result = mysql_query($sql);
if(!$result)
	return("???????????????????????????");
else
	return true;
$sql_e="update position_news set  name_position_e='$name_position_e' where id_position= $id_position";
$result_e= mysql_query($sql_e);
if(!$result_e)
	return("???????????????????????????");
else
	return true;
}

//=======================================================================
function edit_admin($id_user,$user_n,$password1,$names,$ministry_id,$username_user)

{
echo"edit_admin($id_user,$user_n,$password1,$names,$ministry_id,$username_user)";
$con=connect_db("db_news");
if(!$con)
	return "????????????????????????????? ??????????????????";


$sql_name="update user set  names='$names' where id_user='$id_user'";
$result_name= mysql_query($sql_name);


$sql_pwd="update user set  password='$password1' where id_user='$id_user'";
$result_pwd= mysql_query($sql_pwd);
//echo"$result_pwd= mysql_query($sql_pwd);";
/*if(!$result_pwd)
	return("???????????????????????????");
else
	return true;*/


$sql="update user set  username='$user_n' where id_user='$id_user'";
$result = mysql_query($sql);
//echo"$result = mysql_query($sql);";
/*if(!$result)
	return("???????????????????????????");
else
	return true;*/


$sql_ministry="update user set  ministry_id='$ministry_id' where id_user='$id_user'";
$result_ministry= mysql_query($sql_ministry);

//echo"$result_ministry= mysql_query($sql_ministry);";
/*if(!$result_ministry)
	return("???????????????????????????");
else
	return true;*/
}


//=======================================================================

//=======================================================================
function edit_person($id_person,$title,$name_person,$id_position)
{
//echo"$id_person,$title,$name_person,$id_position";
$con=connect_db("db_news");
//echo"xxx";

if(!$con)
	return "????????????????????????????? ??????????????????";

$sql="update person_most set  title='$title' where id_person= $id_person";
$result = mysql_query($sql);
//echo"$result = mysql_query($sql);";
$sqlname="update person_most set  name_person='$name_person' where id_person=$id_person";
$resultname=mysql_query($sqlname);
//echo"$resultname=mysql_query($sqlname); ****";

$sqle="update person_most set  id_position='$id_position' where id_person=$id_person";
$resulte=mysql_query($sqle);
//echo"$resulte= mysql_query($sqle);+++";

}

//=======================================================================

//show messagealert
function warning($color,$icon,$msg)
{
	$blog_alert = '<div class="alert alert-'.$color.'" role="alert"><strong>'.$icon.'</strong> '.$msg.'</div>';
	return $blog_alert;
}

function warning2_linkin($color,$icon,$msg, $url='', $texturl='', $target='')
{
	$blog_alert = '<div class="alert alert-'.$color.'" role="alert"><strong>'.$icon.'</strong> '.$msg.' <a href="'.$url.'" class="alert-link" target="'.$target.'">'.$texturl.'</a></div>';
	return $blog_alert;
}

function warning3_linkin($color,$icon,$msg, $url, $texturl, $textpos)
{
	$blog_alert = '<div class="alert alert-'.$color.'" role="alert"><p><strong>'.$icon.'</strong> '.$msg.'</p></div>
							<p class="'.$textpos.'"><a href="'.$url.'" class="btn btn-link btn-lg">'.$texturl.'</a></a></p>';
	return $blog_alert;
}

function warning4_linkin($color, $icon, $msg, $url='', $texturl='', $target='')
{
	$blog_alert = '<div class="alert alert-'.$color.'" role="alert"><h4>'.$icon.'</h4>'.$msg.' <a href="'.$url.'" class="alert-link" target="'.$target.'">'.$texturl.'</a></div>';
	return $blog_alert;
}
//show messagealert

function maxid($db, $table, $colume){
	$sql="select max($colume) as a from $table";
	$rs=mysqli_query($db, $sql);
	$ob=mysqli_fetch_assoc($rs);
	$a=$ob["a"];
	if(!$a)
		return 1;
	else
 		return $a+1;
}
function maxid_02($table, $colume, $where){
	$sql="select max($colume) as a from $table where ".$where;
	$rs=mysql_query($sql);
	$ob=mysql_fetch_assoc($rs);
	$a=$ob["a"];
	if(!$a)
		return 1;
	else
 		return $a+1;
}

function get_refno($datestr,$maxid){
		//$refno = date('Y').'/'.sprintf('%03d',$maxid);
		//$refno = date('Y').'/0'.$maxid;
		$refno = budgetyear_02($datestr).'-0'.$maxid;
		return $refno;
}

//blog content
function blockcontent($color,$title,$inc){
	print '<div class="panel panel-'.$color.'">';
		print '<div class="panel-heading"><h3 class="panel-title">'.$title.'</h3></div>';
		print "<div class='panel-body'>";
			print $inc;
		print "</div>";
	print "</div>";
}
function blockcontent_withfooter($color,$title,$inc,$footer){
	print '<div class="panel panel-'.$color.'">';
		print '<div class="panel-heading"><h3 class="panel-title font-20">'.$title.'</h3></div>';
		print "<div class='panel-body'>";
			print $inc;
		print "</div>";
		print '<div class="panel-footer">'.$footer.'</div>';
	print "</div>";
}
function blockcontent_02($color,$title,$inc){
	print '<div class="panel panel-'.$color.'">';
		print '<div class="panel-heading"><h3 class="panel-title font-20">'.$title.'</h3></div>';
		print "<div class='panel-body'>";
			print $inc;
		print "</div>";
	print "</div>";
}
function blockcontent_03($title,$body){
	$blog ='<div class="blog-gray">					
					<div class="blog-body">
						<strong>'.$title.'</strong><hr>
						'.$body.'
					</div>
           </div>';
	return $blog;
}
function blockcontent_04($title,$body){
	$blog='<div class="page-header-05"><div class="text-title">'.$title.'</div></div>';
	$blog.=$body;
	$blog.='<hr>';
	return $blog;
}
function blockcontent_05($title,$body){
	$blog='<div class="page-header-04">'.$title.'</div>';
	$blog.=$body;
	$blog.='<hr>';
	return $blog;
}
function blockcontent_06($title,$body){
	$blog='<div class="blog-content">';
	$blog.='<strong>'.$title.'</strong><hr>';
	$blog.=$body;
	$blog.='</div>';
	return $blog;
}
function blockcontent_07($title,$body){
	$blog='<h4>'.$title.'</h4>';
	$blog.=$body;
	$blog.='<hr>';
	return $blog;
}
function blockcontent_08($title,$body){
	$blog='<div class="blog-gray-02">';
	$blog.='<div class="blog-title">'.$title.'</div>';
	$blog.='<div class="blog-body">'.$body.'</div>';
	$blog.='</div>';
	return $blog;
}
function blockcontent_09($color,$title,$hrefclose,$inc,$footer=''){
	print '<div class="panel panel-'.$color.'">';
		print '<div class="panel-heading clearfix">
			<h3 class="panel-title font-20 pull-left">'.$title.'</h3>
			<div class="pull-right"><a href="'.$hrefclose.'" class="close" data-toggle="tooltip" data-placement="bottom" title="ปิด"><span aria-hidden="true">&times;</span> ปิด</a></div>
		</div>';
		print "<div class='panel-body'>";
			print $inc;
		print "</div>";
		if($footer!=''){print '<div class="panel-footer">'.$footer.'</div>';}
	print "</div>";
}
//blog content

//random string&number
function random_password($len){
	srand((double)microtime()*10000000);
	/*$chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";*/
	$chars='ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
	$ret_str = "";
	$num = strlen($chars);
	for($i = 0; $i < $len; $i++){
		$ret_str.= $chars[rand()%$num];
		$ret_str.=""; 
	}
	$y=date("Y");
	$yy=$y+543;
	$ret_str = substr($yy,'2','2').$ret_str;
	return $ret_str; 
}
function random_ID($len, $mode){
	srand((double)microtime()*10000000);
	switch($mode){
		case "1":
			$chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
		break;
		case "2";
			$chars = "012345678901234567890123456789".date('YmdHis');
		break;
		default:
			$chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789".date('YmdHis');
	}

	$ret_str = "";
	$num = strlen($chars);
	for($i = 0; $i < $len; $i++){
		$ret_str.= $chars[rand()%$num];
		$ret_str.="";
	}
	$y=date("Y");
	$yy=$y+543;
	$ret_str=substr($yy,"2","2").$ret_str;
	return $ret_str;
}
function random_ID2($len, $mode=0){
	srand((double)microtime()*10000000);
	switch($mode){
		case "1":
			$chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
		break;
		case "2";
			$chars = "0123456789";
		break;
		default:
			$chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
	}

	$ret_str = "";
	$num = strlen($chars);
	for($i = 0; $i < $len; $i++){
		$ret_str.= $chars[rand()%$num];
		$ret_str.="";
	}
	return $ret_str;
}
function generateRandomString($length = 10) {
    $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}
//random string&number

function show_persent($pp,$name)
{
	print "<select name='".$name."'>";
	for($p=0;$p<=100;$p++)
	{
		if($pp == $p)
		{
			print "<option value=".$p." selected>".$p."%</option>";
		}
		else
		{
			print "<option value=".$p.">".$p."%</option>";
		}
	}
	print "</select>";
}
function show_persent2()
{
	for($p=0;$p<=100;$p++)
	{
		print "<option value=".$p.">".$p."%</option>";
	}
}

function select_budget_year()
{
	$sql="select budget_year from project
	group by budget_year
	order by budget_year desc";
	$rs=mysql_query($sql);
	print "<select name='y'>";
	while($ob=mysql_fetch_array($rs))
	{
		print "<option value=".$ob[budget_year].">".$ob[budget_year]."</option>";
	}
	print "</select>";
}

function risK_score($score)
{
	if($score <= 3)
	{
		$a="น้อย";
	}
	else if($score <= 9)
	{
		$a="ปานกลาง";
	}
	else if($score <= 16)
	{
		$a="สูง";
	}
	else if($score <= 25)
	{
		$a="สูงมาก";
	}
	return $a;
}

function dropdown_budgetyear($budget_year,$color='inverse',$size='lg')
{
	print "<select name='budget_year' class='form-control select select-".$color." select-".$size."'  data-toggle='select'>";
		print '<option value="">&raquo; ปีงบประมาณ</option>';
				$y=date("Y");
				$yc=$y+543;
				$ys=$yc-10;
				$yn=$yc+5;
				for($yy=$ys;$yy<=$yn;$yy++){
					if($yy == $budget_year){
            			print "<option value='".$yy."' selected='selected'>&raquo; ปีงบประมาณ ".$yy." -</option>";
					}else{
						print "<option value='".$yy."'>&raquo; ปีงบประมาณ ".$yy." -</option>";
					}
				}
            print "</select>";
}

//งบประมาณที่งานได้รับ
function budget_all($staff,$budget=5000){
	$result = $budget*$staff;
	return $result;
}

// คำนวณปีงบประมาณ
function budgetyear($str=0){
	$str = (!$str)? date('Ymd'): $str;
	$str_d = substr($str,6,2);
	$str_m = substr($str,4,2);
	$str_y = substr($str,0,4);
	$str_y = ($str_m > '09')? $str_y+544 : $str_y+543;
	return $str_y;
}
function budgetyear_02($str=0){
	$str = (!$str)? date('Y-m-d'): $str;
	$str_d = substr($str,8,2);
	$str_m = substr($str,5,2);
	$str_y = substr($str,0,4);
	$str_y = ($str_m > '09')? $str_y+544 : $str_y+543;
	return $str_y;
}
function budgetyear_03($str=0){
	$str = (!$str)? date('Y-m-d'): $str;
	$str_d = substr($str,8,2);
	$str_m = substr($str,5,2);
	$str_y = substr($str,0,4);
	//$str_y = ($str_m > '09')? $str_y+544 : $str_y+543;
	if($str_m > '09'){
		$str_y2=$str_y+1;
	}else{
		$str_y=$str_y;
	}
	return $str_y.'-10-01/'.$str_y2.'-09-30';
}
// คำนวณปีงบประมาณ

// เพิ่ม '0' หน้าข้อมูล
function addzero($str,$len){
	$chars = "0";
	$ret_str = "";
	$len_str = strlen($str);
	$len = $len - $len_str;
	for($i = 0; $i < $len; $i++){
		$ret_str.= $chars;
		$ret_str.="";
	}
	$ret_str.= $str;
	return $ret_str;
}

//select time
function select_time($name, $default, $color='inverse', $size='', $start='0', $end='23', $step='30') //ตัวแปร, ค่าเริ่มต้น, เริ่ม, จบ, นาที
{
	$timepicker='<select name="'.$name.'" class="form-control select select-'.$color.' select-'.$size.'" data-toggle="select">';
		$timepicker.='<option value="">&raquo; เวลา &laquo;</option>'; 
	for($t=$start;$t<=$end;$t++)
	{
		$t = sprintf("%02d",$t);
		for($m=0;$m<=59;$m+=$step)
		{
			$m = sprintf("%02d",$m);
			$get_time=$t.":".$m;
			if(substr($default,'0','5') == $get_time){
				$timepicker.='<option value="'.$get_time.'" selected>&raquo; '.$get_time.' &laquo;</option>';
			}else{
				$timepicker.='<option value="'.$get_time.'">&raquo; '.$get_time.' &laquo;</option>';
			}
		}
	}
	$timepicker.='</select>';
	return $timepicker;
}

function convert_date_2db($date){
	$date = explode('/',$date);
	return $date[2].'-'.$date[1].'-'.$date[0];
}

//หาจำนวนชั่วโมงอบรม
function GettrainingHour($date1, $date2, $time1, $time2){
	$tDate=ceil((strtotime($date2) - strtotime($date1))/86400)+1;
	$tHour=((strtotime($time2) - strtotime($time1))%86400)/3600;
	//$tHour=intval(((strtotime($time2) - strtotime($time1))%86400)/3600);
	if($tHour>6){$tHour='6';}
	return $tDate*$tHour;
}
function duration($begin,$end){
    $remain=intval(strtotime($end)-strtotime($begin));
    $wan=floor($remain/86400);
    $l_wan=$remain%86400;
    $hour=floor($l_wan/3600);
    $l_hour=$l_wan%3600;
    $minute=floor($l_hour/60);
    $second=$l_hour%60;
    return "ผ่านมาแล้ว ".$wan." วัน ".$hour." ชั่วโมง ".$minute." นาที ".$second." วินาที";
}
function Showtraininghour($traininghour){
	$th=explode('.',$traininghour);
	if($th['1']=='5'){
		return $th['0'].' ชม. 30 นาที';
	}else if($th['1']==''){
		return $th['0'].' ชม.';
	}
}
//หาจำนวนชั่วโมงอบรม
//echo budgetyear_03(date('Y-m-d'));
?>
