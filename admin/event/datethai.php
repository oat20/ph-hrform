<? function dateThai($date)
{
	$_month_name = array("01"=>"มกราคม","02"=>"กุมภาพันธ์","03"=>"มีนาคม","04"=>"เมษายน","05"=>"พฤษภาคม","06"=>"มิถุนายน","07"=>"กรกฏาคม","08"=>"สิงหาคม","09"=>"กันยายน","10"=>"ตุลาคม","11"=>"พฤศจิกายน","12"=>"ธันวาคม");
	$yy=substr($date,0,4);$mm=substr($date,5,2);$dd=substr($date,8,2);$time=substr($date,11,8);
	$yy+=543;
	$dateT=intval($dd)." ".$_month_name[$mm]." ".$yy." ".$time;
	return $dateT;
	} ?>