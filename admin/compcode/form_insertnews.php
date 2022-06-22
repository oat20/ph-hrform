<? session_start(); 
//include "include/re_loginadmin.php";
// include "include/connect.php";
/*include("include/config.php");*/
$conn = connect_db("ph_web");
if(!$conn)
echo "เกิดความผิดพลาดไม่สามารถติดต่อกับฐานข้อมูลได้";
?>
<body bgcolor="#5c7094" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
<meta http-equiv="Content-Type" content="text/html; charset=windows-874">
<script language="JavaScript" type="text/javascript" src="wysiwyg.js"></script>
 <? 
 $today = date("H:i:s");  
$date_t=date("Y-m-d");
$date_1="$y_1"."-"."$m_1"."-"."$d_1";
$date_2="$y_2"."-"."$m_2"."-"."$d_2";
 $uploadDir = './photo/' ;
$thumbDir = './thumb/' ;
//<!-- ********************************************************************************** -->
	
		#$sql="select  * from  type_news  where  id_type=$key1";  
	   #$exec=mysql_query($sql);
		#mysql_query("SET NAMES TIS620"); 
	   	#while($rs1=mysql_fetch_array($exec))
		#{
					 #$key1=$rs1[id_type];
					 #$name_type=$rs1[name_type];
		 #}



?>
<SCRIPT LANGUAGE="JavaScript">
<!-- Begin
function allowSend() 
{
	titlePic=document.form.title_pic.value;
	detailePic1=document.form.detaile_pic1.value;
	detailePic=document.form.detaile_pic.value;
	if(titlePic==""||detailePic1==""||detailePic=="")
	{
		alert("กรุณาป้อนข้อมูลให้ครบค่ะ");
	
return false;
}
else
return true;

}
// End -->
</script> 
<FORM   name="form" action="compcode/load_insert_news_form.php" enctype="multipart/form-data"  method="post"  onSubmit="return allowSend(this)"> 
<table border="0" cellpadding="3" cellspacing="0">
    <input type="hidden" name="MAX_FILE_SIZE" value="500000000">
    <input type="hidden" name="cate" value="2">
        <!--<tr align="center" bgcolor="#006699">
          <td colspan="3" class="boldWhite_16"><div align="left"><img src="compcode/picture/bar_insertnews.jpg" width="650" height="18" /></div></td>
        </tr> -->
        <tr  background="compcode/picture/bar07.jpg">
          <td class="regWhite_13" background="compcode/picture/bar07.jpg">หัวข้อข่าว:</td>
          <td background="compcode/picture/bar07.jpg"><input name="title_pic" type="text" class="inputform" id="title_news" size="50" maxlength="100">          </td>
        </tr>
        <tr  background="compcode/picture/bar07.jpg">
          <td class="regWhite_13" background="compcode/picture/bar07.jpg" >ประเภทข่าว:</td>
          <td  align="left" background="compcode/picture/bar07.jpg" >
          <select name="category">
          	<option value="0">- เลือกรายการ -</option>
          <?php
		  	$sql="select  * from  news_category  
			order by id_type asc";  
	   		$exec=mysql_query($sql);
			mysql_query("SET NAMES TIS620"); 
	   		while($rs1=mysql_fetch_array($exec))
			{
					 $key1=$rs1[id_type];
					 $name_type=$rs1[name_type];
					?>
                    <option value="$key1"><?php echo $name_type; ?></option>
                    <?php
		 	}
		  ?>
          </select>
          <!--<input type='hidden' name='key1' value='<? #echo $key1; ?>'> -->
              <!--<input type="text" size=30  maxlength="30"  disabled name="name_type"  value="<? #echo  $name_type  ?> "> -->
              <span class="boldFF6600_12"> *</span></td>
        </tr>
        <!--<tr background="compcode/picture/bar07.jpg">
          <td class="regWhite_13"background="compcode/picture/bar07.jpg">วันที่ลงข่าว:</td>
          <td background="compcode/picture/bar07.jpg" >&nbsp;</td>
          <td background="compcode/picture/bar07.jpg" > <span class="regWhite_13">วันที่ :&nbsp;</span>&nbsp;
              <select name="day" size=1 disabled>
                <?php
							#for($i=1; $i<=31; $i++) 
							#{
									#$a = sprintf("%02d",$i);
									#if($a == date("d"))
											#echo("<OPTION VALUE=\"$a\" SELECTED>$a");
									#else 
											#echo("<OPTION VALUE=\"$a\">$a");
							#}
				?>
              </select>
              <span class="regWhite_13">&nbsp; เดือน :&nbsp;&nbsp;</span><span class="smalltext">
              <select name="month" disabled>
                <?php
								#$m_array = array("ม.ค.","ก.พ.","มี.ค.","เม.ย.","พ.ค.","มิ.ย.","ก.ค.","ส.ค.","ก.ย.","ต.ค.","พ.ย.","ธ.ค.");
								#for($i=0; $i<12; $i++) 
								#{
								   #$j=$i+1;
									#$j = sprintf("%02d",$j);
								   #if($j == date("m")) 
									  #echo("<OPTION VALUE=\"$j\" SELECTED>$m_array[$i]");
								   #else
									  #echo("<OPTION VALUE=\"$j\">$m_array[$i]");
								#} 
						?>
              </select>
