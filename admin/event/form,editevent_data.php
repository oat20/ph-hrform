<?
include("db.php");
?>
<title>แก้ไขรายการนัดหมาย</title>
<style> 
<!--
BODY {
scrollbar-face-color: #eeeeee;
scrollbar-shadow-color: #687888;
scrollbar-highlight-color: #eeeeee;
scrollbar-3dlight-color: #687888;
scrollbar-darkshadow-color: #eeeeee;
scrollbar-track-color: #eeeeee;
scrollbar-arrow-color: #6E7E88; 
}
--> 

</style>
		<link rel="stylesheet" type="text/css" media="all" href="../themes/aqua.css" title="Calendar Theme - forest.css" >
<!-- import the calendar script -->
		<script type="text/javascript" src="../script/utils.js"></script>
		<script type="text/javascript" src="../script/calendar.js"></script>
<!-- import the language module -->
		<script type="text/javascript" src="../script/calendar-th.js"></script>
<!-- other languages might be available in the lang directory; please check
		your distribution archive. -->
<!-- import the calendar setup script -->
		<script type="text/javascript" src="../script/calendar-setup.js"></script>
<meta http-equiv="Content-Type" content="text/html; charset=windows-874"></head>
<?
		$sql2="select * from calendar_events
		where id='$keyid'";
		$exec2=mysql_query($sql2,$db) or die("not connect database");
		$rs2=mysql_fetch_array($exec2);
		$startdate=$rs2[startdate];
		$location=$rs2[location];
		$description=$rs2[description];
		$id=$rs2[id];
		$starttime=$rs2[starttime];
		$endtime=$rs2[endtime];
		
		$hourstr=substr($starttime,0,2);
		$minutestr=substr($starttime,3,2);
		$hourstr2=substr($endtime,0,2);
		$minutestr2=substr($endtime,3,2);
		
		/*$dd=substr($start_date,8,2);
		$mm=substr($start_date,5,2);
		$yy=substr($start_date,0,4);
		
		$dd2=substr($end_date,8,2);
		$mm2=substr($end_date,5,2);
		$yy2=substr($end_date,0,4);
		
		$m_array = array("มกราคม","กุมภาพันธ์","มีนาคม","เมษายน","พฤษภาคม","มิถุนายน","กรกฎาคม","สิงหาคม","กันยายน","ตุลาคม","พฤศจิกายน","ธันวาคม"); 
		$sm=$m_array[date("$mm")-1];
		$em=$m_array[date("$mm2")-1];
		$month2_array=array("01","02","03","04","05","06","07","08","09","10","11","12");*/
		
		$h_array=array("00","01","02","03","04","05","06","07","08","09","10","11","12","13","14","15","16","17","18","19","20","21","22","23");
		$mm_array=array("00","05","10","15","20","25","30","35","40","45","50","55");
		?>
