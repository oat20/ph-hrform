<? session_start(); 
//include "include/re_loginadmin.php";
// include "include/connect.php";
/*include("include/config.php");
$conn = connect_db("db_news");
if(!$conn)
echo "เกิดความผิดพลาดไม่สามารถติดต่อกับฐานข้อมูลได้";*/


?>
<body bgcolor="#5c7094" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
<meta http-equiv="Content-Type" content="text/html; charset=windows-874">


<script language="JavaScript" type="text/javascript" src="wysiwyg.js"></script>



<?

// *********************************************************************-->

$sql="select  *  from  type_news  where  id_type='$key1'";  
	   $exec=mysql_query($sql,$link);
	   	while($rs1= mysql_fetch_array($exec))
					{
		 $key1=$rs1[id_type];		
	     $name_type=$rs1[name_type];
		 }
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


<FORM name="form" action="compcode/load_insert_news_img.php" enctype="multipart/form-data"  method="post"  onSubmit="return allowSend(this)"> 
<table width="650" border="0" align="center" cellpadding="0" cellspacing="0" bordercolor="#FFFFFF">
  <tr>
    <input type="hidden" name="MAX_FILE_SIZE" value="500000000">
    <input type="hidden" name="cate" value="1">
    <td>
           <tr align="center" >
          <td colspan="3" class="titlebold" background="compcode/picture/bar07.jpg"></td>
        </tr>
        <tr  >
          <td width="25%" class="regWhite_13" background="compcode/picture/bar07.jpg"><div align="right">ชื่อหัวข้อภาพข่าวกิจกรรม:</div></td>
          <td  background="compcode/picture/bar07.jpg"></td>
          <td  background="compcode/picture/bar07.jpg"><input name="title_pic" type="text" class="inputform" id="title_pic" size="50" maxlength="100">          </td>
        </tr>
        <tr  >
          <td class="regWhite_13" background="compcode/picture/bar07.jpg"><div align="right">ชนิดของข่าว:</div></td>
          <td background="compcode/picture/bar07.jpg">&nbsp;</td>
          <td align="left" background="compcode/picture/bar07.jpg"><input type='hidden' name='key1' value='<? echo $key1;   ?>'>
              <input type="text" size=30  maxlength="30"disabled  name="name_type2"  value="<? echo $name_type;   ?> ">
            <span class="boldFF6600_13">            * </span></td>
        </tr>
        <tr  >
          <td class="regWhite_13" background="compcode/picture/bar07.jpg"><div align="right">วันที่ลงข่าว::</div></td>
          <td background="compcode/picture/bar07.jpg">&nbsp;</td>
          <td background="compcode/picture/bar07.jpg"> <span class="regWhite_13">วันที่ :&nbsp;</span>&nbsp;
              <select name="select" size=1 disabled>
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
              <span class="smalltext">&nbsp;</span><span class="regWhite_13"> เดือน
              :&nbsp;</span><span class="smalltext">&nbsp;
              <select name="select" disabled>
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
            <input type="text" size=4 maxlength=4 name="year2" value="<? echo date("Y")+543 ?>" disabled>
            <font color=red>&nbsp;</font></span><span class="boldFF6600_13">*</span></td>
        </tr>
        <tr  >
          <td class="regWhite_13"  background="compcode/picture/bar07.jpg"><div align="right">ระยะเวลา:</div></td>
          <td background="compcode/picture/bar07.jpg">&nbsp;</td>
          <td background="compcode/picture/bar07.jpg"><select name="d_1" size=1 >
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
		 <tr >
          <td valign="top" class="regWhite_13" background="compcode/picture/bar07.jpg"><div align="right">รายละเอียดคำขึ้นต้นภาพข่าวกิจกรรม:</div></td>
          <td  background="compcode/picture/bar07.jpg">&nbsp;</td>

          <td background="compcode/picture/bar07.jpg"><textarea name="detaile_pic1" cols="255" rows="3"   id="detaile_pic1"   onkeyup="javascript:checklength(this,225);"style=" left:50px; top:70px;  width:300; height:50"></textarea></td>
        </tr>
        <tr >
          <td valign="top" class="regWhite_13" background="compcode/picture/bar07.jpg"><div align="right">รายละเอียดของภาพข่าวกิจกรรม:</div></td>
          <td background="compcode/picture/bar07.jpg">&nbsp;</td>
          <td background="compcode/picture/bar07.jpg"><textarea   name="detaile_pic" style="width:300; height:200" id="detaile_pic">
		  
		  
		  
		  
		  </textarea><script language="javascript1.2">
  generate_wysiwyg('detaile_pic');
</script>          </td>
        </tr>
		<tr >
          <td class="regWhite_13" background="compcode/picture/bar07.jpg" ><div align="right">ข่าวเกี่ยวกับบุคคลสำคัญ:</div></td>
          <td background="compcode/picture/bar07.jpg" ></td>
          <td background="compcode/picture/bar07.jpg" ><select name="id_person" id="id_person"  style='width:250' >
               <option value="0">--กรุณาเลือก-</option>
                  <?  $sql_person="SELECT * FROM   person_most  ORDER BY id_person DESC  ";
						 $exec_person=mysql_query($sql_person);
	        			 while($rs_person=mysql_fetch_array($exec_person)){	
						     $id_person=$rs_person[id_person];
					    	 $title=$rs_person[title]; 
					    	 $name_person=$rs_person[name_person]; 
							?>
							<option value="<? echo $id_person; ?>"><? echo $title ; ?><? echo $name_person ; ?></option>
					   <? } 
				?>
            </select></td>
        </tr>
        <? $nfile =10;		
			for ($i = 1 ; $i <= $nfile ; $i++) {
						echo"  <tr  bgcolor=#5681ac>   <td class=regWhite_13   background=compcode/picture/bar07.jpg>";
						echo "<div align=right>รูปภาพต้องการ upload :</div>\n</td>";
						echo"<td  background=compcode/picture/bar07.jpg>&nbsp;</td>";
						echo "      <td   background=compcode/picture/bar07.jpg >
						<input name='userfile[]' type=file><br> \n </td></tr>";
			}?>
        <tr  >
          <td background="compcode/picture/bar07.jpg">&nbsp;</td>
          <td background="compcode/picture/bar07.jpg">&nbsp;</td>
          <td background="compcode/picture/bar07.jpg">&nbsp;</td>
        </tr>
        <tr >
          <td background="compcode/picture/bar07.jpg">&nbsp;</td>
          <td background="compcode/picture/bar07.jpg">&nbsp;</td>
          <td background="compcode/picture/bar07.jpg">&nbsp;</td>
        </tr>
            <tr>
            <td colspan="3"  background="compcode/picture/bar07.jpg"><div align="center"> 
                <input class=button type="submit" name="Submit" value="ตกลง">
                <input class=button type="reset" name="submit2" value="เคลียร์">
              </div></td>
          </tr>
		    <tr> 
            <td colspan="3"><img src="compcode/picture/bar08.jpg" width="650"  height="6"></td>
          </tr>
      </table>
      
</form><?  //echo"$table_down"; ?>
<?  


?>

</body>
</html>
