<? 
$_month_name = array("01"=>"���Ҥ�","02"=>"����Ҿѹ��","03"=>"�չҤ�","04"=>"����¹","05"=>"����Ҥ�","06"=>"�Զع�¹","07"=>"�á�Ҥ�","08"=>"�ԧ�Ҥ�","09"=>"�ѹ��¹","10"=>"���Ҥ�","11"=>"��Ȩԡ�¹","12"=>"�ѹ�Ҥ�");

$y1=$year+543;

$barid="�Ԩ������Ш��ѹ���&nbsp;".intval($day)."&nbsp;".$_month_name[$month]."&nbsp;".$y1;

$dataid="eventselect.php";

include $levelpath."block/templateblock.php"; ?>
