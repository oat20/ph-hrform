<?
 // แสดงค่า error ต่างๆที่รับเข้ามา
function msg($st){
	print "	
	<form  name='form1' method='post' action='javascript:history.back(1)'>
	<table width='50%'  border='1' align='center' cellpadding='0' cellspacing='0' bordercolor='#0000FF'>
  <tr><td bgcolor='#0000FF'><font color='#FFFFFF' ><b>เกิดข้อผิดพลาด</b></font></td>
  </tr><tr>
    <td><br><font color='red'><center>".$st."</center></font><br>
	        <div align='center'>
          <input type='submit' name='Submit' value='ตกลง'>
        </div>
          </td>
  </tr></table> </form> 
";
exit();
}
// ตรวจสอบ form ทั้งหมด
function check_form($formdata){
foreach ($formdata as $key => $value){ 
if (!isset($key) || $value == "" )
return false;
}
return true;
}
//แปลงจากตัวเลขเป็นจำนวนเงิน
function intToMoney($num){
$num=intval($num);
$ed=strlen($num)%3;
$str=substr($num,0,$ed); 
for($i=$ed;$i<strlen($num);$i+=3)
$str=$str.",".substr($num,$i,3);
if($ed==0)
$str=substr($str,1,strlen($str));
return $str;
}
//วันที่ของปี
function dayofyear($date){
$yy=substr($date,0,4);$mm=substr($date,5,2);$dd=substr($date,8,2);
$m=array();
$m['01']=0;$m['02']=31;$m['03']=59;$m['04']=90;$m['05']=120;$m['06']=151;
$m['07']=181;$m['08']=212;$m['09']=243;$m['10']=273;$m['11']=304;$m['12']=334;
$day=$m[$mm];
if(($yy%4==0)&&($mm>"02"))
$dayofyear=$day+$dd+1;
else
$dayofyear=$day+$dd;
return $dayofyear;
}
 //หาจำนวนวันเริ่มจากวันที่เริมต้นถึงวันที่สิ้นสุด
function numDay($st_date,$ed_date){
$st_y=substr($st_date,0,4);
$ed_y=substr($ed_date,0,4);
$st_dofy=dayofyear($st_date);
$ed_dofy=dayofyear($ed_date);
if($st_y<>$ed_y){
for($i=$st_y;$i<=$ed_y;$i++){		
		if($i%4==0)
		$day=366;
		else 
		$day=365;
		if($i==$st_y)
		$day=$day-$st_dofy;
		if($i==$ed_y)
		$day=$ed_dofy;
		$num=$num+$day;
}
}else{
$num=$ed_dofy-$st_dofy;
}return $num;
}
//ฟังก์ชั่น วันที่
function dateThai($date){
	$_month_name = array("01"=>"ม.ค.","02"=>"ก.พ.","03"=>"มี.ค.","04"=>"เม.ย.","05"=>"พ.ค.","06"=>"มิ.ย.","07"=>"ก.ค.","08"=>"ส.ค.","09"=>"ก.ย.","10"=>"ต.ค.","11"=>"พ.ย.","12"=>"ธ.ค.");
	$yy=substr($date,0,4);$mm=substr($date,5,2);$dd=substr($date,8,2);$time=substr($date,11,8);
	$yy+=543;
	$dateT=intval($dd)." ".$_month_name[$mm]." ".$yy." ".$time;
	return $dateT;
	}


?>
<script language=javascript>
//แสดง dialog เตือนการลบข้อมูล
	function del(varUrl)
	{
		if (window.confirm("ยืนยันการยกเลิกข้อมูล")==true)
		{
			window.open(varUrl,"_self")
		}
	}
</script>
