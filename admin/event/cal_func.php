<?php
	$_month_name = array();
	$_month_name[1]         = "���Ҥ�";
	$_month_name[2]         = "����Ҿѹ��";
	$_month_name[3]         = "�չҤ�";
	$_month_name[4]         = "����¹";
	$_month_name[5]         = "����Ҥ�";
	$_month_name[6]         = "�Զع�¹";
	$_month_name[7]         = "�á�Ҥ�";
	$_month_name[8]         = "�ԧ�Ҥ�";
	$_month_name[9]         = "�ѹ��¹";
	$_month_name[10]        = "���Ҥ�";
	$_month_name[11]        = "��Ȩԡ�¹";
	$_month_name[12]        = "�ѹ�Ҥ�";	



	// when is now? ;-)
	$now = gmdate( "Y-m-d" );
	$curdate = split( "-", $now );


	$cur_year  = intval($curdate[0]);
	$cur_month = intval($curdate[1]);
	$cur_day   = intval($curdate[2]);
	
	if ( !empty( $HTTP_GET_VARS[ "Y" ] ) )
	{
		$cal_year = $HTTP_GET_VARS[ "Y" ];
	} else $cal_year = $cur_year;
	
	if ( !empty( $HTTP_GET_VARS[ "m" ] ) )
	{
		$cal_month = $HTTP_GET_VARS[ "m" ];
	} else $cal_month = $cur_month;

	if ( !empty( $HTTP_GET_VARS[ "d" ] ) )
	{	
		$cal_day = $HTTP_GET_VARS[ "d" ];
	} else 
	{
	$cal_day = $cur_day;

	}
	// ???????????????????
	$cal_next_year = $cal_year;
	if ( $cal_month < 12 )
	{
		$cal_next_month = $cal_month + 1;
	}
	else 
	{
		$cal_next_month = 1;
		$cal_next_year = $cal_year + 1;
	}
	
	// ???????????????????????
	$cal_prev_year = $cal_year;
	if ( $cal_month > 1 )
	{
		$cal_prev_month = $cal_month - 1;
	} 
	else 
	{
		$cal_prev_month = 12;
		$cal_prev_year = $cal_year - 1;
	}

		
	function num_days( $year, $month )
	{
		$num = 31;
		while (!checkdate( $month, $num, $year ) ) { $num--; }
		return $num;	
	}
	
?>
