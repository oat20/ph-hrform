<? session_start(); 
//include "include/re_loginadmin.php";
//include "compcode/include/connect_db.php";
//include("compcode/include/function.php");
$conn = connect_db("db_news");
if(!$conn)
echo "เกิดความผิดพลาดไม่สามารถติดต่อกับฐานข้อมูลได้";


?>
<body bgcolor="#5c7094" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
<meta http-equiv="Content-Type" content="text/html; charset=windows-874">

<!-- <link href="tool/css_text.css" rel="stylesheet" type="text/css">
 -->

<script language="JavaScript" type="text/javascript" src="../wysiwyg.js"></script>
 
 <!--<script language="JavaScript" type="text/javascript" src="include/script_code.js"> -->
 
<script language="JavaScript" type="text/javascript">
cssDir = "styles/";
  document.write('<link rel="stylesheet" type="text/css" href="' +cssDir+ 'styles.css">\n');
      <!--
 function checklength(obj,len)
 {
  if(obj.value.length > len)
  {
   alert("ตอนนี้คุณได้พิมพ์เกิน  "+len+" ตัวอักษร แล้วครับ");
   obj.value = obj.value.substring(0,len)
  }
 }
</script>





<? 
	/*if(check_admin($authuser))
	{
	
  header_admin();  
  }

else
{
echo"    ";
header_adminsystem();
}
*/

 



$today = date("H:i:s");  
$date_t=date("Y-m-d");
$date_1="$y_1"."-"."$m_1"."-"."$d_1";
$date_2="$y_2"."-"."$m_2"."-"."$d_2";
 $uploadDir = './photo/' ;
$thumbDir = './thumb/' ;



//<!-- ********************************************************************************** -->
	
		$sql="select  * from  type_news  where  id_type=$key1";  
	   $exec=mysql_query($sql);
		mysql_query("SET NAMES TIS620"); 
	   	while($rs1=mysql_fetch_array($exec))
		{
					 $key1=$rs1[id_type];
					 $name_type=$rs1[name_type];
		 }



?>
<script language="JavaScript" type="text/javascript" src="wysiwyg.js">
</script>

<SCRIPT LANGUAGE="JavaScript">
<!-- Begin
function checkrequired(which) {
var pass=true;
if (document.images) {
	for (i=0;i<which.length;i++) {
	var tempobj=which.elements[i];
		//if (tempobj.name.substring(0,8)=="required") {
				if (((tempobj.type=="text"||tempobj.type=="textarea")&&tempobj.value=='')) {
					pass=false;
					break;
				}
		//}
	}
}
if (!pass) {
shortFieldName=tempobj.name.substring(0,30).toUpperCase();
alert("กรุณาใส่ข้อมูลให้ครบด้วย");
return false;
}
else
return true;
}
// End -->
</script> 
<FORM   name="form"action="compcode/load_insert_news_form.php" enctype="multipart/form-data"  method="post"  onSubmit="return checkrequired(this)"> 


      <table width="650" border="0" align="center" cellpadding="0" cellspacing="0">
        <input type="hidden" name="MAX_FILE_SIZE" value="500000000">
    <input type="hidden" name="cate" value="2">
        <tr align="center" bgcolor="#006699">
          <td colspan="3" class="boldWhite_16"><div align="left"><img src="compcode/picture/bar_insertnews.jpg" width="650" height="18" /></div></td>
        </tr>
        <tr  background="compcode/picture/bar07.jpg" >
          <td height="29"   colspan="3" background="compcode/picture/bar07.jpg" class="smalltext"><div align="center"></div></td>
        </tr>
        <tr  background="compcode/picture/bar07.jpg">
          <td class="regWhite_13" background="compcode/picture/bar07.jpg"  width="25%"><div align="right">ชื่อหัวข้อข่าว:</div>          </td>
          <td background="compcode/picture/bar07.jpg">&nbsp;</td>
          <td background="compcode/picture/bar07.jpg"><input name="title_pic" type="text" class="inputform" id="title_news" size="50" maxlength="100">          </td>
        </tr>
        <tr  background="compcode/picture/bar07.jpg">
          <td class="regWhite_13" background="compcode/picture/bar07.jpg" ><div align="right">ชนิดของข่าว:</div>          </td>
          <td background="compcode/picture/bar07.jpg" >&nbsp;</td>
          <td  align="left" background="compcode/picture/bar07.jpg" ><input type='hidden' name='key1' value='<? echo $key1; ?>'>
              <input type="text" size=30  maxlength="30"  disabled name="name_type"  value="<? echo  $name_type  ?> ">
              <span class="boldFF6600_12"> *</span></td>
        </tr>
        <tr background="compcode/picture/bar07.jpg">
          <td class="regWhite_13"background="compcode/picture/bar07.jpg"><div align="right"  >วันที่ลงข่าว:</div>          </td>
          <td background="compcode/picture/bar07.jpg" >&nbsp;</td>
          <td background="compcode/picture/bar07.jpg" > <span class="regWhite_13">วันที่ :&nbsp;</span>&nbsp;
              <select name="day" size=1 disabled>
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
              <span class="regWhite_13">&nbsp; เดือน :&nbsp;&nbsp;</span><span class="smalltext">
              <select name="month" disabled>
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
&nbsp; </span><span class="regWhite_13">ปี(พ.ศ.): </span><span class="smalltext">
            <input type="text" size=4 maxlength=4 name="year" value="<? echo date("Y")+543 ?>" disabled>
