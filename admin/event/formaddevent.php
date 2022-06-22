<link rel="stylesheet" type="text/css" href="../style/default.css">
<title>Intranet --> Add Event Calendar</title>
<script language="JavaScript" type="text/javascript">
function checkval(form){
  		if (form.activity.value == ""){ alert("ยังไม่ได้กรอก : เรื่อง"); form.activity.focus(); return false; }
		if (form.startdate.value == ""){ alert("ยังไม่ได้ระบุ : วันที่"); form.startdate.focus(); return false; }
		if (form.starthour.value == ""){ alert("ยังไม่ได้ระบุ : เวลา"); form.starthour.focus();  return false; }
		if (form.startminute.value == ""){ alert("ยังไม่ได้ระบุ : เวลา"); form.startminute.focus(); return false; }
		if (form.location.value == ""){ alert("ยังไม่ได้กรอก : สถานที่"); form.location.focus(); return false; }
		if (form.responsible.value == ""){ alert("ยังไม่ได้กรอก : ผู้รับผิดชอบ"); form.responsible.focus(); return false; } 
		<!--if (form.depid.value == "0"){ alert("ยังไม่ได้ระบุ : หน่วยงาน"); form.depid.focus(); return false; } -->
		if (form.tel.value == ""){ alert("ยังไม่ได้กรอก : เบอร์โทรศัพท์"); form.tel.focus(); return false; }
}
</script>        
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
<meta http-equiv="Content-Type" content="text/html; charset=windows-874">
<table border="0">
  <form method="post" action="addevent.php" enctype="multipart/form-data" onsubmit="return checkval(this)">
    <tr> 
      <td valign="top" class="boldBlack_14">กิจกรรม :&nbsp;</td>
      <td valign="top" class="font14"><!-- <input name="activity" type="text" id="activity" size="50" maxlength="100"> --><TEXTAREA NAME="activity" ROWS="2" COLS="80" wrap="virtual"></TEXTAREA>
        <font color="#FF0000">*</font></td>
    </tr>
    <tr>
      <td valign="middle" class="boldBlack_14">หน่วยงาน:</td>
      <td valign="middle" class="font14">
      	<select name="">
        	<option value="0">- เลือกรายการ -</option>
            <?php
				$sql="select * from orgnization
				order by dp_id asc";
				$rs=mysql_query($sql);
				while($ob=mysql_fetch_array($rs)){
			?>
            <option value="<?php echo $ob["dp_id"]; ?>">- <?php echo $ob["dp_name"]; ?></option>
            <?php
				}
			?>
        </select>
      </td>
    </tr>
    <tr> 
      <td valign="middle" class="boldBlack_14"><font color="#000000">วันที่ 
        :</font>&nbsp;</td>
      <td valign="middle" class="font14"> <input type="text" name="startdate" id="sel4" size="15" readonly="true"> 
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
        <font color="#FF0000">*</font> &nbsp;ถึง&nbsp; <input name="enddate" type="text" id="enddate" size="15" readonly="true"> 
        <input type="reset" value="เลือกวัน" id='button' onclick="alert('click');"> 
        <script type="text/javascript">
		var cal = new Zapatec.Calendar.setup({
		
		inputField     :    "enddate",     // id of the input field
		ifFormat       :    "%Y-%m-%d",     // format of the input field
		showsTime      :     false,
		button         :    "button",  // trigger button (well, IMG in our case)
		align          :    "Tl"           // alignment (defaults to "Bl")
		
		});
		
	</script></td>
    </tr>
    <!--<tr> 
      <td valign="middle" class="boldBlack_14">เวลา :&nbsp;</td>
      <td valign="middle" class="font14"> <select NAME="starthour" SIZE=1 id="starthour">
          <?php
														#for($i=00; $i<=23; $i++) 
														#{
																//$j=$i+1;
																#$i = sprintf("%02d",$i);
                      											#echo"<option value=$i>$i</option>";
														#}
											?>
        </select> <select NAME="startminute" SIZE=1 id="startminute">
          <?php
														#for($i=00; $i<=55; $i+=5) 
														#{
																#$i = sprintf("%02d",$i);
                      											#echo"<option value=$i>$i</option>";
														#}
											?>
        </select><font color="#FF0000">*</font> &nbsp;ถึง&nbsp; <select NAME="endhour" SIZE=1 id="endhour">
		<option value="">- -</option>
          <?php
														#for($i=00; $i<=23; $i++) 
														#{
																#$i = sprintf("%02d",$i);
                      											#echo"<option value=$i>$i</option>";
														#}
											?>
        </select> <select name="endminute" size=1 id="endminute">
		<option value="">- -</option>
          <?php
														#for($i=00; $i<=55; $i+=5) 
														#{
															#$i = sprintf("%02d",$i);
                      											#echo"<option value=$i>$i</option>";
														#}
											?>
        </select>        </td>
    </tr> -->
    <tr> 
      <td class="boldBlack_14">สถานที่&nbsp;:&nbsp;</td>
      <td valign="middle" class="font14"><input name="location" type="text" id="location" size="50"> 
        <font color="#FF0000">*</font></td>
    </tr>
    <tr> 
      <td valign="top" class="boldBlack_14">รายละเอียดเพิ่มเติม :&nbsp;</td>
      <td valign="middle" class="font14"><textarea name="description" cols="80" rows="6" wrap="virtual" id="textarea"></textarea>      </td>
    </tr>
    <tr> 
      <!--<td colspan="2" valign="middle" class="font14">ผู้รับผิดชอบ</td>
    </tr>
    <tr> 
      <td valign="middle" class="font14" align="right">หน่วยงาน&nbsp;:&nbsp;</td>
      <td valign="middle" class="font14"><select name="department">
          <option value="0">- - - เลือกหน่วยงาน - - -</option>
          <? /*require'db.php';
						$sql="select  * from department";
						$result=mysql_query($sql, $db);
						while($row=mysql_fetch_array($result)){		*/				
						?>
          <option value="<? //print $row["department"]?>"><? //print $row["department"];?></option>
          <?
						//} 
					?>
        </select> 
        </td>
    </tr>
    <tr>
      <td align="right" class="font14">หน่วยงานอื่น ๆ :&nbsp;</td>
      <td class="font14"><input name="form_another" type="text" id="form_another" size="50"></td> -->
    </tr>
    <tr> 
      <td class="boldBlack_14">ผู้รับผิดชอบ/ผู้ติดต่อ&nbsp;:&nbsp;</td>
      <td class="font14"><input name="responsible" type="text" id="responsible" size="50" maxlength="100">
      <font color="#FF0000">*</font></td>
    </tr>
    <!--<tr> 
      <td class="boldBlack_14">โทรศัพท์&nbsp;:&nbsp;</td>
      <td class="font14"><input name="tel" type="text" id="tel" size="40"> 
        <font color="#FF0000">*</font></td>
    </tr> -->
    <!--<tr> 
      <td class="boldBlack_14">โทรสาร&nbsp;:&nbsp;</td>
      <td class="font14"><input name="fax" type="text" id="fax" size="40"></td>
    </tr> -->
    <!--<tr> 
      <td class="boldBlack_14">Email&nbsp;:&nbsp;</td>
      <td><input name="email" type="text" id="email" size="40"></td>
    </tr> -->
   <tr> 
      <td class="boldBlack_14">ไฟล์ข้อมูล&nbsp;:&nbsp;</td>
      <td><input name="key_file" type="file" id="key_file" size="50"></td>
    </tr>
    <tr> 
      <td colspan="2"><input name="addcalendar" type="submit" id="addcalendar" value="&nbsp;เพิ่มปฏิทินกิจกรรม&nbsp;" class="button"> <input type="button" value="&nbsp;ยกเลิก&nbsp;" class="button" onClick="location.href='event.php'"></td>
    </tr>
  </form>
</table>
