<?
include"cal_func.php";
?>
<title>ปฏิทินกิจกรรม กระทรวงวิทยาศาสตร์และเทคโนโลยี</title>
<link href="../style/calendar.css" rel="stylesheet" type="text/css">
<meta http-equiv="Content-Type" content="text/html; charset=windows-874">
<script language="JavaScript" type="text/JavaScript">
<!--
function MM_openBrWindow(theURL,winName,features) { //v2.0
  window.open(theURL,winName,features);
}
//-->
</script>
<body>
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
            <tr>
			<td>
              <table width="100%" border="0" cellspacing="0" cellpadding="3">
                  <tr bgcolor="#004080">
                    <td width="13%" class="title"><div align="left" class="style1"><a href="<? //echo $PHP_SELF; ?>index.php?Y=<? echo $cal_prev_year ?>&m=<? echo $cal_prev_month ?>&d=<? echo $cal_day ?>">&lt;&lt;</a></div></td>
                    <td width="76%" class="title"><div align="center"><?php echo $_month_name[$cal_month]."&nbsp;&nbsp;พ.ศ.&nbsp;".($cal_year+543);?></div></td>
                    <td width="11%" class="title"><div align="right"><span class="style1"></span><a href="<? //echo $PHP_SELF; ?>index.php?Y=<? echo $cal_next_year ?>&m=<? echo $cal_next_month ?>&d=<? echo $cal_day; ?>">&gt;&gt;</a><span class="style1"></span></div></td>
                </tr>
              </table>
				 <!-- ตารางแสดงปฏิทิน -->
                <table width="100%" border="0" cellpadding="3" cellspacing="1" class="overview" >
                  <tr>
                    <td height="21" class="dayname"><div align="center">จ</div></td>
                    <td class="dayname"><div align="center">อ</div></td>
                    <td class="dayname"><div align="center">พ</div></td>
                    <td class="dayname"><div align="center">พฤ</div></td>
                    <td class="dayname"><div align="center">ศ</div></td>
                    <td class="dayname"><div align="center">ส</div></td>
                    <td class="dayname"><div align="center"><font color="#FF0000">อา</font></div></td>
                  </tr>
<?php
require_once('db.php');
$query_rsCal = "select startdate,enddate from calendar_events";
$rsCal = mysql_query($query_rsCal, $db) or die(mysql_error());
$row_rsCal = mysql_fetch_assoc($rsCal);

//เอาวันเริ่มและสิ้นสุดมาเก็บใน array เพื่อใช้ในการเปรียบเทียบ
$st=array();$ed=array();
$i=0;
do{
$st[$i]=$row_rsCal['startdate'];
$ed[$i]=$row_rsCal['enddate'];
 $i++;} while ($row_rsCal = mysql_fetch_assoc($rsCal)); 

for($i=0;$i<count($st);$i++)
{
 $ed[$i]=substr($ed[$i],0,4).substr($ed[$i],5,2).substr($ed[$i],8,2);
 $st[$i]=substr($st[$i],0,4).substr($st[$i],5,2).substr($st[$i],8,2);
}

	if ( ( $cal_year == $cur_year ) && ( $cal_month == $cur_month ) )
	{
		$today_day = $cur_day;
	} else $today_day = 0;
	//จำนวนวันในเดือนที่แล้ว จำนวนวันในเดือนนี้  หาค่าวันที่ 1 ของเดือนแบบสัปดาห์
	$days_last_month = num_days( $cal_prev_year, $cal_prev_month );
	$days_this_month = num_days( $cal_year, $cal_month );
	$first_day_pos = date( "w", mktime( 0,0,0,$cal_month,1,$cal_year) );
	//เปลี่ยนค่าที่ได้ถ้าเป็นวันอาทิตย์ให้เท่ากับ 7 แทน Mo=1 to Su=7
	if ( $first_day_pos == 0 ) $first_day_pos = 7; 
	
	$day_num= $days_last_month - ($first_day_pos-2); 
	$class="last_month";
	$p=array();
	
	for ( $y=1; $y<=6; $y++ )
	{
		echo "<tr>";
		for ( $x=1; $x<=7; $x++ )
		{
			if ( ($y==1) && ($x==$first_day_pos) ) 
			{ 
				$day_num = 1; $class="";
			}
			if ( ($y >1) && ($day_num>$days_this_month) ) 
			{ 
				$day_num = 1; $class="next_month"; 
			}
			if ( ($class=="") && ($day_num == $today_day) )
			{
				$id="today";
			} else $id="";
			if ( $class == "" ){ 
			if($cal_month<=9)
			$mm="0".$cal_month;
			else $mm=$cal_month;
			
			if($day_num<=9)
			$dd="0".$day_num;
			else $dd=$day_num;
			$times=$cal_year."-".$mm."-".$dd;
			}
			$cur_day=$cal_year.$mm.$dd;
			for($i=0;$i<count($st);$i++){
			if(($cur_day>=$st[$i])&&($cur_day<=$ed[$i])){
			$p[$day_num]=1;
			}
			}
			if($p[$day_num]==1&&$class==""){
			?>
			
          <td class="<? echo $class; ?>" id="<? echo $id; ?>" bgcolor=#FF6600>
<div align="center"><a href="index2.php?year=<? echo $cal_year; ?>&month=<? echo $mm; ?>&day=<? echo $dd; ?>"><? echo $day_num; ?></a></div></td><?
			}else{ 
			echo "<td class='".$class."' id='".$id."' bgcolor=#E9E9E9><div align='center'>".$day_num."</div></td>";
			}
			$day_num++;								
			} ?>
		</tr>
<? } 
?>
              </table>
<!--สิ้นสุดปฏิทินเหตุการณ์ -->
<table width="100%" border="0" cellpadding="3" cellspacing="0">
  <tr>
  <td bgcolor=#E9E9E9><div align="center"><FONT SIZE="2" COLOR=""><a href="<? //echo $PHP_SELF; ?>index.php">วันที่ปัจจุบัน</a></FONT></div></td>
  </tr></table>
			  </td>
            </tr>
        </table>