&nbsp;<span class="boldFF6600_13">*</span></span></td>
        </tr>
		<tr  background="compcode/picture/bar07.jpg">
          <td class="regWhite_13"background="compcode/picture/bar07.jpg"><div align="right"  >ระยะเวลา</div></td>
          <td background="compcode/picture/bar07.jpg" >&nbsp;</td>
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
								$y_array = array("2549","2550","2551","2552","2553");
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
                            <span class="boldWhite_13">ถึง                            </span>
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
								$y_array = array("2549","2550","2551","2552","2553");
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
        <tr background="compcode/picture/bar07.jpg">
          <td  background="compcode/picture/bar07.jpg"  height="54" valign="top" class="smalltext"><span class="regWhite_13">
            <div align="right">รายละเอียดคำขึ้นต้นภาพข่าวกิจกรรม:</div>
          </span></td>
          <td background="compcode/picture/bar07.jpg" ></td>
          <td  background="compcode/picture/bar07.jpg" >		    <textarea name="detaile_pic1" rows="3"  id="detaile_pic1"   style="width:300; height:50 "sonKeyUp="javascript:checklength(this,255);"></textarea>
</td>
        </tr>
        <tr background="compcode/picture/bar07.jpg">
          <td valign="top" class="regWhite_13" background="compcode/picture/bar07.jpg" ><div align="right">รายละเอียดของข่าว:</div>          </td>
          <td  background="compcode/picture/bar07.jpg" >&nbsp;</td>
          <td  background="compcode/picture/bar07.jpg" ><textarea name="detaile_pic" rows="5" id="detaile_pic11"  style="width:300; height:200">
			
			
			</textarea>
              <script language="javascript1.2">
  generate_wysiwyg('detaile_pic11');
  </script>          </td>
        </tr>
        <tr >
          <td class="regWhite_13" background="compcode/picture/bar07.jpg" ><div align="right" >ไฟล์ข่าวที่ต้องการ upload:</div>          </td>
          <td background="compcode/picture/bar07.jpg" ></td>
          <td background="compcode/picture/bar07.jpg" ><input name="file" type="file">          </td>
        </tr>
        <? $nfile = 3;		
			for ($i = 1 ; $i <= $nfile ; $i++) {
						echo"  <tr  >    <td class=regWhite_13 background=compcode/picture/bar07.jpg>";
						echo "<div align=right>รูปภาพต้องการ upload </div>\n</td>";
						echo"<td background=compcode/picture/bar07.jpg>&nbsp;</td>";
						echo "      <td  background=compcode/picture/bar07.jpg><input type='hidden' name='id_pic' value='$id_pic'>
						<input name='userfile[]' type=file><br> \n </td></tr>";
			}?>
        <tr >
          <td background="compcode/picture/bar07.jpg" >&nbsp;</td>
          <td background="compcode/picture/bar07.jpg" >&nbsp;</td>
          <td background="compcode/picture/bar07.jpg" >&nbsp;</td>
        </tr>
        <tr background="compcode/picture/bar07.jpg" >
          <td background="compcode/picture/bar07.jpg" >&nbsp;</td>
          <td background="compcode/picture/bar07.jpg" >&nbsp;</td>
          <td background="compcode/picture/bar07.jpg" >&nbsp;</td>
        </tr>
             <tr>
            <td colspan="3"  background="compcode/picture/bar07.jpg"><div align="center"> 
			
                <input class=button type="submit" name="submit" value="ตกลง">
                <input class=button type="reset" name="submit2" value="เคลียร์">
              </div></td>
          </tr>
		    <tr> 
            <td colspan="3"><img src="compcode/picture/bar08.jpg" width="650"  height="6" /></td>
          </tr>
  </table>
    

</form>


</body>
</html>
