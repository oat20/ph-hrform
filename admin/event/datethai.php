<? function dateThai($date)
{
	$_month_name = array("01"=>"���Ҥ�","02"=>"����Ҿѹ��","03"=>"�չҤ�","04"=>"����¹","05"=>"����Ҥ�","06"=>"�Զع�¹","07"=>"�á�Ҥ�","08"=>"�ԧ�Ҥ�","09"=>"�ѹ��¹","10"=>"���Ҥ�","11"=>"��Ȩԡ�¹","12"=>"�ѹ�Ҥ�");
	$yy=substr($date,0,4);$mm=substr($date,5,2);$dd=substr($date,8,2);$time=substr($date,11,8);
	$yy+=543;
	$dateT=intval($dd)." ".$_month_name[$mm]." ".$yy." ".$time;
	return $dateT;
	} ?>