&nbsp; </span><span class="regWhite_13">ปี(พ.ศ.): </span><span class="smalltext">
            <input type="text" size=4 maxlength=4 name="year" value="<? #echo date("Y")+543 ?>" disabled>
&nbsp;<span class="boldFF6600_13">*</span></span></td>
        </tr> -->
		<tr  background="compcode/picture/bar07.jpg">
          <td class="regWhite_13"background="compcode/picture/bar07.jpg">กำหนดระยะเวลาแสดงในส่วนเรื่องเล่า:</td>
          <td background="compcode/picture/bar07.jpg" ><select name="d_1" size=1 >
                <?php
							for($i=1; $i<=31; $i++) 
							{
									$a = sprintf("%02d",$i);
									if($a == date("d"))
											echo("<OPTION VALUE=\"$a\" SELECTED>$a");
									else 
											echo("<OPTION VALUE=\"$a\">$a");
							}
				?>
          </select>
          
              <select name="m_1" >
                <?php
								$m_array = array("ม.ค.","ก.พ.","มี.ค.","เม.ย.","พ.ค.","มิ.ย.","ก.ค.","ส.ค.","ก.ย.","ต.ค.","พ.ย.","ธ.ค.");
								for($i=0; $i<12; $i++) 
								{
								   $j=$i+1;
									$j = sprintf("%02d",$j);
								   if($j == date("m")) 
									  echo("<OPTION VALUE=\"$j\" SELECTED>$m_array[$i]");
								   else
									  echo("<OPTION VALUE=\"$j\">$m_array[$i]");
								} 
						?>
              </select>
           
                            <select name="y_1" >
                <?php
								$y_array = array("2549","2550","2551","2552","2553","2554","2555","2558","2559");
								for($i=0; $i<5; $i++) 
								{
								   $j=$i+2006;
									$j = sprintf("%02d",$j);
								   if($j == date("Y")) 
								   {
								   
									  echo("<OPTION VALUE=\"$j\" SELECTED>$y_array[$i]");
									  }
								   else
									  echo("<OPTION VALUE=\"$j\">$y_array[$i]");
								} 
						?>
              </select>
                            <span class="boldWhite_13">ถึง</span>
              <select name="d_2" size=1 >
                <?php
							for($i=1; $i<=31; $i++) 
							{
									$a = sprintf("%02d",$i);
									if($a == date("d"))
											echo("<OPTION VALUE=\"$a\" SELECTED>$a");
									else 
											echo("<OPTION VALUE=\"$a\">$a");
							}
				?>
              </select>
              <select name="m_2" >
                <?php
								$m_array = array("ม.ค.","ก.พ.","มี.ค.","เม.ย.","พ.ค.","มิ.ย.","ก.ค.","ส.ค.","ก.ย.","ต.ค.","พ.ย.","ธ.ค.");
								for($i=0; $i<12; $i++) 
								{
								   $j=$i+1;
									$j = sprintf("%02d",$j);
								   if($j == date("m")) 
									  echo("<OPTION VALUE=\"$j\" SELECTED>$m_array[$i]");
								   else
									  echo("<OPTION VALUE=\"$j\">$m_array[$i]");
								} 
						?>
              </select>
                          <select name="y_2" >
                <?php
								$y_array = array("2549","2550","2551","2552","2553","2554","2555","2558","2559");
								for($i=0; $i<5; $i++) 
								{
								   $j=$i+2006;
									$j = sprintf("%02d",$j);
								   if($j == date("Y")) 
								   {
								   
									  echo("<OPTION VALUE=\"$j\" SELECTED>$y_array[$i]");
									  }
								   else
									  echo("<OPTION VALUE=\"$j\">$y_array[$i]");
								} 
						?>
              </select>
            <span class="boldFF6600_13">* </span></td>
        </tr>
        <!--<tr background="compcode/picture/bar07.jpg">
          <td  background="compcode/picture/bar07.jpg"  height="54" valign="top" class="smalltext"><span class="regWhite_13">
            <div align="right">รายละเอียดคำขึ้นต้นภาพข่าวกิจกรรม:</div>
          </span></td>
          <td background="compcode/picture/bar07.jpg" ></td>
          <td  background="compcode/picture/bar07.jpg" >		    <textarea name="detaile_pic1" rows="3"  id="detaile_pic1"   style="width:300; height:50 "sonKeyUp="javascript:checklength(this,255);"></textarea></td>
        </tr> -->
        <tr background="compcode/picture/bar07.jpg">
          <td valign="top" class="regWhite_13" background="compcode/picture/bar07.jpg" >รายละเอียดของข่าว:</td>
          <td  background="compcode/picture/bar07.jpg" ><textarea name="detaile_pic" rows="5" id="detaile_pic11"  style="width:300; height:200">
			
			
			</textarea>
              <script language="javascript1.2">
  generate_wysiwyg('detaile_pic11');
  </script>          </td>
        </tr>
        <!--<tr >
          <td class="regWhite_13" background="compcode/picture/bar07.jpg" ><div align="right">ข่าวเกี่ยวกับบุคคลสำคัญ:</div></td>
          <td background="compcode/picture/bar07.jpg" ></td>
          <td background="compcode/picture/bar07.jpg" ><select name="id_person" id="id_person"  style='width:250' >
               <option value="0">--กรุณาเลือก-</option>
                  <?  #$sql_person="SELECT * FROM   person_most  ";
						 #$exec_person=mysql_query($sql_person);
	        			 #while($rs_person=mysql_fetch_array($exec_person)){	
						     #$id_person=$rs_person[id_person];
					    	 #$title=$rs_person[title]; 
					    	 #$name_person=$rs_person[name_person]; 
							?>
							<option value="<? #echo $id_person; ?>"><? #echo $title ; ?><? #echo $name_person ; ?></option>
					   <? #} 
				?>
            </select></td>
        </tr> -->
        <tr >
          <td class="regWhite_13" background="compcode/picture/bar07.jpg" >Upload ไฟล์:</td>
          <td background="compcode/picture/bar07.jpg" ><input name="file" type="file" size="50"><br/><span class="regWhite_12">(.doc, .docx, .xls, .xlsx, .ppt, .pptx, .pps, .ppsx, .pdf, .zip, .rar ขนาดไม่เกิน 2 MB)</span></td>
        </tr>
        <? $nfile = 1;		
			for ($i = 1 ; $i <= $nfile ; $i++) {
			?>
						<tr  >    <td class=regWhite_13 background=compcode/picture/bar07.jpg>
						Upload รูปภาพ:</td>
						<td  background=compcode/picture/bar07.jpg><input type='hidden' name='id_pic' value='<?php echo $id_pic; ?>'>
						<input name='userfile[]' type=file size="50">
						<br><span class="regWhite_12">(.jpg, .gif, .png ขนาดไม่เกิน 5 MB)</span></td></tr>
                        <?php
			}?>
        <tr >
          <td background="compcode/picture/bar07.jpg" >&nbsp;</td>
          <td background="compcode/picture/bar07.jpg" >&nbsp;</td>
        </tr>
             <tr>
            <td colspan="3"  background="compcode/picture/bar07.jpg">
			<input type="submit" name="submit" value="เพิ่มข่าว" style="font-family:verdana,tahoma; font-size:10pt; font-weight:bold; padding-bottom:3; padding-top:3; padding-left:10; padding-right:10">
                <input type="button" name="submit2" value="ยกเลิก" style="font-family:verdana,tahoma; font-size:10pt; font-weight:bold; padding-bottom:3; padding-top:3; padding-left:10; padding-right:10" onClick="location.href='news.php'">
              </td>
          </tr>
		    <!--<tr> 
            <td colspan="3"><img src="compcode/picture/bar08.jpg" width="650"  height="6" /></td>
          </tr> -->
  </table>
    

</form>


</body>
</html>
