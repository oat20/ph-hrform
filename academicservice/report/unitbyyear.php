<?php
    $strXML = "<chart caption='รายงานจำนวนโครงการตามปีงบประมาณ' subCaption='' pieSliceDepth='30' showBorder='1' formatNumberScale='0' numberSuffix='' animation='0' baseFontsize='12' xAxisName='ปีงบประมาณ' yAxisName='จำนวนโครงการ' showToolTip='0' chartTopMargin='25'>";
	
	$y=date("Y");
				$yc=$y+543;
				$ys=$yc-4;
				for($yy=$ys;$yy<=$yc;$yy++){
	
    $strQuery = "SELECT COUNT( pro_id ) AS a1
FROM project
where budget_year='$yy'";
    $result = mysql_query($strQuery) or die(mysql_error());
    if ($result) {
       $ors = mysql_fetch_array($result); 
            $strXML .= "<set label='" . $yy . "' value='" . $ors['a1'] . "' />";
        }
				}
    $strXML .= "</chart>";
		
	echo renderChart("Bar2D.swf", "", $strXML, "unitbyyear", 650, 400, false, false);
?>