<table border="0">
  <form name="calendar" method="post" action="editevent.php?id=<? echo $id ?>" enctype="multipart/form-data">
    <tr>
      <td valign="top" class="boldBlack_14">กิจกรรม : </td>
      <td><TEXTAREA NAME="activity" ROWS="4" COLS="80" wrap="virtual"><? print $rs2[activity]; ?></TEXTAREA></td>
    </tr>
    <tr> 
      <td valign="middle" class="boldBlack_14">วันที่ :</font>&nbsp;</td>
      <td class="font14"><input type="text" name="startdate" id="sel4" size="15" value="<?php echo $startdate; ?>" readonly="true"> 
        <input type="reset" value="เลือกวัน" id='button4' onclick="alert('click');"> 
        <script type="text/javascript">
		var cal = new Zapatec.Calendar.setup({
		
		inputField     :    "sel4",     // id of the input field
		ifFormat       :    "%Y-%m-%d",     // format of the input field
		showsTime      :     false,
		button         :    "button4",  // trigger button (well, IMG in our case)
		align          :    "Tl"           // alignment (defaults to "Bl")
		
		});
		
	</script>
	ถึง
	<input name="enddate" type="text" id="enddate" size="15" value="<?php echo $rs2[enddate]; ?>"> 
        <input type="reset" value="เลือกวัน" id='button' onclick="alert('click');"> 
        <script type="text/javascript">
		var cal = new Zapatec.Calendar.setup({
		
		inputField     :    "enddate",     // id of the input field
		ifFormat       :    "%Y-%m-%d",     // format of the input field
		showsTime      :     false,
		button         :    "button",  // trigger button (well, IMG in our case)
		align          :    "Tl"           // alignment (defaults to "Bl")
		
		});
		
	</script>
	</td>
    </tr>
    <tr> 
      <td valign="top" class="boldBlack_14"> เวลา :&nbsp;      </td>
      <td class="font14"> 
	  <select name="hour" size="1" id="hour">
          <option value="<?php echo $hourstr; ?>"><? echo $hourstr ?></option>
          <?php
														for($i=00; $i<=23; $i++) 
														{
                      											echo"<option value=$h_array[$i]>$h_array[$i]</option>";
														}
											?>
        </select>
		<select NAME="minute" SIZE=1 id="minute">
          <option value="<?php echo $minutestr; ?>"><? echo $minutestr ?></option>
          <?php
														for($i=00; $i<=11; $i++) 
														{
                      											echo"<option value=$mm_array[$i]>$mm_array[$i]</option>";
														}
											?>
        </select>&nbsp;ถึง&nbsp;
		<select NAME="hour2" SIZE=1 id="hour2">
          <option value="<?php echo $hourstr2; ?>"><? echo $hourstr2 ?></option>
          <?php
														for($i=00; $i<=23; $i++) 
														{
                      											echo"<option value=$h_array[$i]>$h_array[$i]</option>";
														}
											?>
        </select>
		<select NAME="minute2" SIZE=1 id="minute2">
          <option value="<?php echo $minutestr2; ?>"><? echo $minutestr2 ?></option>
          <?php
														for($i=00; $i<=11; $i++) 
														{
                      											echo"<option value=$mm_array[$i]>$mm_array[$i]</option>";
														}
											?>
        </select>
	  </td>
    </tr>
    <tr> 
      <td class="boldBlack_14">สถานที่ :&nbsp; </td>
      <td><input name="location" type="text" id="location2" value="<? echo $location ?>" size="50" maxlength="256"></td>
    </tr>
	<tr> 
      <td valign="top" class="boldBlack_14">รายละเอียด :&nbsp;</td>
      <td> <textarea name="message" cols=80 rows="6" wrap="VIRTUAL"><? echo $description ?></textarea> 
      </td>
    </tr>
    <tr>
      <!--<td align="right" valign="top" class="font14">ผู้รับผิดชอบ</td>
      <td>&nbsp;</td>
    </tr>
    <tr> 
      <td align="right" valign="top" class="font14">หน่วยงาน&nbsp;:&nbsp;</td>
      <td> <select name="depid">
          <option value="<? //print $rs2[depid]; ?>"><? //print $rs2[department]; ?></option>
          <? /*require'db.php';
						$sql="select  * from department";
						$result=mysql_query($sql, $db);
						while($row=mysql_fetch_array($result)){*/						
						?>
          <option value="<? //print $row["depid"]?>"><? //print $row["department"];?></option>
          <?
						//} 
					?>
        </select> </td>
    </tr>
	<tr> 
      <td align="right" class="font14">หน่วยงานอื่น ๆ&nbsp;:&nbsp; 
      </td>
		<td><input name="editanother" type="text" id="editanother" value="<? //print $rs2[another]; ?>" size="50"></td> -->
    </tr>
    <tr> 
      <td class="boldBlack_14">ผู้รับผิดชอบ&nbsp;:&nbsp;      </td>
	  <td><input name="responsible" type="text" id="responsible" value="<? print $rs2[responsible]; ?>" size="50"></td>
    </tr>
    <tr> 
      <td valign="top" class="boldBlack_14">โทรศัพท์
          :&nbsp;</td>
	  <td><input name="tel" type="text" id="tel" value="<? print $rs2[tel]; ?>" size="40"></td>
    </tr>
    <tr> 
      <td class="boldBlack_14">โทรสาร&nbsp;:&nbsp;      </td>
	  <td><input name="fax" type="text" id="fax" value="<? print $rs2[fax]; ?>" size="40"></td>
   </tr>
   <tr> 
      <td class="boldBlack_14">Email&nbsp;:&nbsp;      </td>
	  <td><input name="email" type="text" id="email" value="<? print $rs2[email]; ?>" size="40"></td>
   </tr>
   <tr> 
      <td class="boldBlack_14">ไฟล์ข้อมูล&nbsp;:&nbsp;
      </td>
		<td><input name="file" type="file" size="50"></td>
   </tr>
   <tr> 
      <td align="right">&nbsp;
      </td>
		<td class="boldBlack_14"><input name="disable" type="checkbox" id="disable" value="disable">&nbsp;ยกเลิกกิจกรรม</td>
	</tr>
    <tr> 
      <td colspan="5">
          <input type="submit" name="Submit" value="แก้ไขข้อมูล" class="button">
          <input type="button" name="Submit" value="ยกเลิก" class="button" onClick="location.href='event.php'">
          </td>
    </tr>
  </form>
</table>
