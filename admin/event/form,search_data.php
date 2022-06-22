<?php
session_start();
if($user == "")
{
	header("Location: login_oc.php");
}
?>
<style type="text/css">
<!--
input {
	font-family: "MS Sans Serif", Thonburi;
	font-size: 14px;
}
.comp0048_normaltext{
	font-family: "MS Sans Serif", Thonburi;
	font-size: 14px;
}
-->
</style>
<table width="100%" border="0">
<form action="index2.php" method="post" name="form_search" id="form_search" enctype="multipart/form-data">
  <tr>
    <td align="right" class="comp0048_normaltext"><b>ค้นหาปฏิทินกิจกรรม</b>&nbsp;&nbsp;เดือน&nbsp;
<select NAME="month">
            <?php
															$month_array = array("มกราคม","กุมภาพันธ์","มีนาคม","เมษายน","พฤษภาคม","มิถุนายน","กรกฎาคม","สิงหาคม","กันยายน","ตุลาคม","พฤศจิกายน","ธันวาคม");
															for($i=0; $i<12; $i++) 
															{
															   $j=$i+1;
																$j = sprintf("%02d",$j);
															   if($j == date("m")) 
																  echo("<OPTION VALUE=\"$j\" SELECTED>$month_array[$i]");
															   else
																  echo("<OPTION VALUE=\"$j\">$month_array[$i]");
															} 
													?>
</select>&nbsp;&nbsp;ปี&nbsp;<select name="yy" id="yy">
 						<?
								 for($i=2005;$i<=2015;$i++)
								 { 
								 $temp=$i;
								 $temp2=$temp+543;
								//$temp= sprintf("%02d",$temp);								
								if($temp==date('Y'))
			    				echo"<option value='$temp'selected>$temp2</option>";
			   					else  echo"<option value='$temp'>$temp2</option>";
				 				}?>
                      </select>&nbsp;
                      <input name="imageField" type="image" src="../img/th_search.gif" width="37" height="16" border="0">
</td>
  </tr>
</form>
</table>
